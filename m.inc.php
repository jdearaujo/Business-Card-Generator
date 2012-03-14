<?php
/**
 * The main file that retrieves a bunch of important files.
 *
 * @package Business-Card-Generator
 */
global $http, $html, $starttime;
if ( !isset( $starttime ) ) $starttime = microtime( true );
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
if ( !function_exists( 'tryDef' ) ) {
    /**
     * Try to define a constant
     *
     * @since 0.1
     *
     * @param string $name
     * @param mixed $prefix Optional. Either false for ROOT or a string ending with a slash (/)
     * @return bool False means it was already defined, True it was defined successfully.
     */
    function tryDef( $name, $value=true ) {
        if ( !defined( $name ) ) define( $name, $value );
        else return false; // It's already defined, so return FALSE.
        return true; // It was defined back on the first line of this function, so return TRUE.
    }
}
if ( !function_exists( 'tryReq' ) ) {
    /**
     * Retrieve a file
     *
     * @since 0.1
     * @uses ROOT as the default prefix
     *
     * @param string $file
     * @param bool|string $prefix Optional. Either false for ROOT or a string ending with a slash (/)
     * @return bool False means that the file could not be read. True means that the file could be read and was retrieved.
     */
    function tryReq( $file, $hooks=true, $prefix=false ) {
        if ( is_readable( $file ) ) {
            if ( $hooks===true ) hook( 'pre_'.str_replace( '-', '_', str_replace( '.', '_', $file ) ) );
            require_once( ( $prefix?$prefix:ROOT.'/' ).$file );
        }
        else {
            if ( $hooks===true ) hook( 'fail_to_load_'.str_replace( '-', '_', str_replace( '.', '_', $file ) ) );
            return false; // File isn't readable, so return FALSE.
        }
        if ( $hooks===true ) hook( 'post_'.str_replace( '-', '_', str_replace( '.', '_', $file ) ) );
        return true; // We can read the file, and we already have by the time we get here, so we should return TRUE.
    }
}
if ( !defined( 'HAS_M_INC_PHP' ) ) {
    tryDef( 'HAS_M_INC_PHP', true );
    if ( !defined( 'NO_PRELOAD' ) ) {
        tryReq( 'callbacks.inc.php', false );
        tryReq( 'config.inc.php', false );
        tryReq( 'basic-security.inc.php', false );
        tryReq( 'http.inc.php' );
        tryReq( 'html.inc.php' );
    }
}
?>