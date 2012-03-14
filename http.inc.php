<?php
/**
 * Manages the HTTP Headers, URLs, and relative paths.
 *
 * @package Business-Card-Generator
 */
global $http, $starttime;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( !class_exists( 'http' ) ) {
    /**
     * Manages HTTP Headers, URLs, and relative paths.
     *
     * @since 0.1b
     * @package Business-Card-Generator
     */
    class http {
        /**
         *  HTTP Header Queue
         *  @var array
         */
        public static $queue=array(  );
        
        function __construct(  ) {
            self::$queue = array(  );
        }
        /**
         * Sends all of the HTTP headers in the queue
         *
         * @since 0.1b
         * @uses self::$queue
         * @uses global $starttime
         *
         * @return bool False if the headers were already sent.
         */
        function dump(  ) {
            global $starttime;
            if ( headers_sent(  ) ) return false;
            hook( 'pre_header_dump', $queue );
            $queue = self::$queue;
            while ( count( $queue ) >= 1 ) {
                header( key( $queue ).': '.current( $queue ) );
                array_shift( $queue );
            }
            // We have sent all of the headers in the queue. Now let's send the X-exectime header.
            header( 'X-exectime: '.strval( microtime( true ) - ( $starttime ) ) );
            hook( 'post_header_dump', self::$queue );
            self::$queue='dumped';
            return true;
        }
        
        /**
         * Adds or edits a header in the format:
         *  name: value
         *
         * @since 0.1b
         * @uses self::$queue
         *
         * @param string $name The name of the HTTP header
         * @param string $value The value of the HTTP header
         * @return bool Return true unless the header you send is named X-exectime
         */
        function header( $name, $value ) {
            if ( $name=='X-exectime' ) return false;
            if ( array_key_exists( $name, self::$queue ) ) {
                // An entry for this header already exists
                hook( 'changed_http_header_for_'.$name, $value );
                self::$queue[ $name ] = $value;
            }
            else {
                // Create an entry for this header
                hook( 'added_http_header_for'.$name, count( self::$queue ) ); // The argument sent to that hook is the position of this Header where 0 is the first header.
                self::$queue[ $name ] = $value;
            }
            return true;
        }
        
        function __isset( $name ) {
            return true;
        }
        function __destruct(  ) {
            if ( self::$queue!='dumped' ) self::dump(  );
        }
    }
}
if ( !isset( $http ) ) $http = new http(  );
?>