<?php
/**
 * Plugin Name: My Syntax Highlighter
 * Plugin URI: https://github.com/ArthurGareginyan/my-syntax-highlighter
 * Description: Simple post syntax-highlighted code without losing it's formatting or making any manual changes. Supporting multiple languages, shortcodes and themes.
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 1.1
 * License: GPL3
 * Text Domain: my-syntax-highlighter
 * Domain Path: /languages/
 *
 * Copyright 2016 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "My Syntax Highlighter".
 *
 * "My Syntax Highlighter" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "My Syntax Highlighter" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "My Syntax Highlighter".  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define constants
 *
 * @since 0.3
 */
defined('MSHIGHLIGHTER_DIR') or define('MSHIGHLIGHTER_DIR', dirname(plugin_basename(__FILE__)));
defined('MSHIGHLIGHTER_BASE') or define('MSHIGHLIGHTER_BASE', plugin_basename(__FILE__));
defined('MSHIGHLIGHTER_URL') or define('MSHIGHLIGHTER_URL', plugin_dir_url(__FILE__));
defined('MSHIGHLIGHTER_PATH') or define('MSHIGHLIGHTER_PATH', plugin_dir_path(__FILE__));

/**
 * Register text domain
 *
 * @since 0.3
 */
function mshighlighter_textdomain() {
	load_plugin_textdomain( 'my-syntax-highlighter', false, MSHIGHLIGHTER_DIR . '/languages/' );
}
add_action( 'init', 'mshighlighter_textdomain' );

/**
 * Print direct link to My Syntax Highlighter admin page
 *
 * Fetches array of links generated by WP Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the My Syntax Highlighter admin page
 *
 * @since  0.3
 * @param  array $links Array of links generated by WP in Plugin Admin page.
 * @return array        Array of links to be output on Plugin Admin page.
 */
function mshighlighter_settings_link( $links ) {
	$settings_page = '<a href="' . admin_url( 'options-general.php?page=my-syntax-highlighter.php' ) .'">' . __( 'Settings', 'my-syntax-highlighter' ) . '</a>';
	array_unshift( $links, $settings_page );
	return $links;
}
add_filter( "plugin_action_links_".MSHIGHLIGHTER_BASE, 'mshighlighter_settings_link' );

/**
 * Register "Syntax Highlighter" submenu in "Settings" Admin Menu
 *
 * @since 0.1
 */
function mshighlighter_register_submenu_page() {
	add_options_page( __( 'My Syntax Highlighter', 'my-syntax-highlighter' ), __( 'Syntax Highlighter', 'my-syntax-highlighter' ), 'manage_options', basename( __FILE__ ), 'mshighlighter_render_submenu_page' );
}
add_action( 'admin_menu', 'mshighlighter_register_submenu_page' );

/**
 * Attach Settings Page
 *
 * @since 0.3
 */
require_once( MSHIGHLIGHTER_PATH . 'inc/php/settings_page.php' );

/**
 * Register settings
 *
 * @since 0.1
 */
function mshighlighter_register_settings() {
	register_setting( 'mshighlighter_settings_group', 'mshighlighter_settings' );
}
add_action( 'admin_init', 'mshighlighter_register_settings' );

/**
 * Base for the _load_scripts hook
 *
 * @since 1.1
 */
