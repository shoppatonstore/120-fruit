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
$settings = get_option('ftp_settings', array());
$menu_item_images = isset($settings['menu_item_images']) ? $settings['menu_item_images'] : array();
?>

<div class="ftp-wrapper">
    <?php echo do_shortcode('[ftp_header]'); ?>
    
    <section class="ftp-menu-full ftp-section" id="ftp-menu-full">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h1 class="ftp-section-title">Our Full Menu</h1>
                <p class="ftp-section-subtitle">Hygienically prepared fresh fruits crafted into delicious and nutritious creations for your wellness journey. Order directly via WhatsApp for quick delivery!</p>
                <p class="ftp-prep-time-notice">⏱️ Average preparation time: <strong>5-10 minutes</strong></p>
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
                    <?php foreach ($category['items'] as $index => $item) : 
                        $item_key = sanitize_title($key . '-' . $item['name']);
                        $image_url = isset($menu_item_images[$item_key]) && !empty($menu_item_images[$item_key]) ? $menu_item_images[$item_key] : '';
                    ?>
                    <div class="ftp-menu-item-card ftp-fade-in-up">
                        <!-- Image Placeholder -->
                        <div class="ftp-menu-item-image" data-item-key="<?php echo esc_attr($item_key); ?>">
                            <?php if (!empty($image_url)) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item['name']); ?>" loading="lazy">
                            <?php else : ?>
                            <div class="ftp-menu-item-placeholder">
                                <span class="ftp-item-placeholder-icon"><?php echo esc_html($category['icon']); ?></span>
                                <span class="ftp-item-placeholder-text">Image Coming Soon</span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="ftp-menu-item-content">
                            <div class="ftp-menu-item-header">
                                <h3 class="ftp-menu-item-name"><?php echo esc_html($item['name']); ?></h3>
                                <span class="ftp-menu-item-price"><?php echo esc_html($item['price']); ?></span>
                            </div>
                            <p class="ftp-menu-item-desc"><?php echo esc_html($item['description']); ?></p>
                            <div class="ftp-menu-item-order">
                                <button type="button" class="ftp-btn ftp-btn-primary ftp-order-btn" 
                                    data-product-name="<?php echo esc_attr($item['name']); ?>"
                                    data-product-price="<?php echo esc_attr($item['price']); ?>"
                                    data-product-contents="<?php echo esc_attr($item['description']); ?>"
                                    data-phone="<?php echo esc_attr(ftp_get_order_phone()); ?>">
                                    Order Now
                                </button>
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
    
    <!-- Order Type Modal -->
    <div class="ftp-order-modal" id="ftp-order-modal">
        <div class="ftp-order-modal-overlay"></div>
        <div class="ftp-order-modal-content">
            <button class="ftp-order-modal-close">&times;</button>
            <h3 class="ftp-order-modal-title">How would you like your order?</h3>
            <p class="ftp-order-modal-product"></p>
            <div class="ftp-order-modal-options">
                <button class="ftp-order-option ftp-order-delivery" data-type="delivery">
                    <span class="ftp-order-option-icon">🚗</span>
                    <span class="ftp-order-option-text">Delivery</span>
                    <span class="ftp-order-option-desc">We'll deliver to your location</span>
                </button>
                <button class="ftp-order-option ftp-order-dinein" data-type="dinein">
                    <span class="ftp-order-option-icon">🍽️</span>
                    <span class="ftp-order-option-text">Dine In</span>
                    <span class="ftp-order-option-desc">Eat at our restaurant</span>
                </button>
            </div>
            <p class="ftp-order-modal-prep-time">⏱️ Average preparation time: <strong>5-10 minutes</strong></p>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <a href="#" class="ftp-menu-back-top" title="Back to top">⬆</a>
    
    <?php echo do_shortcode('[ftp_footer]'); ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Order modal functionality
    var modal = document.getElementById('ftp-order-modal');
    var orderButtons = document.querySelectorAll('.ftp-order-btn');
    var closeBtn = modal ? modal.querySelector('.ftp-order-modal-close') : null;
    var overlay = modal ? modal.querySelector('.ftp-order-modal-overlay') : null;
    var deliveryBtn = modal ? modal.querySelector('.ftp-order-delivery') : null;
    var dineinBtn = modal ? modal.querySelector('.ftp-order-dinein') : null;
    var productDisplay = modal ? modal.querySelector('.ftp-order-modal-product') : null;
    
    var currentProduct = {};
    
    // Open modal when order button is clicked
    if (orderButtons && orderButtons.length > 0) {
        orderButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                currentProduct = {
                    name: this.getAttribute('data-product-name'),
                    price: this.getAttribute('data-product-price'),
                    contents: this.getAttribute('data-product-contents'),
                    phone: this.getAttribute('data-phone')
                };
                
                if (productDisplay) {
                    productDisplay.innerHTML = '<strong>' + currentProduct.name + '</strong> - ' + currentProduct.price;
                }
                
                if (modal) {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });
    }
    
    // Close modal
    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (overlay) overlay.addEventListener('click', closeModal);
    
    // Handle order type selection
    function handleOrderType(type) {
        var orderType = type === 'delivery' ? 'for DELIVERY' : 'for DINE-IN at the restaurant';
        var message = 'Hello 120! I would like to order:\n\n' +
            '📦 Product: ' + currentProduct.name + '\n' +
            '💰 Price: ' + currentProduct.price + '\n' +
            '📝 Contents: ' + currentProduct.contents + '\n' +
            '🍽️ Order Type: ' + orderType + '\n\n' +
            '⏱️ I understand preparation takes 5-10 minutes.\n\n' +
            'Please confirm my order. Thank you!';
        
        var phone = currentProduct.phone ? currentProduct.phone.replace(/[^0-9]/g, '') : '';
        if (phone.startsWith('0')) {
            phone = '234' + phone.substring(1);
        }
        
        var whatsappUrl = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(message);
        window.open(whatsappUrl, '_blank');
        closeModal();
    }
    
    if (deliveryBtn) deliveryBtn.addEventListener('click', function() { handleOrderType('delivery'); });
    if (dineinBtn) dineinBtn.addEventListener('click', function() { handleOrderType('dinein'); });
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
});
</script>