<?php
/**
 * Helper functions for 120 Fruit Therapy Plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get the logo URL
 * Uses settings if available, otherwise falls back to default
 * 
 * @return string Logo URL
 */
function ftp_get_logo_url() {
    // Check if we have a setting for logo
    $settings = get_option('ftp_settings', array());
    if (!empty($settings['logo_url'])) {
        return $settings['logo_url'];
    }
    
    // Default logo path - assets are in repository root alongside plugin folder
    $logo_url = FTP_PLUGIN_URL . '../Navy and Pink Modern Online Store Logo.webp';
    
    // Allow the URL to be filtered for custom installations
    return apply_filters('ftp_logo_url', $logo_url);
}

/**
 * Get the hero video URL
 * 
 * @return string Video URL
 */
function ftp_get_hero_video_url() {
    // Check if we have a setting for video
    $settings = get_option('ftp_settings', array());
    if (!empty($settings['hero_video_url'])) {
        return $settings['hero_video_url'];
    }
    
    // Default video path - assets are in repository root alongside plugin folder
    $video_url = FTP_PLUGIN_URL . '../motion2Fast_Realistic_video_a_rich_parfait_spilling_from_a_cur_0.mp4';
    
    // Allow the URL to be filtered for custom installations
    return apply_filters('ftp_hero_video_url', $video_url);
}

/**
 * Get the menu page URL for floating button
 * 
 * @return string Menu page URL
 */
function ftp_get_menu_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['menu_page_url']) ? $settings['menu_page_url'] : '#ftp-menu-full';
}

/**
 * Get the special plans page URL
 * 
 * @return string Special plans page URL
 */
function ftp_get_special_plans_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['special_plans_page_url']) ? $settings['special_plans_page_url'] : '#ftp-special-plans';
}

/**
 * Get the special plan menu page URL
 * 
 * @return string Special plan menu page URL
 */
function ftp_get_special_plan_menu_page_url() {
    $settings = get_option('ftp_settings', array());
    return !empty($settings['special_plan_menu_page_url']) ? $settings['special_plan_menu_page_url'] : '#ftp-special-plan-menu';
}

/**
 * Get menu items data
 * Updated with actual menu items from 120 Fruit Therapy Place
 */
