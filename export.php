<?php
/**
 * This page should handle all of the export requests.
 *
 * @package Business-Card-Generator
 */
global $http, $html, $app;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', false );
$http->header( 'Cache-control', 'private' );
$http->header( 'Content-type', 'application/octet-stream' ); // Says "Hey, what you are about to recieve is pure binary, so just download it!"
$http->header( 'Content-Disposition', 'filename="'.EXPORT_FNAME.'"' );
if ( !isset( $html ) ) $html = new html(  );
$html->code( json_encode( $_GET ), JSON_FORCE_OBJECT ); // Makes a JSON file
$html->dump(  );
?>