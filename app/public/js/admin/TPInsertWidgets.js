jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function () {
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        console.log( doc.find('.tp-flights-tables-widget-select-shortcode'))
        doc.find('.tp-flights-tables-widget-select-shortcode').each(function () {
            constructorFlightTableWidget($(this).data('select_table').toString())
        });

        doc.find('.tp-flights-tables-widget-select-label')
            .on('change', '.tp-flights-tables-widget-select-shortcode', function(e) {
                e.preventDefault();
                constructorFlightTableWidget($(this).val())
            });
    });
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        doc.find('.tp-flights-tables-widget-select-label')
            .on('change', '.tp-flights-tables-widget-select-shortcode', function(e) {
            e.preventDefault();
            constructorFlightTableWidget($(this).val())
        });
    });

    function constructorFlightTableWidget(select) {
        console.log('constructorFlightTableWidget = '+select);
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


});