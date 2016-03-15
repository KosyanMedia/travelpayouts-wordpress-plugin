jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);



    doc.find('.TPAutoReplaceLinkPostBtn').click(function (e) {
        console.log("TPAutoReplaceLinkPostBtn");
        var checkedId = [];
        var data;
        doc.find('[id^=cb-select]:checked').each(function(i, el){
            var post_id = parseInt($(el).val());
            if(!isNaN(post_id)){
                checkedId.push(post_id)
            }
        });
        console.log(checkedId);
        if(checkedId.length > 0) {
            data = {id: checkedId.join()}
            $.ajax({
                url: ajaxurl + '?action=auto_replace_link_post_check_by_id',
                type: "POST", // Делаем POST запрос
                data: data,
                success: function (data) {
                    if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
                        doc.find('#'+TPPluginName+'AdminNotice').replaceWith(adminNotice('updated', TPInsertLinkNoticeTxt , ''));
                    }else{
                        $('#wpbody-content').before(adminNotice('updated', TPInsertLinkNoticeTxt , ''));
                    }
                    doc.find('#TPAdminNoticeClose').click(function () {
                        $(this).parent().remove();
                    });
                    console.log(data.substring(0, data.length - 1));
                    console.log('success');
                    //document.location.href = '';
                }
            });
            //console.log(data)

            /*var dialogProgressbar = doc.find('#TPProgressbarDialog').dialog({
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

                    setTimeout( progress, 2000 );



                },
                close: function( event, ui ) {
                }
            });   */

        }

    });

    doc.find('.TPAutoReplaceLinkPostById').click(function (e) {
        var ID, data;
        ID = $(this).data('post_id');
        console.log(ID);
        data = {id: ID}
        $.ajax({
            url: ajaxurl + '?action=auto_replace_link_post_by_id',
            type: "POST", // Делаем POST запрос
            data: data,
            success: function (data) {
                if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
                    doc.find('#'+TPPluginName+'AdminNotice').replaceWith(adminNotice('updated', TPInsertLinkNoticeTxt , ''));
                }else{
                    $('#wpbody-content').before(adminNotice('updated', TPInsertLinkNoticeTxt , ''));
                }
                doc.find('#TPAdminNoticeClose').click(function () {
                    $(this).parent().remove();
                });
                console.log(data.substring(0, data.length - 1));
                console.log('success');
                //document.location.href = '';
            }
        });
        /*var dialogProgressbar = doc.find('#TPProgressbarDialog').dialog({
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
        }); */


    });

    doc.ready(function(){

    });
    function adminNotice(class_notice, title_notice, message_notice){
        var output = '';
        message_notice = (isEmpty(message_notice))?'':'<p>'+message_notice+'</p>';
        output = '<div class="'+class_notice+'" id="'+TPPluginName+'AdminNotice">' +
            '<p><strong>'+title_notice+'</strong></p>' +message_notice+
            '<button class="TPnotice-dismiss" id="TPAdminNoticeClose"></button>'+
            '</div>';

        return output;
    }
    function isEmpty(str) {
        return (!str || 0 === str.length);
    }
});