jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    /*tpCityAutocomplete = new TPCityAutocomplete();
    tpCityAutocomplete.TPCityStandTable("[data-city-iata]", "city-iata");
    tpCityAutocomplete.TPCityStandTitle("[data-title-case-origin-iata]", "title-case-origin-iata", title_case_origin);
    tpCityAutocomplete.TPCityStandTitle("[data-title-case-destination-iata]", "title-case-destination-iata", title_case_destination);

    tpCityAutocomplete.TPAirlineStandTable("[data-airline-iata]", "airline-iata");*/
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
        doc.find('.sortable').each(function () {
            $(this).dataTable( {
                ordering: true,
                "order": [[ 0, "asc" ]],
                paging: ($(this).data("paginate") < $(this).rowCount()),
                iDisplayLength : $(this).data("paginate"),
                "bLengthChange": false,
                searching: false,
                bFilter: false,
                bInfo: false,
                columnDefs: [
                    {
                        targets: 0,
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


    });

    doc.find('td.TPTableHead').click(function () {
        doc.find("td.active-w").each(function(){
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
     */
    function textWidth(text, html_data, selector){
        console.log(text);
        console.log(html_data);
        console.log(selector);

        /*selector.html('<span>'+text+'</span>');
        var width = selector.find('span:first').width();
        selector.html(html_data);
        return width;  */
    }
    var PopularRoutesWidgets = $('.TP-PopularRoutesWidgets');
    PopularRoutesWidgets.each(function(){
        var $items = $(this).find('.TP-PopularRoutesWidget');
        var width = 100/$items.length - 3;
        $items.each(function(i,e){
            $(e).css('width', width+"%");
        });
    });

    });
