<?php
/**
 * This page should handle all of the import requests.
 *
 * @package Business-Card-Generator
 */
global $http, $html, $app;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', false );
if ( ( isset( $_FILES[ 'json' ] )?( !( $_FILES[ 'json' ][ 'error' ] > 0 ) ):false ) && ( $_FILES[ 'fileToUpload' ][ 'size' ] < MAX_IMPORT_SIZE ) ) {
    // Someone has uploaded their json business card, and they want us to import it.
    $fname = $http->where( 'imports' ).'/'.$_FILES[ 'json' ][ 'name' ].'-'.mt_rand( 1, 9999 );
    move_uploaded_file( $_FILES[ 'json' ][ 'tmp_name' ], $fname );
    // First let's read this file.
    $jsonh = fopen( $fname, 'r' );
    $config = json_decode( preg_replace('/,\s*([\]}])/m', '$1', utf8_encode( fread( $jsonh, filesize( $fname ) ) ) ), true );
    // Now we've read the file.
    fclose( $jsonh );
    $jsonh = null;
    $jsonh = fopen( $fname, 'w' );
    fwrite( $jsonh, null );
    fclose( $jsonh );
    $jsonh = null;
    unlink( $fname );
    // We have just deleted the json file, because we already have read it.
    $url = $http->where( 'create' ).'?';
    while ( count( $config ) >= 1 ) {
        $url .= key( $config ).'='.current( $config ).'&';
        array_shift( $config );
    }
    $url = substr( $url, 0, -1 );
    $http->header( 'Location', $url );
}
if ( !isset( $html ) ) $html = new html(  );
tryReq( 'top.inc.php' );
$html->row( array( 'width'=>'12', 'title'=>31, 'p'=>false, 'vanilla'=>'<form action="'.$http->where( 'import' ).'" enctype="multipart/form-data" method="post"><label for="json">'.__( 32 ).'</label><input type="file" id="json" name="json" /><div><input type="submit" class="btn-primary btn-large" value="Submit" /></div></form>' ) );
tryReq( 'bottom.inc.php' );
?>