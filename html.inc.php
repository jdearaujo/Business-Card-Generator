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
         * Dumps the buffer in a smart way.
         *
         * @since 0.1b
         * @uses self::$buffer
         * @uses global $http
         * @uses BUFFER_SIZE
         *
         * @param $return If true, it will return the buffer. If false, it will echo the buffer.
         * @return bool|string True if $return is false, self::$buffer (string) if $return is true. If the buffer is empty, false is returned.
         */
        function dump( $return=false ) {
            if ( empty( self::$buffer ) ) return false;
            global $http;
            $http->__destruct(  ); // Sends the HTTP headers (if they aren't already sent)
            hook( 'pre_html_dump' );
            $fullbuffer = self::$buffer;
            self::$buffer = '';
            if ( $return===true ) return $fullbuffer;
            // If we get to this point, we are going to echo the content. We'll loop through the buffer and send it out in a bunch of mini-buffers (and flush between mini-buffers)
            while ( strlen( $fullbuffer ) >= 1 ) {
                if ( BUFFER_SIZE >= strlen( $fullbuffer ) ) {
                    // The buffer is so small we will just echo the all of the remaining buffer.
                    echo $fullbuffer;
                    $fullbuffer = ''; // The buffer is now empty.
                }
                else {
                    // The buffer is still higher than the buffer size, so we'll only echo a portion of the buffer.
                    echo substr( $fullbuffer, 0, BUFFER_SIZE );
                    $fullbuffer = substr( $fullbuffer, BUFFER_SIZE );
                }
                flush(  ); // Flush it, or else the above is obsolete!
            }
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
        
        /**
         * Adds a hero-unit (from BootStrap) to the buffer.
         *
         * @since 0.11
         * @uses self::$buffer
         * @uses self::code()
         *
         * @param int $title The ID of the title (ID is used with the __ function)
         * @param int $arg,... Optional. Each ID will be used as a paragraph of content (ID is used with the __ function)
         * @return bool True.
         */
        function hero( $title ) {
            $args = func_get_args(  );
            array_shift( $args ); // ignores the $title.
            $hero_text = '';
            foreach ( $args as $paragraph ) {
                $hero_text.='<p>'.__( $paragraph ).'</p>';
            }
            self::code( '<div class="hero-unit"><h1>'.__( $title ).'</h1>'.$hero_text.'</div>' );
            return true;
        }
        
        /**
         * Creates a row of that will be split up into columns
         *
         * @since 0.11
         * @uses self::code()
         *
         * @param array $col,... Optional. Each column should be an array. Each array has a specific format, detailed in the function.
         * @return bool True.
         */
        function row(  ) {
            $cols = func_get_args(  );
            $code = '';
            self::code( '<div class="row">' );
            foreach ( $cols as $col ) {
                // The column's width is specified on a scale from 1-12, 12 being the widest, is stored with the key 'width'
                $code.='<div class="span'.$col[ 'width' ].'">';
                // The column's name is stored in its 'title' key.
                $code.='<h2>'.__( $col[ 'title' ] ).'</h2>';
                // Content that should be wrapped in <p> tags should be put in an array in the key 'p' - and remember to store this content in the __ function (located in talk.inc.php)
                if ( is_array( $col[ 'p' ] ) ) {
                    foreach ( $col[ 'p' ] as $p ) $code.='<p>'.__( $p ).'</p>';
                }
                // Content that you shouldn't be wrapped in <p> tags (like the application) should be put in the 'vanilla' key. This is NOT put through the __ function, so you have to explicitly use the __ function when applicable.
                if ( isset( $col[ 'vanilla' ] ) ) $code.=$col[ 'vanilla' ];
                self::code( $code.'</div>' );
            }
            self::code( '</div>' );
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