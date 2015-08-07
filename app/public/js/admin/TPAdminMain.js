
jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    $('.TP-Zelect').zelect({});
    $(".infoRow").tooltip({
        position: {
            my: "center bottom-20",
            at: "center top",
            using: function( position, feedback ) {
                $( this ).css( position );
                $( "<div>" )
                    .addClass( "arrow" )
                    .addClass( feedback.vertical )
                    .addClass( feedback.horizontal )
                    .appendTo( this );
            }
        }
    });

    $(document).ready(function(){
        $('.bellows').bellows();

        //Русские название в дата пикере
        $('.date').datepicker(TPdatepicker);



    });
    $(document).ajaxSuccess(function(e, xhr, settings) {


    });

});

