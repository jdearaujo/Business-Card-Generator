<?php
/**
 * The home page.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', __( 7 ) );
tryReq( 'top.inc.php' );
$html->hero( 9, 10 );
tryReq( 'bottom.inc.php' );
?>
