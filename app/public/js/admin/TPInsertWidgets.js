jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function () {
        tpInitWidget();
        doc.find('.tp-widget').each(function () {
            tpLoadWidget($(this));
        });
        //console.log('isCustomize')
        //console.log(isCustomize());
    });
    //Widget added
    jQuery(document).on('widget-added', function(e, widget){
        var tpWidget = widget.children('.widget-inside').children('form').children('.widget-content').children('.tp-widget');
        tpInitWidget();
        if (tpWidget.length > 0){
            console.log('add hotels');
            tpResetWidget(tpWidget);
        }
    });
    //Widget updated
    jQuery(document).on('widget-updated', function(e, widget){
        var tpWidget = widget.children('.widget-inside').children('form').children('.widget-content').children('.tp-widget');
        tpInitWidget();
        if (tpWidget.length > 0){
            tpSaveWidget(tpWidget);
        }
    });
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {

    });
    
    function isCustomize() {
        var customizeControls = doc.find('#customize-controls');
        if (customizeControls.length > 0){
            return true;
        }
        return false;
    }

    /**
     * Reset Widget
     * @param widget
     */
    function tpResetWidget(widget) {
        if (widget.hasClass('tp-flights-tables-widget')){
            tpResetFieldFlightsTablesWidget(widget);
        }else if (widget.hasClass('tp-hotels-tables-widget')){
            tpResetFieldHotesTablesWidget(widget);
        } else if (widget.hasClass('tp-railway-tables-widget')){
            tpResetFieldRailwayTablesWidget(widget);
        } else if (widget.hasClass('tp-widgets-widget')){
            tpResetFieldWidgetsWidget(widget);
        }
    }
    /**
     * Load Widget
     * @param widget
     */
    function tpLoadWidget(widget) {
        //console.log(widget);
        if (widget.hasClass('tp-flights-tables-widget')){
            tpCheckFieldFlightsTablesWidget(widget);
        }else if (widget.hasClass('tp-hotels-tables-widget')){
            tpCheckFieldHotesTablesWidget(widget);
        } else if (widget.hasClass('tp-railway-tables-widget')){
            tpCheckFieldRailwayTablesWidget(widget);
        } else if (widget.hasClass('tp-widgets-widget')){
            tpCheckFieldWidgetsWidget(widget);
        }
    }
    /**
     * Save Widget
     * @param widget
     */
    function tpSaveWidget(widget) {
        if (widget.hasClass('tp-flights-tables-widget')){
            tpCheckFieldFlightsTablesWidget(widget);
        } else if (widget.hasClass('tp-hotels-tables-widget')){
            tpCheckFieldHotesTablesWidget(widget);
        } else if (widget.hasClass('tp-railway-tables-widget')){
            tpCheckFieldRailwayTablesWidget(widget);
        } else if (widget.hasClass('tp-widgets-widget')){
            tpCheckFieldWidgetsWidget(widget);
        }
    }

    /**
     * Check Flight
     * @param widget
     */
    function tpCheckFieldFlightsTablesWidget(widget) {
        var selectField, originField, originFieldVal, destinationField, destinationFieldVal;
        selectField = widget.find('.tp-flights-tables-widget-select')
            .children('.tp-flights-tables-widget-select-label')
            .children('.tp-flights-tables-widget-select-shortcode');
        originField = widget.find('.tp-flights-tables-widget-origin').children('label').children('input');
        originFieldVal = originField.val();
        destinationField = widget.find('.tp-flights-tables-widget-destination').children('label').children('input');
        destinationFieldVal = destinationField.val();
        if (selectField.val() == 'select'){
            selectField.addClass('tp-widget-error');
        }
        if (originFieldVal == ''){
            originField.addClass('tp-widget-error');
        } else {
            originFieldVal = originFieldVal.substring(originFieldVal.indexOf('[')+1,originFieldVal.indexOf(']'));
            if (originFieldVal == ''){
                originField.addClass('tp-widget-error');
            }
        }
        if (destinationFieldVal == ''){
            destinationField.addClass('tp-widget-error');
        } else {
            destinationFieldVal = destinationFieldVal.substring(destinationFieldVal.indexOf('[')+1,destinationFieldVal.indexOf(']'));
            if (destinationFieldVal == ''){
                destinationField.addClass('tp-widget-error');
            }
        }
        /*console.log(selectField.val());
        console.log(originFieldVal);
        console.log(destinationFieldVal);*/
    }

    /**
     * Reset Flight
     * @param widget
     */
    function tpResetFieldFlightsTablesWidget(widget) {
        var selectFlightField, originFlightField, destinationFlightField;
        selectFlightField = widget.find('.tp-flights-tables-widget-select')
            .children('.tp-flights-tables-widget-select-label')
            .children('.tp-flights-tables-widget-select-shortcode');
        originFlightField = widget.find('.tp-flights-tables-widget-origin')
            .children('label').children('input');
        destinationFlightField = widget.find('.tp-flights-tables-widget-destination')
            .children('label').children('input');
        selectFlightField.removeClass('tp-widget-error');
        originFlightField.removeClass('tp-widget-error');
        destinationFlightField.removeClass('tp-widget-error');
        selectFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        originFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
    }

    /**
     * Check Hotel
     * @param widget
     */
    function tpCheckFieldHotesTablesWidget(widget) {
        var selectField, cityField, cityFieldVal, selectionsTypeField;
        selectField = widget.find('.tp-hotels-tables-widget-select')
            .children('.tp-hotels-tables-widget-select-label')
            .children('.tp-hotels-tables-widget-select-shortcode');
        cityField = widget.find('.tp-hotels-tables-widget-city')
            .children('label').children('input');
        selectionsTypeField  = widget.find('.tp-hotels-tables-widget-selections-type')
            .children('.tp-hotels-tables-widget-selections-type-label')
            .children('.tp-hotels-tables-widget-selections-type-select');
        cityFieldVal = cityField.val();
        if (selectField.val() == 'select'){
            selectField.addClass('tp-widget-error');
        }
        if (cityFieldVal == ''){
            cityField.addClass('tp-widget-error');
        } else {
            cityFieldVal = cityFieldVal.substring(cityFieldVal.indexOf('[')+1,cityFieldVal.indexOf(']'));
            if (cityFieldVal == ''){
                cityField.addClass('tp-widget-error');
            }
        }
        if (selectionsTypeField.data('selections_type') == 'all'){
            selectionsTypeField.addClass('tp-widget-error');
        }
    }

    /**
     * Reset Hotel
     * @param widget
     */
    function tpResetFieldHotesTablesWidget(widget) {
        var selectField, cityField, selectionsTypeField, paginateField;
        selectField = widget.find('.tp-hotels-tables-widget-select')
            .children('.tp-hotels-tables-widget-select-label')
            .children('.tp-hotels-tables-widget-select-shortcode');
        cityField = widget.find('.tp-hotels-tables-widget-city')
            .children('label').children('input');
        selectionsTypeField  = widget.find('.tp-hotels-tables-widget-selections-type')
            .children('.tp-hotels-tables-widget-selections-type-label')
            .children('.tp-hotels-tables-widget-selections-type-select');

        paginateField = widget.find('.tp-hotels-tables-widget-paginate')
            .children('label').children('input');

        selectField.removeClass('tp-widget-error');
        cityField.removeClass('tp-widget-error');
        selectionsTypeField.removeClass('tp-widget-error');

        selectField.change(function() {
            //console.log('selectField.change');
            var paginate_switch;
            paginate_switch = parseInt($(this).data('hotel-'+selectField.val()+'-paginate_switch'));
            if (paginate_switch == 1){
                paginateField.prop('checked', true);
            } else {
                paginateField.prop('checked', false);
            }
            //console.log(paginate_switch);
        });

        selectField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        cityField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        selectionsTypeField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
    }

    /**
     * Check Railway
     * @param widget
     */
    function tpCheckFieldRailwayTablesWidget(widget) {
        var originField, destinationField, originFieldVal, destinationFieldVal;
        originField = widget.find('.tp-railway-tables-widget-origin')
            .children('label').children('input');
        destinationField = widget.find('.tp-railway-tables-widget-destination')
            .children('label').children('input');
        originFieldVal = originField.val();
        destinationFieldVal = destinationField.val();
        //console.log('tpSaveRailwayTablesWidget');
        if (originFieldVal == ''){
            originField.addClass('tp-widget-error');
        } else {
            originFieldVal = originFieldVal.substring(originFieldVal.indexOf('[')+1,originFieldVal.indexOf(']'));
            if (originFieldVal == ''){
                originField.addClass('tp-widget-error');
            }
        }
        if (destinationFieldVal == ''){
            destinationField.addClass('tp-widget-error');
        } else {
            destinationFieldVal = destinationFieldVal.substring(destinationFieldVal.indexOf('[')+1,destinationFieldVal.indexOf(']'));
            if (destinationFieldVal == ''){
                destinationField.addClass('tp-widget-error');
            }
        }
    }

    /**
     * Reset Railway
     * @param widget
     */
    function tpResetFieldRailwayTablesWidget(widget) {
        var originField, destinationField;
        originField = widget.find('.tp-railway-tables-widget-origin')
            .children('label').children('input');
        destinationField = widget.find('.tp-railway-tables-widget-destination')
            .children('label').children('input');
        originField.removeClass('tp-widget-error');
        destinationField.removeClass('tp-widget-error');
        originField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
    }

    /**
     * Check Widgets
     * @param widget
     */
    function tpCheckFieldWidgetsWidget(widget) {
        var selectField, originField, destinationField, hotelIdField, popularRoutesDestinationField, originField7,
            destinationField7, airlineField7;
        selectField = widget.find('.tp-widgets-widget-select')
            .children('.tp-widgets-widget-select-label')
            .children('.tp-widgets-widget-select-shortcode');
        if (selectField.val() == 'select'){
            selectField.addClass('tp-widget-error');
        }
        originField = widget.find('.tp-widgets-widget-origin')
            .children('label').children('input');
        if (originField.val() == ''){
            originField.addClass('tp-widget-error');
        }
        destinationField = widget.find('.tp-widgets-widget-destination')
            .children('label').children('input');
        if (destinationField.val() == ''){
            destinationField.addClass('tp-widget-error');
        }
        hotelIdField = widget.find('.tp-widgets-widget-hotel-id')
            .children('label').children('input');
        if (hotelIdField.val()== ''){
            hotelIdField.addClass('tp-widget-error');
        }
        popularRoutesDestinationField =  widget.find('.tp-widgets-widget-popular-routes')
        popularRoutesDestinationField.find('label').each(function () {
            var popularRoutesDestinationFieldInput = $(this).children('input');
            if (popularRoutesDestinationFieldInput.val() == ''){
                popularRoutesDestinationFieldInput.addClass('tp-widget-error');
            }
            //console.log(popularRoutesDestinationFieldInput.val())
        });
        originField7 = widget.find('.tp-widgets-widget-origin-7')
            .children('label').children('input');
        if (originField7.val() == ''){
            originField7.addClass('tp-widget-error');
        }
        destinationField7 = widget.find('.tp-widgets-widget-destination-7')
            .children('label').children('input');
        if (destinationField7.val() == ''){
            destinationField7.addClass('tp-widget-error');
        }
        airlineField7 =  widget.find('.tp-widgets-widget-airline-7')
        airlineField7.find('label').each(function () {
            var airlineField7Input = $(this).children('input');
            if (airlineField7Input.val() == ''){
                airlineField7Input.addClass('tp-widget-error');
            }
            //console.log(airlineField7Input.val())
        });

        /*console.log(selectField.val());
        console.log(originField.val());
        console.log(destinationField.val());
        console.log(hotelIdField.val());
        console.log(originField7.val());
        console.log(destinationField7.val());*/
    }

    /**
     * Reset Widgets
     * @param widget
     */
    function tpResetFieldWidgetsWidget(widget) {
        var selectField, originField, destinationField, hotelIdField, popularRoutesDestinationField, originField7,
            destinationField7, airlineField7;
        selectField = widget.find('.tp-widgets-widget-select')
            .children('.tp-widgets-widget-select-label')
            .children('.tp-widgets-widget-select-shortcode');
        selectField.removeClass('tp-widget-error');
        originField = widget.find('.tp-widgets-widget-origin')
            .children('label').children('input');
        originField.removeClass('tp-widget-error');
        destinationField = widget.find('.tp-widgets-widget-destination')
            .children('label').children('input');
        destinationField.removeClass('tp-widget-error');
        hotelIdField = widget.find('.tp-widgets-widget-hotel-id')
            .children('label').children('input');
        hotelIdField.removeClass('tp-widget-error');
        popularRoutesDestinationField =  widget.find('.tp-widgets-widget-popular-routes')
        popularRoutesDestinationField.find('label').each(function () {
            var popularRoutesDestinationFieldInput = $(this).children('input');
            popularRoutesDestinationFieldInput.removeClass('tp-widget-error');
        });
        originField7 = widget.find('.tp-widgets-widget-origin-7')
            .children('label').children('input');
        if (originField7.val() == ''){
            originField7.addClass('tp-widget-error');
        }
        destinationField7 = widget.find('.tp-widgets-widget-destination-7')
            .children('label').children('input');
        destinationField7.removeClass('tp-widget-error');
        airlineField7 =  widget.find('.tp-widgets-widget-airline-7')
        airlineField7.find('label').each(function () {
            var airlineField7Input = $(this).children('input');
            airlineField7Input.removeClass('tp-widget-error');
            //console.log(airlineField7Input.val())
        });


    }


    /**
     *
     */
    function tpInitWidget() {
        if (isCustomize() == true){
            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPHotelAutocompleteInit(".constructorHotelShortcodesAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPRailwayAutocompleteInit(".tpCityRailwayAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPHotelAutocompleteInit(".constructorWidgetHotelShortcodesAutocomplete", "#customize-controls");
            tpCityAutocomplete.TPHotelAutocompleteInit('.searchHotelCityWidgetsAutocomplete', "#customize-controls");
        } else {
            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
            tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
            tpCityAutocomplete.TPHotelAutocompleteInit(".constructorHotelShortcodesAutocomplete");
            tpCityAutocomplete.TPRailwayAutocompleteInit(".tpCityRailwayAutocomplete");
            tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete");
            tpCityAutocomplete.TPHotelAutocompleteInit(".constructorWidgetHotelShortcodesAutocomplete");
            tpCityAutocomplete.TPHotelAutocompleteInit('.searchHotelCityWidgetsAutocomplete');
        }

        //Flight
        doc.find('.tp-flights-tables-widget-select-shortcode').each(function () {
            var select = $(this).data('select_table');
            constructorFlightTableWidget(select, $(this), false)
        });
        doc.find('.tp-flights-tables-widget-select-label')
            .on('change', '.tp-flights-tables-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select = $(this).val();
                constructorFlightTableWidget(select, $(this), true);
            });
        //Hotel
        doc.find('.tp-hotels-tables-widget-select-shortcode').each(function () {

            var select = $(this).data('select_table');
            constructorHotelTableWidget(select, $(this), false);
        });
        doc.find('.tp-hotels-tables-widget-select-label')
            .on('change', '.tp-hotels-tables-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select = $(this).val();
                constructorHotelTableWidget(select, $(this), true)
            });
        hotelWidgetDatepicker();
        hotelWidgeSelectionsType();
        //Railway
        doc.find('.tp-railway-tables-widget').each(function () {
            constructorRailwayTablesWidget($(this));
        });
        //Widget
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
        //SearchForm
        doc.find('.tp-search-form-widget-select-shortcode').each(function () {
            var select, typeForm, slug;
            select = $(this).data('select_table');
            typeForm = $(this).data('type_form');
            slug = $(this).data('slug');
            if (typeForm == ''){
                var fieldSelect;
                fieldSelect = $(this).find('option:first-child');
                typeForm = fieldSelect.data('type_form');
                slug = fieldSelect.data('slug');
            }
            constructorSearchFormWidget(select, typeForm, slug, $(this), false);
        });
        doc.find('.tp-search-form-widget-select-label')
            .on('change', '.tp-search-form-widget-select-shortcode', function(e) {
                e.preventDefault();
                var select, typeForm, slug;
                select = $(this).data('select_table');
                typeForm =  $(this).find(':selected').data('type_form');
                slug =  $(this).find(':selected').data('slug');
                constructorSearchFormWidget(select, typeForm, slug, $(this), true);
            });

    }

    /**
     *
     * @param select
     * @param element
     * @param change
     */
    function constructorFlightTableWidget(select, element, change) {
        var widget, selectFlightField, originFlightField, destinationFlightField;
        widget = element.parent('label').parent('p').parent('.tp-flights-tables-widget');
        selectFlightField = widget.find('.tp-flights-tables-widget-select')
            .children('.tp-flights-tables-widget-select-label')
            .children('.tp-flights-tables-widget-select-shortcode');
        originFlightField = widget.find('.tp-flights-tables-widget-origin')
            .children('label').children('input');
        destinationFlightField = widget.find('.tp-flights-tables-widget-destination')
            .children('label').children('input');
        widget.find('.tp-flights-tables-widget-title, '
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
        if (change == true){
            selectFlightField.removeClass('tp-widget-error');
            originFlightField.removeClass('tp-widget-error');
            destinationFlightField.removeClass('tp-widget-error');
        }
        selectFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        originFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationFlightField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        if (select != 'select') {
            select = select.toString();
            switch(select) {
                case '0':
                    //Flights from origin to destination, One Way (next month)
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-destination, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-currency, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '2':
                    //Cheapest Flights from origin to destination, Round-trip
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-origin, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '8':
                    //Most popular flights within this Airlines
                    widget.find('.tp-flights-tables-widget-title, '
                        +'.tp-flights-tables-widget-airline, '
                        +'.tp-flights-tables-widget-subid, '
                        +'.tp-flights-tables-widget-limit, '
                        +'.tp-flights-tables-widget-paginate, '
                        +'.tp-flights-tables-widget-off-title').show();
                    break;
                case '9':
                    //Searched on our website
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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
                    widget.find('.tp-flights-tables-widget-title, '
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

    /**
     *
     * @param select
     * @param element
     * @param change
     */
    function constructorHotelTableWidget(select, element, change) {
        var widget, selectField, cityField, selectionsTypeField;
        widget = element.parent('label').parent('p').parent('.tp-hotels-tables-widget');
        selectField = widget.find('.tp-hotels-tables-widget-select')
            .children('.tp-hotels-tables-widget-select-label')
            .children('.tp-hotels-tables-widget-select-shortcode');
        cityField = widget.find('.tp-hotels-tables-widget-city')
            .children('label').children('input');
        selectionsTypeField  = widget.find('.tp-hotels-tables-widget-selections-type')
            .children('.tp-hotels-tables-widget-selections-type-label')
            .children('.tp-hotels-tables-widget-selections-type-select');
        widget.find('.tp-hotels-tables-widget-title, '
            +'.tp-hotels-tables-widget-city, '
            +'.tp-hotels-tables-widget-subid, '
            +'.tp-hotels-tables-widget-selections-type, '
            +'.tp-hotels-tables-widget-check_in, '
            +'.tp-hotels-tables-widget-check_out, '
            +'.tp-hotels-tables-widget-limit, '
            +'.tp-hotels-tables-widget-paginate, '
            +'.tp-hotels-tables-widget-off_title, '
            +'.tp-hotels-tables-widget-link_without_dates').hide();
        widget.find('.tp-hotels-tables-widget-selections-type-label')
            .on('change', '.tp-hotels-tables-widget-selections-type-select', function(e) {
                e.preventDefault();
                var selectionsTitle;
                selectionsTitle =  $(this).find(':selected').data('selections-title');
                widget.find('.tp-hotels-tables-widget-selections-type-label-field').val(selectionsTitle);
            });
        if (change == true){
            selectField.removeClass('tp-widget-error');
            cityField.removeClass('tp-widget-error');
            selectionsTypeField.removeClass('tp-widget-error');
        }
        selectField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        cityField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        selectionsTypeField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });

        if (select != 'select'){
            select = select.toString();
            switch(select) {
                case '0':
                    //Hotels collection - Discounts
                    widget.find('.tp-hotels-tables-widget-title, '
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
                    widget.find('.tp-hotels-tables-widget-title, '
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
            city = $(this).val();
            //console.log(city)

            if (city != ''){
                city = city.substring(city.indexOf('[')+1,city.indexOf(']'));
                selectionsType.find("option:gt(0)").remove();
                var selectionsTypeVal = selectionsType.data('selections_type');
                //console.log(city)
                //console.log(selectionsTypeVal)
                tpCityAutocomplete.TPGetHotelsSelections(city, selectionsType, selectionsTypeVal);

            }
        });
    }

    /**
     *
     * @param widget
     */
    function constructorRailwayTablesWidget(widget) {
        var originField, destinationField;
        originField = widget.find('.tp-railway-tables-widget-origin')
            .children('label').children('input');
        destinationField = widget.find('.tp-railway-tables-widget-destination')
            .children('label').children('input');
        originField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
    }

    /**
     *
     * @param select
     * @param element
     * @param change
     */
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
        constructorWidgetsTableWidgetReset(widget, change);
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
                            if (isCustomize() == true) {
                                tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete", "#customize-controls");
                            } else {
                                tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityShortcodesAutocomplete");
                            }

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
                    city = hotelIdElement.val();
                    if (city != ''){
                        cityIata = city.substring(city.indexOf('[')+1,city.indexOf(']'));
                        if (cityIata != ''){
                            tpCityAutocomplete.TPGetHotelsWidgetCat(cityIata, hotelIdElement);
                        }
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
     * @param widget
     * @param change
     */
    function constructorWidgetsTableWidgetReset(widget, change) {
        var selectField, originField, destinationField, hotelIdField, popularRoutesDestinationField, originField7,
            destinationField7, airlineField7;
        selectField = widget.find('.tp-widgets-widget-select')
            .children('.tp-widgets-widget-select-label')
            .children('.tp-widgets-widget-select-shortcode');
        originField = widget.find('.tp-widgets-widget-origin')
            .children('label').children('input');
        destinationField = widget.find('.tp-widgets-widget-destination')
            .children('label').children('input');
        hotelIdField = widget.find('.tp-widgets-widget-hotel-id')
            .children('label').children('input');
        popularRoutesDestinationField =  widget.find('.tp-widgets-widget-popular-routes')
            .children('label').children('input');
        originField7 = widget.find('.tp-widgets-widget-origin-7')
            .children('label').children('input');
        destinationField7 = widget.find('.tp-widgets-widget-destination-7')
            .children('label').children('input');
        airlineField7 =  widget.find('.tp-widgets-widget-airline-7')
            .children('label').children('input');
        if (change == true){
            selectField.removeClass('tp-widget-error');
            originField.removeClass('tp-widget-error');
            destinationField.removeClass('tp-widget-error');
            hotelIdField.removeClass('tp-widget-error');
            popularRoutesDestinationField.removeClass('tp-widget-error');
            originField7.removeClass('tp-widget-error');
            destinationField7.removeClass('tp-widget-error');
            airlineField7.removeClass('tp-widget-error');
            //selectionsTypeField.removeClass('tp-widget-error');
        }
        selectField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        originField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        hotelIdField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        popularRoutesDestinationField.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        originField7.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        destinationField7.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        airlineField7.focus(function() {
            $(this).removeClass('tp-widget-error');
        });
        widget.find(".tp-widgets-widget-filter input:radio").change(function () {
            originField7.removeClass('tp-widget-error');
            destinationField7.removeClass('tp-widget-error');
            airlineField7.removeClass('tp-widget-error');
        });
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
        if (isCustomize() == true) {
            tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete", "#customize-controls");
        } else {
            tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        }

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
    function constructorSearchFormWidget(select, typeForm, slug, element, change) {
        var widget, fieldSelect;
        fieldSelect = element.parent('label').parent('.tp-search-form-widget-select');
        widget = fieldSelect.parent('.tp-search-form-widget');

        widget.find('.tp-search-form-widget-origin, '
            +'.tp-search-form-widget-destination, '
            +'.tp-search-form-widget-hotel-city').hide();
        fieldSelect.find('.tp-search-form-widget-select-type-form').val(typeForm);
        fieldSelect.find('.tp-search-form-widget-select-slug').val(slug);
        switch (typeForm){
            case "avia":
                widget.find('.tp-search-form-widget-origin, '
                    +'.tp-search-form-widget-destination').show();
                break;
            case "hotel":
                widget.find('.tp-search-form-widget-hotel-city').show();
                break;
            case "avia_hotel":
                widget.find('.tp-search-form-widget-origin, '
                    +'.tp-search-form-widget-destination, '
                    +'.tp-search-form-widget-hotel-city').show();
                break;
        }
    }

});