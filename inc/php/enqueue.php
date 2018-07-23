<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback to register the CodeMirror library
 */
function spacexchimp_p010_load_scripts_codemirror( $options, $prefix, $url, $version ) {

    // Register main files of the CodeMirror library
    wp_register_style( $prefix . '-codemirror-css', $url . 'inc/lib/codemirror/lib/codemirror.css', array(), $version, 'all' );
    wp_register_script( $prefix . '-codemirror-js', $url . 'inc/lib/codemirror/lib/codemirror.js', array(), $version, false );

    // Register settings file
    wp_register_script( $prefix . '-codemirror-settings-js', $url . 'inc/js/codemirror-settings.js', array(), $version, true );

    // Register addons
    $addons = array(
                    'display' => array( 'autorefresh' )
                   );
    foreach ( $addons as $addons_group_name => $addons_group ) {
        foreach ( $addons_group as $addon ) {
            wp_register_script( $prefix . '-codemirror-addon-' . $addon . '-js', $url . 'inc/lib/codemirror/addon/' . $addons_group_name . '/' . $addon . '.js', array(), $version, false );
        }
    }

    // Register modes
    $modes = spacexchimp_p010_get_codemirror_mode_names();
    foreach ( $modes as $mode ) {
        wp_register_script( $prefix . '-codemirror-mode-' . $mode . '-js', $url . 'inc/lib/codemirror/mode/' . $mode . '/' . $mode . '.js', array(), $version, true );
    }

    // Register theme
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    if ( $theme != "default" ) {
        wp_register_style( $prefix . '-codemirror-theme-css', $url . 'inc/lib/codemirror/theme/' . $theme . '.css', array(), $version, 'all' );
    }

}

/**
 * Callback for the dynamic JavaScript
 */
function spacexchimp_p010_load_scripts_dynamic_js( $options, $prefix ) {

    // Get settings and put them in variables
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    $first_line_number = !empty( $options['first_line_number'] ) ? $options['first_line_number'] : '0';
    $tab_size = !empty( $options['tab_size'] ) ? $options['tab_size'] : '4';
    $dollar_sign = ( !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) ? 'true' : 'false';
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) || !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) {
        $line_numbers = "true";
    } else {
        $line_numbers = "false";
    }

    // Create an array (JS object) with all the settings
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           'dollar_sign' => $dollar_sign
                           );

    // Inject the array into the JavaScript file
    wp_localize_script( $prefix . '-codemirror-settings-js', $prefix . '_scriptParams', $script_params );
}

/**
 * Callback for the dynamic CSS
 */
function spacexchimp_p010_load_scripts_dynamic_css( $options, $prefix ) {

    // Get settings and put them in variables
    if ( !empty( $options['automatic_height'] ) && ( $options['automatic_height'] == "on" ) ) {
        $block_height = "100%";
    } elseif ( !empty( $options['block_height'] ) ) {
        $block_height = $options['block_height'] . "px";
    } else {
        $block_height = "300px";
    }

    // Create an array with all the settings (CSS code)
    $custom_css = "
                    .CodeMirror {
                        height: " . $block_height . " !important;
                    }
                  ";

    // Inject the array into the stylesheet
    wp_add_inline_style( $prefix . '-frontend-css', $custom_css );
    wp_add_inline_style( $prefix . '-admin-css', $custom_css );
}

/**
 * Load scripts and style sheet for settings page
 */
function spacexchimp_p010_load_scripts_admin( $hook ) {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P010_SLUG;
    $prefix = SPACEXCHIMP_P010_PREFIX;
    $url = SPACEXCHIMP_P010_URL;
    $settings = SPACEXCHIMP_P010_SETTINGS;
    $version = SPACEXCHIMP_P010_VERSION;

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $slug;
    if ( $settings_page != $hook ) return;

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Bootstrap library
    wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css', array(), $version, 'all' );
    wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css', array(), $version, 'all' );
    wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js', array(), $version, false );

    // Font Awesome library
    wp_enqueue_style( $prefix . '-font-awesome-css', $url . 'inc/lib/font-awesome/css/font-awesome.css', array(), $version, 'screen' );

    // Other libraries
    wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js', array(), $version, false );

    // Style sheet
    wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css', array(), $version, 'all' );

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array(), $version, true );

    // Call the function that enqueue the CodeMirror library
    spacexchimp_p010_load_scripts_codemirror( $options, $prefix, $url, $version );

    // CodeMirror library
    wp_enqueue_script( $prefix . '-codemirror-js' );
    wp_enqueue_script( $prefix . '-codemirror-settings-js' );
    wp_enqueue_style( $prefix . '-codemirror-css' );

    // CodeMirror modes (only those that are used in the preview section)
    $modes = array( 'xml' );
    foreach ( $modes as $mode ) {
        wp_enqueue_script( $prefix . '-codemirror-mode-' . $mode . '-js' );
    }

    // CodeMirror addons (only those that are used in the preview section)
    $addons = array( 'autorefresh' );
    foreach ( $addons as $addon ) {
        wp_enqueue_script( $prefix . '-codemirror-addon-' . $addon . '-js' );
    }

    // CodeMirror theme
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    if ( $theme != "default" ) {
        wp_enqueue_style( $prefix . '-codemirror-theme-css' );
    }

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p010_load_scripts_dynamic_js( $options, $prefix );

    // Call the function that contains the dynamic CSS
    spacexchimp_p010_load_scripts_dynamic_css( $options, $prefix );

}
add_action( 'admin_enqueue_scripts', 'spacexchimp_p010_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 */
function spacexchimp_p010_load_scripts_frontend() {

    // Put value of constants to variables for easier access
    $prefix = SPACEXCHIMP_P010_PREFIX;
    $url = SPACEXCHIMP_P010_URL;
    $settings = SPACEXCHIMP_P010_SETTINGS;
    $version = SPACEXCHIMP_P010_VERSION;

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // If the "Enable Plugin" option is on
    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {

        // Load jQuery library
        wp_enqueue_script( 'jquery' );

        // Style sheet
        wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css', array(), $version, 'all' );

        // Call the function that enqueue the CodeMirror library
        spacexchimp_p010_load_scripts_codemirror( $options, $prefix, $url, $version );

        // Call the function that contains the dynamic JavaScript
        spacexchimp_p010_load_scripts_dynamic_js( $options, $prefix );

        // Call the function that contains the dynamic CSS
        spacexchimp_p010_load_scripts_dynamic_css( $options, $prefix );
    }

}
add_action( 'wp_enqueue_scripts', 'spacexchimp_p010_load_scripts_frontend' );
