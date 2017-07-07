jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function(){

    });




    doc.find('#constructorShortcodesButton').click(function (e) {
        //console.log("constructorShortcodesButton");

        doc.find( "#constructorShortcodesModal" ).dialog({
            autoOpen: true,
            resizable: false,
            draggable: false,
            maxHeight:500,
            maxWidth: 450,
            minWidth: 406,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            position: "absolute",
            //appendTo: "#post-body-content",
            create: function (event) {

               $(event.target).parent().css({
                    'left': (win.width() - $(this).parent().outerWidth())/2,
                    'top': (win.height() - $(this).parent().outerHeight())/2,
                    'transition': 'none'

                });


            },

            open : function() {

               // $('body').scrollTop(110);
                //win.scrollTop(150);
                /*$(this).parent().css({   position:'fixed',
                    left: '50%', //(win.width() - $(this).parent().outerWidth())/2,
                    top: '50%'//(win.height() - $(this).parent().outerHeight())/2
                });*/

            },
            buttons: [
                {
                    id: "constructorShortcodesButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, airline, shortcodes, title,
                            off_title, limit, trip_class,paginate, one_way, tp_subid, currency,
                            country,filter_airline, filter_flight_number;



                        shortcodes = "";
                        currency = doc.find('#currency').val();
                        origin = doc.find('#origin').val();
                        origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                        destination = doc.find('#destination').val();
                        destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                        country = doc.find('#country').val();
                        country = country.substring(country.indexOf('[')+1,country.indexOf(']'));
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
                        if(doc.find('#one_way').is(":checked")){
                            one_way = "one_way=true";
                        }else{
                            one_way = "one_way=false";
                        }
                        if(doc.find('#off_title').is(":checked")){
                            off_title = "off_title=true";
                        }else{
                            off_title = "";
                        }
                        filter_airline = doc.find('#filter_airline').val();
                        filter_airline = filter_airline.substring(filter_airline.indexOf('[')+1,filter_airline.indexOf(']'));
                        filter_flight_number = doc.find('#filter_flight_number').val();
                        filter_airline = (filter_airline != "") ? " filter_airline=\""+filter_airline+"\"" : "";
                        filter_flight_number = (filter_flight_number != "") ? " filter_flight_number=\""+filter_flight_number+"\"" : "";

                        tp_subid = doc.find('#tp_subid').val();
                        if(!validSubid(tp_subid)){
                            doc.find('#tp_subid').addClass('constructorShortcodesError');
                        }else {
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate+" " +
                                            "stops="+doc.find('#transplant').val()+" "+off_title
                                            +" subid=\""+tp_subid+"\" currency=\""+currency+"\"]",
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\"]",
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\""+filter_airline+filter_flight_number+"]",
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate
                                            +" stops="+doc.find('#transplant').val()+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\""+filter_airline+filter_flight_number+"]",
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\""+filter_airline+filter_flight_number+"]",
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
                                            "destination="+destination+" title=\""+title+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\""+filter_airline+filter_flight_number+"]",
                                            $(this));
                                    }
                                    break;
                                case '7':
                                    if(origin == ""){
                                        doc.find('#origin').addClass('constructorShortcodesError');
                                    }else{

                                        setShortcodes("[tp_direct_flights_shortcodes origin="+origin+" " +
                                            " title=\""+title+"\" limit="+limit+" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\""+filter_airline+filter_flight_number+"]",
                                            $(this));
                                    }
                                    break;
                                case '8':
                                    if(origin == ""){
                                        doc.find('#origin').addClass('constructorShortcodesError');
                                    }else{
                                        setShortcodes("[tp_popular_routes_from_city_shortcodes origin="+origin+" " +
                                            " title=\""+title+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '9':
                                    if(airline == ""){
                                        doc.find('#airline').addClass('constructorShortcodesError');
                                    }else{
                                        setShortcodes("[tp_popular_destinations_airlines_shortcodes airline="+airline+" " +
                                            " title=\""+title+"\" limit=\""+limit+"\" "+paginate+" "+off_title
                                            +" subid=\""+tp_subid+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '10':

                                    break;
                                case '11':
                                    setShortcodes("[tp_our_site_search_shortcodes " +
                                        " title=\""+title+"\" limit="+limit+" "+paginate
                                        +" stops="+doc.find('#transplant').val()+" "+one_way+" "+off_title
                                        +" subid=\""+tp_subid+"\"  currency=\""+currency+"\"]",
                                        $(this));
                                    break;
                                case '12':
                                    if(origin == ""){
                                        doc.find('#origin').addClass('constructorShortcodesError');
                                    }else{
                                        setShortcodes("[tp_from_our_city_fly_shortcodes origin="+origin+" " +
                                            " title=\""+title+"\" limit="+limit+" "+paginate
                                            +" stops="+doc.find('#transplant').val()+" "+one_way+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '13':
                                    if(destination == ""){
                                        doc.find('#destination').addClass('constructorShortcodesError');
                                    }else{
                                        setShortcodes("[tp_in_our_city_fly_shortcodes destination="+destination+
                                            " title=\""+title+"\" limit="+limit+" "+paginate
                                            +" stops="+doc.find('#transplant').val()+" "+one_way+" "+off_title
                                            +" subid=\""+tp_subid+"\"  currency=\""+currency+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '14':
                                    /*if(country == ""){
                                        doc.find('#country').addClass('constructorShortcodesError');
                                    }
                                    if(airline == ""){
                                        doc.find('#airline').addClass('constructorShortcodesError');
                                    }*/
                                    //if(country != "" || airline != ""){
                                        setShortcodes("[tp_special_offer_shortcodes country=\""+country+"\" " +
                                            "airline=\""+airline+"\" title=\""+title+"\" limit=\""+limit+"\"]",
                                            $(this));
                                    //}
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
                $('body').css({'overflow': 'auto'});
                doc.find("#limit").val("");
                $("#select_shortcodes :first").attr("selected", "selected");
                doc.find('#tr_title').hide();
                doc.find('#tr_subid').hide();
                doc.find('#tr_origin').hide();
                doc.find('#tr_destination').hide();
                doc.find('#tr_airline').hide();
                doc.find('#tr_limit').hide();
                doc.find('#tr_trip_class').hide();
                doc.find('#tr_paginate').hide();
                doc.find('#tr_transplant').hide();
                doc.find('#tr_one_way').hide();
                doc.find('#tr_off_title').hide();
                doc.find('#tr_currency').hide();
                doc.find('#tr_country').hide();
                doc.find('#tr_filter_airline').hide();
                doc.find('#tr_filter_flight_number').hide();

                doc.find('#origin, #destination, #airline, #select_shortcodes, #tp_subid, #country').removeClass('constructorShortcodesError');
            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorShortcodesModal");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete", "#constructorShortcodesModal");
        tpCityAutocomplete.TPCountryAutocompleteInit(".constructorCountryShortcodesAutocomplete", "#constructorShortcodesModal");
        //doc.tooltip();
        doc.find('#origin, #destination, #airline, #tp_subid, #country').focus(function() {
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
    function validSubid(subid){
        if(subid == ""){
            return true;
        }else {
            var patternSubid = /^[0-9a-z_]+$/i;
            //console.log(patternSubid.test(subid))
            return patternSubid.test(subid);
        }
    }

    /*** **/
    function constructorShortcodesSelect(){

        doc.find('#td_select_shortcodes').on('change', '#select_shortcodes', function(e) {

            doc.find('#td_off_title').on('change', '#off_title', function(e) {
                if($(this).is(":checked")) {
                    doc.find('#tr_title').hide();
                }else{
                    doc.find('#tr_title').show();

                }

            });

            e.preventDefault();
            switch ($(this).data('paginate-'+$(this).val())){
                case 0:
                    doc.find('#paginate').attr('checked', false);
                    break;
                case 1:
                    doc.find('#paginate').attr('checked', true);
                    break;
            }
            doc.find('#transplant option[value=' + $(this).data('transplant-'+$(this).val()) + ']').attr('selected', 'true');

            doc.find('#select_shortcodes').removeClass('constructorShortcodesError');
            doc.find('#tp_subid').removeClass('constructorShortcodesError');
            doc.find('#country').removeClass('constructorShortcodesError');

            doc.find('#tr_title').hide();
            doc.find('#tr_subid').hide();
            doc.find('#tr_origin').hide();
            doc.find('#tr_destination').hide();
            doc.find('#tr_airline').hide();
            doc.find('#tr_limit').hide();
            doc.find('#tr_trip_class').hide();
            doc.find('#tr_paginate').hide();
            doc.find('#tr_transplant').hide();
            doc.find('#tr_one_way').hide();
            doc.find('#tr_off_title').hide();
            doc.find('#tr_currency').hide();
            doc.find('#tr_country').hide();
            doc.find('#tr_filter_airline').hide();
            doc.find('#tr_filter_flight_number').hide();

            doc.find("#limit").val("");
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_transplant').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                case '2':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                /*case '3':
                    doc.find('#tr_title').show();
                    break;*/
                case '3':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    doc.find('#tr_filter_airline').show();
                    doc.find('#tr_filter_flight_number').show();
                    break;
                case '4':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_transplant').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    doc.find('#tr_filter_airline').show();
                    doc.find('#tr_filter_flight_number').show();
                    break;
                case '5':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    doc.find('#tr_filter_airline').show();
                    doc.find('#tr_filter_flight_number').show();

                    break;
                case '6':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_destination').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    doc.find('#tr_filter_airline').show();
                    doc.find('#tr_filter_flight_number').show();
                    break;
                case '7':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_limit').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    doc.find('#tr_filter_airline').show();
                    doc.find('#tr_filter_flight_number').show();
                    break;
                case '8':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_origin').show();
                    doc.find('#tr_off_title').show();
                    break;
                case '9':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_airline').show();
                    doc.find('#tr_limit').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    //doc.find('#tr_currency').show();
                    break;
                case '10':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                case '11':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_limit').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    doc.find('#tr_transplant').show();
                    doc.find('#tr_one_way').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                case '12':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_limit').show();
                    doc.find('#tr_origin').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    doc.find('#tr_transplant').show();
                    doc.find('#tr_one_way').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                case '13':
                    doc.find('#tr_paginate').show();
                    doc.find('#tr_title').show();
                    doc.find('#tr_subid').show();
                    doc.find('#tr_limit').show();
                    doc.find('#tr_destination').show();
                    //doc.find('#tr_trip_class').show();
                    doc.find('#limit').val($(this).data("limit-"+$(this).val()));
                    doc.find('#tr_transplant').show();
                    doc.find('#tr_one_way').show();
                    doc.find('#tr_off_title').show();
                    doc.find('#tr_currency').show();
                    break;
                case '14':
                    doc.find('#tr_title').show();
                    doc.find('#tr_country').show();
                    doc.find('#tr_airline').show();
                    doc.find('#tr_limit').show();
                    break;
            }
            if(doc.find('#off_title').is(":checked")) {
                doc.find('#tr_title').hide();
            }
        });
    }

    /**
     * Hotels
     */
    doc.find('#constructorHotelsShortcodesButton').click(function (e) {
        doc.find( "#constructorHotelsShortcodesModal" ).dialog({
            autoOpen: true,
            resizable: false,
            draggable: false,
            maxHeight:500,
            maxWidth: 450,
            minWidth: 406,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            position: "absolute",
            //appendTo: "#post-body-content",
            create: function (event) {

            },
            open : function() {
                $(this).parent().css({
                    'position': 'fixed',
                    'left': (win.width() - $(this).parent().outerWidth())/2,
                    'top': (win.height() - $(this).parent().outerHeight())/2,
                    'transition': 'none'
                });
            },
            buttons: [
                {
                    id: "constructorHotelsShortcodesButtonOk",
                    text: button_ok,
                    click: function() {
                        var select_hotels_shortcodes, tp_hotels_title, hotels_city, select_hotels_type, hotels_day,
                            select_hotels_star, hotels_rating_from, hotels_rating_to, hotels_distance_from,
                            hotels_distance_to, hotels_number_results, hotels_paginate, hotels_off_title,
                            hotels_selections_type, hotels_subid, check_in, check_out, hotels_city_label,
                            hotels_selections_type_ru_label, hotels_selections_type_en_label, hotels_selections_type_label,
                            hotels_link_without_dates;
                        select_hotels_shortcodes = doc.find('#select_hotels_shortcodes').val();
                        tp_hotels_title = doc.find('#tp_hotels_title').val();
                        hotels_city = doc.find('#hotels_city').val();
                        hotels_city_label = doc.find('#hotels_city').data('city');
                        hotels_city = hotels_city.substring(hotels_city.indexOf('[')+1,hotels_city.indexOf(']'));
                        //hotels_city_label = hotels_city_label.substring(hotels_city_label.indexOf('{')+1,hotels_city_label.indexOf('}'));
                        select_hotels_type = doc.find('#select_hotels_type').val();
                        hotels_day = doc.find('#hotels_day').val();
                        select_hotels_star = doc.find('#select_hotels_star').val();
                        hotels_rating_from = doc.find('#hotels_rating_from').val();
                        hotels_rating_to = doc.find('#hotels_rating_to').val();
                        hotels_distance_from = doc.find('#hotels_distance_from').val();
                        hotels_distance_to = doc.find('#hotels_distance_to').val();
                        hotels_number_results = doc.find('#hotels_number_results').val();
                        hotels_selections_type = doc.find('#select_hotels_selections_type').val();
                        hotels_selections_type_ru_label = doc.find('#select_hotels_selections_type option:selected')
                            .data('selections-title-ru');
                        hotels_selections_type_en_label = doc.find('#select_hotels_selections_type option:selected')
                            .data('selections-title-en');
                        hotels_selections_type_label = doc.find('#select_hotels_selections_type option:selected')
                            .data('selections-title');
                       // console.log(hotels_selections_type_ru_label)
                       // console.log(hotels_selections_type_en_label)

                        hotels_selections_type_ru_label = "type_selections_label_ru=\""+hotels_selections_type_ru_label+"\"";
                        hotels_selections_type_en_label = "type_selections_label_en=\""+hotels_selections_type_en_label+"\"";
                        hotels_selections_type_label = "type_selections_label=\""+hotels_selections_type_label+"\"";

                        check_in = doc.find('#check_in').val();
                        check_out = doc.find('#check_out').val();
                        hotels_subid = doc.find('#hotels_subid').val();
                        if(doc.find('#hotels_paginate').is(":checked")){
                            hotels_paginate = "paginate=true";
                        }else{
                            hotels_paginate = "paginate=false";
                        }
                        if(doc.find('#hotels_off_title').is(":checked")){
                            hotels_off_title = "off_title=true";
                        }else{
                            hotels_off_title = "off_title=false";
                        }

                        if(doc.find('#hotels_link_without_dates').is(":checked")){
                            hotels_link_without_dates = "link_without_dates=true";
                        }else{
                            hotels_link_without_dates = "link_without_dates=false";
                        }

                        switch (select_hotels_shortcodes) {
                            case '0':
                                doc.find('#select_hotels_shortcodes').addClass('constructorShortcodesError');
                                break;
                            case '1':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                    break;
                                }
                                if (hotels_selections_type == "all"){
                                    doc.find('#select_hotels_selections_type').addClass('constructorShortcodesError');
                                    break;
                                }
                                setShortcodes("[tp_hotels_selections_discount_shortcodes city=\""+hotels_city+"\" " +
                                    "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                    " type_selections=\""+hotels_selections_type+"\" " +
                                    " number_results=\""+hotels_number_results+"\" subid=\""+hotels_subid+"\"" +
                                    " city_label=\""+hotels_city_label+"\" "+hotels_selections_type_label+" "
                                    +hotels_link_without_dates+"]",
                                    $(this));

                                break;
                            case '2':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                    break;
                                }
                                if (hotels_selections_type == "all"){
                                    doc.find('#select_hotels_selections_type').addClass('constructorShortcodesError');
                                    break;
                                }
                                //check_out check_in
                                setShortcodes("[tp_hotels_selections_date_shortcodes city=\""+hotels_city+"\" " +
                                    "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                    " type_selections=\""+hotels_selections_type+"\"  city_label=\""+hotels_city_label+"\" " +
                                    " number_results=\""+hotels_number_results+"\" subid=\""+hotels_subid+"\"" +
                                    " check_in=\""+check_in+"\" check_out=\""+check_out+"\" "+hotels_selections_type_label
                                    +" "+hotels_link_without_dates+"]",
                                    $(this));

                                break;
                            case '3':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                } else {
                                    setShortcodes("[tp_hotels_city_price_from_to_shortcodes city=\""+hotels_city+"\" " +
                                        "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                        " type=\""+select_hotels_type+"\" day=\""+hotels_day+"\" "+
                                        " star=\""+select_hotels_star+"\" rating_from=\""+hotels_rating_from+"\""
                                        +" rating_to=\""+hotels_rating_to+"\" distance_from=\""+hotels_distance_from+"\""
                                        +" distance_to=\""+hotels_distance_to+"\" number_results=\""+hotels_number_results+"\"" +
                                        " subid=\""+hotels_subid+"\"]",
                                        $(this));
                                }
                                break;
                            case '4':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                } else {
                                    setShortcodes("[tp_hotels_city_star_filter_shortcodes city=\""+hotels_city+"\" " +
                                        "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                        " type=\""+select_hotels_type+"\" day=\""+hotels_day+"\" "+
                                        " star=\""+select_hotels_star+"\" rating_from=\""+hotels_rating_from+"\""
                                        +" rating_to=\""+hotels_rating_to+"\" distance_from=\""+hotels_distance_from+"\""
                                        +" distance_to=\""+hotels_distance_to+"\" number_results=\""+hotels_number_results+"\"" +
                                        " subid=\""+hotels_subid+"\"]",
                                        $(this));
                                }
                                break;
                            case '5':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                } else {
                                    setShortcodes("[tp_cost_living_city_days_shortcodes city=\""+hotels_city+"\" " +
                                        "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                        " type=\""+select_hotels_type+"\" day=\""+hotels_day+"\" "+
                                        " star=\""+select_hotels_star+"\" rating_from=\""+hotels_rating_from+"\""
                                        +" rating_to=\""+hotels_rating_to+"\" distance_from=\""+hotels_distance_from+"\""
                                        +" distance_to=\""+hotels_distance_to+"\" number_results=\""+hotels_number_results+"\"" +
                                        " subid=\""+hotels_subid+"\"]",
                                        $(this));
                                }
                                break;
                            case '6':
                                if (hotels_city == ""){
                                    doc.find('#hotels_city').addClass('constructorShortcodesError');
                                } else {
                                    setShortcodes("[tp_cost_living_city_weekend_shortcodes city=\""+hotels_city+"\" " +
                                        "title=\""+tp_hotels_title+"\" "+hotels_paginate+ " " +hotels_off_title+
                                        " type=\""+select_hotels_type+"\" day=\""+hotels_day+"\" "+
                                        " star=\""+select_hotels_star+"\" rating_from=\""+hotels_rating_from+"\""
                                        +" rating_to=\""+hotels_rating_to+"\" distance_from=\""+hotels_distance_from+"\""
                                        +" distance_to=\""+hotels_distance_to+"\" number_results=\""+hotels_number_results+"\"" +
                                        " subid=\""+hotels_subid+"\"]",
                                        $(this));
                                }
                                break;
                        }



                        console.log(select_hotels_shortcodes, tp_hotels_title, hotels_city, select_hotels_type, hotels_day,
                            select_hotels_star, hotels_rating_from, hotels_rating_to, hotels_distance_from,
                            hotels_distance_to, hotels_number_results, hotels_paginate, hotels_off_title, check_in, check_out);
                    }
                },
                {
                    id: "constructorHotelsShortcodesButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                },

            ],
            close: function( event, ui ) {
                $('body').css({'overflow': 'auto'});
                $("#select_hotels_shortcodes :first").attr("selected", "selected");
                constructorHotelsShortcodesReload();
            }
        });
        //tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorHotelsShortcodesModal");
        tpCityAutocomplete.TPHotelAutocompleteInit(".constructorHotelShortcodesAutocomplete", "#constructorHotelsShortcodesModal");

        //console.log(11);
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

        doc.find('#select_hotels_shortcodes, #hotels_city, #select_hotels_selections_type').focus(function() {
            $(this).removeClass('constructorShortcodesError');
        });

        //console.log(hotelsSelectionsType);
        /*switch (tpLocale) {
            case 'ru':
                addHotelsSelectionsType('ru');
                break;
            case 'en':
                addHotelsSelectionsType('en');
                break;
            default:
                addHotelsSelectionsType('ru');
                
        }*/

        constructorHotelsShortcodesSelect();
    });
    
    function addHotelsSelectionsType(locale) {
        if(typeof hotelsSelectionsType  == "undefined") return;
        if(typeof hotelsSelectionsType[locale]  == "undefined") return;
        $.each(hotelsSelectionsType[locale], function(key, value) {
            $('#select_hotels_selections_type')
                .append($("<option></option>")
                    .attr("value",key)

                    .text(value));
        });
    }

    function constructorHotelsShortcodesSelect(){
        doc.find('#td_select_hotels_shortcodes').on('change', '#select_hotels_shortcodes', function(e) {
            e.preventDefault();
            switch ($(this).data('paginate-'+$(this).val())){
                case 0:
                    doc.find('#hotels_paginate').attr('checked', false);
                    break;
                case 1:
                    doc.find('#hotels_paginate').attr('checked', true);
                    break;
            }

            switch ($(this).data('link_without_dates-'+$(this).val())){
                case 0:
                    doc.find('#hotels_link_without_dates').attr('checked', false);
                    break;
                case 1:
                    doc.find('#hotels_link_without_dates').attr('checked', true);
                    break;
            }

            doc.find('#td_hotels_off_title').on('change', '#hotels_off_title', function(e) {
                if($(this).is(":checked")) {
                    doc.find('#tr_hotels_title').hide();
                }else{
                    doc.find('#tr_hotels_title').show();

                }

            });
            if(doc.find('#hotels_off_title').is(":checked")) {
                doc.find('#tr_hotels_title').hide();
            }
            constructorHotelsShortcodesReload();
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_hotels_title').show();
                    doc.find('#tr_hotels_city').show();
                    doc.find('#tr_hotels_paginate').show();
                    doc.find('#tr_hotels_off_title').show();
                    doc.find('#tr_hotels_number_results').show();
                    doc.find('#tr_hotels_selections_type').show();
                    doc.find('#tr_hotels_subid').show();
                    doc.find('#tr_hotels_link_without_dates').show();
                    //doc.find('#tr_hotels_help_text').show();
                    //constructorHotelsShortcodesFieldsShow();
                    break;
                case '2':
                    doc.find('#tr_hotels_title').show();
                    doc.find('#tr_hotels_city').show();
                    doc.find('#tr_hotels_paginate').show();
                    doc.find('#tr_hotels_off_title').show();
                    doc.find('#tr_hotels_number_results').show();
                    doc.find('#tr_hotels_selections_type').show();
                    doc.find('#tr_hotels_subid').show();
                    doc.find('#tr_hotels_check_in').show();
                    doc.find('#tr_hotels_check_out').show();
                    doc.find('#tr_hotels_link_without_dates').show();
                    doc.find('#tr_hotels_help_text').show();
                    //doc.find('#tr_hotels_day').show();
                    //constructorHotelsShortcodesFieldsShow();
                    break;
                case '3':
                    constructorHotelsShortcodesFieldsShow();
                    break;
                case '4':
                    constructorHotelsShortcodesFieldsShow();
                    break;
                case '5':
                    constructorHotelsShortcodesFieldsShow();
                    break;
                case '6':
                    constructorHotelsShortcodesFieldsShow();
                    break;
            }
        });
    }
    
    function constructorHotelsShortcodesReload() {
        //
        doc.find('#tr_hotels_title').hide();
        doc.find('#tr_hotels_city').hide();
        doc.find('#tr_hotels_paginate').hide();
        doc.find('#tr_hotels_off_title').hide();
        doc.find('#tr_hotels_type').hide();
        doc.find('#tr_hotels_day').hide();
        doc.find('#tr_hotels_rating').hide();
        doc.find('#tr_hotels_star').hide();
        doc.find('#tr_hotels_distance').hide();
        doc.find('#tr_hotels_number_results').hide();
        doc.find('#tr_hotels_selections_type').hide();
        doc.find('#tr_hotels_subid').hide();
        doc.find('#tr_hotels_check_in').hide();
        doc.find('#tr_hotels_check_out').hide();
        doc.find('#tp_hotels_title').val("");
        doc.find('#hotels_city').val("");
        doc.find('#hotels_subid').val("");
        $('#select_hotels_type option[value=all]').attr('selected','selected');
        doc.find('#hotels_day').val(3);
        $('#select_hotels_star option[value=all]').attr('selected','selected');
        $('#select_hotels_selections_type option[value=all]').attr('selected','selected');
        doc.find('#hotels_rating_from').val(7);
        doc.find('#hotels_distance_from').val(0);
        doc.find('#hotels_distance_to').val(3);
        doc.find('#hotels_number_results').val(20);
        doc.find('#select_hotels_shortcodes, #hotels_city, #select_hotels_selections_type').removeClass('constructorShortcodesError');
        doc.find('#tr_hotels_link_without_dates').hide();
        doc.find('#hotels_link_without_dates').attr('checked', false);
        doc.find('#tr_hotels_help_text').hide();
    }


    function constructorHotelsShortcodesFieldsShow(){
        doc.find('#tr_hotels_title').show();
        doc.find('#tr_hotels_city').show();
        doc.find('#tr_hotels_paginate').show();
        doc.find('#tr_hotels_off_title').show();
        doc.find('#tr_hotels_type').show();
        doc.find('#tr_hotels_day').show();
        doc.find('#tr_hotels_rating').show();
        doc.find('#tr_hotels_star').show();
        doc.find('#tr_hotels_distance').show();
        doc.find('#tr_hotels_number_results').show();
        doc.find('#tr_hotels_subid').show();
    }
    
    
    /** Hotels end**/

    /**
     * Railway
     */
    doc.find('#constructorRailwayShortcodesButton').click(function (e) {
        doc.find( "#constructorRailwayShortcodesModal" ).dialog({
            autoOpen: true,
            resizable: false,
            draggable: false,
            maxHeight:500,
            maxWidth: 450,
            minWidth: 406,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            position: "absolute",
            //appendTo: "#post-body-content",
            create: function (event) {

            },
            open : function() {
                $(this).parent().css({
                    'position': 'fixed',
                    'left': (win.width() - $(this).parent().outerWidth())/2,
                    'top': (win.height() - $(this).parent().outerHeight())/2,
                    'transition': 'none'
                });
            },
            buttons: [
                {
                    id: "constructorRailwayShortcodesButtonOk",
                    text: button_ok,
                    click: function() {
                        var railway_title, railway_origin, railway_destination, railway_subid,
                            railway_paginate, railway_off_title, status;
                        railway_title = doc.find('#tp_railway_title').val();
                        railway_origin = doc.find('#tp_railway_origin').val();
                        railway_origin = railway_origin.substring(railway_origin.indexOf('[')+1,railway_origin.indexOf(']'));
                        railway_destination = doc.find('#tp_railway_destination').val();
                        railway_destination = railway_destination.substring(railway_destination.indexOf('[')+1,railway_destination.indexOf(']'));
                        railway_subid = doc.find('#tp_railway_subid').val();
                        if(doc.find('#tp_railway_paginate').is(":checked")){
                            railway_paginate = "paginate=true";
                        }else{
                            railway_paginate = "paginate=false";
                        }
                        if(doc.find('#tp_railway_off_title').is(":checked")){
                            railway_off_title = "off_title=true";
                        }else{
                            railway_off_title = "off_title=false";
                        }

                        status = true;
                        if (railway_origin == ""){
                            doc.find('#tp_railway_origin').addClass('constructorShortcodesError');
                            status = false;
                        }
                        if (railway_destination == ""){
                            doc.find('#tp_railway_destination').addClass('constructorShortcodesError');
                            status = false;
                        }
                        if (status == false){
                            return;
                        }
                        setShortcodes("[tp_tutu origin="+railway_origin+" " + "destination="+railway_destination+" " +
                            "title=\""+railway_title+"\" "+railway_paginate+" "+railway_off_title
                            +" subid=\""+railway_subid+"\"]",
                            $(this));
                    }
                },
                {
                    id: "constructorRailwayShortcodesButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                },

            ],
            close: function( event, ui ) {
                $('body').css({'overflow': 'auto'});
                constructorRailwayShortcodesModalReload();
            }
        });

        tpCityAutocomplete.TPRailwayAutocompleteInit(".tpCityRailwayAutocomplete", "#constructorRailwayShortcodesModal");

        doc.find('#td_railway_off_title').on('change', '#tp_railway_off_title', function(e) {
            if($(this).is(":checked")) {
                doc.find('#tr_railway_title').hide();
            }else{
                doc.find('#tr_railway_title').show();

            }

        });
    });

    function constructorRailwayShortcodesModalReload() {
        doc.find('#tp_railway_title').val("");
        doc.find('#tp_railway_origin').val("");
        doc.find('#tp_railway_destination').val("");
        doc.find('#tp_railway_subid').val("");

        doc.find('#tp_railway_origin, #tp_railway_destination').removeClass('constructorShortcodesError');
    }

    /** end railway**/

    /*** **/
    doc.find('#constructorWidgetButton').click(function (e) {
        e.preventDefault();
        var constructorWidgetModal = doc.find( "#constructorWidgetModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 406,
            minHeight:200,
            modal: true,
            dialogClass:"TPCustomDialog",
            position: "absolute",
            create: function (event, ui) {

               $(event.target).parent().css({
                    left: (win.width() - $(this).parent().outerWidth())/2,  //+ win.scrollTop()//+ win.scrollLeft(),
                    top: (win.height() - $(this).parent().outerHeight())/2 //+ win.scrollTop(),

                });
            },
            open : function() {
                //var p = $(this).position();
                //win.scrollTop(500);
                //console.log($('#selector').dialog('option', 'position')[0]);
               // console.log($(this).parent());
                //window.scrollTo($('#selector').dialog('option', 'position')[0],$('#selector').dialog('option', 'position')[1]);
            },
            buttons: [
                {
                    id: "constructorWidgetButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, width, height, direct, one_way, responsive, hotel_id, count, location,
                            cat, cat1, cat2, cat3, selected, zoom, typeHotelSelectView, limit, tp_subid,
                            calendar_period, calendar_period_from, calendar_period_to;


                        selected = doc.find('#select_widgets').val();

                        //doc.find('#select_widgets option[value=0]').attr('selected','selected')
                        origin = doc.find('#origin_widget').val();

                        calendar_period = doc.find('#calendar_period').val();
                        calendar_period_from = doc.find('#calendar_period_from').val();
                        calendar_period_to = doc.find('#calendar_period_to').val();
                        doc.find('#origin_widget').val("");
                        origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                        destination = doc.find('#destination_widget').val();
                        doc.find('#destination_widget').val("");
                        destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                        hotel_id = doc.find('#hotel_id_widget').val();
                        location = doc.find('#hotel_id_widget').val();
                        location = location.substring(location.indexOf('{')+1,location.indexOf('}'));
                        doc.find('#hotel_id_widget').val("");
                        hotel_id = hotel_id.substring(hotel_id.indexOf('[')+1,hotel_id.indexOf(']'));

                        width = doc.find('#size_widget_width').val();
                        height = doc.find('#size_widget_height').val();
                        //console.log(doc.find('#select_widgets').val());

                        cat1 = (doc.find('#cat_widget-1').val() == "") ? '' : " cat1=\""+doc.find('#cat_widget-1').val()+"\" ";
                        cat2 = (doc.find('#cat_widget-2').val() == "") ? '' : " cat2=\""+doc.find('#cat_widget-2').val()+"\" ";
                        cat3 = (doc.find('#cat_widget-3').val() == "") ? '' : " cat3=\""+doc.find('#cat_widget-3').val()+"\" ";
                        doc.find('#cat_widget-1 option:first').attr('selected','selected');
                        doc.find('#cat_widget-2 option:first').attr('selected','selected');
                        doc.find('#cat_widget-3 option:first').attr('selected','selected');
                        cat = cat1 + cat2 + cat3;
                        zoom = doc.find('#zoom_widget').val();

                        typeHotelSelectView = doc.find('#type_widget').val();
                        limit =  doc.find('#limit_widget').val();
                        tp_subid = doc.find('#tp_subid_widget').val();
                        if(!validSubid(tp_subid)){
                            doc.find('#tp_subid_widget').addClass('constructorShortcodesError');
                        }else {
                            switch (selected) {
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

                                        setShortcodes("[tp_map_widget origin=" + origin + " width="+width
                                            +" height="+height+" "+direct+" subid=\""+tp_subid+"\"]",
                                            $(this));
                                    }
                                    break
                                case '2':


                                    if(location == ""){
                                        doc.find('#hotel_id_widget').addClass('constructorShortcodesError');
                                    }else {
                                        setShortcodes("[tp_hotelmap_widget coordinates=\"" + location
                                            + "\" width="+width+" height="+height+" zoom="+zoom
                                            +" subid=\""+tp_subid+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '3':
                                    //if (origin == "") {
                                        //doc.find('#origin_widget').addClass('constructorShortcodesError');
                                    //}
                                    if (destination == "") {
                                        doc.find('#destination_widget').addClass('constructorShortcodesError');
                                    }
                                    if (destination != ""){
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

                                        setShortcodes("[tp_calendar_widget origin=\""+origin+"\" destination=\""+destination+"\" "
                                            +direct+" "+one_way+" "+responsive+" subid=\""+tp_subid+"\"" +
                                            " period_day_from=\""+calendar_period_from+"\" " +
                                            " period_day_to=\""+calendar_period_to+"\"" +
                                            " period=\""+calendar_period+"\"]",
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
                                        setShortcodes("[tp_subscriptions_widget origin="+origin+" destination="
                                            +destination+" "+responsive+" subid=\""+tp_subid+"\"]",
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
                                        setShortcodes("[tp_hotel_widget hotel_id="+hotel_id+" "+responsive
                                            +" subid=\""+tp_subid+"\"]",
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
                                            setShortcodes("[tp_popular_routes_widget destination="+destination_r+"  "
                                                +responsive+" subid=\""+tp_subid+"\"]",
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
                                                shortcode += "<div class='TP-PopularRoutesWidget'>[tp_popular_routes_widget destination="+destination_r+" "+responsive+" subid=\""+tp_subid+"\"]</div>";
                                            }
                                        }
                                        if(count == count_s){
                                            shortcode = '<div class="TP-PopularRoutesWidgets">'+shortcode+'</div>'
                                            //console.log(shortcode);
                                            setShortcodes(shortcode, $(this));
                                        }
                                    }


                                    break;
                                case '7':
                                    if (hotel_id == "") {
                                        doc.find('#hotel_id_widget').addClass('constructorShortcodesError');
                                    }else{

                                        setShortcodes("[tp_hotel_selections_widget id="+hotel_id+" "
                                            +cat+" type="+typeHotelSelectView+" limit="+limit
                                            +" subid=\""+tp_subid+"\"]",
                                            $(this));
                                    }
                                    break;
                                case '8':
                                    var limit_8, type_8, filter_8, width_8, origin_8, destination_8, airline_8,
                                        airlines, parrams;
                                    if(doc.find('#responsive_widget').is(":checked")){
                                        responsive = "responsive=true";
                                    }else{
                                        responsive = "width="+doc.find('#responsive_width').val();
                                    }
                                    parrams = '';
                                    parrams += responsive + ' ';
                                    limit_8  = doc.find('#limit_widget_8').val();
                                    parrams += 'limit='+limit_8+' ';
                                    type_8  = doc.find('#type_widget_8').val();
                                    parrams += 'type='+type_8+' ';
                                    filter_8  = doc.find("input[name=filter]:checked").val();
                                    parrams += 'filter='+filter_8+' ';
                                    origin_8  = doc.find('#origin_widget_8').val();
                                    origin_8 = origin_8.substring(origin_8.indexOf('[')+1,origin_8.indexOf(']'));
                                    if(origin_8 != "")
                                        parrams += 'origin='+origin_8+' ';
                                    destination_8  = doc.find('#destination_widget_8').val();
                                    destination_8 = destination_8.substring(destination_8.indexOf('[')+1,destination_8.indexOf(']'));
                                    if(destination_8 != "")
                                        parrams += 'destination='+destination_8+' ';
                                    airlines = '';
                                    if(filter_8 == '0'){
                                        doc.find('.airline_widget_8').each(function( index ) {
                                            var airline = $(this).val();
                                            airline = airline.substring(airline.indexOf('[')+1,airline.indexOf(']'));
                                            if(airline != '')
                                                airlines += airline+','

                                        });
                                    }
                                    airline_8 = '';
                                    if (airlines != ''){
                                        airline_8 = 'airline="'+airlines+'"';
                                    }
                                    parrams += airline_8;


                                    //console.log(parrams);

                                    setShortcodes("[tp_ducklett_widget "+parrams+" subid=\""+tp_subid+"\"]",
                                        $(this));
                                    break;
                            }
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
                //var p = $(this).position();
                //console.log(p.top);
                //win.scrollTop(p.top);
                resetConstructorWidgetModal();
                $("#select_widgets :first").attr("selected", "selected");
                doc.find('#origin_widget, #hotel_id_widget, #destination_widget, #tp_subid_widget').removeClass('constructorShortcodesError');

            }
        });
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete", "#constructorWidgetModal");
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorWidgetModal");
        tpCityAutocomplete.TPHotelAutocompleteInit(".constructorWidgetHotelShortcodesAutocomplete", "#constructorWidgetModal");
        doc.find('#origin_widget, #hotel_id_widget, #destination_widget, #tp_subid_widget').focus(function() {
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
            //e.preventDefault();
            doc.find('#responsive_label').on('change', '#responsive_widget', function(e) {
                if($(this).is(":checked")) {
                    doc.find('#responsive_width_label').hide();
                }else{
                    doc.find('#responsive_width_label').show();
                }
            });
            var tbody;
            tbody = $(this).parent('#td_select_widgets').parent('#tr_select_widgets').parent('tbody');
            $(this).removeClass('constructorShortcodesError');
            $("tp_subid_widget").removeClass('constructorShortcodesError');
            resetConstructorWidgetModal();
            tbody.children('#tr_hotel_id_widget').children('td').children('input').removeClass('TPCoordinatesAutocomplete');
            tbody.children('#tr_hotel_id_widget').children('td').children('input').removeClass('TPAutocompleteID');
            tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPOriginTitle);
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_subid_widget').show();
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
                    doc.find('#tr_subid_widget').show();
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').addClass('TPCoordinatesAutocomplete');
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPLocationTitlt);
                    doc.find('#tr_hotel_id_widget').show();
                    doc.find('#tr_size_widget').show();
                    doc.find('#tr_zoom_widget').show();
                    doc.find('#size_widget_width').val($(this).data('widgets-size-width-2'));
                    doc.find('#size_widget_height').val($(this).data('widgets-size-height-2'));

                    break;
                case '3':
                    doc.find('#tr_subid_widget').show();
                    doc.find('#tr_origin_widget').show();
                    doc.find('#tr_destination_widget').show();
                    doc.find('#tr_calendar_period_widget').show();
                    doc.find('#tr_calendar_period_size_widget').show();
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
                    doc.find('#tr_subid_widget').show();
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
                    doc.find('#tr_subid_widget').show();
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPHotelWidgetLabel);
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
                    doc.find('#tr_subid_widget').show();
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
                case '7':
                    doc.find('#tr_subid_widget').show();
                    //doc.find('#tr_origin_widget').show();
                    //tbody.children('#tr_origin_widget').children('td').children('input').addClass('TPAutocompleteID');
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').addClass('TPAutocompleteID');
                    tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPPHCity);
                    //tbody.children('#tr_hotel_id_widget').children('td').children('input').attr("placeholder", TPLocationTitlt);
                    doc.find('#tr_hotel_id_widget').show();
                    doc.find('#tr_type_widget').show();
                    doc.find('#tr_limit_widget').show();
                    //doc.find('#tr_cat_widget-1').show();
                    //doc.find('#tr_cat_widget-2').show();
                    //doc.find('#tr_cat_widget-3').show();
                    //tr_type_widget

                    break;
                case '8':
                    doc.find('#tr_subid_widget').show();
                    doc.find('#tr_type_widget_8').show();
                    doc.find('#tr_filter_widget').show();
                    doc.find('#tr_limit_widget_8').show();

                    doc.find('#tr_responsive_widget').show();
                    doc.find('#responsive_width').val($(this).data('widgets-size-width-8'));
                    switch ($(this).data('widgets-responsive-8')){
                        case 0:
                            doc.find('#responsive_widget').attr('checked', false);
                            doc.find('#responsive_width_label').show();
                            break;
                        case 1:
                            doc.find('#responsive_widget').attr('checked', true);
                            doc.find('#responsive_width_label').hide();
                            break;
                    }

                    switch ( doc.find("input[name=filter]:checked").val()){
                        case '0':
                            doc.find('#constructorWidgetModalTable').on('click', '.TPBtnAdd', addFieldAirline);
                            doc.find("#tr_airline_widget_8").show();
                            break;
                        case '1':
                            doc.find('#constructorWidgetModalTable').off( 'click', '.TPBtnAdd');
                            doc.find("#tr_iata_widget_8").show();
                            break;
                    }
                    doc.find("input[name=filter]:radio").change(function () {
                        doc.find('#constructorWidgetModalTable').off( 'click', '.TPBtnAdd');
                        doc.find("#tr_airline_widget_8").hide();
                        doc.find("#tr_iata_widget_8").hide();
                        switch ($(this).val()){
                            case '0':
                                doc.find("#tr_airline_widget_8").show();
                                doc.find('#constructorWidgetModalTable').on('click', '.TPBtnAdd', addFieldAirline);
                                break;
                            case '1':
                                doc.find('#constructorWidgetModalTable').off( 'click', '.TPBtnAdd');
                                doc.find("#tr_iata_widget_8").show();
                                break;
                        }
                    });

                    //doc.find('.TPBtnAdd').click();



                    break;
            }
        });
    });


    function addFieldAirline(){
        //doc.find('.tr_table_airline_widget_8').clone().appendTo('#table_airline_widget_8 tbody');
        console.log("TPBtnAdd");
        // console.log(event);
        //  console.log($(this));

        doc.find('#table_airline_widget_8 tbody')
            .append('<tr class="tr_table_airline_widget_8">' +
                '<td><input type="text" name="airline_widget_8" ' +
                'value="" class="constructorAirlineShortcodesAutocomplete airline_widget_8" ' +
                'placeholder="'+LabelAirlineWidget_8+'">' +
                ' <a href="#" class="TPBtnDelete"><i></i>' +
                LabelDeleteWidget_8+'</a>'+
                '</td></tr>');

        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete",
            "#constructorWidgetModal");
        doc.find('.TPBtnDelete').click(function (e) {
            $(this).parent('td').parent('tr').remove();
        });


    }
    /** **/

    /** **/
    doc.find('#constructorSearchFormButton').click(function (e) {
        doc.find( "#constructorSearchFormModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 406,
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
                        var origin, destination, select, type, hotel_city, tp_subid, selectAttr, slug;
                        select = doc.find('#select_search_form').val();
                        console.log(select);
                        if(!isNaN(select)){

                            origin = doc.find('#origin_search_form').val();
                            //origin = origin.replace('[', '{');
                            //origin = origin.replace(']', '}');
                            origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                            destination = doc.find('#destination_search_form').val();
                            //destination = destination.replace('[', '{');
                            //destination = destination.replace(']', '}');
                            hotel_city = doc.find('#search_shortcode_hotel_city').val();
                            hotel_city = hotel_city.substring(hotel_city.indexOf('{')+1,hotel_city.indexOf('}'));
                            destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                            //type = doc.find('#select_search_form').find(':selected').data('type_form');
                            if(doc.find('#select_search_form').is("input")){
                                type = doc.find('#select_search_form').data('type_form');
                                slug = doc.find('#select_search_form').data('slug');
                            }else {
                                type = doc.find('#select_search_form').find(':selected').data('type_form');
                                slug = doc.find('#select_search_form').find(':selected').data('slug');
                            }

                            if (slug == ''){
                                selectAttr = ' id="'+select+'"';
                            } else {
                                selectAttr = ' slug="'+slug+'"';
                            }

                            tp_subid = doc.find('#tp_subid_sf').val();
                            if(!validSubid(tp_subid)){
                                doc.find('#tp_subid_sf').addClass('constructorShortcodesError');
                            }else {
                                console.log(select+'TEST');
                                console.log(type+'type');
                                switch (type){
                                    case "avia":
                                        setShortcodes("[tp_search_shortcodes "+selectAttr
                                            +" origin=\""+origin+"\" "+"destination=\""+destination
                                            +"\" type=\""+type+"\" subid=\""+tp_subid+"\"]", $(this));
                                        break;
                                    case "hotel":
                                        setShortcodes("[tp_search_shortcodes "+selectAttr
                                            +" hotel_city=\""+hotel_city+"\" type=\""
                                            +type+"\" subid=\""+tp_subid+"\"]", $(this));
                                        break;
                                    case "avia_hotel":
                                        setShortcodes("[tp_search_shortcodes "+selectAttr
                                            +" origin=\""+origin+"\" "+"destination=\""+destination
                                            +"\" hotel_city=\""+hotel_city+"\" type=\""+type
                                            +"\" subid=\""+tp_subid+"\"]", $(this));
                                        break;
                                    default:
                                        setShortcodes("[tp_search_shortcodes "+selectAttr
                                            +" origin=\""+origin+"\" "+"destination=\""+destination
                                            +"\" type=\""+type+"\" subid=\""+tp_subid+"\"]", $(this));
                                }
                            }


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
                doc.find('#tr_subid_sf').hide();
                doc.find('#tr_origin_search_form').hide();
                doc.find('#tr_destination_search_form').hide();
                doc.find('#tr_search_shortcode_hotel_city').hide();
            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorSearchFormModal");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineShortcodesAutocomplete", "#constructorSearchFormModal");
        tpCityAutocomplete.TPHotelAutocompleteInit('.searchHotelCityShortcodeAutocomplete' , "#constructorSearchFormModal");
        if (doc.find('#select_search_form').length > 0) {
            //select = doc.find('#select_search_form').val();
            //doc.find('#tr_origin_search_form').show();
            //doc.find('#tr_destination_search_form').show();
            var  selectSearchForm;
            if(doc.find('#select_search_form').is("input")){
                selectSearchForm = doc.find('#select_search_form').data('type_form');
            }else {
                selectSearchForm = doc.find('#select_search_form').find(':selected').data('type_form');
            }
            if(selectSearchForm == "") selectSearchForm = "avia";
            console.log(selectSearchForm)
            //doc.find('#tr_type_search_form').show();
            doc.find("#tp_subid_sf").removeClass('constructorShortcodesError');
            doc.find('#tr_subid_sf').show();
            switch (selectSearchForm){
                case "avia":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    break;
                case "hotel":
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    break;
                case "avia_hotel":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    break;
            }
        }
        doc.find('#tp_subid_sf').focus(function() {
            $(this).removeClass('constructorShortcodesError');

        });
        /*doc.find('#td_type_search_form').on('change', '#type_search_form', function(e) {
            e.preventDefault();
            doc.find('#tr_origin_search_form').hide();
            doc.find('#tr_destination_search_form').hide();
            doc.find('#tr_search_shortcode_hotel_city').hide();
            switch ($(this).val()){
                case "avia":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    break;
                case "hotel":
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    break;
                case "avia_hotel":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    break;
            }
        });*/
        doc.find('#td_select_search_form').on('change', '#select_search_form', function(e) {
            e.preventDefault();
            doc.find('#tr_origin_search_form').hide();
            doc.find('#tr_destination_search_form').hide();
            doc.find('#tr_search_shortcode_hotel_city').hide();
            doc.find('#tr_subid_sf').hide();
            doc.find('#select_search_form').removeClass('constructorShortcodesError');
            doc.find('#tr_subid_sf').removeClass('constructorShortcodesError');
            var selectChSearchForm = $(this).find(':selected').data('type_form');
            if(selectChSearchForm == "") selectChSearchForm = "avia";
            switch (selectChSearchForm){
                case "avia":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    doc.find('#tr_subid_sf').show();
                    break;
                case "hotel":
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    doc.find('#tr_subid_sf').show();
                    break;
                case "avia_hotel":
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    doc.find('#tr_search_shortcode_hotel_city').show();
                    doc.find('#tr_subid_sf').show();
                    break;
                default:
                    doc.find('#tr_origin_search_form').show();
                    doc.find('#tr_destination_search_form').show();
                    doc.find('#tr_subid_sf').show();
                    break;
            }
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
    /** *
     *
     */

    /*function ShowSelection()
    {
        var textComponent = document.getElementById('content');
        var selectedText;
        // IE version
        if (document.selection != undefined)
        {
            textComponent.focus();
            var sel = document.selection.createRange();
            selectedText = sel.text;
        }
        // Mozilla version
        else if (textComponent.selectionStart != undefined)
        {
            var startPos = textComponent.selectionStart;
            var endPos = textComponent.selectionEnd;
            selectedText = textComponent.value.substring(startPos, endPos)
        }
        alert("You selected: " + selectedText);
    }          */
    function getShowSelection(){
        if(typeof tinyMCE  != "undefined"){
            if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
                //if(QTags.insertContent(shortcodes) != true)
                //    document.getElementById('content').value += shortcodes;
                var txtarea = document.getElementById("content");
                // obtain the index of the first selected character
                var start = txtarea.selectionStart;
                // obtain the index of the last selected character
                var finish = txtarea.selectionEnd;
                // obtain the selected text
                var sel = txtarea.value.substring(start, finish);
                console.log(sel);
                console.log(txtarea.value)

                txtarea.value = 111;
            } else if(tinyMCE && tinyMCE.activeEditor) {
                var selectedText = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
                console.log(selectedText);
                /*if ( selectedText != "" )
                    tinyMCE.activeEditor.selection.setContent( "FooBar" ); */
            }else{
                         //  if(typeof elem != "undefined"){
            }
        }
    }

    /**
     *
     * @returns {string}
     */
    function getShowSelectionText(){
        var txt = '';
        if(typeof tinyMCE  != "undefined"){
            if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
                if(document.getElementById("content")){
                    var txtarea = document.getElementById("content");
                    // obtain the index of the first selected character
                    var start = txtarea.selectionStart;
                    // obtain the index of the last selected character
                    var finish = txtarea.selectionEnd;
                    // obtain the selected text
                    txt = txtarea.value.substring(start, finish);
                }

            } else if(tinyMCE && tinyMCE.activeEditor) {
                txt = tinyMCE.activeEditor.selection.getContent( {format : "text"} );
            }
        }  else if(document.getElementById("tag-description")){
            var txtarea = document.getElementById("tag-description");
            // obtain the index of the first selected character
            var start = txtarea.selectionStart;
            // obtain the index of the last selected character
            var finish = txtarea.selectionEnd;
            // obtain the selected text
            txt = txtarea.value.substring(start, finish);
        } else if(document.getElementById("description")){
            var txtarea = document.getElementById("description");
            // obtain the index of the first selected character
            var start = txtarea.selectionStart;
            // obtain the index of the last selected character
            var finish = txtarea.selectionEnd;
            // obtain the selected text
            txt = txtarea.value.substring(start, finish);
        }
        return txt;
    }

    /**
     *
     * @param shortcodes
     * @param selector
     */
    function setShortcodesReplace(shortcodes, selector){
        var txt = '';
        if(typeof tinyMCE  != "undefined"){
            if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
                if(document.getElementById("content")){
                    var txtarea = document.getElementById("content");
                    // obtain the index of the first selected character
                    var start = txtarea.selectionStart;
                    // obtain the index of the last selected character
                    var finish = txtarea.selectionEnd;
                    // obtain the selected text
                    txt = txtarea.value.substring(start, finish);
                    if(txt != ''){
                        txtarea.value = txtarea.value.replace(txt, shortcodes)
                    }else{
                        txtarea.value += shortcodes;
                    }

                }

            } else if(tinyMCE && tinyMCE.activeEditor) {
                tinyMCE.activeEditor.selection.setContent(shortcodes);
            }
        }  else if(document.getElementById("tag-description")){
            var txtarea = document.getElementById("tag-description");
            // obtain the index of the first selected character
            var start = txtarea.selectionStart;
            // obtain the index of the last selected character
            var finish = txtarea.selectionEnd;
            // obtain the selected text
            txt = txtarea.value.substring(start, finish);
            if(txt != ''){
                txtarea.value = txtarea.value.replace(txt, shortcodes)
            }else{
                txtarea.value += shortcodes;
            }
        } else if(document.getElementById("description")){
            var txtarea = document.getElementById("description");
            // obtain the index of the first selected character
            var start = txtarea.selectionStart;
            // obtain the index of the last selected character
            var finish = txtarea.selectionEnd;
            // obtain the selected text
            txt = txtarea.value.substring(start, finish);
            if(txt != ''){
                txtarea.value = txtarea.value.replace(txt, shortcodes)
            }else{
                txtarea.value += shortcodes;
            }
        }
        selector.dialog( "close" );
    }
    doc.find('#constructorLinkButton').click(function (e) {
        //console.log(window.getSelecrion());
        //console.log( tinyMCE.activeEditor.getContent())
        //ShowSelection()

        doc.find('#text_link').val(getShowSelectionText());
        doc.find( "#constructorLinkModal" ).dialog({
            resizable: false,
            draggable: false,
            maxHeight:400,
            maxWidth: 450,
            minWidth: 406,
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
                    id: "constructorLinkButtonOk",
                    text: button_ok,
                    click: function() {
                        var origin, destination, one_way, hotel_id, text_link, check_out, check_in, origin_date,
                            destination_date, type, tp_subid;
                        origin = doc.find('#origin_link').val();
                        origin = origin.substring(origin.indexOf('[')+1,origin.indexOf(']'));
                        destination = doc.find('#destination_link').val();
                        destination = destination.substring(destination.indexOf('[')+1,destination.indexOf(']'));
                        hotel_id = doc.find('#city_link').val();
                        hotel_id = hotel_id.substring(hotel_id.indexOf('{')+1,hotel_id.indexOf('}'));
                        text_link =  doc.find('#text_link').val();
                        type = doc.find('#constructorLinkModalSelect').val();
                        tp_subid = doc.find('#tp_subid_link').val();
                        if(!validSubid(tp_subid)){
                            doc.find('#tp_subid_link').addClass('constructorShortcodesError');
                        }else {
                            switch (type) {
                                case '0':
                                    doc.find('#constructorLinkModalSelect').addClass('constructorShortcodesError');
                                    break;
                                case '1':
                                    if(doc.find('#one_way_link').is(":checked")){
                                        one_way = "one_way=true";
                                        destination_date =  "";
                                    }else{
                                        one_way = "one_way=false";
                                        destination_date =  "destination_date="+doc.find('#destination_date_link').val().replace(/\D/g, '');
                                    }
                                    if (origin == "") {
                                        doc.find('#origin_link').addClass('constructorShortcodesError');
                                    }
                                    if (destination == "") {
                                        doc.find('#destination_link').addClass('constructorShortcodesError');
                                    }
                                    if (origin != "" && destination != ""){
                                        origin_date =  doc.find('#origin_date_link').val().replace(/\D/g, '');

                                        setShortcodesReplace("[tp_link origin="+origin+" destination="+destination+" " +
                                            "text_link=\""+text_link+"\" origin_date="+origin_date+" " +
                                            " "+destination_date+" "+one_way+" " +
                                            "type="+type+"  subid=\"" + tp_subid + "\"]", $(this));
                                        /*setShortcodes("[tp_link origin="+origin+" destination="+destination+" " +
                                         "text_link=\""+text_link+"\" origin_date="+origin_date+" " +
                                         " "+destination_date+" "+one_way+" " +
                                         "type="+type+"]",
                                         $(this));*/
                                    }
                                    break
                                case '2':
                                    if (hotel_id == "") {
                                        doc.find('#city_link').addClass('constructorShortcodesError');
                                    }else{
                                        check_in =  doc.find('#check_in_link').val().replace(/\D/g, '');
                                        check_out =  doc.find('#check_out_link').val().replace(/\D/g, '');

                                        setShortcodes("[tp_link hotel_id=\""+hotel_id+"\" text_link=\""+text_link+"\" " +
                                            " check_in="+check_in+" check_out="+check_out+" " +
                                            "type="+type+"  subid=\"" + tp_subid + "\"]",
                                            $(this));
                                    }
                                    break
                            }
                        }


                    }
                },
                {
                    id: "constructorLinkButtonCancel",
                    text: button_cancel,
                    click: function() {
                        $( this ).dialog( "close" );

                    }
                },

            ],
            close: function( event, ui ) {
                doc.find('#tr_subid_link').hide();
                doc.find('#tr_origin_link').hide();
                doc.find('#tr_destination_link').hide();
                doc.find('#tr_origin_date_link').hide();
                doc.find('#tr_destination_date_link').hide();
                doc.find('#tr_one_way_link').hide();
                doc.find('#tr_city_link').hide();
                doc.find('#tr_origin_date_hotel_link').hide();
                doc.find('#tr_destination_date_hotel_link').hide();
            }
        });
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#constructorLinkModal");
        tpCityAutocomplete.TPHotelTypeAutocompleteInit(".constructorLinkHotelShortcodesAutocomplete", "#constructorLinkModal");
        //doc.find('.constructorDate').datepicker(TPdatepickerPlus);
        //doc.find('.constructorDatePlus').datepicker(TPdatepickerPlus);
        doc.find('#origin_link, #destination_link, #city_link, #tp_subid_link').focus(function() {
            $(this).removeClass('constructorShortcodesError');
        });
        doc.find('#label_one_way_link').on('change', '#one_way_link', function(e) {
            if($(this).is(":checked")) {
                doc.find('#tr_destination_date_link').hide();
            }else{
                doc.find('#tr_destination_date_link').show();

            }

        });
        doc.find('#constructorLinkModalSelectTD').on('change', '#constructorLinkModalSelect', function(e) {
            doc.find('#constructorLinkModalSelect').removeClass('constructorShortcodesError');
            doc.find('#origin_link').removeClass('constructorShortcodesError');
            doc.find('#destination_link').removeClass('constructorShortcodesError');
            doc.find('#city_link').removeClass('constructorShortcodesError');
            doc.find('#tp_subid_link').removeClass('constructorShortcodesError');
            doc.find('#tr_origin_link').hide();
            doc.find('#tr_destination_link').hide();
            doc.find('#tr_origin_date_link').hide();
            doc.find('#tr_destination_date_link').hide();
            doc.find('#tr_one_way_link').hide();
            doc.find('#tr_city_link').hide();
            doc.find('#tr_origin_date_hotel_link').hide();
            doc.find('#tr_destination_date_hotel_link').hide();
            doc.find('#tr_subid_link').hide();
            switch($(this).val()) {
                case '0':
                    break;
                case '1':
                    doc.find('#tr_subid_link').show();
                    doc.find('#tr_origin_link').show();
                    doc.find('#tr_destination_link').show();
                    doc.find('#tr_origin_date_link').show();
                    doc.find('#tr_destination_date_link').show();
                    doc.find('#tr_one_way_link').show();
                    break;
                case '2':
                    doc.find('#tr_subid_link').show();
                    doc.find('#tr_city_link').show();
                    doc.find('#tr_origin_date_hotel_link').show();
                    doc.find('#tr_destination_date_hotel_link').show();
                    break;
            }
        });
    });
    /**
     *
     */
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
        doc.find('#tr_type_widget').hide();
        doc.find('#tr_limit_widget').hide();
        doc.find('#tr_cat_widget-1').hide();
        doc.find('#tr_cat_widget-2').hide();
        doc.find('#tr_cat_widget-3').hide();
        doc.find('#tr_zoom_widget').hide();
        doc.find('#tr_filter_widget').hide();
        doc.find('#tr_type_widget_8').hide();

        doc.find('#tr_limit_widget_8').hide();
        doc.find('#tr_airline_widget_8').hide();
        doc.find('#tr_iata_widget_8').hide();

        doc.find('#origin_widget_8').val();
        doc.find('#destination_widget_8').val();
        doc.find('.airline_widget_8').val();
        doc.find('#constructorWidgetModalTable').off( 'click', '.TPBtnAdd');
        doc.find('#tr_subid_widget').hide();
        doc.find('#tr_calendar_period_widget').hide();
        doc.find('#tr_calendar_period_size_widget').hide();
        //doc.find('#popular_routes_widget_count').val(1);
        //doc.find('.TPPopularRoutes').remove();
    }
    /** **/
    function setShortcodes(shortcodes, selector){

        if(typeof tinyMCE  != "undefined"){
            if( ! tinyMCE.activeEditor || tinyMCE.activeEditor.isHidden()){
                //console.log("tinyMCE not activeEditor")
                if(QTags.insertContent(shortcodes) != true)
                    document.getElementById('content').value += shortcodes;
            } else if(tinyMCE && tinyMCE.activeEditor) {
                //console.log("tinyMCE activeEditor");
                tinyMCE.activeEditor.selection.setContent(shortcodes);
                //var el = tinyMCE.activeEditor.dom.create('p', {id : 'test', 'class' : 'myclass'}, 'some content');
                //tinyMCE.activeEditor.getBody().insertBefore(el, tinyMCE.activeEditor.getBody().firstChild);
                //tinyMCE.activeEditor.execInstanceCommand('content','mceInsertContent',false, shortcodes);

                /*tinyMCE.activeEditor.selection.select(tinyMCE.activeEditor.getBody(), true);
                tinyMCE.activeEditor.selection.collapse(false);
                tinyMCE.activeEditor.selection.setContent(shortcodes);
                tinyMCE.activeEditor.focus()
                tinyMCE.activeEditor.insertContent(shortcodes)
                tinyMCE.activeEditor.setContent(shortcodes);
                tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcodes);
                tinyMCE.activeEditor.execCommand('mceReplaceContent', false, shortcodes);*/
                //tinyMCE.activeEditor.execInstanceCommand('text',"mceInsertContent",false,"This is the text to be inserted");
            }
        } else{
            document.getElementById('description').value += shortcodes;
            document.getElementById('tag-description').value += shortcodes;

        }
        selector.dialog( "close" );
    }

});