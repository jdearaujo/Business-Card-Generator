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
$html->code( '<!doctype html><html class="no-js" lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><title>'.__( 3 ).'</title><meta name="description" content="'.__( 4 ).'"><meta name="author" content="'.__( 5 ).'"><meta name="viewport" content="width=device-width"><link rel="stylesheet" href="'.$http->where( 'bootstrap-css', false ).'"><style>body{padding-top:60px;padding-bottom:40px}</style><link rel="stylesheet" href="'.$http->where( 'bootstrap-responsive-css', false ).'"><!--[if lt IE 9]><script src="'.$http->where( 'html5respond', false ).'"></script><![endif]-->' );
hook( 'end_head_hook' );
$html->code( '</head><body><div class="navbar navbar-fixed-top"><div class="navbar-inner"><div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a><a class="brand" href="'.$http->where( 'home', false ).'">'.__( 6 ).'</a><div class="nav-collapse"><ul class="nav">' );

// Pages
// e.g.: <li class="active"><a href="#">Home</a></li>
$pages = array( array( 'title'=>__( 7 ), 'location'=>'home' ), array( 'title'=>__( 8 ), 'location'=>'create' ) );
foreach ( $pages as $page ) $html->code( '<li'.( $page[ 'title' ]==CURRENT_PAGE_NAME?' class="active"':'' ).'><a href="'.$http->where( $page[ 'location' ], false ).'">'.$page[ 'title' ].'</a></li>' );
$html->code( '</ul></div></div></div></div><div class="container">' );
?>