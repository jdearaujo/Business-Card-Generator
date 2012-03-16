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
         * Creates the preview (for use by launch)
         *
         * @since 0.11b
         * @uses global $html
         */
        function preview(  ) {
            global $html;
            $html->code( '<div class="row-fluid"><div class="span12 preview">' );
            $html->code( '<div class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#front" data-toggle="tab">Front Preview</a></li><li><a href="#back" data-toggle="tab">Back Preview</a></li></ul><div class="tab-content"><div class="tab-pane fade in active" id="front">' );
            // Front
            self::card( false, 1, 1 );
            $html->code( '</div><div class="tab-pane fade" id="back">' );
            // Back
            self::card( false, 2, 1 );
            $html->code( '</div></div></div></div></div>' );
        }
        
        /**
         * Creates one or more card (to be previewed or printed)
         *
         * @since 0.11b
         * @uses global $html
         * @uses __
         *
         * @param array $card The info about the card
         * @param int $side If you set the side to 1, this function will generate the front. If you set it to 2, this function will generate the back.
         * @param int $amout Number of cards to generate
         * @return True.
         */
        function card( $card, $side, $amount=1 ) {
            global $html;
            if ( !is_array( $card ) ) {
                // We need to generate the default template for a card.
                self::card( array( 'design'=>'default', 'name'=>__( 13 ), 'position'=>__( 14 ), 'company'=>__( 15 ) ), $side, $amount );
                /*
                 * TODO: add all of the fields to the above array
                 */
                return true;
            }
            $s = intval( $side );
            $name = $card[ 'name' ];
            $pos = $card[ 'position' ];
            $co = $card[ 'company' ]; /* TODO: add all of the fields in the format of these three fields. */
            switch ( $card[ 'design' ] ) {
            case 'default':
                if ( $s == 1 ) {
                    $end = '<p>Name: '.$name.'</p>';
                    $end.='<p>Position: '.$pos.'</p>';
                    $end.='<p>Company: '.$co.'</p>';
                }
                else {
                    $end = 'This is the back.';
                }
            }
            for ( $card = 0;  $card < $amount;  $card++ ) $html->code( $end );
            return true;
        }
        
        function __isset( $name ) {return true;} function __destruct() {}
    }
}
?>