<?php

class AllinfoboxesQueryPage extends PageQueryPage {

	const LIMIT = 1000;
	const ALL_INFOBOXES_TYPE = 'AllInfoboxes';
	private static $subpagesBlacklist = [ 'doc', 'draft', 'test' ];
	private $db;

	function __construct($dbName = false) {
		parent::__construct( self::ALL_INFOBOXES_TYPE );
		$this->db = $dbName;
	}

	public function isListed() {
		return false;
	}

	public function sortDescending() {
		return true;
	}

	public function isExpensive() {
		return true;
	}

	/**
	 * A wrapper for calling the querycache table
	 *
	 * @param bool $offset
	 * @param int $limit
	 *
	 * @return ResultWrapper
	 */
	public function doQuery( $offset = false, $limit = self::LIMIT ) {
		return $this->fetchFromCache( $limit, $offset );
	}

	/**
	 * Update the querycache table
	 *
	 * @param bool $limit Only for consistency
	 * @param bool $ignoreErrors Only for consistency
	 *
	 * @return int number of rows updated
	 */
	public function recache( $limit = false, $ignoreErrors = true ) {
		$dbw = wfGetDB( DB_MASTER, [], $wiki=$this->db );

		$infoboxes = $this->reallyDoQuery();

		( new WikiaSQL() )
			->DELETE( 'querycache' )
			->WHERE( 'qc_type' )->EQUAL_TO( $this->getName() )
			->run( $dbw );

		if ( !empty( $infoboxes ) ) {
			( new WikiaSQL() )
				->INSERT()->INTO( 'querycache', [
					'qc_type',
					'qc_value',
					'qc_namespace',
					'qc_title'
				] )
				->VALUES( $infoboxes )
				->run( $dbw );
		}

		wfRunHooks( 'AllInfoboxesQueryRecached' );

		return count( $infoboxes );
	}

	/**
	 * Queries all templates and get only those with portable infoboxes
	 *
	 * @param bool $limit Only for consistency
	 * @param bool $offset Only for consistency
	 *
	 * @return bool|mixed
	 */
	public function reallyDoQuery( $limit = false, $offset = false ) {
		$dbr = wfGetDB( DB_SLAVE, [ $this->getName(), __METHOD__, 'vslow' ], $this->db );
		$result = ( new WikiaSQL() )
			->SELECT( 'page_id', 'page_title', 'page_namespace' )
			->FROM( 'page' )
			->WHERE( 'page_namespace' )->EQUAL_TO( NS_TEMPLATE )
			->AND_( 'page_is_redirect' )->EQUAL_TO( 0 )
			->run( $dbr, function ( ResultWrapper $result ) {
				$out = [ ];
				while ( $row = $result->fetchRow() ) {
					$out[] = [ 'type' => $this->getName(),
							   'pageid' => $row[ 'page_id' ],
							   'ns' => $row[ 'page_namespace' ],
							   'title' => $row[ 'page_title' ] ];
				}

				return $out;
			} );

		return array_filter( $result, [ $this, 'hasInfobox' ] );
	}

	protected function hasInfobox( $tmpl ) {
		$title = Title::newFromID( $tmpl[ 'pageid' ] );

		if ( $title && $title->exists() &&
			 // omit subages from blacklist
			 !(
				 $title->isSubpage() &&
				 in_array( mb_strtolower( $title->getSubpageText() ), self::$subpagesBlacklist )
			 )
		) {
			$data = PortableInfoboxDataService::newFromTitle( $title )->getData();

			return !empty( $data );
		}

		return false;
	}
}
