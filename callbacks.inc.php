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
     * Call a hook
     *
     * @since 0.1
     *
     * @param callback $name
     * @param mixed $arg,... Optional. Arguments which are passed on to the functions hooked to the action.
     * @return bool False means that the hook wasn't callable. True means that the hook could be called and was called.
     */
    function hook( $name ) {
        $args = func_get_args(  );
        if ( is_callable( $name ) && is_array( $args ) ) {
            array_shift( $args );
            call_user_func_array( $name, $args );
        }
        else return false; // Hook not callable, so return FALSE.
        return true; // We can call the hook, and we already have by the time we get here, so we should return TRUE.
    }
}
?>