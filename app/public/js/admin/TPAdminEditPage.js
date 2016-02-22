jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);

    doc.find('.TPAutoReplaceLinkPostById').click(function (e) {
        var ID, data;
        ID = $(this).data('post_id');
        console.log(ID);
        data = {id: ID}
        var dialogProgressbar = doc.find('#TPProgressbarDialog').dialog({
            resizable: false,
            draggable: false,
            maxHeight:100,
            maxWidth: 1000,
            minWidth: 700,
            minHeight:40,
            modal: true,
            dialogClass:"TPProgressbarDialog",
            autoOpen: true,
            open : function() {
                e.preventDefault();


                $.ajax({
                    url: ajaxurl + '?action=auto_replace_link_post_by_id',
                    type: "POST", // Делаем POST запрос
                    data: data,
                    success: function (data) {
                        console.log(data.substring(0, data.length - 1));
                        console.log('success');
                        //document.location.href = '';
                    }
                });

                var progressbar = $( "#TPProgressbar" ),
                    progressLabel = $( ".TPProgressbar-label" );

                progressbar.progressbar({
                    value: false,
                    change: function() {
                        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
                    },
                    complete: function() {
                        progressLabel.text(TPLebelProgressBar);
                        dialogProgressbar.dialog('close');
                    }
                });

                function progress() {
                    var val = progressbar.progressbar( "value" ) || 0;

                    progressbar.progressbar( "value", val + 2 );

                    if ( val < 99 ) {
                        setTimeout( progress, 80 );
                    }
                }

                setTimeout( progress, 1000 );



            },
            close: function( event, ui ) {
            }
        });

    });

    doc.ready(function(){

    });
});