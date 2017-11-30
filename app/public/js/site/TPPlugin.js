jQuery(function($) {
    $(document).ready(function () {
        var size_list = $(".TPReadMoreList  > div").size();
        var x=1;
        console.log(size_list)
        /*$('.TPReadMoreList div:lt('+x+')').show();
         $('.TPReadMoreButton').click(function () {
         x= (x+5 <= size_li) ? x+5 : size_li;
         $('.TPReadMoreList div:lt('+x+')').show();
         });*/

        $('.TPReadMoreList > div:lt('+x+')').show();
        $('.TPReadMoreButton').click(function () {
            console.log("click");
            x= (x+1 <= size_list) ? x+1 : size_list;
            console.log(x)
            $('.TPReadMoreList > div:lt('+x+')').show();
        });
        if ( x == size_list)  $('.TPReadMoreButton').hide()

        $( ".TPTabs" ).tabs({
            beforeActivate: function( event, ui ) {
                console.log('beforeActivate');
                /* setTimeout(function() {
                 checkSize();
                 }, 2000)*/

            }
        });

        $('.TPButtonTableDates').bind( "click", handlerRailwayDatepickerTest );

    });

    var handlerRailwayDatepickerTest = function (e) {
        e.preventDefault()
        var link, picker, linkUrl, target, dateUrl, linkOpen;
        link = $(this);
        //link.unbind('click');
        target = parseInt(link.data('target'));
        linkUrl = link.data('href');
        picker = link.pikaday({
            firstDay: 1,
            i18n: {
                previousMonth : 'Предыдущий месяц',
                nextMonth     : 'Следующий месяц',
                months        : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Aвгуст','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                weekdays      : ['Понедельник','Вторник','Среда','Четверг','Пятницу','Суббота','Воскресенье'],
                weekdaysShort : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']
            },
            minDate: new Date(),
            maxDate: new Date(new Date().setDate(new Date().getDate() + 90)),
            linkURL: linkUrl,
            linkTarget: target,
            onDraw: function () {
                $(document).find('.tp-pika-link').click(function (e) {
                    picker.pikaday('hide');
                    picker.pikaday('destroy');
                });
            },
            onOpen: function () {
                console.log('onOpen')
                $(document).find('.tp-pika-link').click(function (e) {
                    picker.pikaday('hide');
                    picker.pikaday('destroy');
                });
            },
            onSelect: function(date) {
                console.log('onSelect')
                var dateFormat;
                dateFormat = new Date(date);
                dateUrl = dateFormat.format('yyyy-mm-d');
                linkUrl += dateFormat.format('yyyy-mm-d');
                console.log(linkUrl)
                console.log(dateUrl)
            },
            onClose: function() {
                console.log('onClose')
                console.log(linkUrl);
                console.log(dateUrl);
            },

        });
        picker.pikaday('show');
    }

    /*var handlerRailwayDatepicker = function () {
        var link, picker, linkUrl, target, dateUrl, linkOpen;
        link = $(this);
        link.unbind('click');
        target = parseInt(link.data('target'));
        linkUrl = link.data('href');
        picker = link.pikaday({
            firstDay: 1,
            i18n: {
                previousMonth : 'Предыдущий месяц',
                nextMonth     : 'Следующий месяц',
                months        : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Aвгуст','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                weekdays      : ['Понедельник','Вторник','Среда','Четверг','Пятницу','Суббота','Воскресенье'],
                weekdaysShort : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']
            },
            minDate: new Date(),
            maxDate: new Date(new Date().setDate(new Date().getDate() + 90)),
            //yearRange: [2000,2020],
            onOpen: function () {
                console.log('onOpen')
            },
            onDraw: function () {
                console.log('onDraw')
                //console.log($(document).find('.pika-button'))
            },
            onSelect: function(date) {
                console.log('onSelect')
                var dateFormat;
                dateFormat = new Date(date);
                dateUrl = dateFormat.format('yyyy-mm-d');
                linkUrl += dateFormat.format('yyyy-mm-d');
                //link.attr('href', linkUrl);
                //link.bind('click');
                openInNewTab(link, picker, linkUrl, target);
            },
            onClose: function() {
                console.log('onClose')
                console.log(linkUrl);
                console.log(dateUrl);
            },

        });
        console.log(linkUrl);
        console.log(dateUrl);
        //picker.eq(0).pikaday('show');
        picker.pikaday('show');
    };
    var handlerRailwayClickLink = function (url) {
        window.open(url);
        //window.open(url, '_blank');
    }

    function openLink(strUrl, picker) {
        console.log( $(document).find( ":focus" ))
        $(document).find( "body" ).focus();
        picker.pikaday('destroy');
        $(document).find('.pika-single').detach();
        var evLink = document.createElement('a');
        evLink.href = strUrl;
        evLink.target = '_blank';
        document.body.appendChild(evLink);
        evLink.click();
// Now delete it
        evLink.parentNode.removeChild(evLink);
    }

    function openInNewTab(link, picker, url, target) {
        picker.pikaday('destroy');
        $(document).find('.pika-single').detach();
        if (target == 1){
            //openLink(url)
            gBrowser.selectedTab = gBrowser.addTab("http://example.com");
            /*var frm = $('<form   method="get" action="' + url + '" target="_blank"></form>')
            $(document).find("body").append(frm);
            frm.submit().remove();
            var data = {url: url};
            console.log(ajaxurl)
            console.log(ajaxurl+'?action=railway_open_link')
            $.ajax({
                url: ajaxurl + '?action=railway_open_link',
                type: "POST", // Делаем POST запрос
                data: data,
                success: function (data) {
                    console.log(data.substring(0, data.length - 1));
                    console.log('success');
                    //document.location.href = '';
                }
            });

            /*

             */
            //link.bind( "click", handlerRailwayDatepicker );
            /*link.removeAttr("href");
            link.attr("href", url);
            link.attr("target", "_blank");
            fakeClick(link);
            //$('body').append('<a id="openLinkNewTab" href="' + url + '" target="_blank"><span></span></a>').find('#openLinkNewTab span').click().remove();
          /*  link.unbind( "click" );
            link.removeAttr("href");
            link.attr("href", url);
            link.attr("target", "_blank");

            link[0].click();
            //link.attr("onclick", "openLink('"+url+"'); return false;");
            //link[0].onclick;
            //link
            //link.bind( "click", handlerRailwayClickLink(url) );
            //link.click();
            link.unbind("click");
            link.bind( "click", handlerRailwayDatepicker );
            return false;*
        } else {
            document.location.href = url;
        }
        return false;
    }*/

    var conteiner = '.TP-Plugin-Tables_wrapper';
    var table = ' .TP-Plugin-Tables_box';

    function checkSize() {
        console.log('checkSize');
        var widthWrapper, widthBox, hidden, small;
        $(table).each(function () {
            $(this).removeClass('TP-autoWidth-plugin');
            widthWrapper = $(this).parents(conteiner).width();
            widthBox = $(this).width();
            if (widthBox > widthWrapper) {
                while (widthBox > widthWrapper) {
                    if (!$(this).find('tr td.TP-unessential:not(.TP-hidden)').length)
                        return false;
                    $('td.TP-unessential:not(.TP-hidden):last', $(this).find('tr')).addClass('TP-hidden');
                    widthWrapper = $(this).parents(conteiner).width();
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
                        widthWrapper = $(this).parents(conteiner).width();
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
});


jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    /*tpCityAutocomplete = new TPCityAutocomplete();
     tpCityAutocomplete.TPCityStandTable("[data-city-iata]", "city-iata");
     tpCityAutocomplete.TPCityStandTitle("[data-title-case-origin-iata]", "title-case-origin-iata", title_case_origin);
     tpCityAutocomplete.TPCityStandTitle("[data-title-case-destination-iata]", "title-case-destination-iata", title_case_destination);
     tpCityAutocomplete.TPAirlineStandTable("[data-airline-iata]", "airline-iata");*/

    /*console.log(jQuery.fn);
    console.log($.fn.dataTableExt );
    console.log($.fn.dataTableExt.oSort );
    console.log(jQuery.fn.dataTableExt);
    console.log(jQuery.fn.dataTableExt.oSort);*/

    /** **/
    $.fn.dataTableExt.oSort['tp-date-asc']  = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        //console.log(y);
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    $.fn.dataTableExt.oSort['tp-date-desc'] = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    /** **/
    $.fn.dataTableExt.oSort['tp-found-asc']  = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    $.fn.dataTableExt.oSort['tp-found-desc'] = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    /** **/
    $.fn.rowCount = function() {
        return $('tr', $(this).find('tbody')).length;
    };

    /** **/
    $.fn.getPaginateTP = function() {
        if($(this).data("paginate") == true){
            if($(this).rowCount() > $(this).data("paginate_limit") ){
                return true;
            }
        }
        return false;

    };

    /** **/
    $.fn.dataTableExt.oSort['tp-price-asc']  = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    $.fn.dataTableExt.oSort['tp-price-desc'] = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    $.fn.dataTableExt.oSort['tp-airline_logo-asc']  = function(a,b) {

        var x = ($(a).data("tpairline"));
        var y = ($(b).data("tpairline"));
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    $.fn.dataTableExt.oSort['tp-airline_logo-desc'] = function(a,b) {
        var x = ($(a).data("tpairline"));
        var y = ($(b).data("tpairline"));
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };
    /** **/
    function tpTableCod(selector){
        var tpTable, tableSortColumn;
        tableSortColumn = getSortColumn(selector);

        tpTable = selector.dataTable( {
            ordering: true,
            "order": [[ tableSortColumn, "asc" ]],//[[ $(this).data('sort_column'), "asc" ]],
            paging: selector.getPaginateTP(),
            iDisplayLength:  selector.data("paginate_limit"),
            "bLengthChange": false,
            searching: false,
            bFilter: false,
            bInfo: false,
            columnDefs: [
                {
                    targets: tableSortColumn,//$(this).data('sort_column'),
                    className: 'TP-active'
                },
                { "aTargets" : ["tp-nosort-column"] , "orderable" : false},
                { "aTargets" : ["tp-date-column"] , "sType" : "tp-date"},
                { "aTargets" : ["tp-found-column"] , "sType" : "tp-found"},
                { "aTargets" : ["tp-price-column"] , "sType" : "tp-price"},
                { "aTargets" : ["tp-airline_logo-column"] , "sType" : "tp-airline_logo"}
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
        //console.log(tpTable.getPaginateTP())
        //console.log(tpTable.rowCount())
        return tpTable;
    }

    /** **/
    function tpTableInit(){
        doc.find('.TP-Plugin-Tables_box').each(function () {
            var tpTable;
            tpTable = tpTableCod($(this));
            //console.log(tableSortColumn);
            //console.log(tpTable)
        });
    }

    /** **/
    function tpTableResize(){

        doc.find('.TP-Plugin-Tables_box').each(function () {
            var tpTable;
            $(this).children('thead').children('tr').find("td.TP-active").each(function(){
                $(this).removeClass("TP-active");
            });
            $(this).dataTable().fnDestroy();
            tpTable = tpTableCod($(this));

        });
    }

    /** **/
    doc.ready(function(){
        $.fn.dataTableExt.sErrMode = 'throw';
        //doc.find('.btn-table').parent('p').addClass('parrentBtn');
        win.resize(tpTableResize);
        tpTableInit();

    });

    /**
     *
     * @param selector
     * @returns {number}
     */
    function getSortColumn(selector){
        var column = selector.data('sort_column');
        console.log('getSortColumn = '+column);
        if(selector.children('thead').children('tr').children('td:eq('+column+')').hasClass("TP-hidden") === false){
            return column;
        } else  {
            selector.children('thead').children('tr').children('td').each(function(index, value){
                if(!$(this).hasClass("TP-hidden")){
                    column = index;
                    return false;
                }
            });
            return column;
        }

    }

    doc.find('td.TPTableHead').click(function () {
        if ($(this).hasClass( "tp-nosort-column" ) == false){
            $(this).parent('tr').find("td.TP-active").each(function(){
                $(this).removeClass("TP-active");
            });
            $(this).addClass("TP-active");
        }

    });
    var PopularRoutesWidgets = $('.TP-PopularRoutesWidgets');
    PopularRoutesWidgets.each(function(){
        var $items = $(this).find('.TP-PopularRoutesWidget');
        //var width = Math.round(100/$items.length - 3);
        var width = 100/$items.length - 1;

        //console.log(100/$items.length);
        //console.log(width_new);

        //console.log($items.length)
        var count = $items.length - 1;
        $items.each(function(i,e){
            //console.log(i)

            if (i != count){
                var width_new = width;
                $(e).css('margin-right', "1%");
                $(e).css('width', (width_new - 1)+"%");
            } else {
                $(e).css('width', width+"%");
            }

        });
    });

    /*doc.find('td.TPTableTbodyTd').hover(function() {
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
     });**/


    //Расчет ширины столбца и добавления стилей в зависимости от ширины
    $(document).ready(function () {
        $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("width", "auto !important");
        var width_departure = $(".TPTrainTable .TPTHdepartureTd").width();
        if(width_departure<="85"){
            $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("max-width", "20px");
        }else {
            $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("max-width", "100px");
        }
        
        var width_departure_description = $(".TPTrainTable .TPdepartureTd").width();
        if(width_departure_description<="85"){
            $(".TPdepartureTd .span-timeComming").removeClass("TPactive");
        }else {
            $(".TPdepartureTd .span-timeComming").addClass("TPactive");
        }
        
        var width_departure_description = $(".TPTrainTable .TParrivalTd").width();
        if(width_departure_description<="85"){
            $(".TParrivalTd .span-timeComming").removeClass("TPactive");
        }else {
            $(".TParrivalTd .span-timeComming").addClass("TPactive");
        }
    });

    //Расчет ширины столбца и добавления стилей в зависимости от ширины (по ресайзу окна)
    $(document).resize(function () {
        $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("width", "auto !important");
        var width_departure = $(".TPTrainTable .TPTHdepartureTd").width();
        if(width_departure<="85"){
            $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("max-width", "20px");
        }else {
            $(".TP-Plugin-Tables_box_thead .TPdepartureTd.TPTableHead").css("max-width", "100px");
        }
        
        var width_departure_description = $(".TPTrainTable .TPdepartureTd").width();
        if(width_departure_description<="85"){
            $(".TPdepartureTd .span-timeComming").removeClass("TPactive");
        }else {
            $(".TPdepartureTd .span-timeComming").addClass("TPactive");
        }
        
        var width_departure_description = $(".TPTrainTable .TParrivalTd").width();
        if(width_departure_description<="85"){
            $(".TParrivalTd .span-timeComming").removeClass("TPactive");
        }else {
            $(".TParrivalTd .span-timeComming").addClass("TPactive");
        }
    });
});