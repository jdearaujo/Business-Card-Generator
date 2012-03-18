<?php
/**
 * This file contains all of the designs.
 * Here's how to make your own card design:
 * 1. Come up with a Public name and a Codename. Add to the $cardnames array a key & value pair - the key will be the Codename, and the value will be the Public name.
 * 2. Add a key & value pair to the $cardfronts and $cardbacks arrays - the key will be the Codename, and the value will be an empty string ( '' )
 * 3. Add to the end of this file (just above the question mark and greater-than sign) the following, but replace 'codename' with the Codename you chose.
 *        $cardfronts[ 'codename' ]='';
 *        $cardbacks[ 'codename' ]='';
 * 4. Put the HTML code for you design in between the ' ]=' and the '; like I have done for the design codenamed 'default'.
 *        Want to use CSS? Use it inline.
 * 5. For any variables (e.g. the Name of the person who is getting this business card), just put the variable's codename between percent signs.
 *        For a list of all of the variable names & corresponding codenames, go to app.inc.php and check out the $fields array (values are inserted into it on line 39).
 *
 * @package Business-Card-Generator
 */
global $cardbacks, $cardfronts, $cardnames;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
$cardnames = array( 'default'=>'Default' ); // The names of the card designs
$cardfronts = array( 'default'=>'' ); // The array of designs for the front of cards.
$cardbacks = array( 'default'=>'' ); // The array of designs for the front of cards.
$cardfronts[ 'default' ]='<div style="background: rgb(59,103,158);background: -moz-linear-gradient(top,  rgb(59,103,158) 0%, rgb(43,136,217) 50%, rgb(32,124,202) 51%, rgb(125,185,232) 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(59,103,158)), color-stop(50%,rgb(43,136,217)), color-stop(51%,rgb(32,124,202)), color-stop(100%,rgb(125,185,232)));background: -webkit-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: -o-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: -ms-linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%);background: linear-gradient(top,  rgb(59,103,158) 0%,rgb(43,136,217) 50%,rgb(32,124,202) 51%,rgb(125,185,232) 100%)">
<p style="font-size:25px;line-height:100%;padding:8px;font-weight:bold">%name%</p>
<p style="font-size:15px;line-height:140%;padding-left:14px;font-weight:bold">%email%</p>
<p style="font-size:12px;line-height:135%;padding-left:13px">Home: %home_phone%</p>
<p style="font-size:14px;line-height:135%;padding-left:13px;font-weight:bold">Mobile: %cell_phone%</p>
<p style="font-size:13px;line-height:135%;padding-left:13px">Skype: %skype%</p>
<p style="font-size:13px;line-height:135%;padding-left:13px">Location: %location%</p>
<p style="font-size:15px;line-height:135%;padding-left:14px;font-weight:bold">%website%</p>
<p style="font-size:11px;line-height:100%;padding-right:10px;text-align:right">%position% at</p>
<p style="font-size:20px;line-height:100%;padding-right:10px;font-weight:bold;text-align:right">%company%</p>
</div>';
$cardbacks[ 'default' ]='BACK';
?>