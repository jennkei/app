<?php

class ARecoveryModule {
	const ASSET_GROUP_ARECOVERY_LOCK = 'arecovery_lock_scss';

	/**
	 * Checks whether recovery is enabled (on current wiki)
	 *
	 * @return bool
	 */
	public static function isEnabled() {
		global $wgUser, $wgEnableUsingSourcePointProxyForCSS;

		if( $wgUser instanceof User && $wgUser->isLoggedIn() ) {
			return false;
		}

		return !empty( $wgEnableUsingSourcePointProxyForCSS );
	}
	
	public static function getSourcePointBootstrapCode() {
		if ( !static::isEnabled() ) {
			return PHP_EOL . '<!-- Recovery disabled. -->' . PHP_EOL;
		}
		return F::app()->sendRequest( 'ARecoveryEngineApiController', 'getBootstrap' );
	}

	public static function isLockEnabled() {
		$user = F::app()->wg->User;
		return self::isEnabled() && ( $user && !$user->isLoggedIn() );
	}

	public static function isUntouchableAdsEnabled() {
		global $wgUser;

		if( $wgUser instanceof User && $wgUser->isLoggedIn() ) {
			return false;
		}
		
		//TODO: add wgVar
		return true;
	}

	public static function getUntouchableAdsBootstrapCode() {
		if ( !static::isUntouchableAdsEnabled() ) {
			return PHP_EOL . '<!-- UA Recovery disabled. -->' . PHP_EOL;
		}
		return F::app()->sendRequest( 'ARecoveryEngineApiController', 'getUABootstrap' );
	}
}
