jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function () {
        tpInitWidget();
    });
    //
    jQuery(document).on('widget-added', function(e, widget){
        tpInitWidget();
    });
    jQuery(document).on('widget-updated', function(e, widget){
        tpInitWidget();
    });
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {

    });
    function tpInitWidget() {
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        tpCityAutocomplete.TPHotelAutocompleteInit(".constructorHotelShortcodesAutocomplete");
        tpCityAutocomplete.TPRailwayAutocompleteInit(".tpCityRailwayAutocomplete");
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete");
        tpCityAutocomplete.TPHotelAutocompleteInit(".constructorWidgetHotelShortcodesAutocomplete");
        doc.find('.tp-flights-tables-widget-select-shortcode').each(function () {
            var select = $(this).data('select_table');
            constructorFlightTableWidget(select)
        });
        doc.find('.tp-flights-tables-widget-select-label')
            .on('change', '.tp-flights-tables-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select = $(this).val();
                constructorFlightTableWidget(select);
            });
        doc.find('.tp-hotels-tables-widget-select-shortcode').each(function () {
            var select = $(this).data('select_table');
            constructorHotelTableWidget(select);
        });
        doc.find('.tp-hotels-tables-widget-select-label')
            .on('change', '.tp-hotels-tables-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select = $(this).val();
                constructorHotelTableWidget(select)
            });
        hotelWidgetDatepicker();
        hotelWidgeSelectionsType();
        doc.find('.tp-widgets-widget-select-shortcode').each(function () {
            var select = $(this).data('select_table');
            constructorWidgetsTableWidget(select, $(this), false);
        });
        doc.find('.tp-widgets-widget-select-label')
            .on('change', '.tp-widgets-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select = $(this).val();
                constructorWidgetsTableWidget(select, $(this), true)
            });

    }

    function constructorFlightTableWidget(select) {
        doc.find('.tp-flights-tables-widget-title, '
            +'.tp-flights-tables-widget-origin, '
            +'.tp-flights-tables-widget-destination, '
            +'.tp-flights-tables-widget-airline, '
            +'.tp-flights-tables-widget-subid, '
            +'.tp-flights-tables-widget-filter-airline, '
            +'.tp-flights-tables-widget-filter-flight-number, '
            +'.tp-flights-tables-widget-limit, '
            +'.tp-flights-tables-widget-currency, '
            +'.tp-flights-tables-widget-paginate, '
            +'.tp-flights-tables-widget-one-way, '
            +'.tp-flights-tables-widget-off-title, '
            +'.tp-flights-tables-widget-transplant').hide();
        if (select != 'select') {
            select = select.toString();
            switch(select) {
                case '0':
                    //Flights from origin to destination, One Way (next month)
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title, '
                        +'.tp-flights-tables-widget-transplant').show();
                    break;
                case '1':
                    //Flights from Origin to Destination (next few days)
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '2':
                    //Cheapest Flights from origin to destination, Round-trip
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-filter-airline, '
                        +'.tp-flights-tables-widget-filter-flight-number, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '3':
                    //Cheapest Flights from origin to destination (next month)
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-filter-airline, '
                        +'.tp-flights-tables-widget-filter-flight-number, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-transplant').show();
                    break;
                case '4':
                    //Cheapest Flights from origin to destination (next year)
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-filter-airline, '
                        +'.tp-flights-tables-widget-filter-flight-number, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '5':
                    //Direct Flights from origin to destination
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-filter-airline, '
                        +'.tp-flights-tables-widget-filter-flight-number, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '6':
                    //Direct Flights from origin
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-filter-airline, '
                        +'.tp-flights-tables-widget-filter-flight-number, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '7':
                    //Popular Destinations from origin
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '8':
                    //Most popular flights within this Airlines
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-airline, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '9':
                    //Searched on our website
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-one-way, '
                        +'.tp-flights-tables-widget-off-title, '
                        +'.tp-flights-tables-widget-transplant').show();
                    break;
                case '10':
                    //Cheap Flights from origin
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-one-way, '
                        +'.tp-flights-tables-widget-off-title, '
                        +'.tp-flights-tables-widget-transplant').show();
                    break;
                case '11':
                    doc.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-one-way, '
                        +'.tp-flights-tables-widget-off-title, '
                        +'.tp-flights-tables-widget-transplant').show();
                    break;

            }
        }

    }
    function constructorHotelTableWidget(select) {
        doc.find('.tp-hotels-tables-widget-title, '
            +'.tp-hotels-tables-widget-city, '
            +'.tp-hotels-tables-widget-subid, '
            +'.tp-hotels-tables-widget-selections-type, '
            +'.tp-hotels-tables-widget-check_in, '
            +'.tp-hotels-tables-widget-check_out, '
            +'.tp-hotels-tables-widget-limit, '
            +'.tp-hotels-tables-widget-paginate, '
            +'.tp-hotels-tables-widget-off_title, '
            +'.tp-hotels-tables-widget-link_without_dates').hide();
        if (select != 'select'){
            select = select.toString();
            switch(select) {
                case '0':
                    //Hotels collection - Discounts
                    doc.find('.tp-hotels-tables-widget-title, '
                        +'.tp-hotels-tables-widget-city, '
                        +'.tp-hotels-tables-widget-subid, '
                        +'.tp-hotels-tables-widget-selections-type, '
                        +'.tp-hotels-tables-widget-limit, '
                        +'.tp-hotels-tables-widget-paginate, '
                        +'.tp-hotels-tables-widget-off_title, '
                        +'.tp-hotels-tables-widget-link_without_dates').show();
                    break;
                case '1':
                    //Hotels collections for dates
                    doc.find('.tp-hotels-tables-widget-title, '
                        +'.tp-hotels-tables-widget-city, '
                        +'.tp-hotels-tables-widget-subid, '
                        +'.tp-hotels-tables-widget-selections-type, '
                        +'.tp-hotels-tables-widget-check_in, '
                        +'.tp-hotels-tables-widget-check_out, '
                        +'.tp-hotels-tables-widget-limit, '
                        +'.tp-hotels-tables-widget-paginate, '
                        +'.tp-hotels-tables-widget-off_title, '
                        +'.tp-hotels-tables-widget-link_without_dates').show();
                    break;
            }
        }

    }
    function hotelWidgetDatepicker() {
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
    }
    function hotelWidgeSelectionsType() {
        doc.find('.HotelWidgetCityAutocomplete').each(function () {
            var city, widget, selectionsType;
            widget = $(this).parent('label').parent('p').parent('.tp-hotels-tables-widget');
            selectionsType = widget.children('.tp-hotels-tables-widget-selections-type')
                .children('.tp-hotels-tables-widget-selections-type-label')
                .children('.tp-hotels-tables-widget-selections-type-select');
            city = $(this).attr('placeholder');
            if (city != ''){
                city = city.substring(city.indexOf('[')+1,city.indexOf(']'));
                selectionsType.find("option:gt(0)").remove();
                var selectionsTypeVal = selectionsType.data('selections_type');
                tpCityAutocomplete.TPGetHotelsSelections(city, selectionsType, selectionsTypeVal);

            }
        });
    }

    function constructorWidgetsTableWidget(select, element, change) {
        var widget, hotelIdElement;
        widget = element.parent('label').parent('p').parent('.tp-widgets-widget');
        hotelIdElement = widget.children('.tp-widgets-widget-hotel-id').children('label').children('input');
        doc.find('.tp-widgets-widget-subid, '
            +'.tp-widgets-widget-origin, '
            +'.tp-widgets-widget-destination, '
            +'.tp-widgets-widget-hotel-id, '
            +'.tp-widgets-widget-size, '
            +'.tp-widgets-widget-zoom, '
            +'.tp-widgets-widget-calendar-period, '
            +'.tp-widgets-widget-calendar-period-range, '
            +'.tp-widgets-widget-one-way, '
            +'.tp-widgets-widget-responsive, '
            +'.tp-widgets-widget-popular-routes-count, '
            +'.tp-widgets-widget-popular-routes, '
            +'.tp-widgets-widget-type-6, '
            +'.tp-widgets-widget-cat, '
            +'.tp-widgets-widget-direct').hide();
        if (change == true){
            hotelIdElement.removeClass('TPCoordinatesAutocomplete');
            hotelIdElement.removeClass('TPAutocompleteIDWidget');
            hotelIdElement.attr("placeholder", TPOriginTitle);
        }


        doc.find('.tp-widgets-widget-responsive-label')
            .on('change', '.tp-widgets-widget-responsive-label-input', function(e) {
            if($(this).is(":checked")) {
                doc.find('.tp-widgets-widget-responsive-label-width').hide();
            }else{
                doc.find('.tp-widgets-widget-responsive-label-width').show();
            }
        });
        if (doc.find('.tp-widgets-widget-responsive-label-input').is(":checked")){
            doc.find('.tp-widgets-widget-responsive-label-width').hide();
        }else{
            doc.find('.tp-widgets-widget-responsive-label-width').show();
        }
        if (select != 'select') {
            select = select.toString();
            switch(select) {
                case '0':
                    //Map Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-size, '
                        +'.tp-widgets-widget-direct').show();
                    break;
                case '1':
                    //Hotels Map Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-size, '
                        +'.tp-widgets-widget-zoom').show();
                    hotelIdElement.addClass('TPCoordinatesAutocomplete');
                    if (change == true){
                        hotelIdElement.attr("placeholder", TPLocationTitlt);
                    }

                    break;
                case '2':
                    //Calendar Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-destination, '
                        +'.tp-widgets-widget-calendar-period, '
                        +'.tp-widgets-widget-calendar-period-range, '
                        +'.tp-widgets-widget-direct, '
                        +'.tp-widgets-widget-one-way, '
                        +'.tp-widgets-widget-responsive').show();
                    break;
                case '3':
                    //Subscription Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-destination, '
                        +'.tp-widgets-widget-responsive').show();
                    break;
                case '4':
                    //Hotel Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-responsive').show();

                    if (change == true){
                        hotelIdElement.attr("placeholder", TPHotelWidgetLabel);
                    }

                    break;
                case '5':
                    //Popular Destinations Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-popular-routes-count, '
                        +'.tp-widgets-widget-popular-routes').show();
                    if(doc.find('.tp-widgets-widget-popular-routes-count-input').val() > 1){
                        doc.find('.tp-widgets-widget-responsive').hide();
                    }else {
                        doc.find('.tp-widgets-widget-responsive').show();
                    }
                    doc.find('.tp-widgets-widget-popular-routes-count-label')
                        .on('change', '.tp-widgets-widget-popular-routes-count-input', function(e) {
                            var widget, popularRoutes, fieldName, fieldId, fieldClass, fieldLabel, fieldData;
                            fieldData = [];
                            widget = $(this).parent('.tp-widgets-widget-popular-routes-count-label')
                                .parent('.tp-widgets-widget-popular-routes-count')
                                .parent('.tp-widgets-widget');
                            popularRoutes = widget.children('.tp-widgets-widget-popular-routes');
                            fieldName = popularRoutes.data('field_name');
                            fieldId = popularRoutes.data('field_id');
                            fieldClass = popularRoutes.data('field_class');
                            fieldLabel = popularRoutes.data('field_label');
                            fieldName = fieldName.substring(0, fieldName.length - 1);
                            popularRoutes.children('label').each(function () {
                                var value;
                                if ($(this).children('input').attr('placeholder') == ''){
                                    value = $(this).children('input').val();
                                } else {
                                    value = $(this).children('input').attr('placeholder');
                                }
                                fieldData.push(value);
                            });
                            popularRoutes.children('label').remove();
                            for(var i = 0; i < $(this).val(); i++){
                                var placeholder = '';
                                if(typeof fieldData[i] !== 'undefined') {
                                    placeholder = fieldData[i];
                                }
                                var name = '';
                                name += fieldName;
                                name += i+']';
                                var id = '';
                                id += fieldId;
                                id += i;
                                popularRoutes.append('<label for="'+id+'">'
                                    +fieldLabel
                                    +'<input type="text" class="'+fieldClass+'" '
                                    +'id="'+id+'" name="'+name+'" ' +
                                    ' placeholder="'+placeholder+'" '
                                    +' value="'+placeholder+'">'
                                    +'</label>')
                            }
                            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete");
                            if($(this).val() > 1){
                                doc.find('.tp-widgets-widget-responsive').hide();
                            }else{
                                doc.find('.tp-widgets-widget-responsive').show();
                                /*doc.find('#responsive_width').val(doc.find('#select_widgets').data('widgets-size-width-6'));
                                switch ($(this).data('widgets-responsive-6')){
                                    case 0:
                                        doc.find('#responsive_widget').attr('checked', false);
                                        break;
                                    case 1:
                                        doc.find('#responsive_widget').attr('checked', true);
                                        break;
                                }*/
                            }


                    });
                    break;
                case '6':
                    //Hotels Selections Widget
                    doc.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-type-6').show();
                    hotelIdElement.addClass('TPAutocompleteIDWidget');
                    var city, cityIata;
                    city = hotelIdElement.attr("placeholder");
                    cityIata = city.substring(city.indexOf('[')+1,city.indexOf(']'));
                    if (cityIata != ''){
                        tpCityAutocomplete.TPGetHotelsWidgetCat(cityIata, hotelIdElement);
                    }

                    //TPGetHotelsWidgetCat
                    if (change == true){
                        hotelIdElement.attr("placeholder", TPPHCity);
                    }

                    break;
                case '7':
                    //Best deals widget
                    break;
            }
        }
    }

});