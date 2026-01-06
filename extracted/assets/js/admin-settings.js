/**
 * 120 Fruit Therapy - Admin Settings Scripts
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Image upload handler
        $('.ftp-media-upload').on('click', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var targetId = button.data('target');
            var targetInput = $('#' + targetId);
            
            var mediaUploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use This Image'
                },
                multiple: false,
                library: {
                    type: 'image'
                }
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                targetInput.val(attachment.url);
                
                // Update or create preview
                var previewContainer = button.siblings('.ftp-image-preview');
                if (previewContainer.length === 0) {
                    previewContainer = $('<div class="ftp-image-preview"></div>');
                    button.closest('.ftp-media-field').append(previewContainer);
                }
                previewContainer.html('<img src="' + attachment.url + '" alt="Preview">');
            });
            
            mediaUploader.open();
        });
        
        // Video upload handler
        $('.ftp-media-upload-video').on('click', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var targetId = button.data('target');
            var targetInput = $('#' + targetId);
            
            var mediaUploader = wp.media({
                title: 'Select Video',
                button: {
                    text: 'Use This Video'
                },
                multiple: false,
                library: {
                    type: 'video'
                }
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                targetInput.val(attachment.url);
            });
            
            mediaUploader.open();
        });
    });

})(jQuery);