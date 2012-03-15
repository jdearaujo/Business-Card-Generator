<?php
/**
 * Has the actual content. If you want to change any text the website says, you should change this file.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
/**
 * Retrieves a URL or path
 *
 * @since 0.1b
 *
 * @param int $id The ID of the content that will be displayed.
 * @return string The actual content
 */
function __( $id=0 ) {
    $_id = intval( $id );
    switch ( $_id ) {
    case 0:
        return "\n"; // Please don't change this unless you want to use a different line-ending.
        break;
    case 1:
        return 'Business Card Generator'; // The name of this project (for the copyright)
        break;
    case 2:
        return '2012'; // The year the copyright went into effect. If you specify a year in the future you will look like either 1) an idiot or 2) a creative genius
        break;
    case 3:
        return 'Business Card Generator'; // The name of this project (for the <title> in the <head>)
        break;
    case 4:
        return ''; // The <meta> description
        break;
    case 5:
        return ''; // The <meta> author
        break;
    case 6:
        return 'Business Card Generator'; // The name of this project (for the top-left corner of BootStrap)
        break;
    case 7:
        return 'Home'; // Title for page on the nav
        break;
    case 8:
        return 'Create'; // Title for page on the nav
        break;
    case 9:
        return 'Home'; // The title for the hero-unit on the home page.
        break;
    case 10:
        return '[This content needs to be changed. It can be changed in the <a href="https://github.com/jamescostian/Business-Card-Generator/blob/master/talk.inc.php">talk.inc.php</a> file.]'; // First parargraph
        break;
    case 11:
        return 'Create'; // The title for the create page.
        break;
    case 12:
        return '[This content needs to be changed. It can be changed in the <a href="https://github.com/jamescostian/Business-Card-Generator/blob/master/talk.inc.php">talk.inc.php</a> file.]</p><p>The reason why you\'ll love this is because...'; // Paragraph above the actual app on the create page
        break;
    case 13:
        return '';
        break;
    case 14:
        return '';
        break;
    case 15:
        return '';
        break;
    case 16:
        return '';
        break;
    case 17:
        return '';
        break;
    case 18:
        return '';
        break;
    case 19:
        return '';
        break;
    case 20:
        return '';
        break;
    }
}
?>