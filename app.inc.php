<?php
/**
 * The actual application
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( !class_exists( 'App' ) ) {
    /**
     * The actual application's class
     *
     * @since 0.11
     * @package Business-Card-Generator
     */
    class App {
        /**
         *  Current Version
         *  @var string
         */
        public static $version='0.11b';
        
        function __construct() {} // Do nothing
        
        /**
         * Launches the application
         *
         * @since 0.11
         * @uses self::*
         * @uses global http, html
         */
        function launch(  ) {
            global $http, $html;
            $http->header( 'X-Application-Version', self::$version );
            $http->header( 'X-Application-Author', 'James Costian' );
            self::preview(  );
        }
        
        /**
         * Creates the preview <div>
         *
         * @since 0.11b
         * @uses global $html
         */
        function preview(  ) {
            global $html;
            $html->code( '<div class="row-fluid"><div class="span12 preview">' );
            $html->code( '<ul id="tab" class="nav nav-tabs"><li class="active"><a data-toggle="tab" href="#previewfront">Preview Front</a></li><li><a data-toggle="tab" href="#previewback">Preview Back</a></li></ul>' );
            $html->code( '<div class="tab-content">' );
            $html->code( '<div class="span12 tab-pane fade active" id="previewfront"><p>a</p></div>' );
            $html->code( '<div class="span12 tab-pane fade" id="previewback"><p>b</p></div>' );
            $html->code( '</div></div></div>' );
        }
        
        function __destruct() {}
    }
}
?>