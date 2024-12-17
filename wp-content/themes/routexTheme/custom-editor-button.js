(function() {
    tinymce.create('tinymce.plugins.custom_bullet_point', {
        init: function(editor, url) {
            editor.addButton('custom_bullet_point', {
                title: 'Add Custom Bullet Point',
                image: url + '/assets/icons/bullet-point-icon.svg', // Use image property instead of icon
                onclick: function() {
                    // Open the WordPress media uploader
                    var mediaUploader = wp.media({
                        title: 'Select an Icon for Bullet Point',
                        button: {
                            text: 'Select Icon'
                        },
                        multiple: false
                    })
                    .on('select', function() {
                        // Get the URL of the selected image
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        var iconUrl = attachment.url;

                        // Insert the custom bullet with the selected icon and text
                        editor.insertContent(
                            '<p class="custom-bullet">' +
                                '<img class="custom-bullet-icon" src="' + iconUrl + '" alt="Bullet Icon" />' +
                                ' Your Custom Text' +
                            '</p>' +
                            '<p>' +
                                ' Your Custom Subtext (Optional)' +
                            '</p>'
                        );
                    })
                    .open();
                }
            });
        }
    });
    tinymce.PluginManager.add('custom_bullet_point', tinymce.plugins.custom_bullet_point);
})();
