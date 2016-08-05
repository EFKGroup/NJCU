jQuery(function($){
	/* Close 2nd media browser popup */
	setInterval(function(){ 			
		if($('.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.media-wrapper').length > 1){
			$('.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.media-wrapper:eq(1)').remove();
			$('.ui-widget-overlay:eq(1)').remove();
			
		}
	}, 100);	
});