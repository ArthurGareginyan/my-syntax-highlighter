<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 *
 * @since 2.3
 */
function mshighlighter_load_scripts_base( $options ) {

    // Load JQuery library
    wp_enqueue_script( 'jquery' );

    // CodeMirror
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-codemirror-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.css' );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-codemirror-theme-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-settings-js', MSHIGHLIGHTER_URL . 'inc/js/codemirror-settings.js', array(), false, true );

    // CodeMirror Modes
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-clike-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/clike.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-css-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/css.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-htmlmixed-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/htmlmixed.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-javascript-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/javascript.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-markdown-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/markdown.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-perl-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/perl.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-php-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/php.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-sass-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sass.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-shell-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/shell.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-sql-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sql.js', array(), false, true );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-codemirror-mode-xml-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/xml.js', array(), false, true );

    // Dynamic JS. Create JS object and injected it into the JS file
    if ( !empty( $options['theme'] ) ) { $theme = $options['theme']; } else { $theme = "default"; }
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) || !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) { $line_numbers = "true"; } else { $line_numbers = "false"; }
    if ( !empty( $options['first_line_number'] ) ) { $first_line_number = $options['first_line_number']; } else { $first_line_number = "0"; }
    if ( !empty( $options['dollar_sign'] ) && ( $options['dollar_sign'] == "on" ) ) { $dollar_sign = "true"; } else { $dollar_sign = "false"; }
    if ( !empty( $options['tab_size'] ) ) { $tab_size = $options['tab_size']; } else { $tab_size = "4"; }
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'dollar_sign' => $dollar_sign,
                           'tab_size' => $tab_size,
                           );
    wp_localize_script( MSHIGHLIGHTER_PREFIX . '-codemirror-settings-js', MSHIGHLIGHTER_PREFIX . '_scriptParams', $script_params );

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
    wp_add_inline_style( MSHIGHLIGHTER_PREFIX . '-frontend-css', $custom_css );
    wp_add_inline_style( MSHIGHLIGHTER_PREFIX . '-admin-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 2.1
 */
function mshighlighter_load_scripts_admin( $hook ) {

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . MSHIGHLIGHTER_SLUG;
    if ( $settings_page != $hook ) {
        return;
    }

    // Read options from BD
    $options = get_option( MSHIGHLIGHTER_SETTINGS . '_settings' );

    // Style sheet
    wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-admin-css', MSHIGHLIGHTER_URL . 'inc/css/admin.css' );

    // JavaScript
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-admin-js', MSHIGHLIGHTER_URL . 'inc/js/admin.js', array(), false, true );

    // Bootstrap library
    wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-bootstrap-css', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap.css' );
    wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-bootstrap-theme-css', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap-theme.css' );
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-bootstrap-js', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap/bootstrap.js' );

    // Other libraries
    wp_enqueue_script( MSHIGHLIGHTER_PREFIX . '-bootstrap-checkbox-js', MSHIGHLIGHTER_URL . 'inc/lib/bootstrap-checkbox.js' );

    // Call the function that contain a basis of scripts
    mshighlighter_load_scripts_base( $options );

}
add_action( 'admin_enqueue_scripts', MSHIGHLIGHTER_PREFIX . '_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 *
 * @since 2.1
 */
function mshighlighter_load_scripts_frontend() {

    // Read options from BD
    $options = get_option( MSHIGHLIGHTER_SETTINGS . '_settings' );

    // If the "Enable Plugin" option is on
    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {

        // Style sheet
        wp_enqueue_style( MSHIGHLIGHTER_PREFIX . '-frontend-css', MSHIGHLIGHTER_URL . 'inc/css/frontend.css' );

        // Call the function that contain a basis of scripts
        mshighlighter_load_scripts_base( $options );
    }

}
add_action( 'wp_enqueue_scripts', MSHIGHLIGHTER_PREFIX . '_load_scripts_frontend' );
