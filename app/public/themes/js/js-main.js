$(document).ready(function() {
	
	var conteiner = '.TP-Plugin-Tables_wrapper';
	var table = conteiner+' .TP-Plugin-Tables_box';
	
    function checkSize(){
		var widthWrapper, widthBox, hidden, small;
		$(table).each(function(){
			$(this).removeClass('TP-autoWidth-plugin');
			widthWrapper = $(conteiner).width();
			widthBox     = $(this).width();
			if ( widthBox > widthWrapper ) {
				while (widthBox > widthWrapper) {
					if ( !$(this).find('tr td.TP-unessential:not(.TP-hidden)').length )
						return false;
					$('td.TP-unessential:not(.TP-hidden):last', $(this).find('tr')).addClass('TP-hidden');
					widthWrapper = $(conteiner).width();
					widthBox = $(this).width();
				}
				$(this).addClass('TP-autoWidth-plugin');
			} else {
				small = true;
				while (small) {
					small = false;
					if ( $(this).find('tr td.TP-unessential.TP-hidden').length ) {
						hidden = $('td.TP-unessential.TP-hidden:first', $(this).find('tr'));
						hidden.removeClass('TP-hidden');
						widthWrapper = $(conteiner).width();
						widthBox = $(this).width();
						if ( widthBox > widthWrapper ) {
							hidden.addClass('TP-hidden');
							$(this).addClass('TP-autoWidth-plugin');
						} else {
							small = true;
						}
					}
				}
			}
		});
    }
    checkSize();
    $( window ).resize(checkSize);	
})
