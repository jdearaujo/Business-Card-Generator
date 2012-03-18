<?php
/**
 * This page should handle all of the print requests.
 *
 * @package Business-Card-Generator
 */
global $http, $html, $app;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', false );
if ( !isset( $html ) ) $html = new html(  );
tryReq( 'app.inc.php' );
if ( !isset( $app ) ) $app = new App(  );
// print requests can now be handled.
$html->code( '<!doctype html><html><head><meta charset="uft-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">'."<link href='http://fonts.googleapis.com/css?family=".GOOGLE_FONTS."' rel='stylesheet' type='text/css'>".'<link rel="stylesheet" href="'.$http->where( 'app-css' ).'"><style type="text/css">' );
$html->code( '#front,#back{width: 180mm;height: 257mm;page-break-before:always}#front p,#back p{font-family:\'Lato\', sans-serif;font-size:15px;margin:0;padding:0;line-height:100%;letter-spacing:0' );
$html->code( '</style></head><body><div id="front">' );
$app->card( $_GET, 1, 10, true );
$html->code( '</div><div id="back">' );
$app->card( $_GET, 2, 10, true );
$html->code( '</div><script type="text/javascript">javascript:window.print()</script></body></html>' );
$html->dump(  );
?>