function ftp_get_menu_items() {
    return array(
        'fruit_salads' => array(
            'title' => 'Fruit Salads',
            'icon' => '🥗',
            'description' => 'Fresh seasonal fruits, carefully selected and hygienically prepared with natural dressings and superfoods',
            'items' => array(
                array('name' => 'Throne Feast Fruit Salad', 'price' => '₦11,000', 'description' => 'Greek Yoghurt, Strawberry, Blueberry, Granola, Almond, Banana, Grapes, Coconut, Peanuts, Cashew Nuts, Honey, Pumpkin Seed, Raisin, Apple (1000ml)'),
                array('name' => 'Premium Fruit Salad', 'price' => '₦9,000', 'description' => 'Strawberry, Blueberry, Granola, Almond, Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Grapes, Coconut, Groundnuts, Peanuts, Cashew Nuts, Honey, Evaporated Milk, Condensed Milk, Milk Powder (1000ml)'),
                array('name' => 'Mini Premium Fruit Salad', 'price' => '₦5,500', 'description' => 'Strawberry, Blueberry, Granola, Almond, Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Grapes, Coconut, Groundnuts, Peanuts, Cashew Nuts, Honey, Evaporated Milk, Condensed Milk, Milk Powder (750ml)'),
                array('name' => 'Standard Fruit Salad', 'price' => '₦7,000', 'description' => 'Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Apple, Grape, Coconut, Groundnut, Peanuts, Cashew nuts, Honey, Condensed Milk, Milk Powder (1000ml)'),
                array('name' => 'Mini Standard Fruit Salad', 'price' => '₦4,500', 'description' => 'Dates, Banana, Watermelon, Cucumber, Pawpaw, Pineapple, Apple, Grape, Coconut, Groundnut, Peanuts, Cashew nuts, Honey, Condensed Milk, Milk Powder (750ml)'),
                array('name' => 'Watermelon Salad', 'price' => '₦3,500', 'description' => 'Watermelon, Milk, Granola (750ml)'),
            )
        ),
        'parfaits' => array(
            'title' => 'Parfaits',
            'icon' => '🍨',
            'description' => 'Layered parfaits with fresh fruits, granola, and creamy Greek yogurt',
            'items' => array(
                array('name' => 'Premium Parfait', 'price' => '₦8,500', 'description' => 'Greek Yoghurt, Blueberry, Granola, Chocolate, Strawberry, Cashew Nuts, Coconuts, Grapes, Banana, Raisin, Almond, Groundnuts, Sprinkles'),
                array('name' => 'Standard Parfait', 'price' => '₦7,000', 'description' => 'Greek Yoghurt, Granola, Chocolate, Cashew Nuts, Coconuts, Grape, Banana, Raisin, Groundnut (550ml)'),
                array('name' => 'Mini Standard Parfait', 'price' => '₦4,000', 'description' => 'Greek Yoghurt, Granola, Cashew Nuts, Coconuts, Grape, Groundnut (300ml)'),
                array('name' => 'Nut Parfait', 'price' => '₦6,500', 'description' => 'Greek Yoghurt, Cashew Nuts, Coconut, Groundnut, Peanut, Almond (550ml)'),
                array('name' => 'Cake Parfait', 'price' => '₦7,500', 'description' => 'Greek Yoghurt, Banana Chocolate Cake, Red Velvet Cake (550ml)'),
                array('name' => 'Fruit Parfait', 'price' => '₦4,000', 'description' => 'Greek Yoghurt, Granola, Banana, Grape, Apple, Groundnut (300ml)'),
            )
        ),
        'tigernut_drinks' => array(
            'title' => 'Tiger Nut Milk',
            'icon' => '🥜',
            'description' => 'Traditional Nigerian tigernut drinks - Lactose and Sugar Free',
            'items' => array(
                array('name' => 'Tiger Nut Milk', 'price' => '₦3,000', 'description' => 'Tiger Nut, Almond, Coconut, Date - Lactose and Sugar Free (500ml)'),
            )
        ),
        'milkshakes' => array(
            'title' => 'Milkshakes',
            'icon' => '🥛',
            'description' => 'Creamy milkshakes made with Greek yogurt and premium ingredients',
            'items' => array(
                array('name' => 'Standard Milk Shake', 'price' => '₦6,500', 'description' => 'Greek Yoghurt, Milk, Whipped cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
                array('name' => 'Mini Standard Milk Shake', 'price' => '₦3,500', 'description' => 'Greek Yoghurt, Milk, Sprinkles, Raisin (300ml)'),
                array('name' => 'Chocolate Milk Shake', 'price' => '₦7,000', 'description' => 'Chocolate, Greek Yoghurt, Milk, Whipped Cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
                array('name' => 'Strawberry Milk Shake', 'price' => '₦7,500', 'description' => 'Strawberry, Greek Yoghurt, Milk, Whipped Cream, Sprinkles, Cherry, Raisin, Dates (550ml)'),
            )
        ),
        'fruit_juices' => array(
            'title' => 'Fresh Juices (Cold Pressed)',
            'icon' => '🧃',
            'description' => 'Freshly cold pressed fruit juices with no added sugar',
            'items' => array(
                array('name' => 'Watermelon Fruit Juice', 'price' => '₦3,500', 'description' => 'Watermelon, Lemon - Cold Pressed (500ml)'),
                array('name' => 'Tropical Blend Fruit Juice', 'price' => '₦4,500', 'description' => 'Watermelon, Pineapple, Orange - Cold Pressed (500ml)'),
                array('name' => 'Pine-Ginger Blast Fruit Juice', 'price' => '₦4,500', 'description' => 'Pineapple, Ginger - Cold Pressed (500ml)'),
            )
        ),
        'mocktails' => array(
            'title' => 'Mocktails',
            'icon' => '🍹',
            'description' => 'Refreshing fruit-based mocktails with natural ingredients',
            'items' => array(
                array('name' => 'Mocktail', 'price' => '₦2,500', 'description' => 'Watermelon, Orange, Lemon (500ml)'),
            )
        ),
        'fruit_cakes' => array(
            'title' => 'Fruit Cake',
            'icon' => '🍰',
            'description' => 'Healthy fruit cakes - Margarine, Butter and Sugar Free',
            'items' => array(
                array('name' => 'Fruit Cake', 'price' => '₦5,000', 'description' => 'Banana, Chocolate, Egg, Peanut butter, Oatmeal, Raisin, Cocoa, Cinnamon, Coconut, Cashew Nut, Honey - Margarine, Butter and Sugar Free'),
            )
        ),
        'frappuccinos' => array(
            'title' => 'Frappuccinos',
            'icon' => '☕',
            'description' => 'Creamy blended coffee drinks with premium ingredients',
            'items' => array(
                array('name' => 'Frappuccino', 'price' => '₦6,000', 'description' => 'Milk, Caramel, Coffee, Whipped cream (500ml)'),
                array('name' => 'Chocolate Frappuccino', 'price' => '₦6,500', 'description' => 'Chocolate, Milk, Caramel, Coffee, Whipped cream (500ml)'),
            )
        ),
        'slushies' => array(
            'title' => 'Slushies',
            'icon' => '🧊',
            'description' => 'Refreshing frozen fruit slushies',
            'items' => array(
                array('name' => 'Slushie Watermelon', 'price' => '₦2,500', 'description' => 'Watermelon, Lime, Honey (500ml)'),
                array('name' => 'Slushie Pineapple', 'price' => '₦3,500', 'description' => 'Pineapple, Milk, Honey (500ml)'),
            )
        ),
        'smoothies' => array(
            'title' => 'Smoothies',
            'icon' => '🥤',
            'description' => 'Nutrient-packed smoothies with fresh fruits and natural supplements',
            'items' => array(
                array('name' => 'Premium Smoothie', 'price' => '₦6,500', 'description' => 'Yoghurt, Strawberry, Milk, Granola, Honey, Banana, Cashew Nuts, Groundnuts (500ml)'),
                array('name' => 'Standard Smoothie', 'price' => '₦4,000', 'description' => 'Milk, Watermelon, Honey, Banana, Groundnuts'),
                array('name' => 'Golden Cream Blend', 'price' => '₦2,500', 'description' => 'Banana, Milk (500ml)'),
            )
        ),
    );
}

/**
 * Get special plan menu categories data for landing page preview
 * Categories: Weight Loss, Weight Gain, Libido, Weight Maintenance
 */
function ftp_get_special_plan_categories() {
    return array(
        'weight_loss' => array(
            'title' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit salads and smoothies designed to boost metabolism and support healthy weight loss'
        ),
        'weight_gain' => array(
            'title' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit combinations with healthy calories to support muscle growth and healthy weight gain'
        ),
        'libido' => array(
            'title' => 'Libido Boost',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac smoothies to enhance vitality and intimate wellness'
        ),
        'weight_maintenance' => array(
            'title' => 'Weight Maintenance',
            'icon' => '⚖️',
            'description' => 'Balanced fruit salads and smoothies to help maintain your ideal weight naturally'
        ),
        'clear_skin' => array(
            'title' => 'Clear Skin',
            'icon' => '✨',
            'description' => 'Antioxidant-rich smoothies designed to promote healthy, glowing skin from within'
        ),
        'stress_relief' => array(
            'title' => 'Stress Relief',
            'icon' => '😌',
            'description' => 'Calming smoothies with natural adaptogens to help reduce stress and promote relaxation'
        ),
        'energy_boost' => array(
            'title' => 'Energy Boost',
            'icon' => '⚡',
            'description' => 'Energizing smoothies packed with natural ingredients to increase vitality and stamina'
        ),
        'focus' => array(
            'title' => 'Focus',
            'icon' => '🎯',
            'description' => 'Brain-boosting smoothies to enhance mental clarity and concentration'
        ),
        'detoxification' => array(
            'title' => 'Detoxification',
            'icon' => '🌿',
            'description' => 'Cleansing smoothies with powerful detoxifying ingredients to purify and rejuvenate'
        ),
    );
}

/**
 * Get special plan menu items data
 * Updated with actual items from user-provided menu
 */
function ftp_get_special_plan_menu_items() {
    return array(
        'weight_loss' => array(
            'title' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully crafted fruit salads and smoothies designed to boost metabolism and support healthy weight loss',
            'items' => array(
                array('name' => 'Weight Loss Fruit Salad', 'price' => '₦6,500', 'description' => 'Blueberry, Apple, Cucumber, Pawpaw, Pineapple, Watermelon, Lemon, Chia Seed, Almond, Cashew Nuts, Groundnuts (1000ml)'),
                array('name' => 'Weight Loss Smoothie', 'price' => '₦4,500', 'description' => 'Pineapple, Ginger, Apples, Cucumber, Lemon, Chia seed (475ml)'),
            )
        ),
        'weight_gain' => array(
            'title' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense fruit combinations with healthy calories to support muscle growth and healthy weight gain',
            'items' => array(
                array('name' => 'Weight Gain Fruit Salad', 'price' => '₦9,500', 'description' => 'Grapes, Raisin, Dates, Egg, Banana, Coconuts, Pumpkin Seeds, Cashew Nuts, Peanuts, Condensed Milk, Evaporated Milk, Milk Powder, Honey (1000ml)'),
                array('name' => 'Weight Gain Smoothie (Premium)', 'price' => '₦8,500', 'description' => 'Peanut Butter, Banana, Oats, Whey Protein Powder, Sunflower Seed, Dates, Milk (475ml)'),
                array('name' => 'Weight Gain Smoothie (Standard)', 'price' => '₦6,000', 'description' => 'Banana, Oats, Greek Yoghurt, Sunflower Seed, Dates, Milk (475ml)'),
            )
        ),
        'libido' => array(
            'title' => 'Libido Boost',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac smoothies to enhance vitality and intimate wellness',
            'items' => array(
                array('name' => 'Libido Boost', 'price' => '₦6,500', 'description' => 'Maca, Tigernut, Dates, Almond, Coconuts, Watermelon, Banana, Sunflower Seed, Honey, Cinnamon (475ml)'),
            )
        ),
        'weight_maintenance' => array(
            'title' => 'Weight Maintenance',
            'icon' => '⚖️',
            'description' => 'Balanced fruit salads and smoothies to help maintain your ideal weight naturally',
            'items' => array(
                array('name' => 'Weight Maintenance Fruit Salad', 'price' => '₦8,000', 'description' => 'Apple, Pineapple, Watermelon, Cucumber, Grapes, Greek Yogurt, Almonds, Flax seeds, Honey (1000ml)'),
                array('name' => 'Weight Maintenance Smoothie', 'price' => '₦6,500', 'description' => 'Apple, Banana, Pineapple, Oat, Greek Yoghurt, Flax seed, Honey (475ml)'),
            )
        ),
        'clear_skin' => array(
            'title' => 'Clear Skin',
            'icon' => '✨',
            'description' => 'Antioxidant-rich smoothies designed to promote healthy, glowing skin from within',
            'items' => array(
                array('name' => 'Clear Skin Smoothie', 'price' => '₦6,500', 'description' => 'Pineapple, Pawpaw, Cucumber, Lemon, Goji Berry, Pomegranate, Butterfly Blue Pea (475ml)'),
            )
        ),
        'stress_relief' => array(
            'title' => 'Stress Relief',
            'icon' => '😌',
            'description' => 'Calming smoothies with natural adaptogens to help reduce stress and promote relaxation',
            'items' => array(
                array('name' => 'Stress Relief Smoothie', 'price' => '₦5,500', 'description' => 'Pineapple, Pawpaw, Cucumber, Lemon, Goji Berry, Pomegranate, Butterfly Blue Pea (475ml)'),
            )
        ),
        'energy_boost' => array(
            'title' => 'Energy Boost',
            'icon' => '⚡',
            'description' => 'Energizing smoothies packed with natural ingredients to increase vitality and stamina',
            'items' => array(
                array('name' => 'Energy Boost Smoothie', 'price' => '₦6,000', 'description' => 'Banana, Pineapple, Orange, Rhodiola, Matcha Green, Shilajit (475ml)'),
            )
        ),
        'focus' => array(
            'title' => 'Focus',
            'icon' => '🎯',
            'description' => 'Brain-boosting smoothies to enhance mental clarity and concentration',
            'items' => array(
                array('name' => 'Focus Smoothie', 'price' => '₦4,000', 'description' => 'Banana, Blueberries, Butterfly Pea, Pomegranate, Pumpkin Seeds (475ml)'),
            )
        ),
        'detoxification' => array(
            'title' => 'Detoxification',
            'icon' => '🌿',
            'description' => 'Cleansing smoothies with powerful detoxifying ingredients to purify and rejuvenate',
            'items' => array(
                array('name' => 'Detoxification Smoothie', 'price' => '₦5,500', 'description' => 'Pineapple, Cucumber, Pawpaw, Matcha Green, Barley Grass, Chia Seed, Honey (475ml)'),
            )
        ),
    );
}

/**
 * Get special wellness plans data (for subscription plans with durations)
 * Original wellness programs with duration and pricing
 */
function ftp_get_special_plans() {
    return array(
        'weight_loss' => array(
            'name' => 'Weight Loss',
            'icon' => '🍎',
            'description' => 'Carefully curated low-calorie, high-fiber fruit combinations to boost metabolism and support healthy weight loss.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦30,000'),
                array('duration' => '2 Weeks', 'price' => '₦50,000'),
                array('duration' => '1 Month', 'price' => '₦95,000'),
            )
        ),
        'weight_gain' => array(
            'name' => 'Weight Gain',
            'icon' => '💪',
            'description' => 'Nutrient-dense, calorie-rich fruit combinations with healthy fats to support muscle growth and healthy weight gain.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦35,000'),
                array('duration' => '2 Weeks', 'price' => '₦60,000'),
                array('duration' => '1 Month', 'price' => '₦110,000'),
            )
        ),
        'weight_maintenance' => array(
            'name' => 'Weight Maintenance',
            'icon' => '⚖️',
            'description' => 'Balanced fruit salads and smoothies to help maintain your ideal weight naturally.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦30,000'),
                array('duration' => '2 Weeks', 'price' => '₦55,000'),
                array('duration' => '1 Month', 'price' => '₦105,000'),
            )
        ),
        'libido' => array(
            'name' => 'Libido Boost',
            'icon' => '❤️',
            'description' => 'Natural aphrodisiac fruits to enhance vitality and intimate wellness.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦45,000'),
                array('duration' => '2 Weeks', 'price' => '₦80,000'),
                array('duration' => '1 Month', 'price' => '₦150,000'),
            )
        ),
        'clear_skin' => array(
            'name' => 'Clear Skin',
            'icon' => '✨',
            'description' => 'Antioxidant-rich fruits packed with vitamins A, C, and E to promote radiant, healthy skin from within.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦45,000'),
                array('duration' => '2 Weeks', 'price' => '₦85,000'),
                array('duration' => '1 Month', 'price' => '₦160,000'),
            )
        ),
        'stress_relief' => array(
            'name' => 'Stress Relief',
            'icon' => '😌',
            'description' => 'Calming fruits rich in magnesium and potassium to help manage stress and promote relaxation.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦30,000'),
                array('duration' => '2 Weeks', 'price' => '₦55,000'),
                array('duration' => '1 Month', 'price' => '₦105,000'),
            )
        ),
        'energy_boost' => array(
            'name' => 'Energy Boost',
            'icon' => '⚡',
            'description' => 'High-energy fruits with natural sugars and B-vitamins to keep you energized throughout the day.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦35,000'),
                array('duration' => '2 Weeks', 'price' => '₦60,000'),
                array('duration' => '1 Month', 'price' => '₦110,000'),
            )
        ),
        'focus' => array(
            'name' => 'Focus',
            'icon' => '🎯',
            'description' => 'Brain-boosting fruits with omega fatty acids and antioxidants to enhance concentration and mental clarity.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦25,000'),
                array('duration' => '2 Weeks', 'price' => '₦45,000'),
                array('duration' => '1 Month', 'price' => '₦80,000'),
            )
        ),
        'detoxification' => array(
            'name' => 'Detoxification',
            'icon' => '🌿',
            'description' => 'Cleansing fruits to support liver function and help eliminate toxins from your body.',
            'plans' => array(
                array('duration' => '1 Week', 'price' => '₦45,000'),
                array('duration' => '2 Weeks', 'price' => '₦45,000'),
                array('duration' => '1 Month', 'price' => '₦45,000'),
            )
        ),
    );
}

