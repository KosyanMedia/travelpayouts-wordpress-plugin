jQuery(function($) {
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    doc.ready(function () {
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        constructorWidgetShortcodesSelect();

    });
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {
        tpCityAutocomplete.TPCityAutocompleteInit(".constructorCityWidgetsAutocomplete");
        tpCityAutocomplete.TPAirlineAutocompleteInit(".constructorAirlineWidgetsAutocomplete");
        constructorWidgetShortcodesSelect();
    });
    function constructorWidgetShortcodesSelect(){
        doc.find('.TPSelectWidgetLabel').on('change', '.TPSelectShortcodeWidget', function(e) {
            e.preventDefault();
            doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-AirlineWidget, .TP-PaginateWidget, .TP-StopsWidget, .TP-LimitWidget, .TP-OneWayWidget, .TP-Off_TitleWidget').hide();

            switch($(this).val()) {
                case '1':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case '2':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case '3':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case '4':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case '5':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case '6':
                    doc.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case '7':
                    doc.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-LimitWidget, .TP-Off_TitleWidget').show();
                    break;
                case '8':
                    doc.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case '9':
                    doc.find('.TP-AirlineWidget, .TP-PaginateWidget, .TP-LimitWidget, .TP-Off_TitleWidget').show();
                    break;
                case '11':
                    doc.find('.TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case '12':
                    doc.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case '13':
                    doc.find('.TP-DestinationWidget, .TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
            }
        });

        doc.find('.TPSelectShortcodeWidget').each(function () {


            var TPMainWidget = $(this).parent('label').parent('p').parent('div');
            switch($(this).data('select_table')) {
                case 1:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case 2:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case 3:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case 4:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case 5:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case 6:
                    TPMainWidget.find('.TP-OriginWidget, .TP-DestinationWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case 7:
                    TPMainWidget.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-LimitWidget, .TP-Off_TitleWidget').show();
                    break;
                case 8:
                    TPMainWidget.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-Off_TitleWidget').show();
                    break;
                case 9:
                    TPMainWidget.find('.TP-AirlineWidget, .TP-PaginateWidget, .TP-LimitWidget, .TP-Off_TitleWidget').show();
                    break;
                case 11:
                    TPMainWidget.find('.TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case 12:
                    TPMainWidget.find('.TP-OriginWidget, .TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
                case 13:
                    TPMainWidget.find('.TP-DestinationWidget, .TP-PaginateWidget, .TP-OneWayWidget, .TP-LimitWidget, .TP-StopsWidget, .TP-Off_TitleWidget').show();
                    break;
            }
        });

    }
});