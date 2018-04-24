<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 */
function spacexchimp_p010_shortcode_processor( $content ) {

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Define the different languages for shortcodes
    $language = array("code", "php", "javascript", "js", "xml", "html", "css", "scss", "less", "sass", "markdown", "perl", "sql", "mysql", "shell", "bash");

    // Create different shortcodes
    foreach( $language as $lang ){
        add_shortcode( $lang, 'spacexchimp_p010_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    return $content;
}
add_filter( 'the_content', 'spacexchimp_p010_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 */
function spacexchimp_p010_shortcode( $atts, $content = null, $lang ) {

    // Read options from database and declare variables
    $options = get_option( SPACEXCHIMP_P010_SETTINGS . '_settings' );

    // Default language for the [code] shortcode
    $defaultLanguage = !empty( $options['defaultLanguage'] ) ? $options['defaultLanguage'] : '';
    if ( $lang == "code" ) {
        $lang = $defaultLanguage;
    }

    // Cleaning
    $content = rtrim( $content );

    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {
        return '<div class="my-syntax-highlighter"><pre><textarea id="mshighlighter" class="mshighlighter" language="' . $lang . '" name="mshighlighter" >' . $content . '</textarea></pre></div>';
    } else {
        return $content;
    }
}

/**
 * Allow shortcodes in the text widget
 */
add_filter( 'widget_text', 'do_shortcode' );
