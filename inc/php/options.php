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
    $list = array(
        'automatic_height' => (boolean) '', // _control_switch
        'block_height' => (integer) '300px', // _control_number
        'convert_special_characters' => (boolean) '', // _control_switch
        'defaultLanguage' => (string) '', // _control_list
        'dollar_sign' => (boolean) '', // _control_switch
        'first_line_number' => (integer) '0', // _control_number
        'hidden_scrollto' => (integer) '0', // _control_hidden
        'line_numbers' => (boolean) '', // _control_switch
        'tab_size' => (integer) '4', // _control_number
        'theme' => (string) 'default', // _control_list
    );
    foreach ( $list as $name => $default ) {

        // Set default value if option is empty
        $array[$name] = !empty( $options[$name] ) ? $options[$name] : $default;

        // Sanitize and modify by type of option
        if ( is_bool( $default ) === true ) {
            $array[$name] = ( $array[$name] == 'on' || $array[$name] == '1' || $array[$name] == 'true' ) ? true : false;
        }
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


    // Return the processed data
    return $array;
}
