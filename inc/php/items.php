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

    $cm_dir = $plugin['path'] . 'inc/lib/codemirror/mode/';
    $modes = array_filter( glob( $cm_dir . '*' ), 'is_dir' );

    // Return the processed data
    return array_map( 'basename', $modes );
}

/**
 * Callback for getting a list of CodeMirror modes
 * @return array of pairs "Language Name" => "mode" of the CodeMirror modes
 * @TODO These pairs can be extracted from lib/codemirror/mode/meta.js
 */
function spacexchimp_p010_get_codemirror_mode_pairs() {
    return array(
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
