jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    doc.ready(function(){
        //console.log(TPPostHook);
    });

    doc.find('#publish').click(clickPublishPost);
    doc.find('#save-post').click(clickPublishPost);
    doc.find('#post-preview').click(clickPublishPost);

    function clickPublishPost(e, parram){
        //TPSavePost($(this))
        console.log("publish");
        if(parram == true){
            console.log("parram == true");
            return true;
        }else {
            console.log("parram == false");
            TPReplaceContentPost($(this));
            return false;
        }
    }
    function TPReplaceContentPost(selector){
        var title, content, contentField, newContent, tp_auto_replac_link, dataInsertPostContent;
        tp_auto_replac_link = parseInt(doc.find("input[name=tp_auto_replac_link]:checked").val());
        contentField = doc.find("#content");
        title = doc.find("#title").val();
        if (typeof tinyMCE != "undefined") {
            if (!tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
                content = contentField.val();
            } else if (tinyMCE && tinyMCE.activeEditor) {
                content = tinyMCE.activeEditor.getContent();
            }
        } else {
            content = contentField.val();
        }
        console.log("tp_auto_replac_link = " + tp_auto_replac_link);
        console.log("#content = " + content);
        console.log("#title = " + title);
        if (tp_auto_replac_link == 1 && content != "") {
            dataInsertPostContent = {value: content}
            $.ajax({
                url: ajaxurl + '?action=replace_insert_post',
                type: "POST", // Делаем POST запрос
                data: dataInsertPostContent,
                success: function (data) {
                    newContent = stripslashes(data.substring(0, data.length - 1));
                    console.log("newContent = " + newContent);
                    //contentField.val(newContent);
                    if (typeof tinyMCE != "undefined") {
                        if (!tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
                            contentField.val(newContent);
                        } else if (tinyMCE && tinyMCE.activeEditor) {
                            tinyMCE.activeEditor.setContent(newContent);
                        }
                    } else {
                        contentField.val(newContent);
                    }
                    return selector.trigger('click', [true]);

                }
            });
            //return true;
        }else {
            return selector.trigger('click', [true]);
        }

    }



    function stripslashes(str) {
        //       discuss at: http://phpjs.org/functions/stripslashes/
        //      original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
        //      improved by: Ates Goral (http://magnetiq.com)
        //      improved by: marrtins
        //      improved by: rezna
        //         fixed by: Mick@el
        //      bugfixed by: Onno Marsman
        //      bugfixed by: Brett Zamir (http://brett-zamir.me)
        //         input by: Rick Waldron
        //         input by: Brant Messenger (http://www.brantmessenger.com/)
        // reimplemented by: Brett Zamir (http://brett-zamir.me)
        //        example 1: stripslashes('Kevin\'s code');
        //        returns 1: "Kevin's code"
        //        example 2: stripslashes('Kevin\\\'s code');
        //        returns 2: "Kevin\'s code"

        return (str + '')
            .replace(/\\(.?)/g, function (s, n1) {
                switch (n1) {
                    case '\\':
                        return '\\';
                    case '0':
                        return '\u0000';
                    case '':
                        return '';
                    default:
                        return n1;
                }
            });
    }
    /* function TPSavePost(selector){
     console.log(selector)
     var BtnName = selector.attr("name");
     console.log("#publish click name="+BtnName);

     var title, content, contentField, newContent, tp_auto_replac_link, dataInsertPostContent;
     tp_auto_replac_link = parseInt(doc.find("input[name=tp_auto_replac_link]:checked").val());
     contentField = doc.find("#content");
     title = doc.find("#title").val();

     if (typeof tinyMCE != "undefined") {
     if (!tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
     content = contentField.val();
     } else if (tinyMCE && tinyMCE.activeEditor) {
     content = tinyMCE.activeEditor.getContent();
     }
     } else {
     content = contentField.val();
     }
     console.log("tp_auto_replac_link = " + tp_auto_replac_link);
     console.log("#content = " + content);
     console.log("#title = " + title);
     //publish
     //console.log("hidden_post_status = " + doc.find("#hidden_post_status").val())
     //console.log("original_post_status = " + doc.find("#original_post_status").val())
     //console.log("post_status = " + doc.find("#post_status").val())
     //if(TPPostHook == 'add_new'){
     if(BtnName == 'publish'){
     if( content != "" || title !="")
     doc.find('form#post').append('<input type="hidden" name="publish" value="Publish" /> ');
     }

     //doc.find('form#post').attr("data-valid", true);
     if (tp_auto_replac_link == 1 && content != "") {
     //doc.find('#post').submit(function(e){return false});
     dataInsertPostContent = {value: content}
     $.ajax({
     url: ajaxurl + '?action=replace_insert_post',
     type: "POST", // Делаем POST запрос
     data: dataInsertPostContent,
     success: function (data) {
     newContent = stripslashes(data.substring(0, data.length - 1));
     console.log("newContent = " + newContent);
     //contentField.val(newContent);
     if (typeof tinyMCE != "undefined") {
     if (!tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()) {
     //if(QTags.insertContent(newContent) != true)
     contentField.val(newContent);
     } else if (tinyMCE && tinyMCE.activeEditor) {
     //  console.log(tinyMCE.activeEditor.selection)
     tinyMCE.activeEditor.setContent(newContent);
     }
     } else {
     contentField.val(newContent);
     }


     //$('#post').trigger('submit', [true]);
     return true;
     }
     });
     //doc.find('#post').submit();
     } else {
     //$('#post').trigger('submit', [true]);
     return true;
     }
     }
     /*doc.find('#post').submit(function (e, parram) {
     console.log("#post submit");
     // $(this).data("valid", true);
     if (parram == true) {
     console.log("#post submit parram = true");
     return true;
     }

     //return false;
     return true;
     });*/
    /* doc.find('#post').submit(function(e){
     var tp_auto_replac_link = parseInt($(this).find("input[name=tp_auto_replac_link]:checked").val());
     var contentField = $(this).find("#content");
     var content = $(this).find("#content").val();
     var newContent = "";
     var form = $(this);
     console.log(content)
     console.log(tp_auto_replac_link)
     if(tp_auto_replac_link == 0 && content != ""){

     var dataInsertPostContent = {value: content}
     //ajax newContent
     $.ajax({
     url: ajaxurl + '?action=replace_insert_post',
     type: "POST", // Делаем POST запрос
     data: dataInsertPostContent,
     success: function (data) {
     newContent = data.substring(0, data.length - 1)
     contentField.val(newContent);
     return true;
     console.log(newContent);
     //form.find("#content").val(newContent);
     //Form ajaxSubmit
     /*form.ajaxSubmit({
     beforeSubmit: function(contentArray, $form, options){
     console.log("form beforeSubmit")
     console.log(contentArray)
     var key;
     for(var i=0; i<contentArray.length; i++){
     if(contentArray[i].name == "content") {
     key = i;
     contentArray[i].value = newContent;
     }
     if(contentArray[i].name == "hidden_post_status"){

     }
     }
     console.log("contentArray["+key+"].value = "+contentArray[key].value);
     },
     success:function(data){
     console.log("ajaxSubmit success")
     console.log(TPAdminUrl);
     document.location.href = TPAdminUrl+'post.php?post='+postId+'&action=edit';
     }
     });*

     //document.location.href = '';
     }
     });
     // console.log( form.serialize())*
     //return false;
     }

     return false;

     });*/
});