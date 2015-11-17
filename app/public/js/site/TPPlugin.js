jQuery(function($) {
    $(document).ready(function () {
        var conteiner = '.TP-Plugin-Tables_wrapper';
        var table = conteiner + ' .TP-Plugin-Tables_box';

        function checkSize() {
            var widthWrapper, widthBox, hidden, small;
            $(table).each(function () {
                $(this).removeClass('TP-autoWidth-plugin');
                widthWrapper = $(conteiner).width();
                widthBox = $(this).width();
                if (widthBox > widthWrapper) {
                    while (widthBox > widthWrapper) {
                        if (!$(this).find('tr td.TP-unessential:not(.TP-hidden)').length)
                            return false;
                        $('td.TP-unessential:not(.TP-hidden):last', $(this).find('tr')).addClass('TP-hidden');
                        widthWrapper = $(conteiner).width();
                        widthBox = $(this).width();
                    }
                    $(this).addClass('TP-autoWidth-plugin');
                } else {
                    small = true;
                    while (small) {
                        small = false;
                        if ($(this).find('tr td.TP-unessential.TP-hidden').length) {
                            hidden = $('td.TP-unessential.TP-hidden:first', $(this).find('tr'));
                            hidden.removeClass('TP-hidden');
                            widthWrapper = $(conteiner).width();
                            widthBox = $(this).width();
                            if (widthBox > widthWrapper) {
                                hidden.addClass('TP-hidden');
                                $(this).addClass('TP-autoWidth-plugin');
                            } else {
                                small = true;
                            }
                        }
                    }
                }
            });
        }

        checkSize();
        $(window).resize(checkSize);
        $(document).find('.TP-Plugin-Tables_box > tbody  > tr').each(function () {
            if($(this).children("td:last").children('.TPPopUpButtonTable').length > 0 &&
                $(this).children("td:last").hasClass('TP-hidden')){
                //$(this).children("td:last").children('.TPPopUpButtonTable').clone();
                if ( $(".TP-Plugin-Tables_box tbody tr td:last-child").hasClass("TP-hidden") ) {
                    if ( $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(2)").hasClass("TP-hidden") ) {
                        if ( $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(3)").hasClass("TP-hidden") ) {
                            if ( $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(4)").hasClass("TP-hidden") ) {
                                ;
                            }else{
                                $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(4)").append($(this).children("td:last").children('.TPPopUpButtonTable').clone());
                                console.log("eq(-3)");
                            };
                        }else{
                            $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(3)").append($(this).children("td:last").children('.TPPopUpButtonTable').clone());
                            console.log("eq(-2)");
                        };
                    }else{
                        $(".TP-Plugin-Tables_box tbody tr td:nth-last-child(2)").append($(this).children("td:last").children('.TPPopUpButtonTable').clone());
                        console.log("eq(-1)");
                    };
                }else{
                    $(".TP-Plugin-Tables_box tbody tr td:last-child").append($(this).children("td:last").children('.TPPopUpButtonTable').clone());
                }
            }
        })


    });
});


/*jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    /*tpCityAutocomplete = new TPCityAutocomplete();
    tpCityAutocomplete.TPCityStandTable("[data-city-iata]", "city-iata");
    tpCityAutocomplete.TPCityStandTitle("[data-title-case-origin-iata]", "title-case-origin-iata", title_case_origin);
    tpCityAutocomplete.TPCityStandTitle("[data-title-case-destination-iata]", "title-case-destination-iata", title_case_destination);

    tpCityAutocomplete.TPAirlineStandTable("[data-airline-iata]", "airline-iata");*
    jQuery.fn.dataTableExt.oSort['tp-date-asc']  = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };

    jQuery.fn.dataTableExt.oSort['tp-date-desc'] = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    }
    jQuery.fn.dataTableExt.oSort['tp-found-asc']  = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };

    jQuery.fn.dataTableExt.oSort['tp-found-desc'] = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    }
    jQuery.fn.rowCount = function() {
        return $('tr', $(this).find('tbody')).length;
    };
    jQuery.fn.dataTableExt.oSort['tp-price-asc']  = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };

    jQuery.fn.dataTableExt.oSort['tp-price-desc'] = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    }
    doc.ready(function(){
        doc.find('.btn-table').parent('p').addClass('parrentBtn');

        doc.find('.sortable').each(function () {
            $(this).dataTable( {
                ordering: true,
                "order": [[ $(this).data('sort_column'), "asc" ]],
                paging: ($(this).data("paginate") && ($(this).data("paginate_limit") < $(this).rowCount())),
                iDisplayLength: $(this).data("paginate_limit"),
                "bLengthChange": false,
                searching: false,
                bFilter: false,
                bInfo: false,
                columnDefs: [
                    {
                        targets: $(this).data('sort_column'),
                        className: 'active-w'
                    },
                    { "aTargets" : ["tp-date-column"] , "sType" : "tp-date"},
                    { "aTargets" : ["tp-found-column"] , "sType" : "tp-found"},
                    { "aTargets" : ["tp-price-column"] , "sType" : "tp-price"}
                ],
                "oLanguage":{
                    "oPaginate": {
                        "sNext": null,
                        "sLast": null,
                        "sFirst": null,
                        "sPrevious": null
                    }
                }
            } );
        });
        doc.find(".w-table").each(function(i,e){
            var countTd = $(this).children('thead').children('tr').children('td').length + 5;
            $(this).parent('.dataTables_wrapper').css({'margin' : '0 auto', 'max-width': $(this).find("thead").width() + countTd})
        });

    });

    doc.find('td.TPTableHead').click(function () {
        $(this).parent('tr').find("td.active-w").each(function(){
            $(this).removeClass("active-w");
        });
        $(this).addClass("active-w");
    });


    doc.find('td.TPTableTbodyTd').hover(function() {
        $(this).children("p").each(function(){
            if(textWidth($(this).text(), $(this).html(), $(this)) > $(this).width()){
                var textIndentLeft = ((textWidth($(this).text(), $(this)) - $(this).width()+16));
                $(this).animate({"textIndent":"-"+textIndentLeft}, 1500);
            }
        });
    }, function(){
        $(this).children("p").each(function(){
            if(textWidth($(this).text(),$(this).html(), $(this)) > $(this).width()){
                $(this).animate({"textIndent":"0"}, 1500);
            }
        });
    });
    /**
     *
     * @param text
     * @param selector
     * @returns {*}
     *
    function textWidth(text, html_data, selector){
        /*console.log(text);
        console.log(html_data);
        console.log(selector);

        /*selector.html('<span>'+text+'</span>');
        var width = selector.find('span:first').width();
        selector.html(html_data);
        return width;  *
    }
    var PopularRoutesWidgets = $('.TP-PopularRoutesWidgets');
    PopularRoutesWidgets.each(function(){
        var $items = $(this).find('.TP-PopularRoutesWidget');
        var width = 100/$items.length - 3;
        $items.each(function(i,e){
            $(e).css('width', width+"%");
        });
    });



    });*/
