<?php
/**
 * Manages the HTML output. Technically, it also manages JS and CSS output.
 *
 * @package Business-Card-Generator
 */
global $http, $html;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( !class_exists( 'html' ) ) {
    /**
     * Manages the HTML output. Technically, it also manages JS and CSS output.
     *
     * @since 0.1b
     * @package Business-Card-Generator
     */
    class html {
        /**
         *  HTML buffer
         *  @var string
         */
        public static $buffer='';
        
        /**
         * Empties the buffer, and doesn't display it.
         *
         * @since 0.1b
         * @uses self::$buffer
         */
        function __construct(  ) {
            self::$buffer = '';
        }
        
        /**
         * Dumps the buffer.
         *
         * @since 0.1b
         * @uses self::$buffer
         * @uses global $http
         *
         * @param $return If true, it will return the buffer. If false, it will echo the buffer.
         * @return bool|string True if $return is false, self::$buffer (string) if $return is true. If the buffer is empty, false is returned.
         */
        function dump( $return=false ) {
            if ( empty( self::$buffer ) ) return false;
            global $http;
            $http->__destruct(  ); // Sends the HTTP headers (if they aren't already sent)
            hook( 'pre_html_dump' );
            $buffer = self::$buffer;
            self::$buffer = '';
            if ( $return===true ) return $buffer;
            else echo $buffer;
            return true;
        }
        
        /**
         * Adds HTML to the buffer.
         *
         * @since 0.1b
         * @uses self::$buffer
         *
         * @param string $code The HTML to add to the buffer.
         * @return bool True.
         */
        function code( $code ) {
            self::$buffer.=$code;
            return true;
        }
        
        function __isset( $name ) {
            return true;
        }
        function __get( $name ) {
            return self::dump( true );
        }
        function __destruct(  ) {
            self::dump( false );
            return true;
        }
    }
}
?>