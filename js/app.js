/**
 * This is for the app.
 *
 * @package Business-Card-Generator
 */
$(function(){
    $( '#print' ).click(function(){
        $( this ).attr( 'href', ( $( '#print' ).attr( 'data-baseurl' ) )+'?'+( $( 'form#info' ).serialize(  ) ) );
        return true;
    })
})