<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 */
function spacexchimp_p010_load_scripts_base( $options ) {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P010_SLUG;
    $prefix = SPACEXCHIMP_P010_PREFIX;
    $url = SPACEXCHIMP_P010_URL;

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // CodeMirror library
    wp_enqueue_script( $prefix . '-codemirror-js', $url . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( $prefix . '-codemirror-css', $url . 'inc/lib/codemirror/codemirror.css' );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( $prefix . '-codemirror-theme-css', $url . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }
    wp_enqueue_script( $prefix . '-codemirror-settings-js', $url . 'inc/js/codemirror-settings.js', array(), false, true );

    // CodeMirror Modes
    wp_enqueue_script( $prefix . '-codemirror-mode-clike-js', $url . 'inc/lib/codemirror/mode/clike.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-css-js', $url . 'inc/lib/codemirror/mode/css.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-htmlmixed-js', $url . 'inc/lib/codemirror/mode/htmlmixed.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-javascript-js', $url . 'inc/lib/codemirror/mode/javascript.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-markdown-js', $url . 'inc/lib/codemirror/mode/markdown.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-perl-js', $url . 'inc/lib/codemirror/mode/perl.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-php-js', $url . 'inc/lib/codemirror/mode/php.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-sass-js', $url . 'inc/lib/codemirror/mode/sass.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-shell-js', $url . 'inc/lib/codemirror/mode/shell.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-sql-js', $url . 'inc/lib/codemirror/mode/sql.js', array(), false, true );
    wp_enqueue_script( $prefix . '-codemirror-mode-xml-js', $url . 'inc/lib/codemirror/mode/xml.js', array(), false, true );

    // Dynamic JS. Create JS object and injected it into the JS file
    $theme = !empty( $options['theme'] ) ? $options['theme'] : 'default';
    $first_line_number = !empty( $options['first_line_number'] ) ? $options['first_line_number'] : '0';
    $tab_size = !empty( $options['tab_size'] ) ? $options['tab_size'] : '4';
    $dollar_sign = ( !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) ? 'true' : 'false';
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) || !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) {
        $line_numbers = "true";
    } else {
        $line_numbers = "false";
    }
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           'dollar_sign' => $dollar_sign
                           );
    wp_localize_script( $prefix . '-codemirror-settings-js', $prefix . '_scriptParams', $script_params );

    // Dynamic CSS. Create CSS and injected it into the stylesheet
    if ( !empty( $options['automatic_height'] ) && ( $options['automatic_height'] == "on" ) ) {
        $block_height = "100%";
    } elseif ( !empty( $options['block_height'] ) ) {
        $block_height = $options['block_height'] . "px";
    } else {
        $block_height = "300px";
    }
    $custom_css = "
                    .CodeMirror {
                        height: " . $block_height . " !important;
                    }
                  ";
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

    // Return if the page is not a settings page of this plugin
    $settings_page = 'space-x-chimp_page_spacexchimp/' . $slug;
    if ( $settings_page != $hook ) return;

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // Bootstrap library
    wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js' );

    // Font Awesome library
    wp_enqueue_style( $prefix . '-font-awesome-css', $url . 'inc/lib/font-awesome/css/font-awesome.css', 'screen' );

    // Other libraries
    wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js' );

    // Style sheet
    wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array(), false, true );

    // Call the function that contain a basis of scripts
    spacexchimp_p010_load_scripts_base( $options );

}
add_action( 'admin_enqueue_scripts', 'spacexchimp_p010_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 */
function spacexchimp_p010_load_scripts_frontend() {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P010_SLUG;
    $prefix = SPACEXCHIMP_P010_PREFIX;
    $url = SPACEXCHIMP_P010_URL;
    $settings = SPACEXCHIMP_P010_SETTINGS;

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // If the "Enable Plugin" option is on
    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {

        // Style sheet
        wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css' );

        // Call the function that contain a basis of scripts
        spacexchimp_p010_load_scripts_base( $options );
    }

}
add_action( 'wp_enqueue_scripts', 'spacexchimp_p010_load_scripts_frontend' );
