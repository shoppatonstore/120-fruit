<?php
/**
 * Enqueue scripts and styles for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue frontend styles and scripts
 */
function ftp_enqueue_assets() {
    // CSS files
    wp_enqueue_style(
        'ftp-landing-page',
        FTP_ASSETS_URL . 'css/landing-page.css',
        array(),
        FTP_VERSION
    );
    
    wp_enqueue_style(
        'ftp-menu-page',
        FTP_ASSETS_URL . 'css/menu-page.css',
        array(),
        FTP_VERSION
    );
    
    wp_enqueue_style(
        'ftp-special-plans-page',
        FTP_ASSETS_URL . 'css/special-plans-page.css',
        array(),
        FTP_VERSION
    );
    
    wp_enqueue_style(
        'ftp-animations',
        FTP_ASSETS_URL . 'css/animations.css',
        array(),
        FTP_VERSION
    );
    
    // JavaScript files
    wp_enqueue_script(
        'ftp-animations',
        FTP_ASSETS_URL . 'js/animations.js',
        array(),
        FTP_VERSION,
        true
    );
    
    wp_enqueue_script(
        'ftp-scroll-effects',
        FTP_ASSETS_URL . 'js/scroll-effects.js',
        array(),
        FTP_VERSION,
        true
    );
    
    wp_enqueue_script(
        'ftp-whatsapp',
        FTP_ASSETS_URL . 'js/whatsapp.js',
        array(),
        FTP_VERSION,
        true
    );
    
    // Localize script with data
    wp_localize_script('ftp-whatsapp', 'ftpData', array(
        'orderPhone' => ftp_get_order_phone(),
        'supportPhone' => ftp_get_support_phone(),
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'ftp_enqueue_assets');