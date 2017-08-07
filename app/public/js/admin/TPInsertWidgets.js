jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function () {
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

});