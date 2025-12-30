<?php
/**
 * Full Menu Page Template
 * Use shortcode: [ftp_menu_full]
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$menu_items = ftp_get_menu_items();
?>

<div class="ftp-wrapper">
    <?php echo do_shortcode('[ftp_header]'); ?>
    
    <section class="ftp-menu-full ftp-section" id="ftp-menu-full">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h1 class="ftp-section-title">Our Full Menu</h1>
                <p class="ftp-section-subtitle">Hygienically prepared fresh fruits crafted into delicious and nutritious creations for your wellness journey. Order directly via WhatsApp for quick delivery!</p>
            </div>
            
            <!-- Menu Category Navigation -->
            <nav class="ftp-menu-nav">
                <div class="ftp-menu-nav-list">
                    <?php foreach ($menu_items as $key => $category) : ?>
                    <a href="#menu-<?php echo esc_attr($key); ?>" class="ftp-menu-nav-item">
                        <?php echo esc_html($category['title']); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </nav>
            
            <!-- Menu Categories -->
            <?php foreach ($menu_items as $key => $category) : ?>
            <div class="ftp-menu-category" id="menu-<?php echo esc_attr($key); ?>">
                <div class="ftp-category-header">
                    <h2 class="ftp-category-title"><?php echo esc_html($category['title']); ?></h2>
                    <p class="ftp-category-desc"><?php echo esc_html($category['description']); ?></p>
                </div>
                
                <div class="ftp-menu-items-grid">
                    <?php foreach ($category['items'] as $item) : ?>
                    <div class="ftp-menu-item-card ftp-fade-in-up">
                        <div class="ftp-menu-item-content">
                            <div class="ftp-menu-item-header">
                                <h3 class="ftp-menu-item-name"><?php echo esc_html($item['name']); ?></h3>
                                <span class="ftp-menu-item-price"><?php echo esc_html($item['price']); ?></span>
                            </div>
                            <p class="ftp-menu-item-desc"><?php echo esc_html($item['description']); ?></p>
                            <div class="ftp-menu-item-order">
                                <?php 
                                $whatsapp_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120! I would like to order " . $item['name'] . ". Please confirm availability and price.");
                                ?>
                                <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">
                                    Order Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
            
            <!-- Call to Action -->
            <div class="ftp-section-cta ftp-fade-in-up">
                <h3 style="color: var(--ftp-white); margin-bottom: 20px;">Swift Deliveries Within Nsukka</h3>
                <p style="color: var(--ftp-text-muted); margin-bottom: 30px;">For swift deliveries to your location within Nsukka, you can contact us on WhatsApp</p>
                <?php $whatsapp_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120 Fruit Therapy! I would like to place an order for delivery within Nsukka. Please assist me."); ?>
                <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large" target="_blank" rel="noopener">
                    Contact Us on WhatsApp
                </a>
            </div>
        </div>
    </section>
    
    <!-- Back to Top Button -->
    <a href="#" class="ftp-menu-back-top" title="Back to top">⬆</a>
    
    <?php echo do_shortcode('[ftp_footer]'); ?>
</div>