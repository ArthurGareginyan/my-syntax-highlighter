<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 * @return string
 */
function spacexchimp_p010_shortcode_processor( $content ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Convert special characters to HTML entities
    if ( $options['convert_special_characters'] === true ) {
        $content = htmlspecialchars( $content );
    }

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Get the shortcode names
    $shortcodes_names = spacexchimp_p010_get_shortcode_names_enabled();

    // Create different shortcodes
    foreach ( $shortcodes_names as $shortcode_name ) {
        add_shortcode( $shortcode_name, 'spacexchimp_p010_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    // Convert special HTML entities back to characters
    if ( $options['convert_special_characters'] === true ) {
        $content = htmlspecialchars_decode( $content );
    }

    // Return the processed data
    return $content;
}
add_filter( 'the_content', 'spacexchimp_p010_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 * @return string
 */
function spacexchimp_p010_shortcode( $atts, $content = null, $lang ) {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Put the value of the plugin options into an array for easier access
    $options = spacexchimp_p010_options();

    // Default language for the [code] shortcode
    if ( $lang == "code" ) {
        $lang = $options['defaultLanguage'];
    }

    // Enqueue CodeMirror library
    wp_enqueue_style( $plugin['prefix'] . '-codemirror-css' );
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-js' );
    wp_enqueue_script( $plugin['prefix'] . '-codemirror-settings-js' );

    // Enqueue CodeMirror addons
    $addons = array( 'autorefresh' );
    foreach ( $addons as $addon ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-addon-' . $addon . '-js' );
    }

    // Enqueue CodeMirror modes
    $modes = spacexchimp_p010_get_codemirror_mode_names();
    foreach ( $modes as $mode ) {
        wp_enqueue_script( $plugin['prefix'] . '-codemirror-mode-' . $mode . '-js' );
    }

    // Enqueue CodeMirror theme
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( $plugin['prefix'] . '-codemirror-theme-css' );
    }

    // Cleaning
    $content = rtrim( $content );

    // Return the processed data
    return '<div class="my-syntax-highlighter"><pre><textarea id="mshighlighter" class="mshighlighter" language="' . $lang . '" name="mshighlighter" >' . $content . '</textarea></pre></div>';
}

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Callback for getting a list of enabled shortcode names
 * @return array of shortcode names
 */
function spacexchimp_p010_get_shortcode_names_enabled() {
    return array(
                  'code',
                  'php',
                  'javascript',
                  'js',
                  'xml',
                  'html',
                  'css',
                  'scss',
                  'less',
                  'sass',
                  'markdown',
                  'perl',
                  'sql',
                  'mysql',
                  'shell'
    );
}
