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

        $('.TPButtonTableDates').each(function(index, element) {
            $(element).pikaday({
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
                onSelect: function(date) {
                    var dateFormat, tutuURL, target;
                    dateFormat = new Date(date);
                    target = parseInt($(element).data('target'));
                    tutuURL = $(element).data('href')+dateFormat.format('yyyy-mm-d');
                    openInNewTab(tutuURL, target);

                }
            });
        });

        function openInNewTab(url, target) {
            console.log(url);
            console.log(target);
            if (target == 1){
                window.open(url, '_blank');
            } else {
                document.location.href = url;
            }
            return false;
        }

        /* var datepicker = $('.TPButtonTableDates').pikaday({
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
         onSelect: function(date) {
         // var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
         // console.log(this.getMoment().format().substring(0, 10));
         var dateFormat = new Date(date);
         console.log(dateFormat.getFullYear())
         console.log(dateFormat.getMonth())
         console.log(dateFormat.getDate())
         console.log(dateFormat.format('yyyy-mm-d'))
         console.log($(this))
         console.log(datepicker.data('href'))
         //console.log($(this).fieldValue())
         }
         });*/







        /*$(document).find('.TP-Plugin-Tables_box > tbody  > tr').each(function () {
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
         })*/


    });
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

    /** **/
    jQuery.fn.dataTableExt.oSort['tp-date-asc']  = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        //console.log(y);
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-date-desc'] = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    /** **/
    jQuery.fn.dataTableExt.oSort['tp-found-asc']  = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-found-desc'] = function(a,b) {
        var x = ($(a).data("tpctime") - $(a).data("tptime"));
        var y = ($(b).data("tpctime") - $(b).data("tptime"));
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    /** **/
    jQuery.fn.rowCount = function() {
        return $('tr', $(this).find('tbody')).length;
    };

    /** **/
    jQuery.fn.getPaginateTP = function() {
        if($(this).data("paginate") == true){
            if($(this).rowCount() > $(this).data("paginate_limit") ){
                return true;
            }
        }
        return false;

    };

    /** **/
    jQuery.fn.dataTableExt.oSort['tp-price-asc']  = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-price-desc'] = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };

    jQuery.fn.dataTableExt.oSort['tp-airline_logo-asc']  = function(a,b) {

        var x = ($(a).data("tpairline"));
        var y = ($(b).data("tpairline"));
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-airline_logo-desc'] = function(a,b) {
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