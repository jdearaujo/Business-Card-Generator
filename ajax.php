<?php
/**
 * This page should handle all of the AJAX requests.
 *
 * @package Business-Card-Generator
 */
global $http, $html, $app;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', false );
tryReq( 'app.inc.php' );
if ( !isset( $app ) ) $app = new App(  );
if ( !isset( $html ) ) $html = new html(  );
// AJAX requests can now be handled.
$app->card( $_GET, $_GET[ 'side' ], 1, false );
?>