<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Base for the _load_scripts hook
 *
 * @since 2.0
 */
function mshighlighter_load_scripts_base($options) {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // CodeMirror
    wp_enqueue_script( 'mshighlighter-codemirror-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( 'mshighlighter-codemirror-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.css' );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( 'mshighlighter-codemirror-theme-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }
    wp_enqueue_script( 'mshighlighter-codemirror-settings-js', MSHIGHLIGHTER_URL . 'inc/js/codemirror-settings.js', array(), false, true );

    // CodeMirror Modes
    wp_enqueue_script( 'mshighlighter-codemirror-mode-clike-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/clike.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-css-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/css.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-htmlmixed-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/htmlmixed.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-javascript-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/javascript.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-markdown-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/markdown.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-perl-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/perl.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-php-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/php.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-sass-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sass.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-shell-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/shell.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-sql-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sql.js', array(), false, true );
    wp_enqueue_script( 'mshighlighter-codemirror-mode-xml-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/xml.js', array(), false, true );

    // Create js object and injected it into the js file
    if ( !empty( $options['theme'] ) ) { $theme = $options['theme']; } else { $theme = "default"; }
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) ) { $line_numbers = "true"; } else { $line_numbers = "false"; }
    if ( !empty( $options['first_line_number'] ) ) { $first_line_number = $options['first_line_number']; } else { $first_line_number = "0"; }
    if ( !empty( $options['tab_size'] ) ) { $tab_size = $options['tab_size']; } else { $tab_size = "4"; }
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           );
    wp_localize_script( 'mshighlighter-codemirror-settings-js', 'scriptParams', $script_params );
}

/**
 * Dymamic CSS for the _load_scripts hook
 *
 * @since 2.0
 */
function mshighlighter_load_scripts_dynamic_css($options) {

    if ( !empty( $options['automatic_height'] ) && ( $options['automatic_height'] == "on" ) ) {
        $block_height = "100%";
    } elseif ( !empty( $options['block_height'] ) ) {
        $block_height = $options['block_height'] . "px";
    } else {
        $block_height = "300px";
    }

    $custom_css = ".CodeMirror { height: " . $block_height . " !important; }";

    // Inject dynamic CSS
    wp_add_inline_style( 'mshighlighter-frontend-css', $custom_css );
    wp_add_inline_style( 'mshighlighter-admin-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.0
 */
function mshighlighter_load_scripts_admin($hook) {

    // If the current page is a settings page of this plugin
    if ( 'settings_page_my-syntax-highlighter' == $hook ) {
        
        // Read options from BD
        $options = get_option( 'mshighlighter_settings' );
        
        // Load style sheet
        wp_enqueue_style( 'mshighlighter-admin-css', MSHIGHLIGHTER_URL . 'inc/css/admin.css' );

        // Call the function with dymamic CSS
        mshighlighter_load_scripts_dynamic_css($options);

        // Load JS functions
        wp_enqueue_script( 'mshighlighter-admin-js', MSHIGHLIGHTER_URL . 'inc/js/admin.js', array(), false, true );

        // Bootstrap library
        wp_enqueue_style( 'mshighlighter-bootstrap-css', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap.css' );
        wp_enqueue_style( 'mshighlighter-bootstrap-theme-css', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
        wp_enqueue_script( 'mshighlighter-bootstrap-js', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap.js' );

        // Other libraries
        wp_enqueue_script( 'mshighlighter-bootstrap-checkbox-js', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap-checkbox.js' );

        // Call the function with a basis of scripts
        mshighlighter_load_scripts_base($options);
    }

}
add_action( 'admin_enqueue_scripts', 'mshighlighter_load_scripts_admin' );

/**
 * Load scripts and style sheet on front end of website
 *
 * @since 2.0
 */
function mshighlighter_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( 'mshighlighter_settings' );

    // If the "Enable Plugin" option is on
    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {

        // Load style sheet
        wp_enqueue_style( 'mshighlighter-frontend-css', MSHIGHLIGHTER_URL . 'inc/css/frontend.css' );

        // Call the function with dymamic CSS
        mshighlighter_load_scripts_dynamic_css($options);

        // Call the function with a basis of scripts
        mshighlighter_load_scripts_base($options);
    }
}
add_action( 'wp_enqueue_scripts', 'mshighlighter_load_scripts_frontend' );
