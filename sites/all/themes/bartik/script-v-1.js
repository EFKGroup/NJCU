// JavaScript Document

jQuery(function($){
	var isMobile = false; //initiate as false
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	if(is_touch_device() && isMobile){ 
		$('body').addClass('hasTouch');
	}else{
		$('body').addClass('notTouch');
	}
	$('.region-header #block-system-main-menu .collapsed ul').wrap('<div class="wrap-container"></div>');

	/* Admin Menus Responsive */
	$( "#toolbar-home" ).click(		
	  function() {
	  	if($(window).width() < 1000 ){
	    	$( this ).parents('.toolbar-menu').find('#toolbar-menu').slideToggle('fast', "linear");
	    	return false;
	    }else{
	  		$( this ).parents('.toolbar-menu').find('#toolbar-menu').slideDown('fast', "linear");
	    }	  
	  }
	);

	
	/* Open PopUp Header Start*/
	$( "body" ).delegate( "img.mega-menu", "click", function() {
	  $('body').addClass('overFlowHidden');														 
	  $( "#popup_header" ).slideDown('slow');
	});
	/* Open PopUp Header End*/
	
	/* Close PopUp Header Start*/
	$('#popup_header #block-search-form .content').append('<a class="close-popup-header" href="#"><span></span></a>');	
	
	$( "body" ).delegate( "#popup_header #block-search-form .content a.close-popup-header", "click", function() {
	  $( this ).parents( "#popup_header" ).slideUp('slow');
	  $( "#popup_header #block-menu-block-1, #popup_header #block-block-1, #popup_header #block-menu-block-2" ).show();
	  $('body').removeClass('overFlowHidden');		
	});
	/* Close PopUp Header End*/

	/* Show Hide Top header */
	//$("#header").autoHidingNavbar();

	/* Search Button Top Start*/	
	$( "body" ).delegate( ".top-seach-menu", "click", function() {
		$( "#popup_header #block-menu-block-1, #popup_header #block-block-1, #popup_header #block-menu-block-2" ).hide();
	  	$( "#popup_header" ).slideDown('slow');	  
	  	return false;
	});
	
	/* Search Button Top End*/

	/* Search Form Start*/
	$('#block-system-main #search-form input').val('Search NJCU');
	$('#block-system-main #search-form input').attr('placeholder','Search NJCU');
	$('#block-system-main #search-form input').keyup(function(){
		if($(this).val() != 'Search NJCU'){
			$(this).addClass('hasVal');	
		}else{
			$(this).removeClass('hasVal');		
		}
	});
	
	$('#block-system-main #search-form input').focus(function() {  
	   if($(this).val() == 'Search NJCU'){
			$(this).addClass('hasVal');	
			$(this).val('');
		}
	}).blur(function() {  
		if($(this).val() == ''){
			$(this).removeClass('hasVal');	
			$(this).val('Search NJCU')
		}else{
			$(this).addClass('hasVal');
			
		}
	});  
	
	/* Search Form End*/

	/* Smaller screen Menu Start */
	$(window).resize(function () { resizeToMenu(); });
    $(window).trigger('resize');

    function resizeToMenu(){
    	if($(window).width() < 764){
    		$('#popup_header').addClass('mobile-menu');
    	}else{
    		$('#popup_header').removeClass('mobile-menu');
    	}
    }
    $('#popup_header .menu-name-main-menu > ul > li > a').click(function(){
    	if($('#popup_header').hasClass('mobile-menu')){
    		if($(this).parent().hasClass('opened')){    			
    			$(this).parent().find('ul').slideToggle('slow', "linear", function(){	
    				$(this).parent().toggleClass('opened');
    			});
    			return false;
    		}else{
	    		$('#popup_header .menu-name-main-menu > ul li').removeClass('opened');
	    		$('#popup_header .menu-name-main-menu > ul li').find('ul').slideUp('fast', "linear");
	    		$(this).parent().toggleClass('opened');
	    		$(this).parent().find('ul').slideToggle('slow', "linear");	
	    		return false;
    		}
    	}
    });    

	/* Smaller screen Menu  End */

	/* ColorBox Start*/
	if($('a.youtube.cboxElement').length > 0){
		$("a.youtube.cboxElement").colorbox({iframe:true, width:100%, height:100%, innerWidth:98%, innerHeight:98%});
	}
	/* ColorBox End*/
	
	/* Dock Menu Level 2 Start*/
	if($('#block-views-2rd-level-menus-block').length > 0){
		//var mainWrapper = $('#main-wrapper').offset().top, Menu2level = $('#block-views-2rd-level-menus-block');
		$('#block-views-2rd-level-menus-block').scrollToFixed();
		
	}
	/* Dock Menu Level 2 End*/
	
	/* Dock Top Menu Start*/
	//$('.front #header').scrollToFixed();
	/* Dock Top Menu  End*/
	
	
	
	
	
	/* Events Expossed Filter */
	setInterval(function(){ 
		$('.filter-view .view-filters .form-item a.active, .filter-by .form-item a.active').each(function(){
			$(this).parents('.views-exposed-widget').find('label').html($(this).html());		
		});	
		
		/* Link Menu click */
		if($('.filter-view  .view-filters .views-widget').css('display') == 'none'){
			$('#main-wrapper').removeClass('clicked-overlay');
			$(this).parents('.views-widget').slideUp('fast', "linear");		
			$('.black-overlay').fadeOut('slow', "linear");
		}	 
	}, 100);

	/* label click */
	$( "body" ).delegate('.filter-view .view-filters label, .filter-by label', 'click', function(){
		if($(this).attr('for') == 'edit-title'){
			$(this).css({'width' : '0px', 'text-indent' : '-99999px'});	
			$(this).parent().find('input[type="text"]').focus();
			return false;
		}
		$('#main-wrapper').toggleClass('clicked-overlay');
		$(this).parent().find('.views-widget').slideToggle('fast', "linear").css('top', $(this).parents('.filter-by').height());	
		$('.black-overlay').fadeToggle('slow', "linear");	
		
	});
	
	/* Link Menu click */
	$('.filter-by .views-widget a').click(function(){
		$('#main-wrapper').toggleClass('clicked-overlay');
		$(this).parents('.views-widget').slideToggle('fast', "linear");		
		$('.black-overlay').fadeToggle('slow', "linear");		
	});

	/* search input filter */
	$('.filter-by input[type="text"]').keyup(function(){
		if($(this).val() == ''){
			$(this).parents('.views-exposed-widget').find('label').css({'width' : 'auto', 'text-indent' : '0px'});	
		}else{
			$(this).parents('.views-exposed-widget').find('label').css({'width' : '0px', 'text-indent' : '-99999px'});	
		}
	});
	
	$('.filter-by input[type="text"]').focus(function() {  		
			$(this).parents('.views-exposed-widget').find('label').css({'width' : '0px', 'text-indent' : '-99999px'});				   
	}).blur(function() {  
		if($(this).val() == ''){
			$(this).parents('.views-exposed-widget').find('label').css({'width' : 'auto', 'text-indent' : '0px'});	
		}else{
			$(this).parents('.views-exposed-widget').find('label').css({'width' : '0px', 'text-indent' : '-99999px'});	
		}
	});  

	$(document).click(function(){
		$('.filter-by input[type="text"]').each(function(){
			if($(this).val() == ''){
				$(this).parents('.views-exposed-widget').find('label').css({'width' : 'auto', 'text-indent' : '0px'});	
			}else{
				$(this).parents('.views-exposed-widget').find('label').css({'width' : '0px', 'text-indent' : '-99999px'});	
			}
		});

		
	});
		
	/* iCalendar */
	/* Initilize iCalendar */
	$(document).ready(function(){
		if($('.view-calendar').length > 0){
			setInterval(function(){ 
				iCalendar_fun();
			}, 1000);
		}

		if($('body').hasClass('node-type-calendar')){window.print();}	

		
	});

	$('.node-type-calendar .print-icon').click(function(){
		window.print();
		return false;
	});

	$(document).delegate('.page-calendar .print-icon', 'click', function(){
		 window.open($(this).parent().attr('href'), "_blank", "toolbar=no,  resizable=yes, top=50, left=50, width=1000, height=540");
		return false;
	});
		

	function iCalendar_fun(){					
		if($('.view-calendar').length > 0){
			$('.view-calendar ul li.views-row').each(function(){
				if($(this).find('.show-cal').hasClass('hasICalendar')){
				}else{
					var sdate = $(this).find('.sdate span').text();
					var sSplit = sdate.split(' ');

					var edate = $(this).find('.edate span').text();
					var eSplit = edate.split(' ');

						sdate = sSplit[0]+'T'+sSplit[1];
					    edate = eSplit[0]+'T'+eSplit[1];
					
					var eTitle = $(this).find('.event-lists-row h3').text();
					var eLoc = $(this).find('.event-lists-row .location').text();
					var eDesc = $(this).find('.event-lists-row .description').text();
					$(this).find('.show-cal').icalendar({
						start: new Date(sdate),	
						end: new Date(edate),
						title: eTitle,
						location: eLoc,
						description: eDesc,
						compact: true,
						sites: ['google', 'yahoo']
					});
					$(this).find('.show-cal ul').append('<li>'+$(this).find('.iCal-link').html()+'</li>');
					$(this).find('.show-cal ul').append('<li>'+$(this).find('.outlook-link').html()+'</li>');
				}

				// check all time for day
				if($(this).find('.time span:eq(0)').text() == '(All day)'){
					$(this).find('.time span:eq(1)').remove();
				}	
			});	
		}

	}
	$(document).ready(function(){
		/*  Count 3rd level Pages Links */
		$('#block-views-3rd-level-pages-block').addClass('tColumns-' + $('#block-views-3rd-level-pages-block .content .view-content ul li').length);	
		
		//$('body').prepend($('#header').clone().addClass('show-hide'));
		
		var breadCrumb = $('.breadcrumb .inline a').length;
		if(breadCrumb < 2){$('#breadcrumb').hide();}
		$('.breadcrumb .inline a').each(function() {
			 url = $(this).attr('href');
			_imgr = url.replace('/group', '');
			$(this).attr('href', _imgr)
		});
		$(".breadcrumb .delimiter").html(" > "); 
	});

	$(window).resize(function(){		
		if($(window).width() > 1000 ){
	    	$('#toolbar-menu').show();
	    }else{
	    	$('#toolbar-menu').hide();
	    }
	});


	$(window).scroll(function(){
		if($(this).scrollTop() > 150){
			//$('#header').addClass('hide-visable');
		}else{
			//$('#header').removeClass('hide-visable');
		}
	});

	/* back to top */
	/* scroll to top */
        function totop_button(a) {
            var b = $("#totop");
            b.removeClass("off on");
			  	if (a == "on") { b.addClass("on") } else { b.addClass("off") }			
        }
        window.setInterval(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            if (b > 0) { var d = b + c / 2 } else { var d = 1 }
            if (d < 1e3) { totop_button("off") } else { totop_button("on") }
        }, 300);
		
        $("#totop").click(function (e) {
            e.preventDefault();
            $('body,html').animate({scrollTop:0},800);
        });
		// --- end scroll to top

});	

function is_touch_device() {
 return (('ontouchstart' in window)
      || (navigator.MaxTouchPoints > 0)
      || (navigator.msMaxTouchPoints > 0));
}