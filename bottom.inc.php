<?php
/**
 * The bottom of all pages.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
$html->code( '<hr><footer><p>&copy; '.__( 1 ).' '.( __( 2 )==strval( date( 'Y' ) )?__( 2 ):__( 2 ).'&minus;'.date( 'Y' ) ).'</p></footer></div><script src="'.$http->where( 'jquery', false ).'"></script><script src="'.$http->where( 'bootstrap-transition', false ).'"></script><script src="'.$http->where( 'bootstrap-collapse' ).'"></script><script async src="'.$http->where( 'my-js' ).'"></script>' );
if ( defined( 'GOOGLE_ANALYTICS_ID' )?GOOGLE_ANALYTICS_ID:false ) $html->code( "<script>var _gaq=[['_setAccount','".GOOGLE_ANALYTICS_ID."'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));</script>" );
hook( 'footer_hook' );
$html->code( '</body></html>' );
$html->dump( false );
exit(  );
?>