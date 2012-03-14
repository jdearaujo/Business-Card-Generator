<?php
/**
 * The configuration settings.
 *
 * @package Business-Card-Generator
 */
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );

tryDef( 'FORCE_HTTPS', false ); // If this is set to true, this will force the user to use HTTPS.
tryDef( 'HAS_HTTPS', false ); // If your website works over HTTPS, please set this to true. Else, it should be set to false.
tryDef( 'HOME_URL', 'localhost/git/Business-Card-Generator' ); // The URL (without the protocol) where the website is.
?>