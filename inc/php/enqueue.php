<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback to register the CodeMirror library
 */
function spacexchimp_p010_load_scripts_codemirror() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Register main files of the CodeMirror library
    wp_register_style( $plugin['prefix'] . '-codemirror-css', $plugin['url'] . 'inc/lib/codemirror/lib/codemirror.css', array(), $plugin['version'], 'all' );
    wp_register_script( $plugin['prefix'] . '-codemirror-js', $plugin['url'] . 'inc/lib/codemirror/lib/codemirror.js', array(), $plugin['version'], false );

    // Register settings file
    wp_register_script( $plugin['prefix'] . '-codemirror-settings-js', $plugin['url'] . 'inc/js/codemirror-settings.js', array(), $plugin['version'], true );

    // Register addons
    $addons = array(
                    'display' => array( 'autorefresh' )
                   );
    foreach ( $addons as $addons_group_name => $addons_group ) {
        foreach ( $addons_group as $addon ) {
            wp_register_script( $plugin['prefix'] . '-codemirror-addon-' . $addon . '-js', $plugin['url'] . 'inc/lib/codemirror/addon/' . $addons_group_name . '/' . $addon . '.js', array(), $plugin['version'], false );
        }
    }

    // Register modes
    $modes = spacexchimp_p010_get_codemirror_mode_names();
    foreach ( $modes as $mode ) {
        wp_register_script( $plugin['prefix'] . '-codemirror-mode-' . $mode . '-js', $plugin['url'] . 'inc/lib/codemirror/mode/' . $mode . '/' . $mode . '.js', array(), $plugin['version'], true );
    }

    // Register theme
    if ( $options['theme'] != 'default' ) {
        wp_register_style( $plugin['prefix'] . '-codemirror-theme-css', $plugin['url'] . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css', array(), $plugin['version'], 'all' );
    }

}

/**
 * Callback for the dynamic JavaScript
 */
function spacexchimp_p010_load_scripts_dynamic_js() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Create an array (JS object) with all the settings
    $script_params = array(
                           'theme' => $options['theme'],
                           'line_numbers' => $options['line_numbers'],
                           'first_line_number' => $options['first_line_number'],
                           'dollar_sign' => $options['dollar_sign'],
                           'tab_size' => $options['tab_size']
                           );

    // Inject the array into the JavaScript file
    wp_localize_script( $plugin['prefix'] . '-codemirror-settings-js', $plugin['prefix'] . '_scriptParams', $script_params );
}

/**
 * Callback for the dynamic CSS
 */
function spacexchimp_p010_load_scripts_dynamic_css() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Create an array with all the settings (CSS code)
    if ( $options['automatic_height'] === true ) {
        $custom_css = "
                        .CodeMirror,
                        .CodeMirror-scroll,
                        .CodeMirror-gutters {
                            height: auto !important;
                        }
                      ";
    } else {
        $custom_css = "
                        .CodeMirror {
                            height: " . $options['block_height'] . "px !important;
                        }
                      ";
    }

    // Inject the array into the stylesheet
    wp_add_inline_style( $plugin['prefix'] . '-frontend-css', $custom_css );
    wp_add_inline_style( $plugin['prefix'] . '-admin-css', $custom_css );
}

/**
 * Load scripts and style sheet for settings page
 */
function spacexchimp_p010_load_scripts_admin( $hook ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $plugin['slug'];
    if ( $settings_page != $hook ) {
        return;
    }

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Bootstrap library
    wp_enqueue_style( $plugin['prefix'] . '-bootstrap-css', $plugin['url'] . 'inc/lib/bootstrap/bootstrap.css', array(), $plugin['version'], 'all' );
    wp_enqueue_style( $plugin['prefix'] . '-bootstrap-theme-css', $plugin['url'] . 'inc/lib/bootstrap/bootstrap-theme.css', array(), $plugin['version'], 'all' );
    wp_enqueue_script( $plugin['prefix'] . '-bootstrap-js', $plugin['url'] . 'inc/lib/bootstrap/bootstrap.js', array(), $plugin['version'], false );

    // Font Awesome library
    wp_enqueue_style( $plugin['prefix'] . '-font-awesome-css', $plugin['url'] . 'inc/lib/font-awesome/css/font-awesome.css', array(), $plugin['version'], 'screen' );

    // Other libraries
    wp_enqueue_script( $plugin['prefix'] . '-bootstrap-checkbox-js', $plugin['url'] . 'inc/lib/bootstrap-checkbox.js', array(), $plugin['version'], false );

    // Style sheet
    wp_enqueue_style( $plugin['prefix'] . '-admin-css', $plugin['url'] . 'inc/css/admin.css', array(), $plugin['version'], 'all' );

    // JavaScript
    wp_enqueue_script( $plugin['prefix'] . '-admin-js', $plugin['url'] . 'inc/js/admin.js', array(), $plugin['version'], true );

    // Call the function that enqueue the CodeMirror library
    spacexchimp_p010_load_scripts_codemirror();

    // CodeMirror library
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-js' );
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-settings-js' );
    wp_enqueue_style( $plugin['prefix'] . '-codemirror-css' );

    // CodeMirror addons (only those that are used in the preview section)
    $addons = array( 'autorefresh' );
    foreach ( $addons as $addon ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-addon-' . $addon . '-js' );
    }

    // CodeMirror modes (only those that are used in the preview section)
    $modes = array( 'xml' );
    foreach ( $modes as $mode ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-mode-' . $mode . '-js' );
    }

    // CodeMirror theme
    if ( $options['theme'] != 'default' ) {
        wp_enqueue_style( $plugin['prefix'] . '-codemirror-theme-css' );
    }

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p010_load_scripts_dynamic_js();

    // Call the function that contains the dynamic CSS
    spacexchimp_p010_load_scripts_dynamic_css();
}
add_action( 'admin_enqueue_scripts', $plugin['prefix'] . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 */
function spacexchimp_p010_load_scripts_frontend() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( $plugin['prefix'] . '-frontend-css', $plugin['url'] . 'inc/css/frontend.css', array(), $plugin['version'], 'all' );

    // Call the function that enqueue the CodeMirror library
    spacexchimp_p010_load_scripts_codemirror();

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p010_load_scripts_dynamic_js();

    // Call the function that contains the dynamic CSS
    spacexchimp_p010_load_scripts_dynamic_css();
}
add_action( 'wp_enqueue_scripts', $plugin['prefix'] . '_load_scripts_frontend' );
