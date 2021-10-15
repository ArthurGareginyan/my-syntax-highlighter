<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback for getting a list of CodeMirror modes
 * by scanning the CodeMirror library included in the plugin
 * @return array of mode names located in the CodeMirror library
 */
function spacexchimp_p010_get_codemirror_mode_names() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Get list of modes by scanning the "inc/lib/codemirror/mode/" directorie
    $parent_dir = $plugin['path'] . 'inc/lib/codemirror/mode/';
    $dirs = array_filter( glob( $parent_dir . '*' ), 'is_dir' );
    $names = array_map( 'basename', $dirs );

    // Creat and fill an output array
    $output = $names;

    // Return the processed data
    return $output;
}

/**
 * Callback for getting a list of CodeMirror modes
 * @return array of pairs "Language Name" => "mode" of the CodeMirror modes
 * @TODO These pairs can be extracted from lib/codemirror/mode/meta.js automatically
 */
function spacexchimp_p010_get_codemirror_mode_pairs() {

    // Creat and fill an output array
    $output = array(
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

    // Return the processed data
    return $output;
}

/**
 * Callback for getting a list of CodeMirror themes
 * @return array of pairs "theme" => "Theme Name" of the CodeMirror themes
 */
function spacexchimp_p010_get_codemirror_theme_pairs() {

    // Creat and fill an output array
    $output = array(
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

    // Return the processed data
    return $output;
}
