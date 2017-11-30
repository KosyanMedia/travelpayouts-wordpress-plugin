/**
 * Autocomplete
 * @constructor
 */
function TPCityAutocomplete(){
    var catHotelSelec = {
        "ru":{
            tophotels: "Топ отели",
            price: "Дешёвые",
            distance: "Близко к центру",
            rating: "Рейтинг",
            "1stars": "1 звезда",
            "2stars": "2 звезды",
            "3stars": "3 звезды",
            "4stars": "4 звезды",
            "5stars": "5 звёзд",
            luxury: "Роскошные",
            highprice: "Дорогие",
            center: "Отели в центре",
            pool: "С бассейном",
            gay: "Гей френдли",
            smoke: "Для курящих",
            restaurant: "Ресторан",
            pets: "Животные",
            russians: "Для русских",
            sea_view: "С видом на море",
            lake_view: "С видом на озеро",
            river_view: "С видом на реку",
            panoramic_view: "С панорамным видом",
            popularity: "Популярные"
        },
        "en":{
            tophotels: "Top hotels",
            price: "Cheap",
            distance: "Close to city center",
            rating: "Rating",
            "1stars": "1 star",
            "2stars": "2 stars",
            "3stars": "3 stars",
            "4stars": "4 stars",
            "5stars": "5 stars",
            luxury: "Luxury",
            highprice: "Expensive",
            center: "Hotels in the center",
            pool: "Pool",
            gay: "Gay friendly",
            smoke: "Smoking friendly",
            restaurant: "Restaurant",
            pets: "Pet friendly",
            russians: "Russian guests",
            sea_view: "Sea view",
            lake_view: "Lake view",
            river_view: "River view",
            panoramic_view: "Panoramic view",
            popularity: "Popularity"
        }
    };
    /**
     *
     * @param selector
     * @param AppendTo
     * @constructor
     */
    this.TPCityAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function(index, value){
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        console.log(request.term)
                        console.log(tpLocale)
                        switch (tpLocale){
                            case 'ru':
                                $.get("https://places.aviasales.ru/?term=" + request.term + "&locale=" + tpLocale, function(data) {
                                    response(
                                        $.map(data, function(item){

                                            var iata = (typeof(item.city_iata) !== 'undefined' && item.city_iata !== null) ? item.city_iata : item.iata;
                                            //console.log(item.city_iata)
                                            //console.log(item.iata)
                                            var airport = (item.airport_name !== null) ? item.airport_name : "";
                                            if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                                return {
                                                    label: item.name+" "+airport+" ["+iata +"]",
                                                    value: item.name+" "+airport+" ["+item.coordinates+"]",
                                                    val: item.coordinates//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                                //TPAutocompleteID
                                            }else{
                                                return {
                                                    label: item.name+" "+airport+" ["+iata+"]",
                                                    value: item.name+" "+airport+" ["+iata+"]",
                                                    val: item.iata//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                            }
                                        })
                                    )

                                })
                                break;
                            case 'en':
                                $.get("https://www.jetradar.com/autocomplete/places?q=" + request.term, function(data) {
                                    response(
                                        $.map(data, function(item){
                                            var airport = (item.name !== null) ? item.name : "";
                                            if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                                return {
                                                    label: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    value: item.city_fullname+" "+airport+" ["+item.coordinates+"]",
                                                    val: item.coordinates//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                            }else{
                                                return {
                                                    label: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    value: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    val: item.code//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                            }
                                        })
                                    )

                                })
                                break;
                            default:
                                $.get("https://www.jetradar.com/autocomplete/places?q=" + request.term, function(data) {
                                    response(
                                        $.map(data, function(item){
                                            var airport = (item.name !== null) ? item.name : "";
                                            if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                                return {
                                                    label: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    value: item.city_fullname+" "+airport+" ["+item.coordinates+"]",
                                                    val: item.coordinates//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                            }else{
                                                return {
                                                    label: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    value: item.city_fullname+" "+airport+" ["+item.city_code+"]",
                                                    val: item.code//item.name+" "+airport+" ["+item.iata+"]"
                                                }
                                            }
                                        })
                                    )

                                })

                        }
                        //console.log(request.term, AppendTo);

                        /*$.map(AutocompletePlaces, function(item){
                            if( matchInArray( request.term, item.name ) ||
                                matchInArray( request.term, item.iata) ){
                                var airport = (item.airport_name !== null) ? item.airport_name : "";
                                return {
                                    label: item.name+" "+airport+" ["+item.iata+"]",
                                    value: item.name+" "+airport+" ["+item.iata+"]",
                                    val: item.iata//item.name+" "+airport+" ["+item.iata+"]"
                                }
                            }
                        })*/
                    },
                    select: function( event, ui ) {
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 1,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    /**
     *
     * @param selector
     * @param AppendTo
     * @constructor
     */
    this.TPHotelAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        var self = this;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function(index, value){
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        //console.log(request.term, AppendTo);
                        console.log(tpLocale);
                        $.get("https://yasen.hotellook.com/autocomplete?term=" + request.term + "&lang=" + tpLocale, function(data) {

                            if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                var locations=[];
                                /*$.map(data, function(items, keys){
                                    $.map(items, function(item, key){
                                        var location = new Object();
                                        switch (keys){
                                            case 'cities':
                                                //console.log(item.fullname);
                                                location.label = item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]";
                                                location.val = '{'+item.location.lat+', '+item.location.lon+'}';

                                                break;
                                            case 'hotels':
                                                //console.log(item.hotelFullName);
                                                location.label = item.hotelFullName;
                                                location.val = '{'+item.location.lat+', '+item.location.lon+'}';
                                                break;
                                        }
                                        location.type = keys
                                        locations.push(location);
                                    })
                                })*/
                                $.map(data.cities, function(city, key_city){
                                    var location = new Object();

                                    location.label = city.fullname+" ["+city.hotelsCount+" "+TPLabelAutocomplete+"]";
                                    location.val = '{'+city.location.lat+', '+city.location.lon+'}';
                                    locations.push(location);

                                })
                                $.map(data.hotels, function(hotel, key_hotel){
                                    var location = new Object();
                                    location.label = hotel.hotelFullName;
                                    location.val = '{'+hotel.location.lat+', '+hotel.location.lon+'}';
                                    locations.push(location);

                                })
                                response(
                                    $.map(locations, function(item, key){
                                        return {
                                            label: item.label,
                                            value: item.label+item.val,
                                            val: item.val
                                        }
                                    })
                                )
                            } else if($(selector).hasClass('TPHotelCityAutocomplete')){
                                var records =[];

                                $.map(data.cities, function(city, key_city){
                                    var record = new Object();
                                    record.label = city.fullname+" ["+city.hotelsCount+" "+TPLabelAutocomplete+"]";
                                    record.val = '{'+city.city+', '+city.country+', '+city.hotelsCount+', '
                                        +city.id+', city, '+city.country+'}';
                                    records.push(record);

                                })

                                $.map(data.hotels, function(hotel, key_hotel){
                                    var record = new Object();
                                    record.label = hotel.hotelFullName;
                                    record.val =  '{'+hotel.name+', '+hotel.locationFullName+', '
                                        +hotel.id+', hotel, '+hotel.country+'}';
                                    records.push(record);

                                })
                                response(
                                    $.map(records, function(item, key){
                                        return {
                                            label: item.label,
                                            value: item.label+item.val,
                                            val: item.val
                                        }
                                    })
                                )
                            } else if($(selector).hasClass('TPAutocompleteID') || $(selector).hasClass('TPAutocompleteIDWidget')){
                                response(
                                    $.map(data.cities, function(item){
                                        // console.log(item)
                                        return {
                                            label: item.fullname+" ["+item.id+"]",//"+item.city+", "+item.country+"
                                            value: item.fullname+" ["+item.id+"]",
                                            val: item.id//item.name+" "+airport+" ["+item.iata+"]"
                                        }

                                    })
                                )
                            } else if($(selector).hasClass('HotelCityAutocomplete') ||
                                $(selector).hasClass('HotelWidgetCityAutocomplete')) {
                                var records =[];

                                $.map(data.cities, function(city, key_city){
                                    //console.log(city);
                                    var record = new Object();
                                   // record.label = city.fullname+" ["+city.id+"]{"+city.city+"}";
                                    record.label = city.fullname+" ["+city.id+"]";
                                    record.val = city.fullname+" ["+city.id+"]";
                                    record.id = city.id;
                                    //record.city = "{"+city.city+"}";
                                    record.city = city.city;
                                    records.push(record);

                                })
                                response(
                                    $.map(records, function(item, key){
                                        //console.log(item)
                                        return {
                                            label: item.label,
                                            value: item.val,
                                            val: item.id,
                                            city: item.city,
                                        }
                                    })
                                )
                            } else{

                                response(
                                    $.map(data.hotels, function(item){
                                        return {
                                            label: item.hotelFullName+" ["+item.id+"]",//"+item.city+", "+item.country+"
                                            value: item.hotelFullName+" ["+item.id+"]",
                                            val: item.id//item.name+" "+airport+" ["+item.iata+"]"
                                        }
                                    })
                                )
                            }
                        })
                    },
                    select: function( event, ui ) {
                        if($(selector).hasClass('TPAutocompleteID')){
                            //console.log(catHotelSelec)

                            //console.log(ui.item.val);
                            $.get("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + ui.item.val, function(data) {
                                //console.log(data);
                                var tbodyModal = $(selector).parent('td').parent('tr').parent('tbody');
                                var select_option = '';
                                /*console.log(data);
                                console.log(data.length);
                                console.log(catHotelSelec[tpLocale]);
                                console.log(catHotelSelec[tpLocale].length);*/
                                data.sort();

                                switch (tpLocale){
                                    case "ru":
                                        select_option += '<option value="">Выберите подборку</option>';
                                        break;
                                    case "en":
                                        select_option += '<option value="">Select selection</option>';
                                        break;
                                }


                                $.map(data, function(item){
                                    //console.log(item)
                                    //console.log(catHotelSelec[tpLocale][item])
                                    if (typeof catHotelSelec[tpLocale][item] != "undefined"){
                                        select_option += '<option value="'+item+'">'
                                            +catHotelSelec[tpLocale][item]+'</option>';
                                        //console.log(item)
                                        //console.log(catHotelSelec[tpLocale][item])
                                    }

                                })

                                //console.log(data);
                                // console.log(select_option);
                                // console.log(TPHotelSelectWidgetCat1);
                                //console.log(TPHotelSelectWidgetCat2);
                                //console.log(TPHotelSelectWidgetCat3);


                                tbodyModal.children('#tr_cat_widget-1')
                                    .children('#td_cat_widget-1')
                                    .children('#cat_widget-1')
                                    .find("option").remove();

                                tbodyModal.children('#tr_cat_widget-2')
                                    .children('#td_cat_widget-2')
                                    .children('#cat_widget-2')
                                    .find("option").remove();
                                tbodyModal.children('#tr_cat_widget-3')
                                    .children('#td_cat_widget-3')
                                    .children('#cat_widget-3')
                                    .find("option").remove();


                                /***/

                                tbodyModal.children('#tr_cat_widget-1')
                                    .children('#td_cat_widget-1')
                                    .children('#cat_widget-1')
                                    .append(select_option);

                                tbodyModal.children('#tr_cat_widget-2')
                                    .children('#td_cat_widget-2')
                                    .children('#cat_widget-2')
                                    .append(select_option);
                                tbodyModal.children('#tr_cat_widget-3')
                                    .children('#td_cat_widget-3')
                                    .children('#cat_widget-3')
                                    .append(select_option);
                                tbodyModal.children('#tr_cat_widget-1').show();
                                if(TPHotelSelectWidgetCat1 != '0'){
                                    doc.find('#cat_widget-1 option[value='+TPHotelSelectWidgetCat1+']')
                                        .attr('selected','selected')
                                    tbodyModal.children('#tr_cat_widget-2').show();

                                }
                                if(TPHotelSelectWidgetCat2 != '0'){
                                    doc.find('#cat_widget-2 option[value='+TPHotelSelectWidgetCat2+']')
                                        .attr('selected','selected')
                                    tbodyModal.children('#tr_cat_widget-3').show();

                                }
                                if(TPHotelSelectWidgetCat3 != '0'){
                                    doc.find('#cat_widget-3 option[value='+TPHotelSelectWidgetCat3+']')
                                        .attr('selected','selected')

                                }
                                tbodyModal.children('#tr_cat_widget-1')
                                    .children('#td_cat_widget-1')
                                    .on('change', '#cat_widget-1', function(e) {
                                        tbodyModal.children('#tr_cat_widget-2').show();
                                    });
                                tbodyModal.children('#tr_cat_widget-2')
                                    .children('#td_cat_widget-2')
                                    .on('change', '#cat_widget-2', function(e) {
                                        tbodyModal.children('#tr_cat_widget-3').show();
                                    });


                            })
                        }
                        if ($(selector).hasClass('TPAutocompleteIDWidget')){
                            //Hotels Selections Widget
                            self.TPGetHotelsWidgetCat(ui.item.val, $(selector))
                        }
                        if($(selector).hasClass('HotelCityAutocomplete')){
                            //console.log(ui.item);
                            //console.log( $(selector));
                            input.attr('data-city', ui.item.city);
                            //$(selector).data( "city", ui.item.city );
                            $('#select_hotels_selections_type').find("option:gt(0)").remove();
                            $.get("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + ui.item.val, function(data) {

                                data.sort();

                                //console.log(hotelsSelectionsType);
                                $.map(data, function(item){
                                    if (typeof hotelsSelectionsType[tpLocale][item] != "undefined"){
                                        $('#select_hotels_selections_type')
                                            .append($("<option></option>")
                                                .attr("value",item)
                                                .attr("data-selections-title", hotelsSelectionsType[tpLocale][item]['title'])
                                                .attr("data-selections-title-ru",hotelsSelectionsType['ru'][item]['title'])
                                                .attr("data-selections-title-en",hotelsSelectionsType['en'][item]['title'])
                                                .text(hotelsSelectionsType[tpLocale][item]['label']));
                                    }

                                });


                            })
                        }
                        if($(selector).hasClass('HotelWidgetCityAutocomplete')){
                            var widget, selectionsType, selectionsTypeSelect;
                            widget = $(this).parent('label').parent('p').parent('.tp-hotels-tables-widget');
                            selectionsType = widget.find('.tp-hotels-tables-widget-selections-type');
                            selectionsTypeSelect = widget.find('.tp-hotels-tables-widget-selections-type-select');

                            selectionsType.children('.tp-hotels-tables-widget-selections-type-city-label').val(ui.item.city);

                            input.attr('data-city', ui.item.city);
                            selectionsTypeSelect.find("option:gt(0)").remove();

                            $.get("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + ui.item.val, function(data) {
                                data.sort();
                                $.map(data, function(item){
                                    if (typeof hotelsSelectionsType[tpLocale][item] != "undefined"){
                                        selectionsTypeSelect
                                            .append($("<option></option>")
                                                .attr("value",item)
                                                .attr("data-selections-title", hotelsSelectionsType[tpLocale][item]['title'])
                                                .attr("data-selections-title-ru",hotelsSelectionsType['ru'][item]['title'])
                                                .attr("data-selections-title-en",hotelsSelectionsType['en'][item]['title'])
                                                .text(hotelsSelectionsType[tpLocale][item]['label']));
                                    }

                                });


                            })
                        }
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 1,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    this.TPHotelTypeAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function(index, value){
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        //console.log(request.term, AppendTo);
                        $.get("https://yasen.hotellook.com/autocomplete?term=" + request.term + "&locale=" + tpLocale, function(data) {
                        var locations=[];
                        $.map(data, function(items, keys){
                            $.map(items, function(item, key){
                                var location = new Object();
                                switch (keys){
                                    case 'cities':
                                        //console.log(item.fullname);
                                        location.label = item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]";
                                        location.val = '{locationId='+item.id+'}';
                                        break;
                                    case 'hotels':
                                        //console.log(item.hotelFullName);
                                        location.label = item.hotelFullName;
                                        location.val = '{hotelId='+item.id+'}';
                                        break;
                                }
                                locations.push(location);
                            })
                        })
                        response(
                            $.map(locations, function(item, key){
                                return {
                                    label: item.label,
                                    value: item.label+item.val,
                                    val: item.val
                                }
                            })
                        )


                        })
                    },
                    select: function( event, ui ) {
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 1,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    /**
     *
     * @param selector
     * @param AppendTo
     * @constructor
     */
    this.TPAirlineAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function (index, value) {
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        response(
                            $.map(AutocompleteAirlines, function(item){
                                if(tpLocale == "ru"){
                                    if( matchInArray( request.term, item.names["ru"]) ||
                                        matchInArray( request.term, item.names["en"]) ||
                                        matchInArray( request.term, item.iata)){
                                        if(item.iata != null) {
                                            var name = (typeof(item.names["ru"]) === 'undefined') ? item.names["en"] : item.names["ru"];
                                            return {
                                                label: name+" ["+item.iata+"]",
                                                value: name+" ["+item.iata+"]",
                                                val:  name+" ["+item.iata+"]"
                                            }
                                        }
                                    }
                                }else{
                                    if( matchInArray( request.term, item.names["en"]) ||
                                        matchInArray( request.term, item.iata)){
                                        if(item.iata != null) {
                                            var name = item.names["en"];
                                            return {
                                                label: name+" ["+item.iata+"]",
                                                value: name+" ["+item.iata+"]",
                                                val:  name+" ["+item.iata+"]"
                                            }
                                        }
                                    }
                                }

                            })
                        )

                    },
                    select: function( event, ui ) {
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 2,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    /**
     *
     * @param selector
     * @param AppendTo
     * @constructor
     */
    this.TPCountryAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function (index, value) {
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        response(
                            $.map(AutocompleteCountry, function(item){
                                if(tpLocale == "ru"){
                                    if( matchInArray( request.term, item.name_translations["ru"]) ||
                                        matchInArray( request.term, item.name_translations["en"]) ||
                                        matchInArray( request.term, item.code)){
                                        if(item.code != null) {
                                            var name = (typeof(item.name_translations["ru"]) === 'undefined') ? item.name_translations["en"] : item.name_translations["ru"];
                                            return {
                                                label: name+" ["+item.code+"]",
                                                value: name+" ["+item.code+"]",
                                                val:  name+" ["+item.code+"]"
                                            }
                                        }
                                    }
                                }else{
                                    if( matchInArray( request.term, item.name_translations["en"]) ||
                                        matchInArray( request.term, item.code)){
                                        if(item.iata != null) {
                                            var name = item.name_translations["en"];
                                            return {
                                                label: name+" ["+item.code+"]",
                                                value: name+" ["+item.code+"]",
                                                val:  name+" ["+item.code+"]"
                                            }
                                        }
                                    }
                                }

                            })
                        )

                    },
                    select: function( event, ui ) {
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 2,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    /**
     * Railway
     * @param selector
     * @param AppendTo
     * @constructor
     */
    this.TPRailwayAutocompleteInit = function(selector, AppendTo){
        if (typeof(AppendTo)==='undefined') AppendTo = null;
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                var input = $(this);
                $(this).val(function(index, value){
                    return value;
                }).autocomplete({
                    source: function(request, response){
                        console.log(request.term)
                        console.log(tpLocale)

                        $.get("https://www.tutu.ru/suggest/railway_simple/?name=" + request.term, function(data) {
                            var data = $.parseJSON( data);
                            //console.log(data);
                            response(
                                $.map(data, function(item){
                                    //console.log(item);
                                    return {
                                        label: item.value+" ["+item.id +"]",
                                        value: item.value+" ["+item.id +"]",
                                        val: item.id
                                    }

                                })
                            )

                        })
                    },
                    select: function( event, ui ) {
                        input.attr('value',ui.item.val).val(ui.item.val);
                    },
                    change: function( event, ui ) {
                        if( ! ui.item )
                            input.attr('value','').val('');
                    },
                    minLength: 1,
                    delay: 500,
                    autoFocus: true,
                    appendTo: AppendTo
                });
            });
        });
    }
    /**
     * Hotels Selections Widget
     * @param city
     * @param selector
     * @constructor
     */
    this.TPGetHotelsWidgetCat = function (city, selector) {
        jQuery(function ($) {
            var doc, win, widget, cats, cat1, cat2, cat3, cat1Val, cat2Val, cat3Val;
            doc = $(document);
            win = $(window);
            widget = selector.parent('label').parent('p').parent('.tp-widgets-widget');
            cats = widget.children('.tp-widgets-widget-cat');
            cat1 = cats.children('.tp-widgets-widget-cat-1').children('select');
            cat2 = cats.children('.tp-widgets-widget-cat-2').children('select');
            cat3 = cats.children('.tp-widgets-widget-cat-3').children('select');
            cat1Val = cat1.data('select_cat');
            cat2Val = cat2.data('select_cat');
            cat3Val = cat3.data('select_cat');
            $.get("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + city, function(data) {
                var select_option = '';
                data.sort();
                switch (tpLocale){
                    case "ru":
                        select_option += '<option value="">Выберите подборку</option>';
                        break;
                    case "en":
                        select_option += '<option value="">Select selection</option>';
                        break;
                }
                $.map(data, function(item){
                    if (typeof catHotelSelec[tpLocale][item] != "undefined"){
                        select_option += '<option value="'+item+'">'
                            +catHotelSelec[tpLocale][item]+'</option>';
                    }
                })
                cat1.find("option").remove();
                cat2.find("option").remove();
                cat3.find("option").remove();
                cat1.append(select_option);
                cat2.append(select_option);
                cat3.append(select_option);
                cats.show();
                if(cat1Val != '0' && cat1Val != ''){
                    cat1.find('option[value='+cat1Val+']')
                        .attr('selected','selected')
                }
                if(cat2Val != '0'  && cat2Val != ''){
                    cat2.find('option[value='+cat2Val+']')
                        .attr('selected','selected')
                }
                if(cat3Val != '0' && cat3Val != ''){
                    cat1.find('option[value='+cat3Val+']')
                        .attr('selected','selected')
                }


            })
        })
    }
    /**
     *
     * @param city
     * @param selectionsType
     * @param selectionsTypeVal
     * @constructor
     */
    this.TPGetHotelsSelections = function(city, selectionsType, selectionsTypeVal){
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);

            selectionsType.find("option:gt(0)").remove();
            console.log("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + city)
            $.get("https://yasen.hotellook.com/tp/v1/available_selections.json?id=" + city, function(data) {
                data.sort();
                $.map(data, function(item){
                    //console.log(item)
                    if (typeof hotelsSelectionsType[tpLocale][item] != "undefined"){
                        var selected = '';
                        if (selectionsTypeVal == item){
                            selected = 'selected="selected"';
                        }
                        selectionsType
                            .append($("<option "+selected+"></option>")
                                .attr("value",item)
                                .attr("data-selections-title", hotelsSelectionsType[tpLocale][item]['title'])
                                .attr("data-selections-title-ru",hotelsSelectionsType['ru'][item]['title'])
                                .attr("data-selections-title-en",hotelsSelectionsType['en'][item]['title'])
                                .text(hotelsSelectionsType[tpLocale][item]['label']));
                    }
                });
                //
            })
        });

    }
    /**
     *
     * @param selector
     * @param key_data
     * @constructor
     */
    this.TPAirlineStandTable = function(selector, key_data){
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function () {
                $(this).text(function(){
                    var iata = $(this).data(key_data);
                    if( iata == '') {
                        $(this).parents('tr').remove();
                        return '';
                    }
                    var value = '';
                    $.each(AutocompleteAirlines , function(key, item){
                        if(item.iata == iata){
                            if(tpLocale == "ru"){
                                value = (typeof(item.names["ru"]) === 'undefined') ? item.names["en"] : item.names["ru"];
                            }else{
                                value = item.names["en"];
                            }
                            return value;
                        }
                    });
                    //  if( value == '') $(this).parents('tr').remove();
                    if( value == '') return iata;
                    return value;
                });
            });
        });
    }
    /**
     *
     * @param selector
     * @param key_data
     * @constructor
     */
    this.TPCityStandTable = function(selector, key_data){
        jQuery(function($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function(){
                $(this).text(function(){
                    var iata = $(this).data(key_data);
                    if( iata == '') {
                        $(this).parents('tr').remove();
                        return '';
                    }
                    var value = '';
                    $.each(AutocompletePlaces , function(key, item){
                        if(item.code == iata){
                            if(item.name_translations[tpLocale])
                                value = item.name_translations[tpLocale];
                            else
                                value = item.name;
                            return value;
                        }
                    });
                    //  if( value == '') $(this).parents('tr').remove();
                    if( value == '') return iata;
                    return value;
                });
            });
        });
    }
    /**
     *
     * @param selector
     * @param key_data
     * @param key_case
     * @constructor
     */
    this.TPCityStandTitle = function(selector, key_data, key_case) {
        jQuery(function ($) {
            var doc, win;
            doc = $(document);
            win = $(window);
            doc.find(selector).each(function(){
                $(this).text(function(){
                    var iata = $(this).data(key_data);
                    if( iata == '') {
                        $(this).parents('tr').remove();
                        return '';
                    }
                    var value = '';
                    $.each(AutocompleteCase , function(keys, items){
                        if(key_case == "name"){
                            value = items[iata][key_case];
                            return value;
                        }else{
                            value = items[iata].cases[key_case];
                            return value;
                        }
                    });
                    //  if( value == '') $(this).parents('tr').remove();
                    if( value == '') return iata;
                    return value;
                    //return value.split(',')[0];
                });
            });
        });
    }
    /**
     *
     * @param string
     * @param item
     * @returns {boolean}
     */
    function matchInArray(string, item) {
        var ret = false;
        if( item && item.toString().toLowerCase().indexOf( string.toLowerCase() ) >= 0 ){
            ret = true;
        }
        return ret;
    }

}
//console.log(locations);
/*response(
 $.map(data.cities, function(item){
 return {
 label: item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]",//"+item.city+", "+item.country+"
 value: item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]",
 val: item.location//item.name+" "+airport+" ["+item.iata+"]"
 }
 })
 )*/
/*$.map(data, function(items, keys){
 console.log(keys);
 response(
 $.map(items, function(item, key){
 switch (keys){
 case 'cities':
 console.log(item.fullname);
 return {
 label: item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]",//"+item.city+", "+item.country+"
 value: item.fullname+" ["+item.hotelsCount+" "+TPLabelAutocomplete+"]",
 val: item.location//item.name+" "+airport+" ["+item.iata+"]"
 }
 break;
 case 'hotels':
 console.log(item.hotelFullName);
 return {
 label: item.hotelFullName,//"+item.city+", "+item.country+"
 value: item.hotelFullName,
 val: item.location//item.name+" "+airport+" ["+item.iata+"]"
 }
 break;
 }

 })
 )
 })*/