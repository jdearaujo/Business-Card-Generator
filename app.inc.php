<?php
/**
 * The actual application
 *
 * @package Business-Card-Generator
 */
global $http, $html, $cardnames;
if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
tryReq( 'cards.inc.php' );
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
        public static $version='0.14';
        
        /**
         *  Default Settings
         *  @var array
         */
        public static $defaults=array();
        
        /**
         *  A list of all of the fields for the form
         *  @var array
         */
        public static $fields=array();
        
        function __construct() {
            self::$defaults = array( 'design'=>1, 'name'=>__( 13 ), 'home_phone'=>__( 20 ), 'cell_phone'=>__( 21 ), 'work_phone'=>__( 22 ), 'website'=>__( 23 ), 'company'=>__( 15 ), 'position'=>__( 14 ), 'skype'=>__( 24 ), 'email'=>__( 25 ), 'location'=>__( 26 ) );
            self::$fields = array( array( 'name'=>33, 'id'=>'design' ), array( 'name'=>34, 'id'=>'name' ), array( 'name'=>35, 'id'=>'home_phone' ), array( 'name'=>36, 'id'=>'cell_phone' ), array( 'name'=>37, 'id'=>'work_phone' ), array( 'name'=>38, 'id'=>'website' ), array( 'name'=>39, 'id'=>'company' ), array( 'name'=>40, 'id'=>'position' ), array( 'name'=>41, 'id'=>'skype' ), array( 'name'=>42, 'id'=>'email' ), array( 'name'=>43, 'id'=>'location' ) );
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
            $html->code( '<div class="tabbable"><ul class="nav nav-tabs"><li class="active"><a href="#front" data-toggle="tab">'.__( 27 ).'</a></li><li><a href="#back" data-toggle="tab">'.__( 28 ).'</a></li><li><a href="#" id="refresh"><i class="icon-refresh"></i></a></li></ul><div class="tab-content"><div class="tab-pane fade in active" id="front">' );
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
         * @uses card_*
         * @uses global $http
         * @uses global $cardnames
         *
         * @param array $card The info about the card
         * @param int $side If you set the side to 1, this function will generate the front. If you set it to 2, this function will generate the back.
         * @param int $amout Optional. Number of cards to generate
         * @param bool $print Optional. Only set this to true if you are printing!
         * @return True.
         */
        function card( $card, $side, $amount=1, $print=false ) {
            global $html, $http, $cardnames;
            if ( !is_array( $card ) && !isset( $_GET[ 'import' ] ) ) {
                // We need to generate the default template for a card.
                self::__construct(  );
                self::card( self::$defaults, $side, $amount, $print );
                return true;
            }
            elseif ( !is_array( $card ) && isset( $_GET[ 'import' ] ) ) $c = $_GET;
            else $c = $card;
            $s = intval( $side );
            if ( $print===true ) $end = '<div style="display:inline-block;width:89mm;height:51mm;-moz-border-radius:5px;-o-border-radius:5px;-webkit-border-radius:5px;border-radius:5px">';
            else $end = '';
            if ( $s==1 ) $end.=hook( 'card_'.$c[ 'design' ], $side, $c );
            else $end.=hook( 'card_'.$c[ 'design' ], $side, $c );
            if ( $print===true ) $end.='</div>';
            for ( $c = 0;  $c < $amount;  $c++ ) $html->code( $end );
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
            $html->code( '<a href="'.$http->where( 'print' ).'" data-baseurl="'.$http->where( 'print' ).'" id="print" target="_blank" class="btn btn-success btn-large"><i class="icon-print" style="vertical-align:middle;"></i>&nbsp;'.__( 17 ).'</a>&nbsp;&nbsp;&nbsp;' );
            $html->code( '<a href="'.$http->where( 'import' ).'" target="_blank" class="btn btn-primary btn-large"><i class="icon-upload" style="vertical-align:middle;"></i>&nbsp;'.__( 18 ).'</a>&nbsp;&nbsp;&nbsp;' );
            $html->code( '<a href="'.$http->where( 'export' ).'" data-baseurl="'.$http->where( 'export' ).'" id="export" target="_blank" class="btn btn-primary btn-large"><i class="icon-download" style="vertical-align:middle;"></i>&nbsp;'.__( 19 ).'</a>' );
            $html->code( '</div></div>' );
        }
        
        /**
         * Makes the big box with the config options
         *
         * @since 0.12
         * @uses global $html
         * @uses __
         * @uses global $cardnames
         * @uses global $http
         */
        function big(  ) {
            global $html, $cardnames, $http;
            $html->code( '<div class="span8 big">' );
            $field = self::$fields[ 0 ];
            $form = '<div class="control-group"><label for="'.$field[ 'id' ].'" class="control-label">'.__( $field[ 'name' ] ).'</label><div class="controls"><select id="'.$field[ 'id' ].'" name="'.$field[ 'id' ].'">';
            foreach ( $cardnames as $c ) {
                $form.='<option value="'.array_search( $c, $cardnames ).'"';
                if ( isset( $_GET[ 'design' ] ) ) {
                    if ( $_GET[ 'design' ] == array_search( $c, $cardnames ) ) $form.=' selected="selected"';
                }
                $form.='>'.$c.'</option>';
            }
            $form.='</select></div></div>';
            $textfields = self::$fields;
            array_shift( $textfields );
            foreach ( $textfields as $field ) {
                $form.='<div class="control-group">';
                $form.='<label for="'.$field[ 'id' ].'" class="control-label">'.__( $field[ 'name' ] ).'</label><div class="controls"><input type="text" id="'.$field[ 'id' ].'" name="'.$field[ 'id' ].'" value="';
                if ( isset( $_GET[ $field[ 'id' ] ] ) ) $form.=$_GET[ $field[ 'id' ] ];
                else $form.=self::$defaults[ $field[ 'id' ] ];
                $form.='" /></div></div>';
            }
            $html->code( '<form action="#!" id="info" class="form-horizontal"><fieldset>'.$form.'</fieldset><input type="hidden" id="ajax" value="'.$http->where( 'ajax' ).'" /></form>' );
            $html->code( '</div></div>' );
        }
        
        function __isset( $name ) {
            return true;
        }
        function __destruct() {} // Do nothing
    }
}
?>