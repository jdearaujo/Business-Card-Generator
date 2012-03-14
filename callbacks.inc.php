<?php
/**
 * Handles hooks.
 *
 * @package Business-Card-Generator
 */

if ( !defined( 'ROOT' ) ) define( 'ROOT', dirname( __FILE__ ) );
require_once( ROOT.'/m.inc.php' );
if ( !function_exists( 'hook' ) ) {
    /**
     * Call a hook.
     *
     * @since 0.1
     *
     * @param callback $name
     * @param mixed $arg,... Optional. Arguments which are passed on to the functions hooked to the action.
     * @return void|mixed If it returns void, then the hook wasn't callable. Else, the response form the hook is returned.
     */
    function hook( $name ) {
        $args = func_get_args(  );
        if ( is_callable( $name ) && is_array( $args ) ) {
            array_shift( $args );
            return call_user_func_array( $name, $args );
        }
        return null; // By now, if the hook was callable, it would have been called and returned and this function would be done, but because it isn't, there must have been a problem, so we will return NULL.
    }
}
?>