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
        
        /**
         *  Default Settings
         *  @var array
         */
        public static $defaults=array();
        
        function __construct() {
            self::$defaults = array( 'design'=>'default', 'name'=>__( 13 ), 'home_phone'=>__( 20 ), 'cell_phone'=>__( 21 ), 'work_phone'=>__( 22 ), 'website'=>__( 23 ), 'company'=>__( 15 ), 'position'=>__( 14 ), 'skype'=>__( 24 ), 'email'=>__( 25 ), 'location'=>__( 26 ) );
        }
        
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
            self::preview( 2 );
            self::actions(  );
            self::big(  );
        }
        
        /**
         * Creates the preview (for use by launch)
         *
         * @since 0.11b
         * @uses global $html
         *
         * @param array $card Optional. If you provide this, then the preview will make a preview based on the array you provide.
         */
        function preview( $card=false ) {
            global $html;
            $html->code( '<div class="row-fluid"><div class="span4 preview">' );
            $html->code( '<div class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#front" data-toggle="tab">Front Preview</a></li><li><a href="#back" data-toggle="tab">Back Preview</a></li></ul><div class="tab-content"><div class="tab-pane fade in active" id="front">' );
            // Front
            self::card( $card, 1, 1 );
            $html->code( '</div><div class="tab-pane fade" id="back">' );
            // Back
            self::card( $card, 2, 1 );
            $html->code( '</div></div></div>' );
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
         * @param int $amout Optional. Number of cards to generate
         * @param bool $print Optional. Only set this to true if you are printing!
         * @return True.
         */
        function card( $card, $side, $amount=1, $print=false ) {
            global $html;
            if ( !is_array( $card ) || !isset( $card[ 'name' ] ) ) {
                // We need to generate the default template for a card.
                self::__construct(  );
                self::card( self::$defaults, $side, $amount, $print );
                return true;
            }
            $s = intval( $side );
            $name = $card[ 'name' ];
            $home_phone = $card[ 'home_phone' ];
            $cell_phone = $card[ 'cell_phone' ];
            $work_phone = $card[ 'work_phone' ];
            $website = $card[ 'website' ];
            $company = $card[ 'company' ];
            $position = $card[ 'position' ];
            $skype = $card[ 'skype' ];
            $email = $card[ 'email' ];
            $location = $card[ 'location' ];
            if ( $print===true ) $end = '<div style="display:inline-block;width:89mm;height:51mm;-moz-border-radius:5px;-o-border-radius:5px;-webkit-border-radius:5px;border-radius:5px">';
            else $end = '';
            switch ( $card[ 'design' ] ) {
            case 'default':
                if ( $s == 1 ) {
                    $end.='<p>Name: '.$name.'</p>';
                    $end.='<p>Position: '.$position.'</p>';
                    $end.='<p>Company: '.$company.'</p>';
                }
                else {
                    $end.='<p>This is the back.</p>';
                }
            }
            if ( $print===true ) $end.='</div>';
            for ( $card = 0;  $card < $amount;  $card++ ) $html->code( $end );
            return true;
        }
        
        /**
         * Actions (import, export, print)
         *
         * @since 0.12
         * @uses global $html
         * @uses global $http
         * @uses __
         */
        function actions(  ) {
            global $http, $html;
            $html->code( '<div class="well" id="actions"><h3>'.__( 16 ).'</h3>' );
            $html->code( '<a href="'.$http->where( 'print' ).'" data-baseurl="'.$http->where( 'print' ).'" id="print" target="_blank" class="btn btn-success btn-large">'.__( 17 ).'</a>&nbsp;&nbsp;&nbsp;' );
            $html->code( '<a href="'.$http->where( 'import' ).'" data-baseurl="'.$http->where( 'import' ).'" id="import" target="_blank" class="btn btn-primary btn-large">'.__( 18 ).'</a>&nbsp;&nbsp;&nbsp;' );
            $html->code( '<a href="'.$http->where( 'export' ).'" data-baseurl="'.$http->where( 'export' ).'" id="export" target="_blank" class="btn btn-primary btn-large">'.__( 19 ).'</a>' );
            $html->code( '</div></div>' );
        }
        
        /**
         * Makes the big box with the config options
         *
         * @since 0.12
         * @uses global $html
         * @uses __
         */
        function big(  ) {
            global $html;
            $html->code( '<div class="span8 big"><div class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#infotab" data-toggle="tab">'.__( 27 ).'</a></li><li><a href="#design" data-toggle="tab">'.__( 28 ).'</a></li><li><a href="#fonts" data-toggle="tab">'.__( 29 ).'</a></li><li><a href="#colors" data-toggle="tab">'.__( 30 ).'</a></li></ul><div class="tab-content"><div class="tab-pane fade in active" id="infotab">' );
            // Info form
            $html->code( '<form action="#!" id="info"></form>' );
            $html->code( '</div><div class="tab-pane fade" id="design">' );
            // Design
            $html->code( '</div><div class="tab-pane fade" id="fonts">' );
            // Fonts
            $html->code( '</div><div class="tab-pane fade" id="colors">' );
            // Colors
            $html->code( '</div></div></div></div></div>' );
        }
        
        function __isset( $name ) {
            return true;
        }
        function __destruct() {} // Do nothing
    }
}
?>