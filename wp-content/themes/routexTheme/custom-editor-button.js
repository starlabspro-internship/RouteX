(function() {
    tinymce.create('tinymce.plugins.custom_bullet_point', {
        init: function(editor, url) {
            editor.addButton('custom_bullet_point', {
                title: 'Add Custom Bullet Point',
                image: url + '/assets/icons/bullet-point-icon.svg', 
                onclick: function() {
                    var mediaUploader = wp.media({
                        title: 'Select an Icon for Bullet Point',
                        button: {
                            text: 'Select Icon'
                        },
                        multiple: false
                    })
                    .on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        var iconUrl = attachment.url;

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
