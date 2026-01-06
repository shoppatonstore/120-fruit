<?php
/**
 * Plugin Name: 120 Fruit Therapy Landing Page
 * Plugin URI: https://120fruit.com
 * Description: A luxury landing page plugin for 120 Fruit Therapy Place - featuring therapeutic fruit-based wellness offerings with elegant dark theme and red accents.
 * Version: 1.0.0
 * Author: 120 Fruit Therapy Place
 * Author URI: https://120fruit.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 120-fruit-therapy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('FTP_VERSION', '1.0.0');
define('FTP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FTP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FTP_ASSETS_URL', FTP_PLUGIN_URL . 'assets/');

// Include required files
require_once FTP_PLUGIN_DIR . 'includes/helpers.php';
require_once FTP_PLUGIN_DIR . 'includes/enqueue.php';
require_once FTP_PLUGIN_DIR . 'includes/shortcodes.php';
require_once FTP_PLUGIN_DIR . 'includes/admin-settings.php';

/**
 * Plugin activation hook
 */
function ftp_activate() {
    // Set default options
    $default_options = array(
        'logo_url' => '',
        'hero_video_url' => '',
        'menu_page_url' => '',
        'category_images' => array(),
    );
    
    if (!get_option('ftp_settings')) {
        add_option('ftp_settings', $default_options);
    }
    
    // Flush rewrite rules on activation
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ftp_activate');

/**
 * Plugin deactivation hook
 */
function ftp_deactivate() {
    // Flush rewrite rules on deactivation
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'ftp_deactivate');

/**
 * Initialize the plugin
 */
function ftp_init() {
    // Load text domain for translations
    load_plugin_textdomain('120-fruit-therapy', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('init', 'ftp_init');