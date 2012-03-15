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
     * Manages the HTTP Headers, URLs, and relative paths.
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
         * Retrieves a URL or path
         *
         * @since 0.1b
         * @uses ROOT
         * @uses HOME_URL
         *
         * @param string $name the name of the resource/URL/path
         * @param bool $internal If true, this is an internal path. If false, it's a URL.
         * @return string|bool the URL or path to whatever you want (unless it can't be found, in which case it will return false)
         */
        function where( $name, $internal=false ) {
            $end = false;
            switch ( $name ) {
            case 'home':
                $end='';
                break;
            case 'bootstrap-css':
                $end='css/bootstrap.min.css';
                break;
            case 'bootstrap-responsive-css':
                $end='css/bootstrap-responsive.min.css';
                break;
            case 'my-css':
                $end='css/style.css';
                break;
            case 'html5respond':
                $end='js/libs/html5-3.4-respond-1.1.0.min.js';
                break;
            case 'jquery':
                $end='js/libs/jquery-1.7.1.min.js';
                break;
            case 'bootstrap-transition':
                $end='js/libs/bootstrap/transition.js';
                break;
            case 'bootstrap-collapse':
                $end='js/libs/bootstrap/collapse.js';
                break;
            case 'my-js':
                $end='js/script.js';
                break;
            case '':
                $end='';
                break;
            case '':
                $end='';
                break;
            }
            if ( $end===false ) return false;
            if ( $internal===true ) return ROOT.'/'.$end;
            else return 'http'.( ( defined( 'HAS_HTTPS' )?HAS_HTTPS:false )?'s':'' ).'://'.HOME_URL.'/'.$end;
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
            if ( !is_array( self::$queue ) ) return false;
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