function mshighlighter_load_scripts_base($options) {

    // CodeMirror
    wp_enqueue_script( 'codemirror-js', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.js' );
    wp_enqueue_style( 'codemirror-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/codemirror.css' );
    if ( $options['theme'] != "default" ) {
        wp_enqueue_style( 'codemirror-theme', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/theme/' . $options['theme'] . '.css' );
    }
    wp_enqueue_script( 'codemirror-settings', MSHIGHLIGHTER_URL . 'inc/js/codemirror-settings.js', array(), false, true );

    // CodeMirror Modes
    wp_enqueue_script( 'codemirror-mode-clike', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/clike.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-css', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/css.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-htmlmixed', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/htmlmixed.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-javascript', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/javascript.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-markdown', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/markdown.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-perl', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/perl.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-php', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/php.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-sass', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sass.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-shell', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/shell.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-sql', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/sql.js', array(), false, true );
    wp_enqueue_script( 'codemirror-mode-xml', MSHIGHLIGHTER_URL . 'inc/lib/codemirror/mode/xml.js', array(), false, true );

    // Create js object and injected it into the js file
    if ( !empty( $options['theme'] ) ) { $theme = $options['theme']; } else { $theme = "default"; }
    if ( !empty( $options['line_numbers'] ) && ( $options['line_numbers'] == "on" ) ) { $line_numbers = "true"; } else { $line_numbers = "false"; }
    if ( !empty( $options['first_line_number'] ) ) { $first_line_number = $options['first_line_number']; } else { $first_line_number = "0"; }
    if ( !empty( $options['tab_size'] ) ) { $tab_size = $options['tab_size']; } else { $tab_size = "4"; }
    $script_params = array(
                           'theme' => $theme,
                           'line_numbers' => $line_numbers,
                           'first_line_number' => $first_line_number,
                           'tab_size' => $tab_size,
                           );
    wp_localize_script( 'codemirror-settings', 'scriptParams', $script_params );
}

/**
 * Dymamic CSS for the _load_scripts hook
 *
 * @since 1.1
 */
function mshighlighter_load_scripts_dynamic_css($options) {

    if ( !empty( $options['automatic_height'] ) && ( $options['automatic_height'] == "on" ) ) {
        $block_height = "100%";
    } elseif ( !empty( $options['block_height'] ) ) {
        $block_height = $options['block_height'] . "px";
    }

    $custom_css = ".CodeMirror { height: " . $block_height . " !important; }";

    // Inject dynamic CSS
    wp_add_inline_style( 'front-css', $custom_css );
    wp_add_inline_style( 'admin-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 1.1
 */
function mshighlighter_load_scripts_admin($hook) {

    // If the current page is a settings page of this plugin
    if ( 'settings_page_my-syntax-highlighter' == $hook ) {
        
        // Read options from BD
        $options = get_option( 'mshighlighter_settings' );
        
        // Load style sheet
        wp_enqueue_style( 'admin-css', MSHIGHLIGHTER_URL . 'inc/css/admin.css' );
        wp_enqueue_style( 'bootstrap', MSHIGHLIGHTER_URL . 'inc/css/bootstrap.css' );
        wp_enqueue_style( 'bootstrap-theme', MSHIGHLIGHTER_URL . 'inc/css/bootstrap-theme.css' );

        // Call the function with dymamic CSS
        mshighlighter_load_scripts_dynamic_css($options);

        // Load JS functions
        wp_enqueue_script( 'admin-js', MSHIGHLIGHTER_URL . 'inc/js/admin.js', array(), false, true );
        wp_enqueue_script( 'bootstrap-checkbox', MSHIGHLIGHTER_URL . 'inc/js/bootstrap-checkbox.min.js' );

        // Call the function with a basis of scripts
        mshighlighter_load_scripts_base($options);
    }

}
add_action( 'admin_enqueue_scripts', 'mshighlighter_load_scripts_admin' );

/**
 * Load scripts and style sheet on front end of website
 *
 * @since 1.1
 */
function mshighlighter_load_scripts_front() {

    // Read options from BD
    $options = get_option( 'mshighlighter_settings' );

    // If the "Enable Plugin" option is on
    if ( !empty( $options['enable'] ) && $options['enable'] == "on" ) {

        // Load style sheet
        wp_enqueue_style( 'front-css', MSHIGHLIGHTER_URL . 'inc/css/front.css' );

        // Call the function with dymamic CSS
        mshighlighter_load_scripts_dynamic_css($options);

        // Call the function with a basis of scripts
        mshighlighter_load_scripts_base($options);
    }
}
add_action( 'wp_enqueue_scripts', 'mshighlighter_load_scripts_front' );

/**
 * Shortcode-Processor. Functionality to set up shortcode correctly
 *
 * @since 1.0
 */
function mshighlighter_shortcode_processor( $content ) {

    global $shortcode_tags;

    // Backup and clear out the shortcodes list
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();

    // Define the different languages for shortcodes
    $language = array("code", "php", "javascript", "js", "xml", "html", "css", "scss", "less", "sass", "markdown", "perl", "sql", "mysql", "shell", "bash");

    // Create different shortcodes
    foreach($language as $lang){
        add_shortcode( $lang, 'mshighlighter_shortcode' );
    }

    // Run the shortcodes function on the content now that it's just this plugin's shortcodes
    $content = do_shortcode( $content );

    // Put the shortcodes back to normal
    $shortcode_tags = $orig_shortcode_tags;

    return $content;
}
add_filter( 'the_content', 'mshighlighter_shortcode_processor', 7 );

/**
 * Callback for shortcodes. Uses in Shortcode-Processor
 *
 * @since 1.0
 */
function mshighlighter_shortcode( $atts, $content = null, $lang ) {

    // Read options from BD
    $options = get_option( 'mshighlighter_settings' );

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

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function mshighlighter_uninstall() {
	delete_option( 'mshighlighter_settings' );
}
register_uninstall_hook( __FILE__, 'mshighlighter_uninstall' );

?>