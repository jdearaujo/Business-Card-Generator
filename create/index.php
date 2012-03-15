<?php
/**
 * The Create page (I wanted to avoid using .htaccess so I ended up putting this file into a new dir)
*
* @package Business-Card-Generator
*/
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( dirname( __FILE__ ) ) );
require_once( ROOT.'/m.inc.php' );
tryDef( 'CURRENT_PAGE_NAME', __( 8 ) );
function end_head_hook(  ) {
    global $html, $http;
    $html->code( '<script src="'.$http->where( 'bootstrap-tab-js' ).'"></script>' );
    $html->code( '<script src="'.$http->where( 'app-js' ).'"></script>' );
    $html->code( '<link rel="stylesheet" href="'.$http->where( 'my-css' ).'">' );
}
tryReq( 'top.inc.php' );
$html->row( array( 'width'=>12, 'title'=>11, 'p'=>array( 12 ) ) );
tryReq( 'app.inc.php' );
App::launch(  );
tryReq( 'bottom.inc.php' );
?>