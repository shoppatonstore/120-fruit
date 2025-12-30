<?php
/**
 * Special Plans Page Template
 * Use shortcode: [ftp_special_plans_full]
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$plans = ftp_get_special_plans();
?>

<div class="ftp-wrapper">
    <?php echo do_shortcode('[ftp_header]'); ?>
    
    <section class="ftp-plans-full ftp-section" id="ftp-plans-full">
        <div class="ftp-container">
            <div class="ftp-section-header ftp-fade-in-up">
                <h1 class="ftp-section-title">Special Wellness Plans</h1>
                <p class="ftp-section-subtitle">Customized therapeutic fruit plans designed by certified nutritionists to help you achieve your specific health and wellness goals. Each plan includes carefully curated fruit combinations delivered fresh to your doorstep.</p>
            </div>
            
            <!-- All Plans -->
            <?php foreach ($plans as $plan) : ?>
            <div class="ftp-plan-detail-card ftp-fade-in-up">
                <div class="ftp-plan-detail-header">
                    <div class="ftp-plan-detail-info">
                        <h2 class="ftp-plan-detail-title"><?php echo esc_html($plan['name']); ?> Plan</h2>
                        <p class="ftp-plan-detail-desc"><?php echo esc_html($plan['description']); ?></p>
                    </div>
                </div>
                
                <div class="ftp-plan-options">
                    <?php foreach ($plan['plans'] as $option) : ?>
                    <div class="ftp-plan-option">
                        <div class="ftp-plan-option-duration"><?php echo esc_html($option['duration']); ?></div>
                        <div class="ftp-plan-option-price"><?php echo esc_html($option['price']); ?></div>
                        <?php 
                        $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in your " . $plan['name'] . " wellness plan (" . $option['duration'] . " - " . $option['price'] . "). Please provide more details.");
                        ?>
                        <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary" target="_blank" rel="noopener">
                            Get Started
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="ftp-plan-benefits">
                    <h4 class="ftp-plan-benefits-title">What's Included:</h4>
                    <ul class="ftp-plan-benefits-list">
                        <li>Fresh daily fruit deliveries</li>
                        <li>Nutritionist consultation</li>
                        <li>Personalized meal schedule</li>
                        <li>Progress tracking support</li>
                        <li>Recipe variations</li>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
            
            <!-- Testimonials Section -->
            <div class="ftp-plans-testimonials">
                <h3>What Our Customers Say</h3>
                <div class="ftp-testimonials-grid">
                    <div class="ftp-testimonial-card ftp-fade-in-up">
                        <p class="ftp-testimonial-text">"The weight loss plan helped me lose 5kg in just 30 days! The fruits were always fresh and the support was amazing."</p>
                        <p class="ftp-testimonial-name">Chioma A.</p>
                        <p class="ftp-testimonial-plan">Weight Loss Plan</p>
                    </div>
                    <div class="ftp-testimonial-card ftp-fade-in-up">
                        <p class="ftp-testimonial-text">"My energy levels have improved significantly since starting the Energy Boost plan. I feel more active throughout the day!"</p>
                        <p class="ftp-testimonial-name">Emeka O.</p>
                        <p class="ftp-testimonial-plan">Energy Boost Plan</p>
                    </div>
                    <div class="ftp-testimonial-card ftp-fade-in-up">
                        <p class="ftp-testimonial-text">"The Clear Skin plan worked wonders for my complexion. My skin is glowing and I've received so many compliments!"</p>
                        <p class="ftp-testimonial-name">Adaeze N.</p>
                        <p class="ftp-testimonial-plan">Clear Skin + Glow Plan</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Section -->
            <div class="ftp-plans-faq">
                <h3>Frequently Asked Questions</h3>
                
                <div class="ftp-faq-item">
                    <div class="ftp-faq-question">
                        <span>How does the delivery work?</span>
                        <span class="ftp-faq-toggle">+</span>
                    </div>
                    <div class="ftp-faq-answer">
                        We deliver fresh fruits daily to your specified location within Nsukka and surrounding areas. Delivery times are between 9am-8pm to ensure freshness.
                    </div>
                </div>
                
                <div class="ftp-faq-item">
                    <div class="ftp-faq-question">
                        <span>Can I customize my plan?</span>
                        <span class="ftp-faq-toggle">+</span>
                    </div>
                    <div class="ftp-faq-answer">
                        Yes! Our nutritionists can customize your plan based on your preferences, allergies, and specific health goals. Contact us via WhatsApp to discuss your needs.
                    </div>
                </div>
                
                <div class="ftp-faq-item">
                    <div class="ftp-faq-question">
                        <span>What if I need to pause my plan?</span>
                        <span class="ftp-faq-toggle">+</span>
                    </div>
                    <div class="ftp-faq-answer">
                        You can pause your plan for up to 7 days at any time. Simply contact our support team 24 hours before your next delivery.
                    </div>
                </div>
                
                <div class="ftp-faq-item">
                    <div class="ftp-faq-question">
                        <span>Are the fruits organic?</span>
                        <span class="ftp-faq-toggle">+</span>
                    </div>
                    <div class="ftp-faq-answer">
                        We source the freshest, highest-quality fruits available. While not all are certified organic, we prioritize locally-grown, naturally-cultivated produce.
                    </div>
                </div>
                
                <div class="ftp-faq-item">
                    <div class="ftp-faq-question">
                        <span>How do I pay for my plan?</span>
                        <span class="ftp-faq-toggle">+</span>
                    </div>
                    <div class="ftp-faq-answer">
                        We accept bank transfers, card and cash payments. Payment is required before or at the start of your plan period.
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="ftp-section-cta ftp-fade-in-up" style="margin-top: 60px;">
                <h3 style="color: var(--ftp-white); margin-bottom: 20px;">Ready to Start Your Wellness Journey?</h3>
                <p style="color: var(--ftp-text-muted); margin-bottom: 30px;">Contact our team today to get personalized recommendations and start your transformation!</p>
                <?php $whatsapp_url = ftp_whatsapp_url(ftp_get_support_phone(), "Hello 120! I'm interested in starting a wellness plan. Please help me choose the right one for my goals."); ?>
                <a href="<?php echo esc_url($whatsapp_url); ?>" class="ftp-btn ftp-btn-primary ftp-btn-large" target="_blank" rel="noopener">
                    💬 Chat With Our Nutritionist
                </a>
            </div>
        </div>
    </section>
    
    <?php echo do_shortcode('[ftp_footer]'); ?>
</div>