<?php
/**
 * Plugin Name: My Syntax Highlighter
 * Plugin URI: https://github.com/ArthurGareginyan/my-syntax-highlighter
 * Description: Simple post syntax-highlighted code without losing it's formatting or making any manual changes. Supporting multiple languages, shortcodes and themes.
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 2.0
 * License: GPL3
 * Text Domain: my-syntax-highlighter
 * Domain Path: /languages/
 *
 * Copyright 2016-2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
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
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define global constants
 *
 * @since 1.4
 */
defined('MSHIGHLIGHTER_DIR') or define('MSHIGHLIGHTER_DIR', dirname(plugin_basename(__FILE__)));
defined('MSHIGHLIGHTER_BASE') or define('MSHIGHLIGHTER_BASE', plugin_basename(__FILE__));
defined('MSHIGHLIGHTER_URL') or define('MSHIGHLIGHTER_URL', plugin_dir_url(__FILE__));
defined('MSHIGHLIGHTER_PATH') or define('MSHIGHLIGHTER_PATH', plugin_dir_path(__FILE__));
defined('MSHIGHLIGHTER_TEXT') or define('MSHIGHLIGHTER_TEXT', 'my-syntax-highlighter');
defined('MSHIGHLIGHTER_VERSION') or define('MSHIGHLIGHTER_VERSION', '2.0');

/**
 * Load the plugin modules
 *
 * @since 2.0
 */
require_once( MSHIGHLIGHTER_PATH . 'inc/php/core.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/enqueue.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/version.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/functional.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/page.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/messages.php' );
require_once( MSHIGHLIGHTER_PATH . 'inc/php/uninstall.php' );
