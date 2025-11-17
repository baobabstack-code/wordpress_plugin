<?php
/**
 * Plugin Name: My Custom Plugin
 * Plugin URI: https://github.com/baobabstack-code/wordpress_plugin
 * Description: A boilerplate WordPress plugin with modern architecture
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-custom-plugin
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Plugin version
define('MY_CUSTOM_PLUGIN_VERSION', '1.0.0');

// Plugin directory path
define('MY_CUSTOM_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Plugin directory URL
define('MY_CUSTOM_PLUGIN_URL', plugin_dir_url(__FILE__));

// Autoload classes using Composer
require_once MY_CUSTOM_PLUGIN_PATH . 'vendor/autoload.php';

/**
 * Plugin activation hook
 */
function activate_my_custom_plugin() {
    MyCustomPlugin\Activator::activate();
}
register_activation_hook(__FILE__, 'activate_my_custom_plugin');

/**
 * Plugin deactivation hook
 */
function deactivate_my_custom_plugin() {
    MyCustomPlugin\Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_my_custom_plugin');

/**
 * Initialize and run the plugin
 */
function run_my_custom_plugin() {
    $plugin = new MyCustomPlugin\Plugin();
    $plugin->run();
}
run_my_custom_plugin();
