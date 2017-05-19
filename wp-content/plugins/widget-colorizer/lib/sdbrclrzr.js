(function($){
"use strict";

	var wdgtclrzr = {};

	$('span[id^=sdbrclrzr-]').each( function() {
		var curr_data = $(this).attr('data-sdbrclrzr').split('|');
		wdgtclrzr[$(this).attr('id')] = {
			stick_sidebar:curr_data[0],
			stick_disable:curr_data[1],
			top_offset:curr_data[2],
			bottom_offset:curr_data[3],
			method:curr_data[4],
			orientation:curr_data[5]
		}
	});

	var wdgtclrzrHeights = {};
	var wHeight = $(window).height();

	$.each(wdgtclrzr, function (ky, vl) {

		wdgtclrzrHeights[ky] = $('#'+ky).parent().height();
		wdgtclrzrHeights[ky+'_offset'] = $('#'+ky).parent().offset().top;
		wdgtclrzrHeights[ky+'_offset_left'] = $('#'+ky).parent().offset().left;
		if ( vl.orientation == 'top' ) {
			wdgtclrzrHeights[ky+'_padding_add'] = 0;
		}
		else {
			wdgtclrzrHeights[ky+'_padding_add'] = wHeight-$('#'+ky).parent().height()-2*vl.top_offset;
		}
	});

	var curr_t, tempScrollTop, currentScrollTop = 0, currentDirection = 'down', adminbar = 0, curr_docu = $(document).outerHeight();

	function isTouchDevice() {
		return !!('ontouchstart' in window);
	}

	function stickySidbars() {

		$.each(wdgtclrzr, function (ky, vl) {

			if ( wHeight < wdgtclrzrHeights[ky] ) {
				return false;
			}
			if ( vl.stick_sidebar == '0' ) {
				return false;
			}
			if ( vl.stick_disable == '1' && isTouchDevice() === true ) {
				return false;
			}

			var curr = $('#'+ky);
			console.log(curr);
			var curr_sidebar = curr.parent();

			var top_offset = parseInt(vl.top_offset, 10);
			var bottom_offset = parseInt(vl.bottom_offset, 10);

			var curr_e = wdgtclrzrHeights[ky+'_offset'];
			var curr_p = parseInt(curr_sidebar.css('padding-top'),10);
			var curr_m = parseInt(curr_sidebar.css('margin-top'),10);

			if ( vl.method == 'padding' ) {

				if ( wdgtclrzrHeights[ky].height+top_offset > wHeight ) {
					curr_sidebar.css('padding-top', 0);
					return;
				}

				if ( curr_e < curr_t+top_offset+adminbar+wdgtclrzrHeights[ky+'_padding_add'] && currentDirection == 'down' && -(curr_t+wdgtclrzrHeights[ky]+top_offset-curr_docu) > bottom_offset+wdgtclrzrHeights[ky+'_padding_add'] ) {
					curr_sidebar.css('padding-top', curr_t-curr_e+adminbar+top_offset+wdgtclrzrHeights[ky+'_padding_add']);
				}
				else if ( currentDirection == 'up' && -(curr_t+wdgtclrzrHeights[ky]+top_offset+adminbar-curr_docu) > bottom_offset+wdgtclrzrHeights[ky+'_padding_add'] ) {
					curr_sidebar.css('padding-top', curr_t-curr_e+adminbar+top_offset+wdgtclrzrHeights[ky+'_padding_add']);
				}
			}
			else if ( vl.method == 'fixed' && vl.orientation == 'top' ) {

				if ( curr_t+top_offset+adminbar+curr_m < wdgtclrzrHeights[ky+'_offset'] ) {
					curr_sidebar.css({position:'relative', 'padding-top':0 , top:'auto', left:'auto'});
					curr_sidebar.removeClass('wdgtclrzr_fixed');
					return;
				}

				if ( curr_e < curr_t+top_offset+adminbar+curr_m && -(curr_t+wdgtclrzrHeights[ky]+top_offset-curr_docu) > bottom_offset  ) {
					if ( !curr_sidebar.hasClass('wdgtclrzr_fixed') ) {
						curr_sidebar.removeClass('wdgtclrzr_stopped');
						curr_sidebar.addClass('wdgtclrzr_fixed');
						curr_sidebar.css({position:'fixed', 'padding-top':0 ,top:top_offset+adminbar, left:wdgtclrzrHeights[ky+'_offset_left']});
					}
				}
				else {
					if ( !curr_sidebar.hasClass('wdgtclrzr_stopped') ) {
						curr_sidebar.addClass('wdgtclrzr_stopped');
						curr_sidebar.removeClass('wdgtclrzr_fixed');
						console.log(curr_sidebar.offset().top);
						curr_sidebar.css({ position:'relative', 'padding-top':curr_sidebar.offset().top-top_offset-wdgtclrzrHeights[ky+'_offset'], top:'auto', left:'auto' });
					}
				}
			}
			else if ( vl.method == 'fixed' && vl.orientation == 'bottom' ) {

				if ( curr_t+top_offset+adminbar+curr_m+wdgtclrzrHeights[ky+'_padding_add'] < wdgtclrzrHeights[ky+'_offset'] ) {
					curr_sidebar.css({position:'relative', 'padding-top':0 , bottom:'auto', left:'auto'});
					curr_sidebar.removeClass('wdgtclrzr_fixed');
					return;
				}

				if ( curr_e < curr_t+top_offset+adminbar+curr_m+wdgtclrzrHeights[ky+'_padding_add'] &&  -(curr_t+wdgtclrzrHeights[ky]+top_offset-curr_docu) > bottom_offset  ) {
					if ( !curr_sidebar.hasClass('wdgtclrzr_fixed') ) {
						curr_sidebar.removeClass('wdgtclrzr_stopped');
						curr_sidebar.addClass('wdgtclrzr_fixed');
						curr_sidebar.css({position:'fixed', 'padding-top':0 ,bottom:top_offset, left:wdgtclrzrHeights[ky+'_offset_left']});
					}
				}
				else {
					if ( !curr_sidebar.hasClass('wdgtclrzr_stopped') ) {
						curr_sidebar.addClass('wdgtclrzr_stopped');
						curr_sidebar.removeClass('wdgtclrzr_fixed');
						console.log(curr_sidebar.offset().top);
						curr_sidebar.css({ position:'relative', 'padding-top':curr_sidebar.offset().top-top_offset-wdgtclrzrHeights[ky+'_offset'], bottom:'auto', left:'auto' });
					}
				}
			}

		})
	}

	$(window).scroll(function(){
		curr_t = $(window).scrollTop();

		if (tempScrollTop > curr_t ) {
			currentDirection = 'up';
		}
		else if (tempScrollTop < curr_t ){
			currentDirection = 'down';
		}

		tempScrollTop = curr_t;

		stickySidbars();
	});

	$(window).resize(function(){
		wHeight = $(window).height();
		$.each(wdgtclrzr, function (ky, vl) {
			wdgtclrzrHeights[ky] = $('#'+ky).parent().height();
			wdgtclrzrHeights[ky+'_offset'] = $('#'+ky).parent().offset().top;
			wdgtclrzrHeights[ky+'_offset_left'] = $('#'+ky).parent().offset().left;
			if ( vl.orientation == 'top' ) {
				wdgtclrzrHeights[ky+'_padding_add'] = 0;
			}
			else {
				wdgtclrzrHeights[ky+'_padding_add'] = wHeight-$('#'+ky).parent().height()-2*vl.top_offset;
			}
		});
		curr_docu = $(document).outerHeight()
		stickySidbars();

	});

	$(document).ready(function(){
		if($('#wpadminbar').length > 0) { adminbar = $('#wpadminbar').outerHeight(); }
		$(window).trigger('resize');
		curr_docu = $(document).outerHeight()

		stickySidbars();
	});
	
	$(window).load(function() {
		$(window).trigger('resize');
		curr_docu = $(document).outerHeight();

		stickySidbars();
	});


	curr_t = $(window).scrollTop();

	if (tempScrollTop > curr_t ) {
		currentDirection = 'up';
	}
	else if (tempScrollTop < curr_t ){
		currentDirection = 'down';
	}

	tempScrollTop = curr_t;

	curr_docu = $(document).outerHeight();
	stickySidbars();


})(jQuery);