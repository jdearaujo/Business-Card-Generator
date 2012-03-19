<?php
/**
 * The top of all pages.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
$html = new html(  );
if ( ( isset( $_SERVER[ 'HTTP_USER_AGENT' ] )?( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'MSIE' ) !== false ):false ) && PREVENT_IE===true ) {
    $http->header( 'X-IE-Sucks', 'Yes' );
    $html->code( '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><title>This site is incompatible with your browser</title></head><body><h1>You are using a horrible browser.</h1><h2>This site is incompatible with your browser, so please upgrade to a better browser, like</h2><h1><a href="http://firefox.com/">Firefox</a></h1><h4>or</h4><h1><a href="http://google.com/chrome/">Chrome</a>.</h1></body></html>' );
    exit(  );
}
$html->code( '<!doctype html><html class="no-js" lang="en"><head><script type="application/x-javascript">addEventListener(\'load\',function(){setTimeout(hideAddressBar,0);},false);function hideAddressBar(){window.scrollTo(0, 1);}</script><meta charset="utf-8"><title>'.__( 3 ).'</title><meta name="description" content="'.__( 4 ).'"><meta name="author" content="'.__( 5 ).'"><meta name="viewport" content="width=device-width"><link rel="stylesheet" href="'.$http->where( 'bootstrap-css', false ).'"><style>body{padding-top:60px;padding-bottom:40px}</style><link rel="stylesheet" href="'.$http->where( 'bootstrap-responsive-css', false ).'"><!--[if lt IE 9]><script src="'.$http->where( 'html5respond', false ).'"></script><![endif]-->' );
hook( 'end_head_hook' );
$html->code( '</head><body><div class="navbar navbar-fixed-top"><div class="navbar-inner"><div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a class="brand" href="'.$http->where( 'home', false ).'"'.( ( defined( 'FORCE_NEW_TAB' )?FORCE_NEW_TAB:false )?' target="_blank"':'' ).'>'.__( 6 ).'</a><div class="nav-collapse"><ul class="nav">' );

// Pages
// e.g.: <li class="active"><a href="#">Home</a></li>
$pages = array( array( 'title'=>__( 7 ), 'location'=>'home' ), array( 'title'=>__( 8 ), 'location'=>'create' ) );
foreach ( $pages as $page ) $html->code( '<li'.( $page[ 'title' ]==CURRENT_PAGE_NAME?' class="active"':'' ).'><a href="'.$http->where( $page[ 'location' ], false ).'"'.( ( defined( 'FORCE_NEW_TAB' )?FORCE_NEW_TAB:false )?' target="_blank"':'' ).'>'.$page[ 'title' ].'</a></li>' );
$html->code( '</ul></div></div></div></div><div class="container">' );
?>