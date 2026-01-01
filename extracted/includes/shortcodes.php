<?php
/**
 * Shortcodes for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register all shortcodes
 */
function ftp_register_shortcodes() {
    add_shortcode('ftp_landing_page', 'ftp_landing_page_shortcode');
    add_shortcode('ftp_hero', 'ftp_hero_shortcode');
    add_shortcode('ftp_menu_section', 'ftp_menu_section_shortcode');
    add_shortcode('ftp_menu_full', 'ftp_menu_full_shortcode');
    add_shortcode('ftp_special_plans_section', 'ftp_special_plans_section_shortcode');
    add_shortcode('ftp_special_plan_menu_section', 'ftp_special_plan_menu_section_shortcode');
    add_shortcode('ftp_special_plans_full', 'ftp_special_plans_full_shortcode');
    add_shortcode('ftp_special_plan_menu_full', 'ftp_special_plan_menu_full_shortcode');
    add_shortcode('ftp_gift_packages', 'ftp_gift_packages_shortcode');
    add_shortcode('ftp_wellness_events', 'ftp_wellness_events_shortcode');
    add_shortcode('ftp_special_offers', 'ftp_special_offers_shortcode');
    add_shortcode('ftp_mission', 'ftp_mission_shortcode');
    add_shortcode('ftp_stats', 'ftp_stats_shortcode');
    add_shortcode('ftp_contact', 'ftp_contact_shortcode');
    add_shortcode('ftp_map', 'ftp_map_shortcode');
    add_shortcode('ftp_header', 'ftp_header_shortcode');
    add_shortcode('ftp_footer', 'ftp_footer_shortcode');
}
add_action('init', 'ftp_register_shortcodes');

/**
 * Full landing page shortcode
 */
function ftp_landing_page_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/landing-page.php';
    return ob_get_clean();
}

/**
 * Header shortcode
 */
function ftp_header_shortcode() {
    $whatsapp_order_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120 Fruit Therapy! I would like to place an order. Please assist me with your menu options.");
    $menu_page_url = ftp_get_menu_page_url();
    $special_plans_url = ftp_get_special_plans_page_url();
    $special_plan_menu_url = ftp_get_special_plan_menu_page_url();
    $home_url = home_url('/');
    $settings = get_option('ftp_settings', array());
    $logo_url = isset($settings['logo_url']) ? $settings['logo_url'] : '';
    ob_start();
    ?>
    <header class="ftp-header" id="ftp-header">
        <div class="ftp-header-container">
            <div class="ftp-logo">
                <?php 
                // Use custom logo if set, otherwise use the default uploaded logo
                $display_logo_url = !empty($logo_url) ? $logo_url : ftp_get_logo_variant_url('header');
                ?>
                <a href="<?php echo esc_url($home_url); ?>" class="ftp-logo-image-link">
                    <img src="<?php echo esc_url($display_logo_url); ?>" alt="120 Fruit Therapy" class="ftp-logo-image ftp-logo-animated">
                </a>
            </div>
            <button class="ftp-mobile-menu-toggle" aria-label="Toggle menu">
                <span class="ftp-hamburger"></span>
            </button>
            <nav class="ftp-nav">
                <ul class="ftp-nav-list">
                    <li><a href="<?php echo esc_url($home_url); ?>" class="ftp-nav-link">Home</a></li>
                    <li class="ftp-nav-dropdown">
                        <a href="#ftp-menu" class="ftp-nav-link ftp-dropdown-trigger">Menu <span class="ftp-dropdown-arrow">▼</span></a>
                        <ul class="ftp-dropdown-menu">
                            <li><a href="<?php echo esc_url($menu_page_url); ?>">Therapeutic Menu</a></li>
                            <li><a href="<?php echo esc_url($special_plan_menu_url); ?>">Special Plan Menu</a></li>
                            <li><a href="<?php echo esc_url($special_plans_url); ?>">Special Plans</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url($home_url); ?>#ftp-gift-packages" class="ftp-nav-link">Gift Packages</a></li>
                    <li><a href="<?php echo esc_url($home_url); ?>#ftp-events" class="ftp-nav-link">Corporate Wellness</a></li>
                    <li><a href="<?php echo esc_url($home_url); ?>#ftp-contact" class="ftp-nav-link">Contact</a></li>
                    <!-- Mobile Theme Toggle (inside hamburger menu) -->
                    <li class="ftp-mobile-theme-toggle-item">
                        <button class="ftp-theme-toggle ftp-theme-toggle-mobile" id="ftp-theme-toggle-mobile" aria-label="Toggle light/dark mode" title="Toggle light/dark mode">
                            <span class="ftp-theme-icon ftp-theme-icon-dark">🌙</span>
                            <span class="ftp-theme-icon ftp-theme-icon-light">☀️</span>
                            <span class="ftp-theme-toggle-label">Dark/Light Mode</span>
                        </button>
                    </li>
                </ul>
                <a href="<?php echo esc_url($whatsapp_order_url); ?>" class="ftp-header-cta" target="_blank" rel="noopener">Order Now</a>
                <!-- Desktop Theme Toggle (after Order Now button) -->
                <button class="ftp-theme-toggle ftp-theme-toggle-desktop" id="ftp-theme-toggle" aria-label="Toggle light/dark mode" title="Toggle light/dark mode">
                    <span class="ftp-theme-icon ftp-theme-icon-dark">🌙</span>
                    <span class="ftp-theme-icon ftp-theme-icon-light">☀️</span>
                </button>
            </nav>
        </div>
    </header>
    <?php
    return ob_get_clean();
}

