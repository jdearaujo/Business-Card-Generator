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
    $html->code( '<script src="'.$http->where( 'app-js' ).'"></script>' );
    $html->code( '<link rel="stylesheet" href="'.$http->where( 'my-css' ).'">' );
}
tryReq( 'top.inc.php' );
tryReq( 'app.inc.php' );
$html->row( array( 
        'width'=>12,
        'title'=>11,
        'p'=>array( 12 ),
        'vanilla'=>BizCardGenApp::launch(  )
        ) );
tryReq( 'bottom.inc.php' );
$html->code( '<div class="hero-unit">
        <h1>aHello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>

        <!-- Example row of columns -->
        <div class="row">
        <div class="span4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        </div>' );
tryReq( 'bottom.inc.php' );
?>