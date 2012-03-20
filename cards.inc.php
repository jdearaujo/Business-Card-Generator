<?php
/**
 * This file contains all of the designs.
 * Here's how to make your own card design:
 * 1. Come up with a name. Add to the $cardnames array the name.
 * 2. Create a function, which will be named 'card_' followed by the key of the card. To find the key, count how many values there are before your design and add one to it. Want to use CSS? One word: inline.
 * 3. Give the function 2 paramaters/arguments: $side and $d. The $side variable will be either 1 or 2 - 1 means that this you are making the front of the card, 2 means you are making the back.
 * 4. The $d param/arg is an array of data/config. For a list of all of the keys & corresponding codenames, go to app.inc.php and check out the $fields array (values are inserted into it on line 39).
 *
 * @package Business-Card-Generator
 */
global $http, $cardnames;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
$cardnames = array( 1=>'Default' ); // The names of the card designs
function card_1( $side, $d ) {
    if ( $side == 1 ) {
        $end='<div style="background: rgb(59,103,158);background: -moz-linear-gradient(top,  rgb(59,103,158) 0%, rgb(43,136,217) 50%, rgb(32,124,202) 51%, rgb(125,185,232) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(59,103,158)), color-stop(50%,rgb(43,136,217)), color-stop(51%,rgb(32,124,202)), color-stop(100%,rgb(125,185,232)));background: -webkit-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: -o-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: -ms-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%)">';
        $end.='<p style="font-size:25px;line-height:100%;padding:8px;font-weight:bold">'.$d[ 'name' ].'</p>';
        $end.='<p style="font-size:15px;line-height:140%;padding-left:14px;font-weight:bold">'.$d[ 'email' ].'</p>';
        $end.='<p style="font-size:12px;line-height:135%;padding-left:13px">Home: '.$d[ 'home_phone' ].'</p>';
        $end.='<p style="font-size:14px;line-height:135%;padding-left:13px;font-weight:bold">Mobile: '.$d[ 'cell_phone' ].'</p>';
        $end.='<p style="font-size:13px;line-height:135%;padding-left:13px">Skype: '.$d[ 'skype' ].'</p>';
        $end.='<p style="font-size:13px;line-height:135%;padding-left:13px">Location: '.$d[ 'location' ].'</p>';
        $end.='<p style="font-size:15px;line-height:135%;padding-left:14px;font-weight:bold">'.$d[ 'website' ].'</p>';
        $end.='<p style="font-size:11px;line-height:100%;padding-right:10px;text-align:right">'.$d[ 'position' ].' at</p>';
        $end.='<p style="font-size:20px;line-height:100%;padding-right:10px;font-weight:bold;text-align:right">'.$d[ 'company' ].'</p>';
    }
    else {
        $end='<div style="background: rgb(255,255,255);background: -moz-linear-gradient(top,  rgb(255,255,255) 0%, rgb(246,246,246) 47%, rgb(237,237,237) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(255,255,255)), color-stop(47%,rgb(246,246,246)), color-stop(100%,rgb(237,237,237)));background: -webkit-linear-gradient(top,  rgb(255,255,255) 0%,rgb(246,246,246) 47%,rgb(237,237,237) 100%);background: -o-linear-gradient(top,  rgb(255,255,255) 0%,rgb(246,246,246) 47%,rgb(237,237,237) 100%);background: -ms-linear-gradient(top,  rgb(255,255,255) 0%,rgb(246,246,246) 47%,rgb(237,237,237) 100%);background: linear-gradient(top,  rgb(255,255,255) 0%,rgb(246,246,246) 47%,rgb(237,237,237) 100%)">';
        $end.='<p style="font-size:10mm;line-height:100%;text-align:center;font-weight:bold;padding-top:20mm;">'.$d[ 'name' ].'</p>';
    }
    return $end.'</div>';
}
if ( is_file( dirname( ROOT ).'/designs.inc.php' ) ) require_once( dirname( ROOT ).'/designs.inc.php' ); // For people like me who want to have designs in a completely different dir (in this case, the parent dir)
?>