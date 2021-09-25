<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback function that returns an array with the value of the plugin options
 * @return array
 */
function spacexchimp_p010_options() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p010_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Make the "$options" array if the plugin options data in the database is not exist
    if ( ! is_array( $options ) ) {
        $options = array();
    }

    // Create an array with options
    $array = $options;

    // Set default value if option is empty
    $list = array(
        'automatic_height' => '', // _control_switch
        'block_height' => '300px', // _control_number
        'convert_special_characters' => '', // _control_switch
        'defaultLanguage' => '', // _control_list
        'dollar_sign' => '', // _control_switch
        'first_line_number' => '0', // _control_number
        'hidden_scrollto' => '0', // _control_hidden
        'line_numbers' => '', // _control_switch
        'tab_size' => '4', // _control_number
        'theme' => 'default', // _control_list
    );
    foreach ( $list as $name => $default ) {
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;
    }

    // Sanitize data
    //$array['automatic_height'] = esc_textarea( $array['automatic_height'] );
    //$array['block_height'] = esc_textarea( $array['block_height'] );
    //$array['convert_special_characters'] = esc_textarea( $array['convert_special_characters'] );
    //$array['defaultLanguage'] = esc_textarea( $array['defaultLanguage'] );
    //$array['dollar_sign'] = esc_textarea( $array['dollar_sign'] );
    //$array['first_line_number'] = esc_textarea( $array['first_line_number'] );
    //$array['hidden_scrollto'] = esc_textarea( $array['hidden_scrollto'] );
    //$array['line_numbers'] = esc_textarea( $array['line_numbers'] );
    //$array['tab_size'] = esc_textarea( $array['tab_size'] );
    //$array['theme'] = esc_textarea( $array['theme'] );

    // Modify data
    $array['automatic_height'] = ( $array['automatic_height'] == 'on' || $array['automatic_height'] == '1' || $array['automatic_height'] == 'true' ) ? 'true' : 'false';
    $array['convert_special_characters'] = ( $array['convert_special_characters'] == 'on' || $array['convert_special_characters'] == '1' || $array['convert_special_characters'] == 'true' ) ? true : false;
    $array['dollar_sign'] = ( $array['dollar_sign'] == 'on' || $array['dollar_sign'] == '1' || $array['dollar_sign'] == 'true' ) ? 'true' : 'false';
    $array['line_numbers'] = ( $array['line_numbers'] == 'on' || $array['line_numbers'] == '1' || $array['line_numbers'] == 'true' ) ? 'true' : 'false';

    // Return the processed data
    return $array;
}
