<?php
/**
 * This file contains all of the designs
 *
 * @package Business-Card-Generator
 */
global $cardbacks, $cardfronts, $cardnames;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
$cardnames = array( 'default'=>'Default' ); // The names of the card designs
$cardfronts = array( 'default'=>'' ); // The array of designs for the front of cards.
$cardbacks = array( 'default'=>'' ); // The array of designs for the front of cards.
$cardfronts[ 'default' ].='FRONT %name%!';
$cardbacks[ 'default' ].='BACK';
?>