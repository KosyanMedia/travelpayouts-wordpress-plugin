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
        var widget, hotelIdElement, fieldSizeWidth1, fieldSizeHeight1, fieldSizeWidth2, fieldSizeHeight2,
            fieldDirect1, fieldDirect3, fieldOneWay3, fieldWidth3, fieldResponsive3, fieldWidth4, fieldResponsive4,
            fieldWidth5, fieldResponsive5, fieldWidth6, fieldResponsive6, fieldWidth7, fieldResponsive7,
            fieldLimit7, fieldType7, fieldWidth8, fieldResponsive8, fieldType8, fieldFilter8, fieldLimit8;
        widget = element.parent('label').parent('p').parent('.tp-widgets-widget');
        hotelIdElement = widget.children('.tp-widgets-widget-hotel-id').children('label').children('input');
        fieldSizeWidth1 = widget.data('field_size_width_1');
        fieldSizeHeight1 = widget.data('field_size_height_1');
        fieldSizeWidth2 = widget.data('field_size_width_2');
        fieldSizeHeight2 = widget.data('field_size_height_2');
        fieldDirect1 = widget.data('field_direct_1');
        fieldDirect3 = widget.data('field_direct_3');
        fieldOneWay3 = widget.data('field_one_way_3');
        fieldWidth3 = widget.data('field_width_3');
        fieldResponsive3 = widget.data('field_responsive_3');
        fieldWidth4 = widget.data('field_width_4');
        fieldResponsive4 = widget.data('field_responsive_4');
        fieldWidth5 = widget.data('field_width_5');
        fieldResponsive5 = widget.data('field_responsive_5');
        fieldWidth6 = widget.data('field_width_6');
        fieldResponsive6 = widget.data('field_responsive_6');
        fieldWidth7 = widget.data('field_width_7');
        fieldResponsive7 = widget.data('field_responsive_7');
        fieldLimit7 = widget.data('field_limit_7');
        fieldType7 = widget.data('field_type_7');
        fieldWidth8 = widget.data('field_width_8');
        fieldResponsive8 = widget.data('field_responsive_8');
        fieldType8 = widget.data('field_type_8');
        fieldFilter8 = widget.data('field_filter_8');
        fieldLimit8 = widget.data('field_limit_8');

        widget.find('.tp-widgets-widget-subid, '
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
            +'.tp-widgets-widget-limit-6, '
            +'.tp-widgets-widget-cat, '
            +'.tp-widgets-widget-type-7, '
            +'.tp-widgets-widget-filter, '
            +'.tp-widgets-widget-origin-7, '
            +'.tp-widgets-widget-destination-7, '
            +'.tp-widgets-widget-airline-7, '
            +'.tp-widgets-widget-limit-7, '
            +'.tp-widgets-widget-direct').hide();
        if (change == true){
            hotelIdElement.removeClass('TPCoordinatesAutocomplete');
            hotelIdElement.removeClass('TPAutocompleteIDWidget');
            hotelIdElement.attr("placeholder", TPOriginTitle);
            //widget.find()
        }
        widget.find('.tp-widgets-widget-responsive-label')
            .on('change', '.tp-widgets-widget-responsive-label-input', function(e) {
            if($(this).is(":checked")) {
                widget.find('.tp-widgets-widget-responsive-label-width').hide();
            }else{
                widget.find('.tp-widgets-widget-responsive-label-width').show();
            }
        });
        if (widget.find('.tp-widgets-widget-responsive-label-input').is(":checked")){
            widget.find('.tp-widgets-widget-responsive-label-width').hide();
        }else{
            widget.find('.tp-widgets-widget-responsive-label-width').show();
        }
        if (select != 'select') {
            select = select.toString();
            switch(select) {
                case '0':
                    //Map Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-size, '
                        +'.tp-widgets-widget-direct').show();
                    if (change == true){
                        widget.find('.tp-widgets-widget-size').children('label:first-child')
                            .children('input').val(fieldSizeWidth1);
                        widget.find('.tp-widgets-widget-size').children('label:last-child')
                            .children('input').val(fieldSizeHeight1);
                        if (fieldDirect1 == 1){
                            widget.find('.tp-widgets-widget-direct').children('label')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-direct').children('label')
                                .children('input').attr('checked', false);
                        }
                    }
                    break;
                case '1':
                    //Hotels Map Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-size, '
                        +'.tp-widgets-widget-zoom').show();
                    hotelIdElement.addClass('TPCoordinatesAutocomplete');
                    if (change == true){
                        hotelIdElement.attr("placeholder", TPLocationTitlt);
                        widget.find('.tp-widgets-widget-size').children('label:first-child')
                            .children('input').val(fieldSizeWidth2);
                        widget.find('.tp-widgets-widget-size').children('label:last-child')
                            .children('input').val(fieldSizeHeight2);
                    }

                    break;
                case '2':
                    //Calendar Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-destination, '
                        +'.tp-widgets-widget-calendar-period, '
                        +'.tp-widgets-widget-calendar-period-range, '
                        +'.tp-widgets-widget-direct, '
                        +'.tp-widgets-widget-one-way, '
                        +'.tp-widgets-widget-responsive').show();
                    if (change == true){
                        if (fieldDirect3 == 1){
                            widget.find('.tp-widgets-widget-direct').children('label')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-direct').children('label')
                                .children('input').attr('checked', false);
                        }
                        if (fieldOneWay3 == 1){
                            widget.find('.tp-widgets-widget-one-way').children('label')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label')
                                .children('input').attr('checked', false);
                        }
                        if (fieldResponsive3 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth3);
                    }
                    break;
                case '3':
                    //Subscription Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-origin, '
                        +'.tp-widgets-widget-destination, '
                        +'.tp-widgets-widget-responsive').show();
                    if (change == true){
                        if (fieldResponsive4 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth4);
                    }
                    break;
                case '4':
                    //Hotel Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-responsive').show();

                    if (change == true){
                        hotelIdElement.attr("placeholder", TPHotelWidgetLabel);
                        if (fieldResponsive5 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth5);
                    }

                    break;
                case '5':
                    //Popular Destinations Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-popular-routes-count, '
                        +'.tp-widgets-widget-popular-routes').show();
                    if(widget.find('.tp-widgets-widget-popular-routes-count-input').val() > 1){
                        widget.find('.tp-widgets-widget-responsive').hide();
                    }else {
                        widget.find('.tp-widgets-widget-responsive').show();
                    }
                    widget.find('.tp-widgets-widget-popular-routes-count-label')
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
                                widget.find('.tp-widgets-widget-responsive').hide();
                            }else{
                                widget.find('.tp-widgets-widget-responsive').show();
                            }


                    });
                    if (change == true){
                        if (fieldResponsive6 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth6);
                    }
                    break;
                case '6':
                    //Hotels Selections Widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-hotel-id, '
                        +'.tp-widgets-widget-type-6, '
                        +'.tp-widgets-widget-limit-6').show();
                    hotelIdElement.addClass('TPAutocompleteIDWidget');
                    var city, cityIata;
                    city = hotelIdElement.attr("placeholder");
                    cityIata = city.substring(city.indexOf('[')+1,city.indexOf(']'));
                    if (cityIata != ''){
                        tpCityAutocomplete.TPGetHotelsWidgetCat(cityIata, hotelIdElement);
                    }
                    if (change == true){
                        hotelIdElement.attr("placeholder", TPPHCity);
                        if (fieldResponsive7 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth7);

                        widget.find('.tp-widgets-widget-limit-6').children('label')
                            .children('select').find('option[value='+fieldLimit7+']')
                            .attr('selected','selected');
                        widget.find('.tp-widgets-widget-type-6').children('label')
                            .children('select').find('option[value='+fieldType7+']')
                            .attr('selected','selected');
                    }

                    break;
                case '7':
                    //Best deals widget
                    widget.find('.tp-widgets-widget-subid, '
                        +'.tp-widgets-widget-type-7, '
                        +'.tp-widgets-widget-filter, '
                        +'.tp-widgets-widget-limit-7, '
                        +'.tp-widgets-widget-responsive').show();
                    deleteFieldAirline();
                    widget.find(".tp-widgets-widget-filter input:checked").each(function () {
                        var widget;
                        widget = $(this).parent('label').parent('.tp-widgets-widget-filter')
                            .parent('.tp-widgets-widget');
                        switch ( $(this).val() ){
                            case '0':
                                widget.on('click', '.TPBtnAdd', addFieldAirline);
                                widget.children('.tp-widgets-widget-airline-7').show();
                                break;
                            case '1':
                                widget.off( 'click', '.TPBtnAdd');
                                widget.children('.tp-widgets-widget-origin-7, '
                                    +'.tp-widgets-widget-destination-7').show();
                                break;
                        }
                    });

                    widget.find(".tp-widgets-widget-filter input:radio").change(function () {
                        var widget;
                        widget = $(this).parent('label').parent('.tp-widgets-widget-filter')
                            .parent('.tp-widgets-widget');
                        widget.off( 'click', '.TPBtnAdd');
                        widget.children('.tp-widgets-widget-origin-7, '
                            +'.tp-widgets-widget-destination-7, '
                            +'.tp-widgets-widget-airline-7').hide();
                        switch ($(this).val()){
                            case '0':
                                widget.on('click', '.TPBtnAdd', addFieldAirline);
                                widget.children('.tp-widgets-widget-airline-7').show();
                                break;
                            case '1':
                                widget.off( 'click', '.TPBtnAdd');
                                widget.children('.tp-widgets-widget-origin-7, '
                                    +'.tp-widgets-widget-destination-7').show();
                                break;
                        }
                    });
                    if (change == true){
                        if (fieldResponsive8 == 1){
                            widget.find('.tp-widgets-widget-responsive').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else {
                            widget.find('.tp-widgets-widget-one-way').children('label:first-child')
                                .children('input').attr('checked', false);
                        }
                        widget.find('.tp-widgets-widget-responsive').children('label:last-child')
                            .children('input').val(fieldWidth8);

                        widget.find('.tp-widgets-widget-limit-7').children('label')
                            .children('select').find('option[value='+fieldLimit8+']')
                            .attr('selected','selected');
                        widget.find('.tp-widgets-widget-type-7').children('label')
                            .children('select').find('option[value='+fieldType8+']')
                            .attr('selected','selected');

                        if (fieldFilter8 == 0){
                            widget.find('.tp-widgets-widget-filter').children('label:first-child')
                                .children('input').attr('checked', true);
                        } else if (fieldFilter8 == 1){
                            widget.find('.tp-widgets-widget-filter').children('label:last-child')
                                .children('input').attr('checked', true);
                        }


                    }
                    break;
            }
        }
    }

    /**
     *
     */
    function addFieldAirline(){
        var widgetAirlineField, fieldName, fieldId, fieldClass, fieldLabel, airlineFieldCount,
            airlineCount, id, name;
        name = '';
        id = '';
        widgetAirlineField = $(this).parent('.tp-widgets-widget-airline-7');
        airlineFieldCount = widgetAirlineField.find('.tp-widgets-widget-airline-7-count');
        airlineCount = airlineFieldCount.val();
        fieldName = widgetAirlineField.data('field_name');
        fieldName = fieldName.substring(0, fieldName.length - 1);
        fieldId = widgetAirlineField.data('field_id');
        fieldClass = widgetAirlineField.data('field_class');
        fieldLabel = widgetAirlineField.data('field_label');
        id += fieldId;
        id += airlineCount;
        name += fieldName;
        name += airlineCount+']';
        $(this).before('<label for="'+id+'" class="tp-widgets-widget-airline-7-label">'
            +fieldLabel+'<input name="'+name+'" id="'+id+'" '
            +' class="'+fieldClass+'">'
            +'<a href="#" class="TPBtnDelete"><i></i>'
            +LabelDeleteWidget_8+'</a>'
            +'</label>');
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        airlineCount++;
        airlineFieldCount.val(airlineCount);
        deleteFieldAirline();
    }

    /**
     *
     */
    function deleteFieldAirline(){
        doc.find('.TPBtnDelete').click(function (e) {
            var field, widgetAirline, fieldCount, count;
            field = $(this).parent('label');
            widgetAirline = field.parent('.tp-widgets-widget-airline-7');
            fieldCount = widgetAirline.children('.tp-widgets-widget-airline-7-count');
            count = fieldCount.val();
            count--;
            fieldCount.val(count);
            field.remove();
        });
    }

});