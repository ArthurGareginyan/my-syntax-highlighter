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

    // Get the shortcode names
    $shortcodes_names = spacexchimp_p010_get_shortcode_names();

    // Create different shortcodes
    foreach( $shortcodes_names as $shortcode_name ){
        add_shortcode( $shortcode_name, 'spacexchimp_p010_shortcode' );
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

/**
 * Callback for getting a list of CodeMirror modes
 * by scanning the CodeMirror library included in the plugin
 * @return array of mode names located in the CodeMirror library
 */
function spacexchimp_p010_get_codemirror_mode_names() {
    $cm_dir = SPACEXCHIMP_P010_PATH . 'inc/lib/codemirror/mode/';
    $modes = array_filter( glob( $cm_dir . '*' ), 'is_dir' );
    return array_map( 'basename', $modes );
}

/**
 * Callback for getting a list of all shortcode names
 * @return array of shortcode names
 */
function spacexchimp_p010_get_shortcode_names() {
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
                  'shell',
                  'bash'
    );
}

/**
 * Callback for getting a list of CodeMirror modes
 * @return array of pairs "Language Name" => "mode" of the CodeMirror modes
 * @TODO These pairs can be extracted from lib/codemirror/mode/meta.js
 */
function spacexchimp_p010_get_codemirror_mode_pairs() {
    return array(
                  'BASH'       => 'bash',
                  'CSS'        => 'css',
                  'HTML'       => 'html',
                  'JavaScript' => 'javascript',
                  'LESS'       => 'less',
                  'Markdown'   => 'markdown',
                  'MySQL'      => 'mysql',
                  'Perl'       => 'perl',
                  'PHP'        => 'php',
                  'SASS'       => 'sass',
                  'SCSS'       => 'scss',
                  'Shell'      => 'shell',
                  'SQL'        => 'sql',
                  'XML'        => 'xml'
    );
}

/**
 * Callback for getting a list of CodeMirror themes
 * @return array of pairs "theme" => "Theme Name" of the CodeMirror themes
 */
function spacexchimp_p010_get_codemirror_theme_pairs() {
    return array(
                  '3024-day'                => '3024 day',
                  '3024-night'              => '3024 night',
                  'ambiance-mobile'         => 'Ambiance mobile',
                  'ambiance'                => 'Ambiance',
                  'base16-dark'             => 'Base16 dark',
                  'base16-light'            => 'Base16 light',
                  'blackboard'              => 'Blackboard',
                  'cobalt'                  => 'Cobalt',
                  'colorforth'              => 'Colorforth',
                  'eclipse'                 => 'Eclipse',
                  'elegant'                 => 'Elegant',
                  'erlang-dark'             => 'Erlang dark',
                  'lesser-dark'             => 'Lesser dark',
                  'liquibyte'               => 'Liquibyte',
                  'mbo'                     => 'MBO',
                  'mdn-like'                => 'MDN-like',
                  'midnight'                => 'Midnight',
                  'monokai'                 => 'Monokai',
                  'neat'                    => 'Neat',
                  'neo'                     => 'Neo',
                  'night'                   => 'Night',
                  'paraiso-dark'            => 'Paraiso dark',
                  'paraiso-light'           => 'Paraiso light',
                  'pastel-on-dark'          => 'Pastel on dark',
                  'rubyblue'                => 'Rubyblue',
                  'solarized'               => 'Solarized',
                  'the-matrix'              => 'The matrix',
                  'tomorrow-night-bright'   => 'Tomorrow night bright',
                  'tomorrow-night-eighties' => 'Tomorrow night eighties',
                  'ttcn'                    => 'TTCN',
                  'twilight'                => 'Twilight',
                  'vibrant-ink'             => 'Vibrant ink',
                  'xq-dark'                 => 'XQ dark',
                  'xq-light'                => 'XQ light',
                  'zenburn'                 => 'Zenburn'
    );
}
