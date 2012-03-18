<?php
/**
 * The configuration settings of some important things. To change the text that is displayed, check out talk.inc.php
 *
 * @package Business-Card-Generator
 */
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );

// Behind-the-scenes (but important!!!)
tryDef( 'FORCE_HTTPS', false ); // If this is set to true, this will force the user to use HTTPS.
tryDef( 'HAS_HTTPS', false ); // If your website works over HTTPS, please set this to true. Else, it should be set to false.
tryDef( 'HOME_URL', 'localhost/git/Business-Card-Generator' ); // The URL (without the protocol) where the website is.
tryDef( 'GOOGLE_ANALYTICS_ID', false ); // e.g. UA-XXXXX-X
tryDef( 'BUFFER_SIZE', 300 ); // In characters. This applies to the HTML (and the JSON that comes out of the exporter) - not any of the resources, like the CSS and JS.
tryDef( 'EXPORT_FNAME', 'business-card.json' ); // The default name of the export file.
tryDef( 'MAX_IMPORT_SIZE', 10240 ); // Max filesize for an import. Default: 10kb.
tryDef( 'GOOGLE_FONTS', 'Lato' );
?>