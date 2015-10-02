/**
 * Autocomplete
 * @constructor
 */
function TPCityAutocomplete(){
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
                        //console.log(request.term, AppendTo);
                        $.get("http://places.aviasales.ru/?term=" + request.term + "&locale=" + tpLocale, function(data) {
                            response(
                                $.map(data, function(item){
                                    var airport = (item.airport_name !== null) ? item.airport_name : "";
                                    if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                        return {
                                            label: item.name+" "+airport+" ["+item.iata+"]",
                                            value: item.name+" "+airport+" ["+item.coordinates+"]",
                                            val: item.coordinates//item.name+" "+airport+" ["+item.iata+"]"
                                        }
                                    }else{
                                        return {
                                            label: item.name+" "+airport+" ["+item.iata+"]",
                                            value: item.name+" "+airport+" ["+item.iata+"]",
                                            val: item.iata//item.name+" "+airport+" ["+item.iata+"]"
                                        }
                                    }
                                })
                            )

                        })
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
                        $.get("http://yasen.hotellook.com/autocomplete?term=" + request.term + "&locale=" + tpLocale, function(data) {

                            if($(selector).hasClass('TPCoordinatesAutocomplete')){
                                var locations=[];
                                $.map(data, function(items, keys){
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




                            }else{

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
                        $.get("http://yasen.hotellook.com/autocomplete?term=" + request.term + "&locale=" + tpLocale, function(data) {
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