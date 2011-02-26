<?php
/**
 * Cache for article titles (prefixed DB keys) and ids linked from one source
 *
 * @ingroup Cache
 */
class LinkCache {

	/* private */ var $mGoodLinks, $mBadLinks, $mGoodLinkFields;
	/* private */ var $mForUpdate;

	/**
	 * Get an instance of this class
	 */
	static function &singleton() {
		static $instance;
		if ( !isset( $instance ) ) {
			$instance = new LinkCache;
		}
		return $instance;
	}

	function __construct() {
		$this->mForUpdate = false;
		$this->mGoodLinks = array();
		$this->mGoodLinkFields = array();
		$this->mBadLinks = array();
	}

	/**
	 * General accessor to get/set whether SELECT FOR UPDATE should be used
	 */
	public function forUpdate( $update = null ) {
		return wfSetVar( $this->mForUpdate, $update );
	}

	/*
	 * Get ID for Title from cache.
	 * @param String $title
	 */
	public function getGoodLinkID( $title ) {
		global $wgMemc, $wgEnableFastLinkCache;
		if ( array_key_exists( $title, $this->mGoodLinks ) ) {
			return $this->mGoodLinks[$title];
		}
		if ( $wgEnableFastLinkCache ) {
			$id = $wgMemc->get("linkcache:good:$title");
			return $id ? $id : 0;
		}
		return 0;
	}

	/**
	 * Get a field of a title object from cache.
	 * If this link is not good, it will return NULL.
	 * @param Title $title
	 * @param string $field ('length','redirect')
	 * @return mixed
	 */
	public function getGoodLinkFieldObj( $title, $field ) {
		global $wgMemc, $wgEnableFastLinkCache;
		$dbkey = $title->getPrefixedDbKey();
		if ( array_key_exists( $dbkey, $this->mGoodLinkFields ) ) {
			return $this->mGoodLinkFields[$dbkey][$field];
		}
		if ( $wgEnableFastLinkCache ) {
			$fields = $wgMemc->get("linkcache:fields:$dbkey");
			return $fields ? $fields[$field] : null;
		}
		return null;
	}

	/* boolean isBadLink
	 * @param String title
	 */
	public function isBadLink( $title ) {
		global $wgMemc, $wgEnableFastLinkCache;
		if ( array_key_exists( $title, $this->mBadLinks ) ) return true;
		if ( $wgEnableFastLinkCache ) {
			return $wgMemc->get("linkcache:bad:$title") ? true : false;
		}
		return false;
	}

	/**
	 * Add a link for the title to the link cache
	 * @param int $id
	 * @param Title $title
	 * @param int $len
	 * @param int $redir
	 */
	public function addGoodLinkObj( $id, $title, $len = -1, $redir = null ) {
		global $wgMemc, $wgEnableFastLinkCache;
		$dbkey = $title->getPrefixedDbKey();
		$this->mGoodLinks[$dbkey] = intval( $id );
		$fields = array(
			'length' => intval( $len ),
			'redirect' => intval( $redir ) );
		$this->mGoodLinkFields[$dbkey] = $fields;
		if ( $wgEnableFastLinkCache ) {
			$wgMemc->set("linkcache:good:$dbkey", intval( $id ), 3600);
			$wgMemc->set("linkcache:fields:$dbkey", $fields, 3600);
		}
	}

	public function addBadLinkObj( $title ) {
		global $wgMemc, $wgEnableFastLinkCache;
		$dbkey = $title->getPrefixedDbKey();
		if ( !$this->isBadLink( $dbkey ) ) {
			$this->mBadLinks[$dbkey] = 1;
			if ( $wgEnableFastLinkCache ) {
				$wgMemc->set("linkcache:bad:$dbkey", 1, 3600);
			}
		}
	}

	public function clearBadLink( $title ) {
		global $wgMemc, $wgEnableFastLinkCache;
		unset( $this->mBadLinks[$title] );
		if ( $wgEnableFastLinkCache ) {
			$wgMemc->delete("linkcache:bad:$title");
		}
	}

	public function clearLink( $title ) {
		global $wgMemc, $wgEnableFastLinkCache;
		$dbkey = $title->getPrefixedDbKey();
		if( isset($this->mBadLinks[$dbkey]) ) {
			unset($this->mBadLinks[$dbkey]);
		}
		if( isset($this->mGoodLinks[$dbkey]) ) {
			unset($this->mGoodLinks[$dbkey]);
		}
		if( isset($this->mGoodLinkFields[$dbkey]) ) {
			unset($this->mGoodLinkFields[$dbkey]);
		}
		if ( $wgEnableFastLinkCache ) {
			$wgMemc->delete("linkcache:good:$dbkey");
			$wgMemc->delete("linkcache:fields:$dbkey");
			$wgMemc->delete("linkcache:bad:$dbkey");
		}
	}

	// These are deliberately not in memcache
	public function getGoodLinks() { return $this->mGoodLinks; }
	public function getBadLinks() { return array_keys( $this->mBadLinks ); }

	/**
	 * Add a title to the link cache, return the page_id or zero if non-existent
	 * @param $title String: title to add
	 * @param $len int, page size
	 * @param $redir bool, is redirect?
	 * @return integer
	 */
	public function addLink( $title, $len = -1, $redir = null ) {
		$nt = Title::newFromDBkey( $title );
		if( $nt ) {
			return $this->addLinkObj( $nt, $len, $redir );
		} else {
			return 0;
		}
	}

	/**
	 * Add a title to the link cache, return the page_id or zero if non-existent
	 * @param $nt Title to add.
	 * @param $len int, page size
	 * @param $redir bool, is redirect?
	 * @return integer
	 */
	public function addLinkObj( &$nt, $len = -1, $redirect = null ) {
		global $wgAntiLockFlags, $wgProfiler;
		wfProfileIn( __METHOD__ );

		$key = $nt->getPrefixedDBkey();
		if ( $this->isBadLink( $key ) ) {
			wfProfileOut( __METHOD__ );
			return 0;
		}
		$id = $this->getGoodLinkID( $key );
		if ( $id != 0 ) {
			wfProfileOut( __METHOD__ );
			return $id;
		}

		if ( $key === '' ) {
			wfProfileOut( __METHOD__ );
			return 0;
		}
		
		# Some fields heavily used for linking...
		if ( $this->mForUpdate ) {
			$db = wfGetDB( DB_MASTER );
			if ( !( $wgAntiLockFlags & ALF_NO_LINK_LOCK ) ) {
				$options = array( 'FOR UPDATE' );
			} else {
				$options = array();
			}
		} else {
			$db = wfGetDB( DB_SLAVE );
			$options = array();
		}

		$s = $db->selectRow( 'page', 
			array( 'page_id', 'page_len', 'page_is_redirect' ),
			array( 'page_namespace' => $nt->getNamespace(), 'page_title' => $nt->getDBkey() ),
			__METHOD__, $options );
		# Set fields...
		if ( $s !== false ) {
			$id = intval( $s->page_id );
			$len = intval( $s->page_len );
			$redirect = intval( $s->page_is_redirect );
		} else {
			$len = -1;
			$redirect = 0;
		}

		if ( $id == 0 ) {
			$this->addBadLinkObj( $nt );
		} else {
			$this->addGoodLinkObj( $id, $nt, $len, $redirect );
		}
		wfProfileOut( __METHOD__ );
		return $id;
	}

	/**
	 * Clears cache
	 */
	public function clear() {
		$this->mGoodLinks = array();
		$this->mGoodLinkFields = array();
		$this->mBadLinks = array();
	}
}
