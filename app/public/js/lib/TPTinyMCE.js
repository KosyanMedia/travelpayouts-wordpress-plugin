(function() {

    tinymce.PluginManager.add( 'tp_custom_class', function( editor, url ) {
        // Add Button to Visual Editor Toolbar

        editor.addButton('tp_link_btn', {
            title: linkShortcodeBtnLabel,
            cmd: 'tp_link_btn',
            image: url + '../../../images/tp_link_btn_tinymce.png',
        });

        // Add Command when Button Clicked
        editor.addCommand('tp_link_btn', function() {
            editor.execCommand('mceReplaceContent', false, '' + linkShortcode + '');
        });


        editor.addButton('tp_button_btn', {
            title: buttonShortcodeBtnLabel,
            cmd: 'tp_button_btn',
            image: url + '../../../images/tp_button_btn_tinymce.png',
        });

        // Add Command when Button Clicked
        editor.addCommand('tp_button_btn', function() {
            editor.execCommand('mceReplaceContent', false, '' + buttonShortcode + '');
        });
    });
})();