/**
 * Get gift packages data
 */
function ftp_get_gift_packages() {
    return array(
        array(
            'name' => 'Classic Package',
            'price' => '₦30,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Crystal Package',
            'price' => '₦50,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '4 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Silver Package',
            'price' => '₦90,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '8 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Gold Package',
            'price' => '₦120,000',
            'features' => array(
                '4 Exclusive Meals',
                '3 Premium Meals',
                '8 Special Plan Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Platinum Package',
            'price' => '₦160,000',
            'features' => array(
                '7 Exclusive Meals',
                '4 Premium Meals',
                '8 Special Plan Meals',
                '1 Special Request Meal',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
        array(
            'name' => 'Diamond Package',
            'price' => '₦200,000',
            'features' => array(
                '2 Exclusive Meals',
                '2 Premium Meals',
                '8 Special Plan Meals',
                '2 Special Request Meals',
                'Free Deliveries',
                'Crafted Care/Love Notes',
                'Customized Care/Love Items'
            )
        ),
    );
}

/**
 * Get wellness events data
 */
function ftp_get_wellness_events() {
    return array(
        'corporate' => array(
            'title' => 'Corporate Wellness',
            'icon' => '🏢',
            'description' => 'Bring healthy, delicious fruit-based catering to your workplace.',
            'services' => array(
                'Team wellness sessions',
                'Office fruit delivery subscriptions',
                'Wellness workshops',
                'Corporate health programs',
                'Meeting refreshments'
            )
        ),
        'special' => array(
            'title' => 'Special Events',
            'icon' => '🎉',
            'description' => 'Make your special occasions healthier and more memorable.',
            'services' => array(
                'Weddings',
                'Birthday parties',
                'Baby showers',
                'Corporate retreats',
                'Anniversary celebrations'
            )
        ),
    );
}

/**
 * Generate WhatsApp URL
 */
function ftp_whatsapp_url($phone, $message) {
    // Convert Nigerian numbers to international format
    $phone = preg_replace('/^0/', '234', $phone);
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $encoded_message = rawurlencode($message);
    return "https://wa.me/{$phone}?text={$encoded_message}";
}

/**
 * Get order WhatsApp number
 */
function ftp_get_order_phone() {
    return '07075887085';
}

/**
 * Get support WhatsApp number
 */
function ftp_get_support_phone() {
    return '09042146929';
}

/**
 * Escape and sanitize output
 */
function ftp_esc($text) {
    return esc_html($text);
}

/**
 * Get the sparkling gold straw SVG
 * Reusable SVG component for logo straw element
 * 
 * @param string $gradient_id Unique ID for gradient to avoid conflicts
 * @return string SVG markup
 */
function ftp_get_logo_straw_svg($gradient_id = 'goldGradient') {
    return '<svg class="ftp-logo-straw" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <!-- Main straw body - completely inside the 0, diagonal from bottom-left to top-right -->
        <line x1="38" y1="58" x2="50" y2="46" stroke="url(#' . esc_attr($gradient_id) . ')" stroke-width="3" stroke-linecap="round"/>
        <!-- Bent tip of straw - bends slightly to the right, stays inside -->
        <path d="M 50 46 Q 53 44, 55 46" stroke="url(#' . esc_attr($gradient_id) . ')" stroke-width="3" fill="none" stroke-linecap="round"/>
        <!-- Sparkle effects - positioned along the straw -->
        <circle cx="40" cy="56" r="1.2" fill="#FFD700" opacity="0.8">
            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
        </circle>
        <circle cx="44" cy="52" r="1.2" fill="#FFEB3B" opacity="0.8">
            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.8s" repeatCount="indefinite" begin="0.3s"/>
        </circle>
        <circle cx="47" cy="49" r="1.2" fill="#FFC107" opacity="0.8">
            <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite" begin="0.6s"/>
        </circle>
        <circle cx="52" cy="45" r="0.8" fill="#FFFFFF" opacity="0.9">
            <animate attributeName="opacity" values="0.5;1;0.5" dur="1.2s" repeatCount="indefinite" begin="0.4s"/>
        </circle>
        <!-- Red and Gold gradient definition (like statistics counter) -->
        <defs>
            <linearGradient id="' . esc_attr($gradient_id) . '" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#FF0000;stop-opacity:1">
                    <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="50%" style="stop-color:#FFD700;stop-opacity:1">
                    <animate attributeName="stop-color" values="#FFD700;#FF0000;#FFD700" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="100%" style="stop-color:#FF0000;stop-opacity:1">
                    <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
            </linearGradient>
        </defs>
    </svg>';
}

/**
 * Get logo URL for different sizes/sections
 * Uses the actual uploaded logo image
 * 
 * @param string $size Size variant: 'header', 'footer', 'favicon', 'site-icon', 'original'
 * @return string Logo URL
 */
function ftp_get_logo_variant_url($size = 'header') {
    // All sizes use the original uploaded logo - sizing is handled via CSS
    return FTP_PLUGIN_URL . 'images/logos/logo-original.png';
}

/**
 * Get SVG icon for wellness events section
 * Real icons instead of emojis
 * 
 * @param string $icon_type Type of icon: 'corporate', 'special'
 * @return string SVG markup
 */
function ftp_get_wellness_event_icon($icon_type) {
    $icons = array(
        'corporate' => '<svg class="ftp-event-svg-icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="eventCorporateGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FF0000">
                        <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                    </stop>
                    <stop offset="100%" style="stop-color:#FFD700">
                        <animate attributeName="stop-color" values="#FFD700;#FF0000;#FFD700" dur="3s" repeatCount="indefinite"/>
                    </stop>
                </linearGradient>
                <filter id="eventGlow1" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                    <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <g filter="url(#eventGlow1)">
                <!-- Building -->
                <rect x="12" y="20" width="40" height="38" rx="2" fill="url(#eventCorporateGrad)" opacity="0.9"/>
                <rect x="8" y="14" width="48" height="8" rx="1" fill="url(#eventCorporateGrad)"/>
                <!-- Windows -->
                <rect x="18" y="26" width="8" height="8" rx="1" fill="#1B0000"/>
                <rect x="38" y="26" width="8" height="8" rx="1" fill="#1B0000"/>
                <rect x="18" y="40" width="8" height="8" rx="1" fill="#1B0000"/>
                <rect x="38" y="40" width="8" height="8" rx="1" fill="#1B0000"/>
                <!-- Door -->
                <rect x="27" y="42" width="10" height="16" rx="1" fill="#1B0000"/>
                <!-- Fruit/Health symbol on top -->
                <circle cx="32" cy="10" r="6" fill="url(#eventCorporateGrad)">
                    <animate attributeName="r" values="6;7;6" dur="2s" repeatCount="indefinite"/>
                </circle>
                <path d="M32 4 Q34 2, 36 4" stroke="#1B0000" stroke-width="1.5" fill="none"/>
            </g>
            <!-- Sparkle -->
            <circle cx="52" cy="8" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            </circle>
        </svg>',
        
        'special' => '<svg class="ftp-event-svg-icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="eventSpecialGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FF0000">
                        <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF4444;#FF0000" dur="3s" repeatCount="indefinite"/>
                    </stop>
                    <stop offset="50%" style="stop-color:#FFD700"/>
                    <stop offset="100%" style="stop-color:#FF4444">
                        <animate attributeName="stop-color" values="#FF4444;#FF0000;#FFD700;#FF4444" dur="3s" repeatCount="indefinite"/>
                    </stop>
                </linearGradient>
                <filter id="eventGlow2" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                    <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <g filter="url(#eventGlow2)">
                <!-- Party/celebration elements -->
                <!-- Confetti/streamers -->
                <path d="M10 15 Q15 25, 12 35" stroke="url(#eventSpecialGrad)" stroke-width="2" fill="none">
                    <animate attributeName="d" values="M10 15 Q15 25, 12 35;M10 15 Q18 25, 14 35;M10 15 Q15 25, 12 35" dur="2s" repeatCount="indefinite"/>
                </path>
                <path d="M54 15 Q49 25, 52 35" stroke="url(#eventSpecialGrad)" stroke-width="2" fill="none">
                    <animate attributeName="d" values="M54 15 Q49 25, 52 35;M54 15 Q46 25, 50 35;M54 15 Q49 25, 52 35" dur="2s" repeatCount="indefinite"/>
                </path>
                <!-- Gift box -->
                <rect x="20" y="30" width="24" height="20" rx="2" fill="url(#eventSpecialGrad)"/>
                <rect x="20" y="26" width="24" height="6" rx="1" fill="url(#eventSpecialGrad)"/>
                <!-- Ribbon -->
                <line x1="32" y1="26" x2="32" y2="50" stroke="#1B0000" stroke-width="3"/>
                <line x1="20" y1="40" x2="44" y2="40" stroke="#1B0000" stroke-width="3"/>
                <!-- Bow -->
                <ellipse cx="28" cy="24" rx="5" ry="4" fill="url(#eventSpecialGrad)"/>
                <ellipse cx="36" cy="24" rx="5" ry="4" fill="url(#eventSpecialGrad)"/>
                <circle cx="32" cy="24" r="3" fill="#1B0000"/>
                <!-- Star burst -->
                <polygon points="32,6 34,12 40,12 35,16 37,22 32,18 27,22 29,16 24,12 30,12" fill="url(#eventSpecialGrad)">
                    <animate attributeName="opacity" values="0.8;1;0.8" dur="1.5s" repeatCount="indefinite"/>
                </polygon>
            </g>
            <!-- Sparkles -->
            <circle cx="8" cy="10" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            </circle>
            <circle cx="56" cy="10" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite" begin="0.5s"/>
            </circle>
            <circle cx="32" cy="55" r="1.5" fill="#FFFFFF" opacity="0.7">
                <animate attributeName="opacity" values="0.4;1;0.4" dur="1.8s" repeatCount="indefinite" begin="0.3s"/>
            </circle>
        </svg>',
    );
    
    return isset($icons[$icon_type]) ? $icons[$icon_type] : '';
}

/**
 * Get SVG icon for contact/wellness journey section
 * Real icons instead of emojis
 * 
 * @param string $icon_type Type of icon: 'phone', 'chat', 'location'
 * @return string SVG markup
 */
function ftp_get_contact_icon($icon_type) {
    $icons = array(
        'phone' => '<svg class="ftp-contact-svg-icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="contactPhoneGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FF0000">
                        <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                    </stop>
                    <stop offset="100%" style="stop-color:#FFD700">
                        <animate attributeName="stop-color" values="#FFD700;#FF0000;#FFD700" dur="3s" repeatCount="indefinite"/>
                    </stop>
                </linearGradient>
                <filter id="contactGlow1" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                    <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <g filter="url(#contactGlow1)">
                <!-- Phone receiver -->
                <path d="M18 12 Q12 12, 12 20 L12 28 Q12 34, 18 38 L22 40 Q20 44, 22 48 L24 50 Q28 54, 32 52 L36 48 Q38 44, 36 40 L40 38 Q46 34, 46 28 L46 20 Q46 12, 40 12 L18 12" 
                      fill="url(#contactPhoneGrad)" stroke="none"/>
                <!-- Phone detail -->
                <rect x="20" y="18" width="18" height="14" rx="2" fill="#1B0000" opacity="0.8"/>
                <!-- Sound waves -->
                <path d="M50 24 Q54 28, 50 32" stroke="url(#contactPhoneGrad)" stroke-width="2" fill="none" opacity="0.8">
                    <animate attributeName="opacity" values="0.4;1;0.4" dur="1s" repeatCount="indefinite"/>
                </path>
                <path d="M54 20 Q60 28, 54 36" stroke="url(#contactPhoneGrad)" stroke-width="2" fill="none" opacity="0.6">
                    <animate attributeName="opacity" values="0.3;0.8;0.3" dur="1s" repeatCount="indefinite" begin="0.2s"/>
                </path>
            </g>
            <!-- Sparkle -->
            <circle cx="56" cy="12" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            </circle>
        </svg>',
        
        'chat' => '<svg class="ftp-contact-svg-icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="contactChatGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FF0000">
                        <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                    </stop>
                    <stop offset="100%" style="stop-color:#FFD700">
                        <animate attributeName="stop-color" values="#FFD700;#FF0000;#FFD700" dur="3s" repeatCount="indefinite"/>
                    </stop>
                </linearGradient>
                <filter id="contactGlow2" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                    <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <g filter="url(#contactGlow2)">
                <!-- Chat bubble -->
                <path d="M10 12 L54 12 Q58 12, 58 16 L58 38 Q58 42, 54 42 L26 42 L18 52 L18 42 L10 42 Q6 42, 6 38 L6 16 Q6 12, 10 12" 
                      fill="url(#contactChatGrad)"/>
                <!-- Chat dots -->
                <circle cx="22" cy="27" r="4" fill="#1B0000">
                    <animate attributeName="r" values="3;4;3" dur="1s" repeatCount="indefinite"/>
                </circle>
                <circle cx="32" cy="27" r="4" fill="#1B0000">
                    <animate attributeName="r" values="3;4;3" dur="1s" repeatCount="indefinite" begin="0.2s"/>
                </circle>
                <circle cx="42" cy="27" r="4" fill="#1B0000">
                    <animate attributeName="r" values="3;4;3" dur="1s" repeatCount="indefinite" begin="0.4s"/>
                </circle>
            </g>
            <!-- Sparkles -->
            <circle cx="56" cy="8" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            </circle>
            <circle cx="8" cy="52" r="1.5" fill="#FFFFFF" opacity="0.7">
                <animate attributeName="opacity" values="0.4;1;0.4" dur="1.8s" repeatCount="indefinite" begin="0.3s"/>
            </circle>
        </svg>',
        
        'location' => '<svg class="ftp-contact-svg-icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="contactLocationGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#FF0000">
                        <animate attributeName="stop-color" values="#FF0000;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                    </stop>
                    <stop offset="100%" style="stop-color:#FFD700">
                        <animate attributeName="stop-color" values="#FFD700;#FF0000;#FFD700" dur="3s" repeatCount="indefinite"/>
                    </stop>
                </linearGradient>
                <filter id="contactGlow3" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
                    <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
            <g filter="url(#contactGlow3)">
                <!-- Location pin -->
                <path d="M32 4 Q12 4, 12 26 Q12 40, 32 58 Q52 40, 52 26 Q52 4, 32 4" 
                      fill="url(#contactLocationGrad)">
                    <animate attributeName="d" values="M32 4 Q12 4, 12 26 Q12 40, 32 58 Q52 40, 52 26 Q52 4, 32 4;M32 4 Q12 4, 12 26 Q12 42, 32 60 Q52 42, 52 26 Q52 4, 32 4;M32 4 Q12 4, 12 26 Q12 40, 32 58 Q52 40, 52 26 Q52 4, 32 4" dur="2s" repeatCount="indefinite"/>
                </path>
                <!-- Inner circle -->
                <circle cx="32" cy="24" r="10" fill="#1B0000"/>
                <!-- Fruit icon inside -->
                <circle cx="32" cy="24" r="6" fill="url(#contactLocationGrad)" opacity="0.8">
                    <animate attributeName="r" values="5;7;5" dur="2s" repeatCount="indefinite"/>
                </circle>
            </g>
            <!-- Sparkles -->
            <circle cx="52" cy="8" r="2" fill="#FFD700" opacity="0.8">
                <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            </circle>
            <circle cx="12" cy="8" r="1.5" fill="#FFFFFF" opacity="0.7">
                <animate attributeName="opacity" values="0.4;1;0.4" dur="1.8s" repeatCount="indefinite" begin="0.5s"/>
            </circle>
        </svg>',
    );
    
    return isset($icons[$icon_type]) ? $icons[$icon_type] : '';
}

/**
 * Get animated logo SVG for header
 * Returns inline SVG with animations
 * 
 * @return string SVG markup
 */
function ftp_get_animated_header_logo_svg() {
    return '<svg class="ftp-logo-header-animated" viewBox="0 0 120 40" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="headerAnimGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#FF0000">
                    <animate attributeName="stop-color" values="#FF0000;#FF4444;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="50%" style="stop-color:#FF4444">
                    <animate attributeName="stop-color" values="#FF4444;#FFD700;#FF0000;#FF4444" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="100%" style="stop-color:#FF0000">
                    <animate attributeName="stop-color" values="#FF0000;#FF0000;#FF4444;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
            </linearGradient>
            <filter id="headerAnimGlow" x="-30%" y="-30%" width="160%" height="160%">
                <feGaussianBlur stdDeviation="1" result="coloredBlur"/>
                <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
            </filter>
        </defs>
        <g filter="url(#headerAnimGlow)">
            <path d="M 8 8 Q 5 5, 12 4 L 12 32 Q 12 35, 8 35 L 16 35 Q 12 35, 12 32 L 12 8" fill="url(#headerAnimGradient)"/>
            <path d="M 22 10 Q 22 3, 38 3 Q 54 3, 54 14 Q 54 24, 30 34 L 54 34 L 54 38 L 22 38 L 22 33 Q 50 20, 50 15 Q 50 7, 38 7 Q 26 7, 26 12" fill="url(#headerAnimGradient)"/>
            <ellipse cx="78" cy="20" rx="18" ry="17" fill="url(#headerAnimGradient)"/>
            <ellipse cx="78" cy="21" rx="9" ry="10" fill="#000000" opacity="0.9"/>
            <line x1="88" y1="18" x2="105" y2="4" stroke="url(#headerAnimGradient)" stroke-width="3" stroke-linecap="round">
                <animate attributeName="stroke-width" values="3;4;3" dur="2s" repeatCount="indefinite"/>
            </line>
            <path d="M 105 4 Q 109 1, 113 3" stroke="url(#headerAnimGradient)" stroke-width="3" fill="none" stroke-linecap="round"/>
        </g>
        <circle cx="110" cy="3" r="2" fill="#FFD700" opacity="0.8">
            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            <animate attributeName="r" values="1.5;2.5;1.5" dur="1.5s" repeatCount="indefinite"/>
        </circle>
        <circle cx="102" cy="6" r="1.5" fill="#FFFFFF" opacity="0.7">
            <animate attributeName="opacity" values="0.4;1;0.4" dur="1.8s" repeatCount="indefinite" begin="0.3s"/>
        </circle>
    </svg>';
}

/**
 * Get animated logo SVG for footer
 * Returns inline SVG with animations - larger version
 * 
 * @return string SVG markup
 */
function ftp_get_animated_footer_logo_svg() {
    return '<svg class="ftp-logo-footer-animated" viewBox="0 0 180 60" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="footerAnimGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#FF0000">
                    <animate attributeName="stop-color" values="#FF0000;#FF4444;#FFD700;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="33%" style="stop-color:#FF4444">
                    <animate attributeName="stop-color" values="#FF4444;#FFD700;#FF0000;#FF4444" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="66%" style="stop-color:#FFD700">
                    <animate attributeName="stop-color" values="#FFD700;#FF0000;#FF4444;#FFD700" dur="3s" repeatCount="indefinite"/>
                </stop>
                <stop offset="100%" style="stop-color:#FF0000">
                    <animate attributeName="stop-color" values="#FF0000;#FF0000;#FF4444;#FF0000" dur="3s" repeatCount="indefinite"/>
                </stop>
            </linearGradient>
            <filter id="footerAnimGlow" x="-30%" y="-30%" width="160%" height="160%">
                <feGaussianBlur stdDeviation="1.5" result="coloredBlur"/>
                <feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge>
            </filter>
        </defs>
        <g filter="url(#footerAnimGlow)">
            <path d="M 12 12 Q 7 8, 18 6 L 18 48 Q 18 52, 12 52 L 24 52 Q 18 52, 18 48 L 18 12" fill="url(#footerAnimGradient)"/>
            <path d="M 32 15 Q 32 5, 55 5 Q 78 5, 78 20 Q 78 35, 42 50 L 78 50 L 78 55 L 32 55 L 32 48 Q 72 30, 72 22 Q 72 10, 55 10 Q 38 10, 38 18" fill="url(#footerAnimGradient)"/>
            <ellipse cx="115" cy="30" rx="26" ry="25" fill="url(#footerAnimGradient)">
                <animate attributeName="ry" values="25;26;25" dur="2s" repeatCount="indefinite"/>
            </ellipse>
            <ellipse cx="115" cy="32" rx="13" ry="14" fill="#000000" opacity="0.9"/>
            <path d="M 108 22 Q 115 17, 125 24 Q 118 20, 108 22" fill="#000000" opacity="0.5"/>
            <line x1="130" y1="26" x2="155" y2="6" stroke="url(#footerAnimGradient)" stroke-width="4" stroke-linecap="round">
                <animate attributeName="stroke-width" values="4;5;4" dur="2s" repeatCount="indefinite"/>
            </line>
            <path d="M 155 6 Q 160 2, 167 5" stroke="url(#footerAnimGradient)" stroke-width="4" fill="none" stroke-linecap="round"/>
        </g>
        <circle cx="162" cy="4" r="3" fill="#FFD700" opacity="0.8">
            <animate attributeName="opacity" values="0.3;1;0.3" dur="1.5s" repeatCount="indefinite"/>
            <animate attributeName="r" values="2;4;2" dur="1.5s" repeatCount="indefinite"/>
        </circle>
        <circle cx="150" cy="8" r="2" fill="#FFFFFF" opacity="0.9">
            <animate attributeName="opacity" values="0.5;1;0.5" dur="1.8s" repeatCount="indefinite" begin="0.3s"/>
        </circle>
        <circle cx="168" cy="8" r="2" fill="#FF4444" opacity="0.7">
            <animate attributeName="opacity" values="0.4;0.9;0.4" dur="2s" repeatCount="indefinite" begin="0.6s"/>
        </circle>
        <circle cx="10" cy="10" r="1.5" fill="#FFD700" opacity="0">
            <animate attributeName="opacity" values="0;0.8;0" dur="3s" repeatCount="indefinite" begin="0.5s"/>
        </circle>
        <circle cx="80" cy="8" r="1.5" fill="#FFD700" opacity="0">
            <animate attributeName="opacity" values="0;0.8;0" dur="3s" repeatCount="indefinite" begin="1s"/>
        </circle>
    </svg>';
}

/**
 * Get small inline SVG icon for map location
 * Compact version for inline text use
 * 
 * @return string SVG markup
 */
function ftp_get_inline_location_icon() {
    return '<svg class="ftp-inline-icon ftp-inline-location" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 1.2em; height: 1.2em; vertical-align: middle; display: inline-block;">
        <defs>
            <linearGradient id="inlineLocGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#FF0000"/>
                <stop offset="100%" style="stop-color:#FFD700"/>
            </linearGradient>
        </defs>
        <path d="M12 2 C7 2, 4 6, 4 10 C4 15, 12 22, 12 22 C12 22, 20 15, 20 10 C20 6, 17 2, 12 2" fill="url(#inlineLocGrad)"/>
        <circle cx="12" cy="10" r="3" fill="#1B0000"/>
    </svg>';
}

/**
 * Get small inline SVG chat icon for floating button
 * Compact version with animation
 * 
 * @return string SVG markup
 */
function ftp_get_inline_chat_icon() {
    return '<svg class="ftp-inline-icon ftp-inline-chat" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem; height: 1.5rem;">
        <defs>
            <linearGradient id="inlineChatGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#FFFFFF"/>
                <stop offset="100%" style="stop-color:#FFD700"/>
            </linearGradient>
        </defs>
        <path d="M4 4 L20 4 Q22 4, 22 6 L22 15 Q22 17, 20 17 L10 17 L6 21 L6 17 L4 17 Q2 17, 2 15 L2 6 Q2 4, 4 4" fill="url(#inlineChatGrad)"/>
        <circle cx="8" cy="10.5" r="1.5" fill="#1B0000">
            <animate attributeName="r" values="1;1.5;1" dur="1s" repeatCount="indefinite"/>
        </circle>
        <circle cx="12" cy="10.5" r="1.5" fill="#1B0000">
            <animate attributeName="r" values="1;1.5;1" dur="1s" repeatCount="indefinite" begin="0.2s"/>
        </circle>
        <circle cx="16" cy="10.5" r="1.5" fill="#1B0000">
            <animate attributeName="r" values="1;1.5;1" dur="1s" repeatCount="indefinite" begin="0.4s"/>
        </circle>
    </svg>';
}

/**
 * Get small inline SVG nutritionist/chat icon for special plans
 * 
 * @return string SVG markup
 */
function ftp_get_inline_nutritionist_icon() {
    return '<svg class="ftp-inline-icon ftp-inline-nutritionist" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 1.2em; height: 1.2em; vertical-align: middle; display: inline-block; margin-right: 5px;">
        <defs>
            <linearGradient id="inlineNutGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#FF0000"/>
                <stop offset="100%" style="stop-color:#FFD700"/>
            </linearGradient>
        </defs>
        <path d="M4 4 L20 4 Q22 4, 22 6 L22 15 Q22 17, 20 17 L10 17 L6 21 L6 17 L4 17 Q2 17, 2 15 L2 6 Q2 4, 4 4" fill="url(#inlineNutGrad)"/>
        <circle cx="8" cy="10.5" r="1.5" fill="#1B0000"/>
        <circle cx="12" cy="10.5" r="1.5" fill="#1B0000"/>
        <circle cx="16" cy="10.5" r="1.5" fill="#1B0000"/>
    </svg>';
}