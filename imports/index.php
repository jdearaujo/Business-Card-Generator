<?php
global $http;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( dirname( __FILE__ ) ) );
require_once( ROOT.'/m.inc.php' );
$http->header( 'Location', $http->where( 'home' ) );
exit(  );
?>