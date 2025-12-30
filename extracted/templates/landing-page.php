<?php
/**
 * Landing Page Template
 * Use shortcode: [ftp_landing_page]
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="ftp-wrapper">
    <?php
    // Header
    echo do_shortcode('[ftp_header]');
    
    // Hero Section
    echo do_shortcode('[ftp_hero]');
    
    // Menu Section
    echo do_shortcode('[ftp_menu_section]');
    
    // Special Plan Menu Section (Weight Loss/Gain Fruit Salads & Smoothies)
    echo do_shortcode('[ftp_special_plan_menu_section]');
    
    // Special Plans Section (Wellness Programs with Durations)
    echo do_shortcode('[ftp_special_plans_section]');
    
    // Gift Packages Section
    echo do_shortcode('[ftp_gift_packages]');
    
    // Wellness Events Section
    echo do_shortcode('[ftp_wellness_events]');
    
    // Special Offers Section
    echo do_shortcode('[ftp_special_offers]');
    
    // Mission Section
    echo do_shortcode('[ftp_mission]');
    
    // Statistics Section
    echo do_shortcode('[ftp_stats]');
    
    // Contact Section
    echo do_shortcode('[ftp_contact]');
    
    // Map Section
    echo do_shortcode('[ftp_map]');
    
    // Footer
    echo do_shortcode('[ftp_footer]');
    ?>
</div>