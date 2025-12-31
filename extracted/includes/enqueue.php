<?php
/**
 * Enqueue scripts and styles for 120 Fruit Therapy Plugin
 * Optimized for maximum performance
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add resource hints for faster loading
 */
function ftp_add_resource_hints($urls, $relation_type) {
    if ($relation_type === 'preconnect') {
        // Preconnect to WhatsApp for faster order redirects
        $urls[] = array(
            'href' => 'https://wa.me',
            'crossorigin' => 'anonymous'
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'ftp_add_resource_hints', 10, 2);

/**
 * Add preload for critical resources
 */
function ftp_add_preload_hints() {
    // Preload the main CSS file
    echo '<link rel="preload" href="' . esc_url(FTP_ASSETS_URL . 'css/landing-page.css') . '" as="style">' . "\n";
    
    // Preload header logo for faster LCP
    echo '<link rel="preload" href="' . esc_url(FTP_PLUGIN_URL . 'images/logos/logo-header.png') . '" as="image">' . "\n";
    
    // Add DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//wa.me">' . "\n";
}
add_action('wp_head', 'ftp_add_preload_hints', 1);

/**
 * Add critical CSS inline for above-the-fold content
 */
function ftp_add_critical_css() {
    ?>
    <style id="ftp-critical-css">
    /* Critical CSS for immediate render - above the fold content */
    :root{--ftp-primary-red:#FF0000;--ftp-white:#FFFFFF;--ftp-black:#000000;--ftp-dark-burgundy:#1B0000;--ftp-gold:#FFD700}
    body{margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,sans-serif;background:var(--ftp-black)}
    .ftp-wrapper{min-height:100vh}
    .ftp-header{position:fixed;top:0;left:0;right:0;z-index:1000;background:rgba(0,0,0,0.95);backdrop-filter:blur(10px);padding:8px 0}
    .ftp-header-container{max-width:1200px;margin:0 auto;padding:0 20px;display:flex;justify-content:space-between;align-items:center}
    .ftp-logo-image{height:32px;width:auto}
    .ftp-nav-list{display:flex;list-style:none;gap:25px;margin:0;padding:0}
    .ftp-nav-link{color:var(--ftp-white);text-decoration:none}
    .ftp-hero{min-height:100vh;display:flex;align-items:center;background:linear-gradient(135deg,var(--ftp-black),var(--ftp-dark-burgundy))}
    .ftp-section-title{color:var(--ftp-white);font-size:clamp(2rem,5vw,3.5rem);text-align:center}
    /* Hide content initially to prevent FOUC */
    .ftp-fade-in-up{opacity:0;transform:translateY(20px)}
    </style>
    <?php
}
add_action('wp_head', 'ftp_add_critical_css', 2);

/**
 * Enqueue frontend styles and scripts with optimizations
 */
function ftp_enqueue_assets() {
    // CSS files with optimized loading
    wp_enqueue_style(
        'ftp-landing-page',
        FTP_ASSETS_URL . 'css/landing-page.css',
        array(),
        FTP_VERSION,
        'all'
    );
    
    // Conditionally load menu page CSS only on menu pages
    if (is_page() || is_singular()) {
        wp_enqueue_style(
            'ftp-menu-page',
            FTP_ASSETS_URL . 'css/menu-page.css',
            array('ftp-landing-page'),
            FTP_VERSION,
            'all'
        );
        
        wp_enqueue_style(
            'ftp-special-plans-page',
            FTP_ASSETS_URL . 'css/special-plans-page.css',
            array('ftp-landing-page'),
            FTP_VERSION,
            'all'
        );
    }
    
    wp_enqueue_style(
        'ftp-animations',
        FTP_ASSETS_URL . 'css/animations.css',
        array('ftp-landing-page'),
        FTP_VERSION,
        'all'
    );
    
    // JavaScript files - loaded in footer with defer
    wp_enqueue_script(
        'ftp-animations',
        FTP_ASSETS_URL . 'js/animations.js',
        array(),
        FTP_VERSION,
        array('in_footer' => true, 'strategy' => 'defer')
    );
    
    wp_enqueue_script(
        'ftp-scroll-effects',
        FTP_ASSETS_URL . 'js/scroll-effects.js',
        array(),
        FTP_VERSION,
        array('in_footer' => true, 'strategy' => 'defer')
    );
    
    wp_enqueue_script(
        'ftp-whatsapp',
        FTP_ASSETS_URL . 'js/whatsapp.js',
        array(),
        FTP_VERSION,
        array('in_footer' => true, 'strategy' => 'defer')
    );
    
    // Localize script with data
    wp_localize_script('ftp-whatsapp', 'ftpData', array(
        'orderPhone' => ftp_get_order_phone(),
        'supportPhone' => ftp_get_support_phone(),
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'ftp_enqueue_assets');

/**
 * Add defer attribute to scripts for better performance
 */
function ftp_add_defer_attribute($tag, $handle, $src) {
    // List of scripts to defer
    $defer_scripts = array('ftp-animations', 'ftp-scroll-effects', 'ftp-whatsapp');
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'ftp_add_defer_attribute', 10, 3);

/**
 * Optimize images with lazy loading attribute
 */
function ftp_add_lazy_loading($attr, $attachment, $size) {
    $attr['loading'] = 'lazy';
    $attr['decoding'] = 'async';
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'ftp_add_lazy_loading', 10, 3);

/**
 * Add performance-optimized meta tags
 */
function ftp_add_performance_meta() {
    // Enable browser DNS prefetching
    echo '<meta http-equiv="x-dns-prefetch-control" content="on">' . "\n";
    
    // Preload font if using custom fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'ftp_add_performance_meta', 0);