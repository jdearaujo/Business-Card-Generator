<?php
/**
 * Does a couple things to ensure security.
 *
 * @package Business-Card-Generator
 */

if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( defined( 'FORCE_HTTPS' )?FORCE_HTTPS:false && defined( 'HAS_HTTPS' )?HAS_HTTPS:false && defined( 'PREVENT_REDIRECT' )?PREVENT_REDIRECT:false && ( ( !empty( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] !== 'off' ) || $_SERVER[ 'SERVER_PORT' ] == 443 ) ) {
    // We are supposed to be on HTTPS and we aren't, so let's redirect the user to the HTTPS version of this website.
    header( 'Location: https://'.HOME_URL );
    die(  );
}
if ( substr( basename( $_SERVER[ 'PHP_SELF' ] ), -7, -4 ) == 'inc' ) {
    // This file is an include! We should redirect them to the home page and die.
    header( 'Location: http'.( defined( 'HAS_HTTPS' )?( HAS_HTTPS?'s':'' ):'' ).'://'.HOME_URL );
    die(  );
}
?>