<?php
/**
 * The actual application
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( !class_exists( 'BizCardGenApp' ) ) {
    /**
     * The actual application's class
     *
     * @since 0.11
     * @package Business-Card-Generator
     */
    class BizCardGenApp {
        /**
         *  Current Version
         *  @var string
         */
        public static $version='0.11';
        
        function __construct() {} //Do nothing
        
        /**
         * Launches the application
         *
         * @since 0.11
         * @uses *
         */
        function launch(  ) {
            global $http, $html;
            $http->header( 'X-Application-Version', self::$version );
            $end = '';
            $htm = fopen( $http->where( 'app-htm' ), 'r' ) or die('35');
            $end.= fread( $htm, filesize( $http->where( 'app-htm', true ) ) );
            fclose( $htm );
            return $end;
        }
        
        
        function __destruct() {}
    }
}
?>