<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render checkboxes and fields for saving settings data to database
 *
 * @since 2.1
 */
function mshighlighter_setting( $name, $label, $help=null, $field=null, $placeholder=null, $size=null ) {

    // Read options from BD
    $options = get_option( MSHIGHLIGHTER_SETTINGS . '_settings' );

    if ( !empty( $options[$name] ) ) {
        $value = esc_textarea( $options[$name] );
    } else {
        $value = "";
    }

    // Generate the table
    if ( !empty( $options[$name] ) ) {
        $checked = "checked='checked'";
    } else {
        $checked = "";
    }

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='" . MSHIGHLIGHTER_SETTINGS . "_settings[$name]' id='" . MSHIGHLIGHTER_SETTINGS . "_settings[$name]' $checked >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='" . MSHIGHLIGHTER_SETTINGS . "_settings[$name]' id='" . MSHIGHLIGHTER_SETTINGS . "_settings[$name]' size='$size' value='$value' placeholder='$placeholder' >";
    }

    // Put table to the variables $out and $help_out
    $out = "<tr>
                <th scope='row'>
                    $label
                </th>
                <td>
                    $input
                </td>
            </tr>";
    if ( !empty( $help ) ) {
        $help_out = "<tr>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    } else {
        $help_out = "";
    }

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 *
 * @since 2.1
 */
function mshighlighter_shortcode_processor( $content ) {

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Define the different languages for shortcodes
    $language = array("code", "php", "javascript", "js", "xml", "html", "css", "scss", "less", "sass", "markdown", "perl", "sql", "mysql", "shell", "bash");

    // Create different shortcodes
    foreach( $language as $lang ){
        add_shortcode( $lang, MSHIGHLIGHTER_PREFIX . '_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    return $content;
}
add_filter( 'the_content', MSHIGHLIGHTER_PREFIX . '_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 *
 * @since 2.1
 */
function mshighlighter_shortcode( $atts, $content = null, $lang ) {

    // Read options from BD
    $options = get_option( MSHIGHLIGHTER_SETTINGS . '_settings' );

    // Default language for the [code] shortcode
    if ( !empty( $options['defaultLanguage'] ) ) { $defaultLanguage = $options['defaultLanguage']; } else { $defaultLanguage = ""; }
    if ( $lang == "code" ) { $lang = $defaultLanguage; }

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
 *
 * @since 1.1
 */
add_filter( 'widget_text', 'do_shortcode' );
