jQuery(function($){
    var doc, win;
    doc = $(document);
    win = $(window);
    tpCityAutocomplete = new TPCityAutocomplete();
    tpCityAutocomplete.TPCityAutocompleteInit('.searchShortcodeAutocomplete');
    tpCityAutocomplete.TPHotelAutocompleteInit('.searchHotelCityShortcodeAutocomplete');

    $.fn.dataTableExt.oSort['tp-date-asc']  = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));

    };
    $.fn.dataTableExt.oSort['tp-date-desc'] = function(a,b) {
        var x = $(a).data("tptime");
        var y = $(b).data("tptime");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    }
    jQuery.fn.dataTableExt.oSort['tp-price-asc']  = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-price-desc'] = function(a,b) {
        var x = $(a).data("price");
        var y = $(b).data("price");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    }
    jQuery.fn.dataTableExt.oSort['tp-data-asc']  = function(a,b) {
        var x = $(a).data("tpdata");
        var y = $(b).data("tpdata");
        return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['tp-data-desc'] = function(a,b) {
        var x = $(a).data("tpdata");
        var y = $(b).data("tpdata");
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    }
    jQuery.fn.rowCount = function() {
        return $('tr', $(this).find('tbody')).length;
    };

    $.fn.dataTable.ext.errMode = 'throw';
    /************************************************* ***/
    doc.find('.TPExportLink').click(function (e) {
        console.log(11);
        $.ajax({
            url: ajaxurl + '?action=tp_export_links',
            type: "POST", // Делаем POST запрос
            success: function (data) {
                var text = data.substring(0, data.length - 1);
                var filename = TPFileNameCsvExport;
                var export_settings = new Blob([text], {type: "text/csv;charset=utf-8"});
                saveAs(export_settings, filename);
               // console.log(text);
               // console.log('success');
                //document.location.href = '';
            }
        });
    });
    /** **/
    doc.find('#importFileCSV').change(function() {
        var files = $(this)[0].files;
        loadInViewCSV(files);
    });
    /** **/
    function loadInViewCSV(files) {
        dataArray = [];
        var length = files.length;
        if ( length==1 ){
            $.each(files, function(index, file) {
                // Создаем новый экземпляра FileReader
                var fileReader = new FileReader();
                fileReader.readAsText(file);
                fileReader.onload = (function(file) {
                    return function(e) {
                        var result = $.csv.toArrays(this.result);
                        //console.log(this.result);
                        //console.log(result);
                        $.ajax({
                            url: ajaxurl+'?action=import_csv',
                            type: "post", // Делаем POST запрос
                            data: ({name : file.name, value : result}),
                            success: function(data) {
                                //console.log(data.substring(0, data.length - 1));
                                document.location.href = "";
                            }
                        });
                    };
                })(files[index]);
            });
        } else
            alert('Вы не можете загружать больше 1 файла!');
        return false;
    }

    /** **/


    /** **/
    doc.find('#TPBtnIsertLink').click(function (e) {
        //alert('Test');
        var checkedId = [];
        var checkBox = $('input.checkedId');
        var data,type;
        type = $(this).data('type');
        for (var i = 0; i < checkBox.length; i++) {

            if(checkBox[i].checked){
                console.log("checked");
                checkedId.push(parseInt(checkBox[i].name))
            }

        }
        //console.log(111);
        if(checkedId.length == 0) {
            for (var i = 0; i < checkBox.length; i++) {
                checkedId.push(parseInt(checkBox[i].name));
                /*if(checkBox[i].checked){

                }*/
                console.log("all");

            }
        }
        if(checkedId.length > 0) {
            if (confirm(TPBtnIsertLinkDialogTxt)) {
                // Save it!
                console.log(11);
                console.log(checkedId.join());
                data = {id: checkedId.join()}
                var dialogProgressbar = doc.find('#TPProgressbarDialog').dialog({
                    resizable: false,
                    draggable: false,
                    maxHeight:100,
                    maxWidth: 1000,
                    minWidth: 700,
                    minHeight:40,
                    modal: true,
                    dialogClass:"TPProgressbarDialog",
                    autoOpen: true,
                    open : function() {
                        e.preventDefault();


                        $.ajax({
                            url: ajaxurl + '?action=replace_all',
                            type: "POST", // Делаем POST запрос
                            data: data,
                            success: function (data) {
                                console.log(data.substring(0, data.length - 1));
                                console.log('success');
                                //document.location.href = '';
                            }
                        });

                        var progressbar = $( "#TPProgressbar" ),
                            progressLabel = $( ".TPProgressbar-label" );

                        progressbar.progressbar({
                            value: false,
                            change: function() {
                                progressLabel.text( progressbar.progressbar( "value" ) + "%" );
                            },
                            complete: function() {
                                progressLabel.text(TPLebelProgressBar);
                                dialogProgressbar.dialog('close');
                            }
                        });

                        function progress() {
                            var val = progressbar.progressbar( "value" ) || 0;

                            progressbar.progressbar( "value", val + 2 );

                            if ( val < 99 ) {
                                setTimeout( progress, 80 );
                            }
                        }

                        setTimeout( progress, 2000 );



                    },
                    close: function( event, ui ) {
                    }
                });
            }

        }



       /* doc.find("#TPProgressbar" )
            .progressbar({
            max: 100,
            value: 37,
        }); */




    });


    doc.ready(function(){

        selectLocalizationFields();
        buttonFontStyle('.BoldTracing');
        buttonFontStyle('.ItalicTracing');
        buttonFontStyle('.UnderlineTracing');
        $( "#TP-tabs" ).tabs();
        var selectedTabFlightsId = sessionStorage.getItem("selectedTabFlights");
        selectedTabFlightsId = selectedTabFlightsId === null ? 0 : selectedTabFlightsId;
        $( "#tabs-flights" ).tabs({
            active: selectedTabFlightsId,
            activate : function( event, ui ) {
                selectedTabFlightsId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabFlights", selectedTabFlightsId);
            }
        });
        var selectedTabHotelsId = sessionStorage.getItem("selectedTabHotels");
        selectedTabHotelsId = selectedTabHotelsId === null ? 0 : selectedTabHotelsId;


        $( "#tabs-hotels" ).tabs({
            active: selectedTabHotelsId,
            activate : function( event, ui ) {
                selectedTabHotelsId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabHotels", selectedTabHotelsId);
            }
        });

        var selectedTabRailwayId = sessionStorage.getItem("selectedTabRailway");
        selectedTabRailwayId = selectedTabRailwayId === null ? 0 : selectedTabRailwayId;
        $( "#tabs-railway" ).tabs({
            active: selectedTabRailwayId,
            activate : function( event, ui ) {
                selectedTabRailwayId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabRailway", selectedTabRailwayId);
            }
        });


        var selectedTabSettingsId = sessionStorage.getItem("selectedTabSettings");
        selectedTabSettingsId = selectedTabSettingsId === null ? 0 : selectedTabSettingsId;
        $( "#tabs-settings" ).tabs({
            active: selectedTabSettingsId,
            activate : function( event, ui ) {
                selectedTabSettingsId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabSettings", selectedTabSettingsId);
            }
        });


        var selectedTabLocalFieldId = sessionStorage.getItem("selectedTabLocalField");
        selectedTabLocalFieldId = selectedTabLocalFieldId === null ? 0 : selectedTabLocalFieldId;
        $( "#tabs-local_field" ).tabs({
            active: selectedTabLocalFieldId,
            activate : function( event, ui ) {
                selectedTabLocalFieldId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabLocalField", selectedTabLocalFieldId);
            }
        });


        var selectedTabStatisticId = sessionStorage.getItem("selectedTabStatistic");
        selectedTabStatisticId = selectedTabStatisticId === null ? 0 : selectedTabStatisticId;
        $( "#tabs-statistic" ).tabs({
            active: selectedTabStatisticId,
            activate : function( event, ui ) {
                selectedTabStatisticId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabStatistic", selectedTabStatisticId);
            }
        });
        var selectedTabWizardId = sessionStorage.getItem("selectedTabWizard");
        selectedTabWizardId = selectedTabWizardId === null ? 0 : selectedTabWizardId;
        var $tabs_wizard = $( "#tabs-wizard" ).tabs({
            active: selectedTabWizardId,
            activate : function( event, ui ) {
                selectedTabWizardId = $(this).tabs("option", "active");
                sessionStorage.setItem("selectedTabWizard", selectedTabWizardId);
            }
        });
        //tabs_wizard

        $(".TP-BtnTabWizard").click(function () {
            $tabs_wizard.tabs({
                    active:0,
                    activate : function( event, ui ) {
                        selectedTabWizardId = $(this).tabs("option", "active");
                        sessionStorage.setItem("selectedTabWizard", selectedTabWizardId);
                    }}
            );
            return false;
        });
        /*$(".TPMainMenuA").click(function () {
            $(".TPMainMenuA").parent('li').removeClass("TPNavActive");
            $(this).parent('li').addClass("TPNavActive");
        });*/
        TPSettingsSave('.TPFormNotReload');
        TPSettingsSave('#TPWidgetConfig');
        TPStatsSave(TPStatsTableSort());
        TPShortcodeTableSort();
        TPAnchorTableSort();
    });
    $(".btnColor").click(function(){
        $(this).prev('.color').trigger('click');
    });
    $('.color').colorPicker({

    });
    /** **/
    function buttonFontStyle(selctor){
        doc.find(selctor).click(function () {
            if($(this).hasClass("activeTracing")){
                $(this).removeClass("activeTracing");
                $(this).children("input").attr('checked', false);
            }else{
                $(this).addClass("activeTracing");
                $(this).children("input").attr('checked', true);
            }
            //console.log($(this).children("input"));

        });
    }
    /** **/
    doc.find( ".settingsShortcodeSortable" ).sortable({
        cursor: "move",
        connectWith: ".connectedSortable",
        opacity: 0.6,
        update : function (event, ui) {
            if(ui.item.find('input').is('.itemSortableSelected')){
                var selectBlock = $(this).parent('.TP-blockSortable').parent('.TP-ContainerSorTable').parent('.TP-SortableSection')
                    .parent('div').children('.TPSortFieldSelect').children('.TPSortFieldLabel');
                var selectOption, selectLi, selectedVal;
                selectOption = '';
                selectedVal = '';

                selectedVal = selectBlock.children('.TPSortField').children('option:selected').text();
                $(this).parent('.TP-blockSortable').parent('.TP-ContainerSorTable').find('.settingsShortcodeSortableSelected')
                    .children('li').each(function(i, el){
                        //console.log(selectedVal+' == '+$(el).text())
                        if(selectedVal.indexOf($(el).text()) !== -1)
                            selectOption += '<option value="'+i+'" selected="selected">'+$(el).text()+'</option>';
                        else
                            selectOption += '<option value="'+i+'">'+$(el).text()+'</option>';
                    });

                selectBlock.children('.TPSortField').empty().append(selectOption);
                selectBlock.children('.zelect').remove();
                selectBlock.children('.TPSortField').zelect({});

                //selectSort.children('.TPSortField').children('option[value="0"]').remove();
                /*console.log('_______')
                console.log(ui.item.index());
                console.log(ui.item.text());
                console.log(ui.item.context.dataset.key);
                $("#selectBox option[value='option1']").remove(); */
                ui.item.find('input[type=hidden]').detach();
                //ui.item.removeClass('ui-state-highlight');
                //ui.item.addClass('ui-state-default');
            }
        }
    }).disableSelection();
    //TPSortField
    /** **/
    doc.find( ".settingsShortcodeSortableSelected" ).sortable({
        cursor: "move",
        connectWith: ".connectedSortable",
        update : function (event, ui) {
            var selectSort = $(this).parent('.TP-blockSortable').parent('.TP-ContainerSorTable').parent('.TP-SortableSection')
                .parent('div').children('.TPSortFieldSelect').children('.TPSortFieldLabel');
            var selectOption, selectLi, selectedVal;
            selectOption = '';
            selectLi = '';
            selectedVal = '';
            /*console.log('select')
            console.log(ui.item.index());
            console.log(ui.item.text());
            console.log(ui.item.context.dataset.key);
            console.log(selectSort);
             selectSort.append($('<option>', {
             value: ui.item.index(),
             text: ui.item.text()
             }));
             */
            selectedVal = selectSort.children('.TPSortField').children('option:selected').text();
            $(this).children('li').each(function(i, el){
                //console.log(selectedVal+' == '+$(el).text())
                if(selectedVal.indexOf($(el).text()) !== -1)
                    selectOption += '<option value="'+i+'" selected="selected">'+$(el).text()+'</option>';
                else
                    selectOption += '<option value="'+i+'">'+$(el).text()+'</option>';
            });


            if(!ui.item.find('input').is('.itemSortableSelected')){

                selectLi = '<li class="">'+ui.item.text()+'</li>'
                /* */
                ui.item.append('<input type="hidden" class="itemSortableSelected" ' +
                'name="'+ui.item.data('input-name')+'" value="'+ui.item.data('key')+'">');
            }

            selectSort.children('.TPSortField').empty().append(selectOption);
            selectSort.children('.zelect').remove();
            selectSort.children('.TPSortField').zelect({});

        }
    }).disableSelection();
    /** **/
    doc.find('#exportSettings').click(function () {

        $.ajax({
            url: ajaxurl+'?action=export_settings',
            type: "post", // Делаем POST запрос
            success: function(data) {
                //downloadFile(data.substring(0, data.length - 1))
                var text = data.substring(0, data.length - 1);
                var filename = TPFileNameExport;
                var export_settings = new Blob([text], {type: "text/plain;charset=utf-8"});
                saveAs(export_settings, filename);
            }
        });
    });
    /** **/
    doc.find('#importFile').change(function() {
        var importFileDiv = $(this).parent('.input_button_style').parent('.TP-NavRow');
        var fileLabel = importFileDiv.children('.infoFile').text();
        if($(this)[0].files.length == 1){
            importFileDiv.children('.importnBtn').removeClass('disable');
            importFileDiv.children('.importnBtn').attr('id', 'importSettings');
            //importFileDiv.children('.infoFile').hide();
            importFileDiv.children('.infoFile').text($(this)[0].files[0].name);
            doc.find('#importSettings').click(function () {
                var files = $(this).parent('.TP-NavRow').children('.input_button_style').children('#importFile')[0].files;

                loadInView(files);
            });
        }else{
            importFileDiv.children('.importnBtn').addClass('disable');
            importFileDiv.children('.importnBtn').removeAttr('id');
            //importFileDiv.children('.infoFile').show()
            importFileDiv.children('.infoFile').text(fileLabel);
        }

    });
    /** **/
    function loadInView(files) {
        dataArray = [];
        var length = files.length;
        if ( length==1 ){
            $.each(files, function(index, file) {
                // Создаем новый экземпляра FileReader
                var fileReader = new FileReader();
                fileReader.readAsText(file);
                fileReader.onload = (function(file) {
                    return function(e) {
                        //.match( /\{(.+?)\}/ig)
                        var re = /\{.*\}|\[.*\]/g;
                        var jsonSettings = this.result.match(re);

                        //console.log(JSON.stringify(this.result).match(re));
                        if (jsonSettings != null){
                            //console.log(JSON.parse(jsonSettings[0]));
                            $.ajax({
                                url: ajaxurl+'?action=import_settings',
                                type: "post", // Делаем POST запрос
                                data: ({name:file.name, value:JSON.parse(jsonSettings[0])}),
                                success: function(data) {
                                    //console.log(data.substring(0, data.length - 1));
                                    document.location.href = "";
                                }
                            });
                        } else {
                            if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
                                doc.find('#'+TPPluginName+'AdminNotice').replaceWith(adminNotice('error', TPImportSettingsErrorNoticeTxt , ''));
                            }else{
                                $('#wpbody-content').before(adminNotice('error', TPImportSettingsErrorNoticeTxt , ''));
                            }
                        }

                    };
                })(files[index]);
                // Инициируем функцию FileReader
                /*fileReader.onload = (function(file) {
                    return function(e) {
                        // Помещаем URI изображения в массив
                        // dataArray.push({name : file.name, value : this.result});
                        // addImage(dataArray);
                        $.ajax({
                            url: ajaxurl+'?action=import_settings',
                            type: "post", // Делаем POST запрос
                            data: ({name : file.name, value : this.result}),
                            success: function(data) {
                                //console.log(data.substring(0, data.length - 1));
                                document.location.href = "";
                            }
                        });
                    };
                })(files[index]);
                fileReader.readAsDataURL(file);*/
            });
        } else
            alert('Вы не можете загружать больше 1 файла!');
        return false;
    }
    /** **/
    doc.find('input.checkedAll').click(function () {
        var checkBox = $('input.'+$(this)[0].name);
        if($(this)[0].checked){
            for (var i = 0; i < checkBox.length; i++) {
                checkBox[i].checked = true;
            }
            $('input.checkedAll').each(function(){
                this.checked = true;
            });

        }else{
            for (var i = 0; i < checkBox.length; i++) {
                checkBox[i].checked = false;
            }
            $('input.checkedAll').each(function(){
                this.checked = false;
            });
        }
    });
    /** **/
    doc.find('a.deleteChecked').click(function (e) {
        e.preventDefault();
        var checkedId = [];
        var checkBox = $('input.checkedId');
        var data,type;
        type = $(this).data('type');
        for (var i = 0; i < checkBox.length; i++) {
            if(checkBox[i].checked){
                checkedId.push(parseInt(checkBox[i].name))
            }

        }
        if(checkedId.length > 0) {
            data = {type: type, id: checkedId};
            $.ajax({
                url: ajaxurl + '?action=delete_all',
                type: "POST", // Делаем POST запрос
                data: data,
                success: function (data) {
                    //console.log(data.substring(0, data.length - 1));
                    document.location.href = '';
                }
            });
        }

    });
    /** **/
    doc.find('tr.TPSearchShortcodeTrFromTo').hide();
    /**
     *
     */
    function selectSearchShortcodeForm() {
        switch (doc.find('select.TPSelectSearchShortcodeType').val()){
            case "0":
                doc.find('tr.TPSearchShortcodeTrFromTo').show();
                break;
            case "1":
                doc.find('tr.TPSearchShortcodeTrFromTo').hide();
                break;
        }
        $('td.TPSelectSearchShortcodeType').on('change', 'select.TPSelectSearchShortcodeType', function (e) {
            e.preventDefault();
            switch ($(this).val()){
                case "0":
                    doc.find('tr.TPSearchShortcodeTrFromTo').show();
                    break;
                case "1":
                    doc.find('tr.TPSearchShortcodeTrFromTo').hide();
                    break;
            }
        });
    }
    /**
     *
     */
    function selectLocalizationFields() {
        $('label').on('change', 'select.TPFieldLocalization', function (e) {
            e.preventDefault();
            doc.find('.TPFields_ru').addClass('TP-ListRowColumNot');
            doc.find('.TPFields_en').addClass('TP-ListRowColumNot');
            doc.find('.TPFields_th').addClass('TP-ListRowColumNot');
            //doc.find('.TPFields_de').addClass('TP-ListRowColumNot');
            console.log("selectLocalizationFields "+$(this).val())
            switch ($(this).val()){
                case "1":
                    //ru
                    doc.find('.TPFields_ru').removeClass('TP-ListRowColumNot');
                    doc.find('.TPLangFieldsLi').text("RU");
                    doc.find('.TPFieldTitleCaseDiv').show();
                    TPFieldHostSelect("1");
                    $('.tabs-local-field-item-railway').show();
                    break;
                case "2":
                    //en
                    doc.find('.TPFields_en').removeClass('TP-ListRowColumNot');
                    doc.find('.TPLangFieldsLi').text("EN");
                    doc.find('.TPFieldTitleCaseDiv').hide();
                    TPFieldHostSelect("2");
                    $('.tabs-local-field-item-railway').hide();
                    break;

                case "3":
                    //th
                    doc.find('.TPFields_th').removeClass('TP-ListRowColumNot');
                    doc.find('.TPLangFieldsLi').text("TH");
                    doc.find('.TPFieldTitleCaseDiv').hide();
                    TPFieldHostSelect("3");
                    $('.tabs-local-field-item-railway').hide();
                    break;
            }
        });

    }
    


    /**
     *
     * @param local
     * @constructor
     */
    function TPFieldHostSelect(local){
        console.log('local = '+local);
        var host, default_host;
        host = doc.find('.TPFieldHost').data('host');
        console.log('host = '+host);
        if(host == '') {
            switch (local){
                case "1":
                    //ru
                    default_host = doc.find('.TPFieldHost').data('default_host_ru');
                    break;
                case "2":
                    //en
                    default_host = doc.find('.TPFieldHost').data('default_host_en');
                    break;
                case "3":
                    //th
                    default_host = doc.find('.TPFieldHost').data('default_host_th');
                    break;
            }
            console.log('default_host = '+default_host);
            doc.find('.TPFieldHost').find('option:selected').removeAttr("selected");
            doc.find('.TPFieldHost option[value="' + default_host + '"]')
                .attr('selected', 'selected');
            doc.find('.TPFieldHostLabel').children('.zelect').remove();
            doc.find('.TPFieldHost').zelect({});
        }
    }

    switch ($('select.TPFieldLocalization').val()){
        case "1":
            doc.find('.TPFieldTitleCaseDiv').show();
            $('.tabs-local-field-item-railway').show();
            break;
        case "2":
            doc.find('.TPFieldTitleCaseDiv').hide();
            $('.tabs-local-field-item-railway').hide();
            break;
        case "3":
            doc.find('.TPFieldTitleCaseDiv').hide();
            $('.tabs-local-field-item-railway').hide();
            break;
    }
    /** **/
    doc.find('button.TPGetSalesDate').click(function (e) {
        e.preventDefault();
        var data, date, result,select_date;
        select_date = $(this).parent(".TP-ViewStatistics").children(".TP-ViewStatisticsDate").children("#TPStatDate").children('option:selected');
        date = select_date.data('tpdate');
        data = {date: date};
        console.log(ajaxurl);
        $.ajax({
            url: ajaxurl + '?action=tp_get_detailed_sales',
            type: "POST", // Делаем POST запрос
            data: data,
            success: function (data) {
                //console.log(data.substring(0, data.length - 1));
                result = JSON.parse(data.substring(0, data.length - 1));
                $("#TP-ListReportBlock").replaceWith(result.table);
                $("#infoDateReport").replaceWith(result.date);
                //document.location.href = '';
                TPStatsTableSort();
                $('#TP-ListReportBlock .TP-Zelect').zelect({});
            }
        });
    });
    //TPDefaultSettings
    doc.find('#TPDefaultSettings').click(function (e) {
        e.preventDefault();
        //document.location.href = '';
        $.ajax({
            url: ajaxurl + '?action=default_settings',
            type: "POST", // Делаем POST запрос
            success: function (data) {
                //document.location.href = '';
                location.reload();
            }
        });
        if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
            doc.find('#'+TPPluginName+'AdminNotice').replaceWith(adminNotice('updated', TPMesgUpdateSettings , ''));
        }else{
            $('#wpbody-content').before(adminNotice('updated', TPMesgUpdateSettings , ''));
        }

    });
    /** **/
    function TPStatsTableSort(){
        var dataTable, tableEmpty;
        doc.find('.sortable').each(function(){
            switch ($(this).attr('id')){
                case "TPListReport":
                    tableEmpty = TPTableEmptyReport;
                    break;
                case "TPListBalance":
                    tableEmpty = TPTableEmptyBalance;
                    break;
            }
            dataTable = $(this).dataTable( {
                ordering: true,
                "order": [[ 0, "asc" ]],
                paging: false,
                //iDisplayLength : $(this).data("paginate"),
                "bLengthChange": false,
                searching: true,
                bFilter: false,
                bInfo: false,
                columnDefs: [
                    {
                        targets: 0,
                        className: 'active-w'
                    },
                    { "aTargets" : ["tp-date-column"] , "sType" : "tp-date"},
                    { "aTargets" : ["tp-price-column"] , "sType" : "tp-price"},
                    { "aTargets" : ["tp-data-column"] , "sType" : "tp-data"},
                    { "aTargets" : ["tp-notsort-column"] ,  "orderable": false }
                ],
                "oLanguage":{
                    "oPaginate": {
                        "sNext": null,
                        "sLast": null,
                        "sFirst": null,
                        "sPrevious": null,
                        "sSearch": "Filter Data"
                    },
                    "sEmptyTable": tableEmpty
                },
                "fnFooterCallback": function (nRow, aasData, iStart, iEnd, aiDisplay) {

                    if(TPStatsTotal && $('#TPListReport').length > 0) {
                        var api = this.api(), data, totals = [0,0,0,0,0,0,0,0,0,0,0,0,0];

                        var intVal = function (i) {
                            return parseFloat(i.substring(i.indexOf('>') + 1, i.indexOf('</p>')));
                            //return parseFloat(i.replace(/[^0-9\.]/g, ''));
                        };

                        for (var i = iStart; i < iEnd; i++) {
                            if(matchInArray('data-tptime', aasData[aiDisplay[i]][0])) {
                                for (var j = 3; j < 11; j++) {
                                    totals[j] += intVal(aasData[aiDisplay[i]][j]);
                                }
                            }
                        }
                        $('table > tfoot').replaceWith('<tfoot><tr class="TP-rowAllCountMonth">' +
                        '<td colspan="3">'+TPStatsTotalTrText+'</td>' +
                        '<td>'+totals[3]+'</td>' +
                        '<td>'+totals[4]+'</td>' +
                        '<td>'+totals[5]+'</td>' +
                        '<td>'+totals[6]+'</td>' +
                        '<td>'+totals[7]+'</td>' +
                        '<td>'+totals[8]+'</td>' +
                        '<td>'+totals[9].toFixed(2)+'</td>' +
                        '<td>'+totals[10].toFixed(2)+'</td>' +
                            //'<td>'+totals[11]+'</td>'+
                        '</tr></tfoot>');
                    }
                }
            });
        });
        doc.find("select#TP-ListReportType").change( function () {
            if($(this).val() != 'none'){
                dataTable.fnFilter($(this).val(),1,false, true)
            }else{
                dataTable.fnFilter('',1,false, true);
            }
        });
        doc.find("select#TP-ListReportMarker").change( function () {
            if($(this).val() != 'none'){
                dataTable.fnFilter($(this).val(),2,false, true)
            }else{
                dataTable.fnFilter('',2,false, true);
            }
        });
        return dataTable;

    }
    /** **/
    function TPShortcodeTableSort(){
        var dataTable;
        dataTable = doc.find('#TP-listShortcode').dataTable( {
            ordering: true,
            "order": [[ 1, "asc" ]],
            paging: (10 < $('tr', $('#TP-listShortcode').find('tbody')).length),
            iDisplayLength : 10,
            "bLengthChange": false,
            searching: true,
            bFilter: false,
            bInfo: false,
            columnDefs: [
                {
                    targets: 1,
                    className: 'active-w'
                },
                { "aTargets" : ["tp-date-column"] , "sType" : "tp-date"},
                { "aTargets" : ["tp-notsort-column"] ,  "orderable": false }
            ],
            "oLanguage":{
                "oPaginate": {
                    "sNext": null,
                    "sLast": null,
                    "sFirst": null,
                    "sPrevious": null,
                    "sSearch": "Filter Data"
                },
                "sEmptyTable": TPTableEmptySearchShortcode
            }
        });
        //console.log( dataTable.rowCount())
        return dataTable;
    }
    function TPAnchorTableSort(){
        var dataTable;
        dataTable = doc.find('#TPAnchorTable').dataTable( {
            ordering: true,
            "order": [[ 1, "asc" ]],
            paging: (10 < $('tr', $('#TPAnchorTable').find('tbody')).length),
            iDisplayLength : 10,
            "bLengthChange": false,
            searching: true,
            bFilter: false,
            bInfo: false,
            columnDefs: [
                {
                    targets: 1,
                    className: 'active-w'
                },
                { "aTargets" : ["tp-date-column"] , "sType" : "tp-date"},
                { "aTargets" : ["tp-notsort-column"] ,  "orderable": false }
            ],
            "oLanguage":{
                "oPaginate": {
                    "sNext": null,
                    "sLast": null,
                    "sFirst": null,
                    "sPrevious": null,
                    "sSearch": "Filter Data"
                },
                "sEmptyTable": TPTableEmptyAnchors
            }
        });
        //console.log( dataTable.rowCount())
        return dataTable;
    }
    /** **/
    function matchInArray(string, item) {
        var ret = false;
        if( item && item.toString().toLowerCase().indexOf( string.toLowerCase() ) >= 0 ){
            ret = true;
        }
        return ret;
    }
    /** **/
    doc.find('td.TPTableHead').click(function () {
        doc.find("td.active-w").each(function(){
            $(this).removeClass("active-w");
        });
        $(this).addClass("active-w");
    });
    function isEmpty(str) {
        return (!str || 0 === str.length);
    }
    /**
     *
     * @param class_notice
     * * ***********************************************************
     * Классы которые можно использовать для блока:
     * * class="updated" - для успешных операций. Белый фон, зеленая полоска слева;
     * * class="error" - для ошибок. Белый фон, красная полоска слева;
     * * class="notice" - для сообщений. Белый фон, никакой маркировки;
     * * class="notice notice-warning" - для предупреждений. Белый фон,
     *   оранжевая полоска слева;
     * * class="update-nag" - блок с оранжевой полоской слева. Блок
     *   будет расположен перед заголовком <h2> (а не после) и будет
     *   иметь css свойство inline-block (а не block).
     * * class="notice is-dismissible"' - эти два класса можно дописать
     *   к любому из вышеперечисленных и в конце сообщения появится крестик,
     *   чтобы удалить (убрать из вида) блок сообщения. С версии 4.2.
     * @param title_notice
     * @param message_notice
     * @returns {string}
     */
    function adminNotice(class_notice, title_notice, message_notice){
        var output = '';
        message_notice = (isEmpty(message_notice))?'':'<p>'+message_notice+'</p>';
        output = '<div class="'+class_notice+'" id="'+TPPluginName+'AdminNotice">' +
                    '<p><strong>'+title_notice+'</strong></p>' +message_notice+
                    '<button class="TPnotice-dismiss" id="TPAdminNoticeClose"></button>'+
                 '</div>';

        return output;
    }

    /**
     *
     * @param selector
     * @param class_notice
     * @param title_notice
     * @param message_notice
     */
    function adminNoticeModal(selector, class_notice, title_notice, message_notice){

        var dialogNotice = doc.find(selector).dialog({
            resizable: false,
            draggable: false,
            maxHeight:100,
            maxWidth: 1000,
            minWidth: 700,
            minHeight:40,
            modal: true,
            dialogClass:"TPadminNoticeModal",
            //position: { my: "center bottom", at: "center top", of: $('#constructorShortcodesButton')},
            open : function() {
                //$(this).parent().children('.ui-dialog-titlebar').hide();
                /*$(this).parent().css({   position:'absolute',
                    left: (win.width() - $(this).parent().outerWidth())/2,
                    top: (win.height() - $(this).parent().outerHeight())/2
                });*/
                $(this).addClass(class_notice);
                doc.find('.ui-widget-overlay').bind('click',function(){
                    dialogNotice.dialog('close');
                })


            },
            close: function( event, ui ) {
            }
        });
        doc.find('#adminNoticeModalClose').click(function (e) {
            dialogNotice.dialog( "close" );
        });
        return dialogNotice;

    }

    /**
     *
     * @param selector
     * @constructor
     */
    function TPSettingsSave(selector){
        doc.find(selector).submit(function() {
            //$(adminNotice('updated', 'test', 'test')).insertAfter('#wpbody');
            if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
                doc.find('#'+TPPluginName+'AdminNotice').replaceWith(adminNotice('updated', TPMesgUpdateSettings , ''));
            }else{
                $('#wpbody-content').before(adminNotice('updated', TPMesgUpdateSettings , ''));
            }

            doc.find('#TPAdminNoticeClose').click(function () {
                $(this).parent().remove();
            });

            //$('#wpadminbar').before(adminNotice('updated', TPMesgUpdateSettings , ''));

            //var dialogNotice = adminNoticeModal("#adminNoticeModal", "updated");
            $(this).ajaxSubmit({
                success: function(data){
                  //  dialogNotice.dialog( "close" );
                    if (doc.find('#'+TPPluginName+'AdminNotice').length > 0) {
                        doc.find('#'+TPPluginName+'AdminNotice').remove();
                    }
                }
            });
            return false;
        });
    }

    /**
     *
     * @param dataTable
     * @constructor
     */
    function TPStatsSave(dataTable){
        doc.find('#TP-Report-total-chek1').click(function () {
            var data, name;
            data = $(this)[0].checked;
            if(data){
                TPStatsTotal = true;
                dataTable.fnFilter();
                doc.find('.TP-Report-total-row').show();
                doc.find('#TPListReport > tfoot').show();
            }else{
                doc.find('.TP-Report-total-row').hide();
                doc.find('#TPListReport > tfoot').hide();
            }
            name = $(this).attr("name");
            $.ajax({
                type: "POST",
                url: ajaxurl + '?action=tp_save_stats_total',
                data: {data:data},
                success: function(data){
                }
            });
        });
    }
    /** **/
    doc.find('a.TP-BtnDefaultStyle').click(function () {
        $.ajax({
            url: ajaxurl + '?action=tp_default_style',
            type: "POST", // Делаем POST запрос
            //data: data,
            success: function (data) {
                //console.log(data.substring(0, data.length - 1));
                document.location.href = '';
            }
        });
    });
    doc.find( '.TPThemeActions a:last-child' ).focus();
    doc.find('.TPThemeBtnActivate').click(function () {
        doc.find('.TPTheme').removeClass('TPThemeActive');
        var TPTheme, TPThemeName;
        TPTheme = $(this).parent('.TPThemeActions').parent('.TPTheme');
        TPTheme.addClass('TPThemeActive');
        TPThemeName = TPTheme.data('theme_name');
        doc.find('.TPThemesNameHidden').val(TPThemeName);
        //console.log(TPThemeName)
    });


    switch ( doc.find(".TPEmptyTableType:checked").val()){
        case '0':
            doc.find("#TPEmptyTableShowNotification").show();
            break;
        case '1':
            doc.find("#TPEmptyTableShowSearchForm").show();
            break;
    }
    $('label[id^="cheker-label-"]').on('click', function(){
        var s = $(this).attr('id').replace(/[^0-9]/g,'');
        $('div[id^="chekar-content-"]').removeClass('active');
        $('div[id^="chekar-content-'+s+'"]').addClass('active');
    })
    doc.find(".TPEmptyTableType:radio").change(function () {
        doc.find("#TPEmptyTableShowNotification").hide();
        doc.find("#TPEmptyTableShowSearchForm").hide();
        switch ($(this).val()){
            case '0':
                doc.find("#TPEmptyTableShowNotification").show();
                break;
            case '1':
                doc.find("#TPEmptyTableShowSearchForm").show();
                break;
        }
    });

    doc.find('.tp-help-railway-active').click(function () {
        doc.find('#tabs-railway-help').hide();
        doc.find('#tabs-railway_config').show();
        doc.find('.TPActiveRailwayHidden').val(1);
    });

});


