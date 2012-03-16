<?php
/**
 * Has the actual content. If you want to change any text the website says, you should change this file.
 * If you want to change the text on a design for a business card, please go to app.inc.php, find the card function in the App class, and make your changes inside of the switch statement.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
/**
 * Says something
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
        return 'John Doe'; // Default name for the app.
        break;
    case 14:
        return 'CEO'; // Default position for the app.
        break;
    case 15:
        return 'Local pawn shop'; // Default company for the app.
        break;
    case 16:
        return 'Actions'; // The title of the Actions section in the app.
        break;
    case 17:
        return 'Print'; // The title of the Print button in the app.
        break;
    case 18:
        return 'Import'; // The title of the Import button in the app.
        break;
    case 19:
        return 'Export'; // The title of the Export button in the app.
        break;
    case 20:
        return '(555) 555-5555'; // Default Home Phone number in the app.
        break;
    case 21:
        return '(444) 444-4444'; // Default Cell Phone number in the app.
        break;
    case 22:
        return '(333) 333-3333'; // Default Work Phone number in the app.
        break;
    case 23:
        return 'jamescostian.com'; // Default Website in the app.
        break;
    case 24:
        return 'jamescostian'; // Default Skype ID in the app.
        break;
    case 25:
        return 'james@jamescostian.com'; // Default Email address in the app.
        break;
    case 26:
        return 'Silicon Valley, CA'; // Default Location in the app.
        break;
    case 27:
        return 'Info'; // The title of the Info tab in the app.
        break;
    case 28:
        return 'Principal Design'; // The title of the Principal Design tab in the app.
        break;
    case 29:
        return 'Fonts'; // The title of the Fonts tab in the app.
        break;
    case 30:
        return 'Colors'; // The title of the Colors tab in the app.
        break;
    case 31:
        return ''; // 
        break;
    case 32:
        return ''; // 
        break;
    case 33:
        return ''; // 
        break;
    case 34:
        return ''; // 
        break;
    case 35:
        return ''; // 
        break;
    case 36:
        return ''; // 
        break;
    case 37:
        return ''; // 
        break;
    case 38:
        return ''; // 
        break;
    case 39:
        return ''; // 
        break;
    case 40:
        return ''; // 
        break;
    case 41:
        return ''; // 
        break;
    case 42:
        return ''; // 
        break;
    case 43:
        return ''; // 
        break;
    case 44:
        return ''; // 
        break;
    case 45:
        return ''; // 
        break;
    case 46:
        return ''; // 
        break;
    case 47:
        return ''; // 
        break;
    case 48:
        return ''; // 
        break;
    case 49:
        return ''; // 
        break;
    case 50:
        return ''; // 
        break;
    }
}
?>