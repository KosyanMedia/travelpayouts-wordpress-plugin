jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function(){

    });
    doc.find('#constructorShortcodesButton').click(function (e) {
        doc.find( "#constructorShortcodesModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 400,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            //position: { my: "center bottom", at: "center top", of: $('#constructorShortcodesButton')},
            open : function() {
                $(this).parent().css({   position:'absolute',
                    left: (win.width() - $(this).parent().outerWidth())/2,
                    top: (win.height() - $(this).parent().outerHeight())/2
                });

            },
            buttons: [
                {
                    id: "constructorShortcodesButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, airline, shortcodes, title, limit, trip_class,paginate;
                        shortcodes = "";
                        origin = doc.find('#origin').val();
                        origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                        destination = doc.find('#destination').val();
                        destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                        airline = doc.find('#airline').val();
                        airline = airline.substring(airline.indexOf('[')+1,airline.indexOf(']'));
                        title = doc.find('#tp_title').val();
                        limit = doc.find('#limit').val();
                        trip_class = doc.find('#select_trip_class').val();
                        if(doc.find('#paginate').is(":checked")){
                            paginate = "paginate=true";
                        }else{
                            paginate = "paginate=false";
                        }
                        switch (doc.find('#select_shortcodes').val()){
                            case '0':
                                doc.find('#select_shortcodes').addClass('constructorShortcodesError');
                                break;
                            case '1':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_price_calendar_month_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '2':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_price_calendar_week_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            /*case '3':
                                // --
                                doc.find('#tr_title').show();
                                break;*/
                            case '3':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_cheapest_flights_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '4':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_cheapest_ticket_each_day_month_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '5':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_cheapest_tickets_each_month_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '6':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                if(origin != "" && destination != ""){
                                    setShortcodes("[tp_direct_flights_route_shortcodes origin="+origin+" " +
                                        "destination="+destination+" title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '7':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }else{
                                    setShortcodes("[tp_direct_flights_shortcodes origin="+origin+" " +
                                        " title=\""+title+"\" limit="+limit+" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '8':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }else{
                                    setShortcodes("[tp_popular_routes_from_city_shortcodes origin="+origin+" " +
                                        " title=\""+title+"\" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '9':
                                if(airline == ""){
                                    doc.find('#airline').addClass('constructorShortcodesError');
                                }else{
                                    setShortcodes("[tp_popular_destinations_airlines_shortcodes airline="+airline+" " +
                                        " title=\""+title+"\" limit="+limit+" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '10':

                                break;
                            case '11':
                                setShortcodes("[tp_our_site_search_shortcodes " +
                                    " title=\""+title+"\" limit="+limit+" "+paginate+"]",
                                    $(this));
                                break;
                            case '12':
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }else{
                                    setShortcodes("[tp_from_our_city_fly_shortcodes origin="+origin+" " +
                                        " title=\""+title+"\" limit="+limit+" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            case '13':
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }else{
                                    setShortcodes("[tp_in_our_city_fly_shortcodes destination="+destination+
                                        " title=\""+title+"\" limit="+limit+" "+paginate+"]",
                                        $(this));
                                }
                                break;
                            default :
                                if(origin == ""){
                                    doc.find('#origin').addClass('constructorShortcodesError');
                                }
                                if(destination == ""){
                                    doc.find('#destination').addClass('constructorShortcodesError');
                                }
                                break;
                        }
                    }
                },
                {
                    id: "constructorShortcodesButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                },

            ],
            close: function( event, ui ) {
                doc.find("#limit").val("");
                $("#select_shortcodes :first").attr("selected", "selected");
                doc.find('#tr_title').hide();
                doc.find('#tr_origin').hide();
                doc.find('#tr_destination').hide();
                doc.find('#tr_airline').hide();
                doc.find('#tr_limit').hide();
                doc.find('#tr_trip_class').hide();
                doc.find('#tr_paginate').hide();
                doc.find('#origin, #destination, #airline, #select_shortcodes').removeClass('constructorShortcodesError');
            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorShortcodesModal");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete", "#constructorShortcodesModal");

        doc.find('#origin, #destination, #airline').focus(function() {
            $(this).removeClass('constructorShortcodesError');
        });
        /*doc.find('#constructorShortcodesButtonOk').click(function (e) {
            console.log(111);
        });*/
        doc.find('.constructorDateShortcodes').datepicker({
            dateFormat : "dd-mm-yy"
        });
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: '&#x3c;Пред',
            nextText: 'След&#x3e;',
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            weekHeader: 'Не',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['ru']);
        constructorShortcodesSelect();
    });

    /*** **/
    function constructorShortcodesSelect(){
        doc.find('#td_select_shortcodes').on('change', '#select_shortcodes', function(e) {
            e.preventDefault();
            doc.find('#select_shortcodes').removeClass('constructorShortcodesError');
            doc.find('#tr_title').hide();
            doc.find('#tr_origin').hide();
            doc.find('#tr_destination').hide();
            doc.find('#tr_airline').hide();
            doc.find('#tr_limit').hide();
            doc.find('#tr_trip_class').hide();
            doc.find('#tr_paginate').hide();
            doc.find("#limit").val("");
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                case '2':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                /*case '3':
                    doc.find('#tr_title').show();
                    break;*/
                case '3':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                case '4':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                case '5':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                case '6':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    break;
                case '7':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_limit').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    break;
                case '8':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_origin').show();
                    break;
                case '9':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_airline').show();
                    doc.find('#tr_limit').show();
                    break;
                case '10':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    break;
                case '11':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_limit').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    break;
                case '12':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_limit').show();
                    doc.find('#tr_origin').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    break;
                case '13':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_limit').show();
                    doc.find('#tr_destination').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    break;
            }
        });
    }
    /*** **/
    doc.find('#constructorWidgetButton').click(function (e) {
        doc.find( "#constructorWidgetModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 400,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            open : function() {
                $(this).parent().css({   position:'absolute',
                    left: (win.width() - $(this).parent().outerWidth())/2,
                    top: (win.height() - $(this).parent().outerHeight())/2
                });

            },
            buttons: [
                {
                    id: "constructorWidgetButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, width, height, direct, one_way, responsive, hotel_id, count, location;
                        origin = doc.find('#origin_widget').val();
                        origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                        destination = doc.find('#destination_widget').val();
                        destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                        hotel_id = doc.find('#hotel_id_widget').val();
                        hotel_id = hotel_id.substring(hotel_id.indexOf('[')+1,hotel_id.indexOf(']'));
                        width = doc.find('#size_widget_width').val();
                        height = doc.find('#size_widget_height').val();
                        switch (doc.find('#select_widgets').val()) {
                            case '0':
                                doc.find('#select_widgets').addClass('constructorShortcodesError');
                                break;
                            case '1':
                                if (origin == "") {
                                    doc.find('#origin_widget').addClass('constructorShortcodesError');
                                }else {
                                    if(doc.find('#direct_widget').is(":checked")){
                                        direct = "direct=true";
                                    }else{
                                        direct = "";
                                    }

                                    setShortcodes("[tp_map_widget origin=" + origin + " width="+width+" height="+height+" "+direct+"]",
                                        $(this));
                                }
                                break
                            case '2':
                                location = doc.find('#hotel_id_widget').val();
                                location = location.substring(location.indexOf('{')+1,location.indexOf('}'));
                                if(location == ""){
                                    doc.find('#hotel_id_widget').addClass('constructorShortcodesError');
                                }else {
                                    setShortcodes("[tp_hotelmap_widget coordinates=\"" + location + "\" width="+width+" height="+height+"]",
                                        $(this));
                                }
                                break;
                            case '3':
                                if (origin == "") {
                                    doc.find('#origin_widget').addClass('constructorShortcodesError');
                                }
                                if (destination == "") {
                                    doc.find('#destination_widget').addClass('constructorShortcodesError');
                                }
                                if (origin != "" && destination != ""){
                                    if(doc.find('#direct_widget').is(":checked")){
                                        direct = "direct=true";
                                    }else{
                                        direct = "";
                                    }
                                    if(doc.find('#one_way_widget').is(":checked")){
                                        one_way = "one_way=true";
                                    }else{
                                        one_way = "";
                                    }
                                    if(doc.find('#responsive_widget').is(":checked")){
                                        responsive = "responsive=true";
                                    }else{
                                        responsive = "width="+doc.find('#responsive_width').val();
                                    }
                                    setShortcodes("[tp_calendar_widget origin="+origin+" destination="+destination+" "+direct+" "+one_way+" "+responsive+"]",
                                        $(this));
                                }
                                break;
                            case '4':
                                if (origin == "") {
                                    doc.find('#origin_widget').addClass('constructorShortcodesError');
                                }
                                if (destination == "") {
                                    doc.find('#destination_widget').addClass('constructorShortcodesError');
                                }
                                if (origin != "" && destination != ""){
                                    if(doc.find('#responsive_widget').is(":checked")){
                                        responsive = "responsive=true";
                                    }else{
                                        responsive = "width="+doc.find('#responsive_width').val();
                                    }
                                    setShortcodes("[tp_subscriptions_widget origin="+origin+" destination="+destination+" "+responsive+"]",
                                        $(this));
                                }
                                break;
                            case '5':
                                if (hotel_id == "") {
                                    doc.find('#hotel_id_widget').addClass('constructorShortcodesError');
                                }

                                if (hotel_id != ""){
                                    if(doc.find('#responsive_widget').is(":checked")){
                                        responsive = "responsive=true";
                                    }else{
                                        responsive = "width="+doc.find('#responsive_width').val();
                                    }
                                    //width = doc.find('#hotel_size_widget_width').val();
                                    setShortcodes("[tp_hotel_widget hotel_id="+hotel_id+" "+responsive+"]",
                                        $(this));
                                }
                                break;
                            case '6':
                                count = parseInt(doc.find('#popular_routes_widget_count').val());
                                if(count == 1){
                                    //tr_popular_routes_destination-0
                                    var destination_r = doc.find('#popular_routes_destination-0').val();
                                    destination_r = destination_r.substring(destination_r.indexOf('[')+1,destination_r.indexOf(']'));
                                    if(destination_r == ""){
                                        doc.find('#popular_routes_destination-0').addClass('constructorShortcodesError');
                                    }else{
                                        if(doc.find('#responsive_widget').is(":checked")){
                                            responsive = "responsive=true";
                                        }else{
                                            responsive = "width="+doc.find('#responsive_width').val();
                                        }
                                        setShortcodes("[tp_popular_routes_widget destination="+destination_r+"  "+responsive+"]",
                                            $(this));
                                    }
                                }else{
                                    var shortcode, count_s;
                                    shortcode = '';
                                    count_s = 0;
                                    responsive = "responsive=true";
                                    for(var i = 0; i < count; i++){
                                        var destination_r = doc.find('#popular_routes_destination-'+i).val();
                                        destination_r = destination_r.substring(destination_r.indexOf('[')+1,destination_r.indexOf(']'));
                                        if(destination_r == ""){
                                            doc.find('#popular_routes_destination-'+i).addClass('constructorShortcodesError');
                                        }else{
                                            count_s++;
                                            shortcode += "<div class='TP-PopularRoutesWidget'>[tp_popular_routes_widget destination="+destination_r+" "+responsive+"]</div>";
                                        }
                                    }
                                    if(count == count_s){
                                        shortcode = '<div class="TP-PopularRoutesWidgets">'+shortcode+'</div>'
                                        //console.log(shortcode);
                                        setShortcodes(shortcode, $(this));
                                    }
                                }

                                break;
                        }

                    }
                },
                {
                    id: "constructorWidgetButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );

                    }
                },

            ],
            close: function( event, ui ) {
                resetConstructorWidgetModal();
                $("#select_widgets :first").attr("selected", "selected");
            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorWidgetModal");
        tpCityAutocomplete.TPHotelAutocompleteInit(".constructorHotelShortcodesAutocomplete", "#constructorWidgetModal");
        doc.find('#origin').focus(function() {
            $(this).removeClass('constructorShortcodesError');

        });
        doc.find('.TPPopularRoutesInput').focus(function() {
            $(this).removeClass('constructorShortcodesError');

        });


        doc.find('#tr_popular_routes_widget').on('change', '#popular_routes_widget_count', function(e) {
            //console.log($(this).val());
            if($(this).val() > 1){
                doc.find('#tr_responsive_widget').hide();
            }else{
                doc.find('#tr_responsive_widget').show();
                doc.find('#responsive_width').val(doc.find('#select_widgets').data('widgets-size-width-6'));
                switch ($(this).data('widgets-responsive-6')){
                    case 0:
                        doc.find('#responsive_widget').attr('checked', false);
                        break;
                    case 1:
                        doc.find('#responsive_widget').attr('checked', true);
                        break;
                }
            }

            doc.find('.TPPopularRoutes').remove();
            for(var i = 0; i < $(this).val(); i++){
                if(!$('tr').is('#tr_popular_routes_destination-'+i)){
                    doc.find('#tr_responsive_widget')
                        .before('<tr id="tr_popular_routes_destination-'+i+'" class="TPPopularRoutes">' +
                        '<td>' +
                        '<input type="text" name="popular_routes_destination-'+i+'"' +
                        'id="popular_routes_destination-'+i+'" value=""' +
                        'placeholder="'+TPDestinationTitle+'"'+
                        'class="constructorCityShortcodesAutocomplete TPPopularRoutesInput regular-text code">' +
                        '</td>' +
                        '</tr>');
                }
            }
            doc.find('.TPPopularRoutesInput').focus(function() {
                $(this).removeClass('constructorShortcodesError');

            });
            doc.find('.TPPopularRoutes').show();
            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorWidgetModal");
        });
        doc.find('#td_select_widgets').on('change', '#select_widgets', function(e) {
            doc.find('#responsive_label').on('change', '#responsive_widget', function(e) {
                if($(this).is(":checked")) {
                    doc.find('#responsive_width_label').hide();
                }else{
                    doc.find('#responsive_width_label').show();

                }

            });
                e.preventDefault();
            var tbody;
            tbody = $(this).parent('#td_select_widgets').parent('#tr_select_widgets').parent('tbody');
            $(this).removeClass('constructorShortcodesError');
            resetConstructorWidgetModal();

            tbody.children('#tr_hotel_id_widget').children('td').children('input').removeClass('TPCoordinatesAutocomplete');
            tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPOriginTitle);
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_origin_widget').show();
                    doc.find('#tr_size_widget').show();
                    doc.find('#tr_direct_widget').show();
                    doc.find('#size_widget_width').val($(this).data('widgets-size-width-1'));
                    doc.find('#size_widget_height').val($(this).data('widgets-size-height-1'));
                    switch ($(this).data('widgets-direct-1')){
                        case 0:
                            doc.find('#direct_widget').attr('checked', false);
                            break;
                        case 1:
                            doc.find('#direct_widget').attr('checked', true);
                            break;
                    }
                    break;
                case '2':
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').addClass('TPCoordinatesAutocomplete');
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPLocationTitlt);
                    doc.find('#tr_hotel_id_widget').show();
                    doc.find('#tr_size_widget').show();
                    doc.find('#size_widget_width').val($(this).data('widgets-size-width-2'));
                    doc.find('#size_widget_height').val($(this).data('widgets-size-height-2'));
                    break;
                case '3':
                    doc.find('#tr_origin_widget').show();
                    doc.find('#tr_destination_widget').show();
                    doc.find('#tr_direct_widget').show();
                    doc.find('#tr_one_way_widget').show();

                    switch ($(this).data('widgets-direct-3')){
                        case 0:
                            doc.find('#direct_widget').attr('checked', false);
                            break;
                        case 1:
                            doc.find('#direct_widget').attr('checked', true);
                            break;
                    }
                    switch ($(this).data('widgets-one_way-3')){
                        case 0:
                            doc.find('#one_way_widget').attr('checked', false);
                            break;
                        case 1:
                            doc.find('#one_way_widget').attr('checked', true);
                            break;
                    }
                    doc.find('#tr_responsive_widget').show();
                    doc.find('#responsive_width').val($(this).data('widgets-size-width-3'));
                    switch ($(this).data('widgets-responsive-3')){
                        case 0:
                            doc.find('#responsive_widget').attr('checked', false);
                            doc.find('#responsive_width_label').show();
                            break;
                        case 1:
                            doc.find('#responsive_widget').attr('checked', true);
                            doc.find('#responsive_width_label').hide();
                            break;
                    }
                    break;
                case '4':
                    doc.find('#tr_origin_widget').show();
                    doc.find('#tr_destination_widget').show();
                    doc.find('#tr_responsive_widget').show();
                    doc.find('#responsive_width').val($(this).data('widgets-size-width-4'));
                    switch ($(this).data('widgets-responsive-4')){
                        case 0:
                            doc.find('#responsive_widget').attr('checked', false);
                            doc.find('#responsive_width_label').show();
                            break;
                        case 1:
                            doc.find('#responsive_widget').attr('checked', true);
                            doc.find('#responsive_width_label').hide();
                            break;
                    }
                    break;
                case '5':
                    doc.find('#tr_hotel_id_widget').show();
                    //doc.find('#tr_hotel_id_widget_size').show();
                    //doc.find('#hotel_size_widget_width').val($(this).data('widgets-size-width-5'));
                    doc.find('#tr_responsive_widget').show();
                    doc.find('#responsive_width').val($(this).data('widgets-size-width-5'));
                    switch ($(this).data('widgets-responsive-5')){
                        case 0:
                            doc.find('#responsive_widget').attr('checked', false);
                            doc.find('#responsive_width_label').show();
                            break;
                        case 1:
                            doc.find('#responsive_widget').attr('checked', true);
                            doc.find('#responsive_width_label').hide();
                            break;
                    }
                    break;
                case '6':
                    doc.find('#tr_popular_routes_widget').show();
                    doc.find('.TPPopularRoutes').show();
                    if(doc.find('#popular_routes_widget_count').val() > 1){
                        doc.find('#tr_responsive_widget').hide();
                    }else{
                        doc.find('#tr_responsive_widget').show();
                        doc.find('#responsive_width').val($(this).data('widgets-size-width-6'));
                    }

                    switch ($(this).data('widgets-responsive-6')){
                        case 0:
                            doc.find('#responsive_widget').attr('checked', false);
                            doc.find('#responsive_width_label').show();
                            break;
                        case 1:
                            doc.find('#responsive_widget').attr('checked', true);
                            doc.find('#responsive_width_label').hide();
                            break;
                    }
                    //doc.find('#tr_hotel_id_widget_size').show();
                    //doc.find('#hotel_size_widget_width').val($(this).data('widgets-size-width-5'));
                    break;
            }
        });
    });
    /** **/

    /** **/
    doc.find('#constructorSearchFormButton').click(function (e) {
        doc.find( "#constructorSearchFormModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 400,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            open : function() {
                $(this).parent().css({   position:'absolute',
                    left: (win.width() - $(this).parent().outerWidth())/2,
                    top: (win.height() - $(this).parent().outerHeight())/2
                });

            },
            buttons: [
                {
                    id: "constructorSearchFormButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, select;
                        select = doc.find('#select_search_form').val();
                        if(!isNaN(select)){
                            origin = doc.find('#origin_search_form').val();
                            //origin = origin.replace('[', '{');
                            //origin = origin.replace(']', '}');
                            origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                            destination = doc.find('#destination_search_form').val();
                            //destination = destination.replace('[', '{');
                            //destination = destination.replace(']', '}');
                            destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                            setShortcodes("[tp_search_shortcodes id="+select+" origin=\""+origin+"\" "+"destination=\""+destination+"\"]",
                                $(this));
                        }else{
                            doc.find('#select_search_form').addClass('constructorShortcodesError');
                        }

                    }
                },
                {
                    id: "constructorSearchFormButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                },

            ],
            close: function( event, ui ) {

            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorSearchFormModal");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete", "#constructorSearchFormModal");
        if (doc.find('#select_search_form').length > 0) {
            doc.find('#tr_origin_search_form').show();
            doc.find('#tr_destination_search_form').show();
        }
        doc.find('#td_select_search_form').on('change', '#select_search_form', function(e) {
            e.preventDefault();
            doc.find('#select_search_form').removeClass('constructorShortcodesError');
            //doc.find('#tr_origin_search_form').hide();
            //doc.find('#tr_destination_search_form').hide();
            /*if(!isNaN($(this).val())){
                doc.find('#tr_origin_search_form').show();
                doc.find('#tr_destination_search_form').show();
            }else{
                doc.find('#select_search_form').addClass('constructorShortcodesError');
            }*/
        });
    });
    function resetConstructorWidgetModal(){
        doc.find('#tr_origin_widget').hide();
        doc.find('#tr_destination_widget').hide();
        doc.find('#tr_size_widget').hide();
        doc.find('#tr_direct_widget').hide();
        doc.find('#tr_one_way_widget').hide();
        doc.find('#tr_responsive_widget').hide();
        doc.find('#tr_hotel_id_widget').hide();
        doc.find('#tr_hotel_id_widget_size').hide();
        doc.find('#tr_popular_routes_widget').hide();
        doc.find('.TPPopularRoutes').hide();
        doc.find('#origin_widget').val();
        doc.find('#destination_widget').val();
        doc.find('#size_widget_width').val();
        doc.find('#size_widget_height').val();
        doc.find('#responsive_width').val();
        doc.find('#hotel_id_widget').val();
        doc.find('#hotel_size_widget_width').val();
        //doc.find('#popular_routes_widget_count').val(1);
        //doc.find('.TPPopularRoutes').remove();
    }
    /** **/
    function setShortcodes(shortcodes, selector){
        if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
            if(QTags.insertContent(shortcodes) != true)
                document.getElementById('content').value += shortcodes;
        } else if(tinyMCE && tinyMCE.activeEditor) {
            tinyMCE.activeEditor.selection.setContent(shortcodes);
        }
        selector.dialog( "close" );
    }

});