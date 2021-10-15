<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback for getting an HTML table of shortcodes
 * @return string by using "echo" HTML code of 2 tables showing available shortcodes
 */
function spacexchimp_p010_get_shortcode_table() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Get array of shortcode names and sort it
    $array_1 = spacexchimp_p010_get_codemirror_mode_pairs();

    // Set array of additional shortcode names
    $array_2 = array(
                     'code'  => 'default language',
                     'js'    => 'javascript',
                     'scss'  => 'css',
                     'less'  => 'css',
                     'mysql' => 'sql'
                    );

    // Table titles
    $title_1 = __( 'Language &rarr; Shortcode', $plugin['text'] );
    $title_2 = __( 'Shortcode aliases', $plugin['text'] );

    // Generate list of items for tables
    $list_1 = '';
    $list_2 = '';
    foreach ( $array_1 as $shortcode_key => $shortcode_value ) {
        $list_1 .= '<tr><th>' . $shortcode_key . '</th><td><code>[' . $shortcode_value . ']</code></td></tr>';
    }
    foreach ( $array_2 as $shortcode_alias_key => $shortcode_alias_value ) {
        $list_2 .= '<tr><th>[' . $shortcode_alias_key . ']</th><td><code>[' . $shortcode_alias_value . ']</code></td></tr>';
    }

    // Generate tables
    $out = '<div class="panel panel-success">
                <div class="panel-heading">' . $title_1 . '</div>
                <table class="table table-striped">
                    <tbody>'
                        . $list_1 .
                    '</tbody>
                </table>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">' . $title_2 . '</div>
                <table class="table table-striped">
                    <tbody>'
                        . $list_2 .
                    '</tbody>
                </table>
            </div>
            <style>
                #tab-usage .panel {
                    display: inline-block;
                    min-width: 250px;
                    max-width: 400px;
                }
                #tab-usage .panel .panel-heading {
                    font-size: 16px;
                    text-align: center;
                }
            </style>';

    // Return the processed data
    echo $out;
}
