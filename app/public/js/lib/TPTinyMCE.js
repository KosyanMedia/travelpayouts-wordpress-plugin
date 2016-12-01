(function() {

    tinymce.PluginManager.add( 'tp_custom_class', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        console.log(11);
        console.log(url);
        console.log(editor);
        console.log(url + '../../../images/tp_link_btn_tinymce.png');
        editor.addButton('tp_custom_class', {
            title: 'Insert CSS Class',
            cmd: 'tp_custom_class',
            image: url + '../../../images/tp_link_btn_tinymce.png',
        });

        // Add Command when Button Clicked
        editor.addCommand('tp_custom_class', function() {
            alert('Button clicked!');
        });
    });
})();