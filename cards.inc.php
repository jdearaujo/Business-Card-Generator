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
$cardfronts[ 'default' ]='FRONT %name%!';
$cardbacks[ 'default' ]='BACK';
?>