/**
 * Hero section shortcode
 */
function ftp_hero_shortcode() {
    $whatsapp_order_url = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120 Fruit Therapy! I would like to place an order. Please assist me with your menu options.");
    $settings = get_option('ftp_settings', array());
    $display_mode = isset($settings['hero_display_mode']) ? $settings['hero_display_mode'] : 'video';
    $hero_image_url = isset($settings['hero_image_url']) ? $settings['hero_image_url'] : '';
    ob_start();
    ?>
    <section class="ftp-hero" id="ftp-hero">
        <?php if ($display_mode === 'image' && !empty($hero_image_url)) : ?>
        <div class="ftp-hero-image-container">
            <div class="ftp-hero-image" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');"></div>
            <div class="ftp-hero-overlay"></div>
        </div>
        <?php else : ?>
        <div class="ftp-hero-video-container">
            <video class="ftp-hero-video" autoplay muted loop playsinline>
                <source src="<?php echo esc_url(ftp_get_hero_video_url()); ?>" type="video/mp4">
            </video>
            <div class="ftp-hero-overlay"></div>
        </div>
        <?php endif; ?>
        <div class="ftp-hero-content">
            <h1 class="ftp-hero-title ftp-fade-in-up">Fruit Therapy &amp; Wellness</h1>
            <p class="ftp-hero-subtitle ftp-fade-in-up ftp-delay-1">Hygienically prepared fruits for optimal health</p>
            <p class="ftp-hero-text ftp-fade-in-up ftp-delay-2">Fresh fruit salads, parfaits, smoothies, mocktails and therapeutic wellness plans designed for your health journey.</p>
            <div class="ftp-hero-buttons ftp-fade-in-up ftp-delay-3">
                <a href="<?php echo esc_url($whatsapp_order_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">
                    Order via WhatsApp
                </a>
                <a href="#ftp-menu" class="ftp-btn ftp-btn-secondary">
                    Explore Menu
                </a>
            </div>
        </div>
        <div class="ftp-hero-scroll-indicator">
            <span>Scroll Down</span>
            <div class="ftp-scroll-arrow"></div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Menu section shortcode (preview)
 * Shows category cards with image placeholders, title and description only
 */
function ftp_menu_section_shortcode() {
    $menu_items = ftp_get_menu_items();
    $settings = get_option('ftp_settings', array());
    $category_images = isset($settings['category_images']) ? $settings['category_images'] : array();
    $menu_page_url = ftp_get_menu_page_url();
    ob_start();
    ?>
    <section class="ftp-menu-section ftp-section" id="ftp-menu">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Therapeutic Menu</h2>
                <p class="ftp-section-subtitle">Hygienically prepared fresh fruits crafted into delicious and nutritious creations for your wellness journey</p>
            </div>
            <div class="ftp-menu-grid">
                <?php foreach ($menu_items as $key => $category) : 
                    $image_url = isset($category_images[$key]) && !empty($category_images[$key]) ? $category_images[$key] : '';
                ?>
                <a href="<?php echo esc_url($menu_page_url . '#menu-' . $key); ?>" class="ftp-menu-card ftp-fade-in-up ftp-clickable-link" data-category="<?php echo esc_attr($key); ?>">
                    <div class="ftp-menu-card-image" <?php if ($image_url) : ?>style="background-image: url('<?php echo esc_url($image_url); ?>');"<?php endif; ?>>
                        <?php if (!$image_url) : ?>
                        <div class="ftp-menu-card-placeholder">
                            <span class="ftp-placeholder-icon"><?php echo esc_html($category['icon']); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="ftp-menu-card-overlay"></div>
                    </div>
                    <div class="ftp-menu-card-content">
                        <h3 class="ftp-menu-card-title"><?php echo esc_html($category['title']); ?></h3>
                        <p class="ftp-menu-card-desc"><?php echo esc_html($category['description']); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="ftp-section-cta ftp-fade-in-up">
                <a href="<?php echo esc_url($menu_page_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large">View Full Menu</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Full menu page shortcode
 */
function ftp_menu_full_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/menu-page.php';
    return ob_get_clean();
}

/**
 * Special plans section shortcode (preview) - Original wellness programs
 * Shows wellness plan categories with durations on landing page
 */
function ftp_special_plans_section_shortcode() {
    $plans = ftp_get_special_plans();
    $settings = get_option('ftp_settings', array());
    $plan_images = isset($settings['plan_images']) ? $settings['plan_images'] : array();
    $special_plans_url = ftp_get_special_plans_page_url();
    ob_start();
    ?>
    <section class="ftp-special-plans-section ftp-section" id="ftp-special-plans">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Special Wellness Plans</h2>
                <p class="ftp-section-subtitle">Customized therapeutic fruit plans designed by certified nutritionists to help you achieve your specific health and wellness goals</p>
            </div>
            <div class="ftp-plans-preview">
                <div class="ftp-plans-grid">
                    <?php foreach ($plans as $key => $plan) : 
                        $plan_key = sanitize_title($plan['name']);
                        $image_url = isset($plan_images[$plan_key]) && !empty($plan_images[$plan_key]) ? $plan_images[$plan_key] : '';
                    ?>
                    <a href="<?php echo esc_url($special_plans_url); ?>" class="ftp-plan-card ftp-fade-in-up ftp-clickable-link">
                        <div class="ftp-plan-card-image" <?php if ($image_url) : ?>style="background-image: url('<?php echo esc_url($image_url); ?>');"<?php endif; ?>>
                            <?php if (!$image_url) : ?>
                            <div class="ftp-plan-card-placeholder">
                                <span class="ftp-plan-placeholder-icon"><?php echo esc_html($plan['icon']); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="ftp-plan-title"><?php echo esc_html($plan['name']); ?></h3>
                        <p class="ftp-plan-desc"><?php echo esc_html($plan['description']); ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="ftp-section-cta ftp-fade-in-up">
                <a href="<?php echo esc_url($special_plans_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large">View Special Plans</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Special plan MENU section shortcode (preview) - NEW section
 * Shows weight loss/gain fruit salads and smoothies categories
 */
function ftp_special_plan_menu_section_shortcode() {
    $plan_categories = ftp_get_special_plan_categories();
    $settings = get_option('ftp_settings', array());
    $plan_images = isset($settings['plan_menu_images']) ? $settings['plan_menu_images'] : array();
    $special_plan_menu_url = ftp_get_special_plan_menu_page_url();
    ob_start();
    ?>
    <section class="ftp-special-plan-menu-section ftp-section" id="ftp-special-plan-menu">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Special Plan Menu</h2>
                <p class="ftp-section-subtitle">Therapeutic fruit salads and smoothies designed to help you achieve your specific health and wellness goals</p>
            </div>
            <div class="ftp-plans-preview">
                <div class="ftp-plans-grid">
                    <?php foreach ($plan_categories as $key => $category) : 
                        $plan_key = sanitize_title($category['title']);
                        $image_url = isset($plan_images[$plan_key]) && !empty($plan_images[$plan_key]) ? $plan_images[$plan_key] : '';
                    ?>
                    <a href="<?php echo esc_url($special_plan_menu_url . '#plan-menu-' . $key); ?>" class="ftp-plan-card ftp-fade-in-up ftp-clickable-link">
                        <div class="ftp-plan-card-image" <?php if ($image_url) : ?>style="background-image: url('<?php echo esc_url($image_url); ?>');"<?php endif; ?>>
                            <?php if (!$image_url) : ?>
                            <div class="ftp-plan-card-placeholder">
                                <span class="ftp-plan-placeholder-icon ftp-sparkle-icon"><?php echo esc_html($category['icon']); ?></span>
                            </div>
                            <?php else : ?>
                            <div class="ftp-plan-card-overlay"></div>
                            <?php endif; ?>
                        </div>
                        <h3 class="ftp-plan-title"><?php echo esc_html($category['title']); ?></h3>
                        <p class="ftp-plan-desc"><?php echo esc_html($category['description']); ?></p>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="ftp-section-cta ftp-fade-in-up">
                <a href="<?php echo esc_url($special_plan_menu_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large">View Special Plans Menu</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Full special plans page shortcode
 */
function ftp_special_plans_full_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/special-plans-page.php';
    return ob_get_clean();
}

/**
 * Full special plan menu page shortcode (separate from wellness plans)
 */
function ftp_special_plan_menu_full_shortcode() {
    ob_start();
    include FTP_PLUGIN_DIR . 'templates/special-plan-menu-page.php';
    return ob_get_clean();
}

/**
 * Gift packages shortcode
 */
function ftp_gift_packages_shortcode() {
    $packages = ftp_get_gift_packages();
    ob_start();
    ?>
    <section class="ftp-gift-packages ftp-section" id="ftp-gift-packages">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">120 Gift Packages</h2>
                <p class="ftp-section-subtitle">Gift someone you care about, you don't need a special day to make someone feel special</p>
            </div>
            <div class="ftp-packages-grid">
                <?php foreach ($packages as $package) : 
                    $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I want to make an enquiry about your " . $package['name'] . ".");
                ?>
                <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-package-card ftp-fade-in-up ftp-clickable-link" target="_blank" rel="noopener">
                    <h3 class="ftp-package-title"><?php echo esc_html($package['name']); ?></h3>
                    <ul class="ftp-package-features">
                        <?php foreach ($package['features'] as $feature) : ?>
                        <li><?php echo esc_html($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <span class="ftp-btn ftp-btn-primary">
                        Gift (<?php echo esc_html($package['price']); ?>)
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Wellness events shortcode
 */
function ftp_wellness_events_shortcode() {
    $events = ftp_get_wellness_events();
    ob_start();
    ?>
    <section class="ftp-wellness-events ftp-section" id="ftp-events">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Wellness Events</h2>
                <p class="ftp-section-subtitle">Bring healthy, delicious fruit-based catering to your corporate events, wellness retreats, and special occasions</p>
            </div>
            <div class="ftp-events-grid">
                <?php foreach ($events as $key => $event) : 
                    $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I would like to enquire about your " . $event['title'] . " services for my upcoming event.");
                ?>
                <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-event-card ftp-fade-in-up ftp-clickable-link" target="_blank" rel="noopener">
                    <div class="ftp-event-icon"><?php echo ftp_get_wellness_event_icon($key); ?></div>
                    <h3 class="ftp-event-title"><?php echo esc_html($event['title']); ?></h3>
                    <p class="ftp-event-desc"><?php echo esc_html($event['description']); ?></p>
                    <ul class="ftp-event-services">
                        <?php foreach ($event['services'] as $service) : ?>
                        <li><?php echo esc_html($service); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <span class="ftp-btn ftp-btn-outline">Enquire Now</span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Special offers shortcode
 */
function ftp_special_offers_shortcode() {
    ob_start();
    ?>
    <section class="ftp-special-offers ftp-section" id="ftp-offers">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Special Offers</h2>
                <p class="ftp-section-subtitle">Take advantage of our exclusive promotions and seasonal deals</p>
            </div>
            <div class="ftp-offers-grid">
                <?php $whatsapp_url_1 = ftp_whatsapp_url(ftp_get_order_phone(), "Hello 120! I'm a new customer and would like to claim my 10% first order discount."); ?>
                <a href="<?php echo esc_url($whatsapp_url_1); ?>" class="ftp-offer-card ftp-fade-in-up ftp-clickable-link" target="_blank" rel="noopener">
                    <div class="ftp-offer-badge">NEW</div>
                    <h3 class="ftp-offer-title">First Order Discount</h3>
                    <p class="ftp-offer-desc">Get 10% off your first order when you order via WhatsApp!</p>
                    <span class="ftp-btn ftp-btn-primary">Claim Offer</span>
                </a>
                <?php $whatsapp_url_2 = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in the 30-day wellness plan bundle with free smoothie."); ?>
                <a href="<?php echo esc_url($whatsapp_url_2); ?>" class="ftp-offer-card ftp-fade-in-up ftp-clickable-link" target="_blank" rel="noopener">
                    <div class="ftp-offer-badge">POPULAR</div>
                    <h3 class="ftp-offer-title">Wellness Plan Bundle</h3>
                    <p class="ftp-offer-desc">Subscribe to any 30-day plan and get a free smoothie of your choice!</p>
                    <span class="ftp-btn ftp-btn-primary">Learn More</span>
                </a>
                <?php $whatsapp_url_3 = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in the corporate package deal for my organization."); ?>
                <a href="<?php echo esc_url($whatsapp_url_3); ?>" class="ftp-offer-card ftp-fade-in-up ftp-clickable-link" target="_blank" rel="noopener">
                    <div class="ftp-offer-badge">LIMITED</div>
                    <h3 class="ftp-offer-title">Corporate Package Deal</h3>
                    <p class="ftp-offer-desc">Book corporate wellness catering for 20+ people and receive 15% discount!</p>
                    <span class="ftp-btn ftp-btn-primary">Get Quote</span>
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Mission section shortcode
 */
function ftp_mission_shortcode() {
    ob_start();
    ?>
    <section class="ftp-mission ftp-section" id="ftp-mission">
        <div class="ftp-mission-bg">
            <div class="ftp-floating-fruit ftp-fruit-1">🍎</div>
            <div class="ftp-floating-fruit ftp-fruit-2">🍊</div>
            <div class="ftp-floating-fruit ftp-fruit-3">🍇</div>
            <div class="ftp-floating-fruit ftp-fruit-4">🍓</div>
            <div class="ftp-floating-fruit ftp-fruit-5">🥝</div>
            <div class="ftp-floating-fruit ftp-fruit-6">🍍</div>
        </div>
        <div class="ftp-container">
            <div class="ftp-mission-content ftp-fade-in-up">
                <h2 class="ftp-section-title">Our Mission</h2>
                <p class="ftp-mission-text">
                    At 120 Fruit Therapy Place, we believe that optimal health begins with what we put into our bodies. 
                    Our mission is to make healthy eating accessible, delicious, and therapeutic through the power of 
                    hygienically prepared fresh fruits.
                </p>
                <p class="ftp-mission-text">
                    Our therapeutic wellness plans are designed by certified nutritionists to address specific health goals 
                    including weight management, stress relief, energy enhancement, and overall vitality. We believe that 
                    eating healthy should be a joyful experience that nourishes both body and soul.
                </p>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Statistics counter shortcode
 */
function ftp_stats_shortcode() {
    ob_start();
    ?>
    <section class="ftp-stats ftp-section" id="ftp-stats">
        <div class="ftp-container">
            <div class="ftp-stats-grid">
                <div class="ftp-stat-item ftp-fade-in-up">
                    <div class="ftp-stat-number" data-count="1">0</div>
                    <div class="ftp-stat-suffix">+</div>
                    <div class="ftp-stat-label">Years of Wellness</div>
                </div>
                <div class="ftp-stat-item ftp-fade-in-up">
                    <div class="ftp-stat-number" data-count="500">0</div>
                    <div class="ftp-stat-suffix">+</div>
                    <div class="ftp-stat-label">Happy Customers</div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Contact section shortcode
 */
function ftp_contact_shortcode() {
    $order_phone = ftp_get_order_phone();
    $order_whatsapp_url = ftp_whatsapp_url($order_phone, "Hello 120 Fruit Therapy! I'm interested in placing an order. Please assist me.");
    $support_whatsapp_url = ftp_whatsapp_url("+2349042146929", "Hello 120 Fruit Therapy! I'm interested in learning more about your Special Plans. Please assist me.");
    ob_start();
    ?>
    <section class="ftp-contact ftp-section" id="ftp-contact">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h2 class="ftp-section-title">Start Your Wellness Journey</h2>
                <p class="ftp-section-subtitle">Ready to transform your health? Contact us to learn more about our therapeutic fruit offerings and wellness programs</p>
            </div>
            <div class="ftp-contact-grid">
                <a href="tel:+234<?php echo esc_attr(substr($order_phone, 1)); ?>" class="ftp-contact-card ftp-contact-card-link ftp-fade-in-up">
                    <div class="ftp-contact-icon"><?php echo ftp_get_contact_icon('phone'); ?></div>
                    <h3 class="ftp-contact-title">Orders &amp; Deliveries</h3>
                    <p class="ftp-contact-number"><?php echo esc_html($order_phone); ?></p>
                    <span class="ftp-btn ftp-btn-outline">Call Now</span>
                </a>
                <a href="<?php echo esc_url($support_whatsapp_url); ?>" target="_blank" rel="noopener" class="ftp-contact-card ftp-contact-card-link ftp-fade-in-up">
                    <div class="ftp-contact-icon"><?php echo ftp_get_contact_icon('chat'); ?></div>
                    <h3 class="ftp-contact-title">Special Plan Support</h3>
                    <p class="ftp-contact-number">+234 904 214 6929</p>
                    <span class="ftp-btn ftp-btn-outline">Chat Now</span>
                </a>
                <a href="#ftp-map" class="ftp-contact-card ftp-contact-card-link ftp-fade-in-up">
                    <div class="ftp-contact-icon"><?php echo ftp_get_contact_icon('location'); ?></div>
                    <h3 class="ftp-contact-title">Visit Us</h3>
                    <p class="ftp-contact-address">Come experience our wellness sanctuary</p>
                    <p class="ftp-contact-location">University of Nigeria Nsukka, Marlima Building</p>
                    <span class="ftp-btn ftp-btn-outline">View Map</span>
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Map section shortcode
 */
function ftp_map_shortcode() {
    ob_start();
    ?>
    <section class="ftp-map ftp-section" id="ftp-map">
        <div class="ftp-map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2954548847!2d7.4155387!3d6.8722839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044959e2c2d4c1d%3A0x8c7b3e7c9a1e8f0a!2sUniversity%20of%20Nigeria%2C%20Nsukka!5e0!3m2!1sen!2sng!4v1701435600000!5m2!1sen!2sng"
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="120 Fruit Therapy Place - Marlima Building, University of Nigeria Nsukka">
            </iframe>
        </div>
        <div class="ftp-map-overlay">
            <div class="ftp-map-info">
                <h3>Find Us Here</h3>
                <p><?php echo ftp_get_inline_location_icon(); ?> Marlima Building, University of Nigeria Nsukka, Enugu State, Nigeria</p>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Footer shortcode
 */
function ftp_footer_shortcode() {
    $settings = get_option('ftp_settings', array());
    $instagram_url = isset($settings['instagram_url']) && !empty($settings['instagram_url']) ? $settings['instagram_url'] : '#';
    $tiktok_url = isset($settings['tiktok_url']) && !empty($settings['tiktok_url']) ? $settings['tiktok_url'] : '#';
    $logo_url = isset($settings['logo_url']) ? $settings['logo_url'] : '';
    ob_start();
    ?>
    <footer class="ftp-footer" id="ftp-footer">
        <div class="ftp-container">
            <div class="ftp-footer-grid">
                <div class="ftp-footer-brand">
                    <?php 
                    // Use custom logo if set, otherwise use the default uploaded logo
                    $display_logo_url = !empty($logo_url) ? $logo_url : ftp_get_logo_variant_url('footer');
                    ?>
                    <img src="<?php echo esc_url($display_logo_url); ?>" alt="120 Fruit Therapy" class="ftp-footer-logo-image ftp-logo-animated">
                    <p class="ftp-footer-tagline">Health &amp; Wellness Through Fresh Fruits</p>
                </div>
                <div class="ftp-footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(ftp_get_menu_page_url()); ?>">Menu</a></li>
                        <li><a href="<?php echo esc_url(ftp_get_special_plans_page_url()); ?>">Special Plans</a></li>
                        <li><a href="#ftp-gift-packages">Gift Packages</a></li>
                    </ul>
                </div>
                <div class="ftp-footer-contact">
                    <h4>Contact</h4>
                    <p>Orders: <?php echo esc_html(ftp_get_order_phone()); ?></p>
                    <p>Support: <?php echo esc_html(ftp_get_support_phone()); ?></p>
                    <p>Marlima Building, UNN, Nsukka</p>
                </div>
                <div class="ftp-footer-social">
                    <h4>Follow Us</h4>
                    <div class="ftp-social-links">
                        <a href="<?php echo esc_url($instagram_url); ?>" class="ftp-social-link ftp-instagram" aria-label="Instagram" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="<?php echo esc_url($tiktok_url); ?>" class="ftp-social-link ftp-tiktok" aria-label="TikTok" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="ftp-footer-bottom">
                <p>&copy; <?php echo esc_html(date('Y')); ?> 120 Fruit Therapy Place. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Floating Support Button - Links to Menu Page -->
    <div class="ftp-floating-support" id="ftp-floating-support">
        <a href="<?php echo esc_url(ftp_get_menu_page_url()); ?>" class="ftp-support-popup-link">Place Order</a>
        <a href="<?php echo esc_url(ftp_get_menu_page_url()); ?>" class="ftp-support-btn">
            <span class="ftp-support-icon"><?php echo ftp_get_inline_chat_icon(); ?></span>
        </a>
    </div>
    <?php
    return ob_get_clean();
}