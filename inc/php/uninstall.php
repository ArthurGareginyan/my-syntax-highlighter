<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function mshighlighter_uninstall() {
    delete_option( 'mshighlighter_settings' );
}
register_uninstall_hook( __FILE__, 'mshighlighter_uninstall' );
