/**
 * 120 Fruit Therapy - WhatsApp Integration Scripts
 */

(function() {
    'use strict';

    // WhatsApp phone numbers
    var orderPhone = '2347075887085';
    var supportPhone = '2349042146929';

    // Check if ftpData is available from WordPress
    if (typeof ftpData !== 'undefined' && ftpData !== null) {
        if (ftpData.orderPhone && typeof ftpData.orderPhone === 'string') {
            orderPhone = '234' + ftpData.orderPhone.replace(/^0/, '');
        }
        if (ftpData.supportPhone && typeof ftpData.supportPhone === 'string') {
            supportPhone = '234' + ftpData.supportPhone.replace(/^0/, '');
        }
    }

    /**
     * Generate WhatsApp URL
     * @param {string} phone - Phone number in international format (without +)
     * @param {string} message - Message to pre-fill
     * @returns {string} WhatsApp URL
     */
    function generateWhatsAppURL(phone, message) {
        var encodedMessage = encodeURIComponent(message);
        return 'https://wa.me/' + phone + '?text=' + encodedMessage;
    }

    /**
     * Open WhatsApp with a pre-filled message
     * @param {string} phone - Phone number
     * @param {string} message - Message to send
     */
    function openWhatsApp(phone, message) {
        var url = generateWhatsAppURL(phone, message);
        window.open(url, '_blank', 'noopener,noreferrer');
    }

    /**
     * Order an item via WhatsApp
     * @param {string} itemName - Name of the item to order
     */
    function orderItem(itemName) {
        var message = 'Hello 120! I would like to order ' + itemName + '. Please confirm availability and price.';
        openWhatsApp(orderPhone, message);
    }

    /**
     * Enquire about a wellness plan
     * @param {string} planName - Name of the wellness plan
     */
    function enquirePlan(planName) {
        var message = 'Hello 120! I\'m interested in your ' + planName + ' wellness plan. Please provide more details about duration and pricing.';
        openWhatsApp(supportPhone, message);
    }

    /**
     * Enquire about a gift package
     * @param {string} packageName - Name of the gift package
     */
    function enquirePackage(packageName) {
        var message = 'Hello 120! I want to make an enquiry about your ' + packageName + ' package.';
        openWhatsApp(supportPhone, message);
    }

    /**
     * General order enquiry
     */
    function generalOrderEnquiry() {
        var message = 'Hello 120 Fruit Therapy! I would like to place an order. Please assist me with your menu options.';
        openWhatsApp(orderPhone, message);
    }

    /**
     * Corporate event enquiry
     * @param {string} eventType - Type of event
     */
    function enquireEvent(eventType) {
        var message = 'Hello 120! I would like to enquire about your ' + eventType + ' services for my upcoming event.';
        openWhatsApp(supportPhone, message);
    }

    // Expose functions globally
    window.FTPWhatsApp = {
        orderItem: orderItem,
        enquirePlan: enquirePlan,
        enquirePackage: enquirePackage,
        generalOrderEnquiry: generalOrderEnquiry,
        enquireEvent: enquireEvent,
        generateURL: generateWhatsAppURL,
        orderPhone: orderPhone,
        supportPhone: supportPhone
    };

    // Initialize WhatsApp button handlers
    document.addEventListener('DOMContentLoaded', function() {
        initWhatsAppButtons();
    });

    /**
     * Initialize WhatsApp button click handlers
     */
    function initWhatsAppButtons() {
        // Handle data-whatsapp attributes
        document.querySelectorAll('[data-whatsapp-action]').forEach(function(button) {
            button.addEventListener('click', function(e) {
                var action = this.getAttribute('data-whatsapp-action');
                var value = this.getAttribute('data-whatsapp-value');
                
                switch (action) {
                    case 'order':
                        orderItem(value);
                        break;
                    case 'plan':
                        enquirePlan(value);
                        break;
                    case 'package':
                        enquirePackage(value);
                        break;
                    case 'event':
                        enquireEvent(value);
                        break;
                    case 'general':
                        generalOrderEnquiry();
                        break;
                }
            });
        });

        // Track WhatsApp link clicks for analytics (if needed)
        document.querySelectorAll('a[href^="https://wa.me/"]').forEach(function(link) {
            link.addEventListener('click', function() {
                // Analytics tracking could be added here
                var href = this.getAttribute('href');
                console.log('WhatsApp link clicked:', href);
            });
        });
    }

    /**
     * Floating WhatsApp button animation
     */
    function initFloatingButton() {
        var floatingBtn = document.querySelector('.ftp-floating-support');
        
        if (!floatingBtn) return;

        // Popup is always visible - no hide/show behavior

        // Popup stays constant - no scroll-based hiding
    }

    // Initialize floating button
    document.addEventListener('DOMContentLoaded', initFloatingButton);

})();