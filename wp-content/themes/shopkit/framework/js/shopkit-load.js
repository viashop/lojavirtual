(function(w, d, undefined) {
	'use strict';

	function polyfill() {

		if ('scrollBehavior' in d.documentElement.style) {
			return;
		}

		var Element = w.HTMLElement || w.Element;
		var SCROLL_TIME = 468;

		var original = {
			scroll: w.scroll || w.scrollTo,
			scrollBy: w.scrollBy,
			scrollIntoView: Element.prototype.scrollIntoView
		};

		var now = w.performance && w.performance.now
			? w.performance.now.bind(w.performance) : Date.now;

		function scrollElement(x, y) {
			this.scrollLeft = x;
			this.scrollTop = y;
		}

		function ease(k) {
			return 0.5 * (1 - Math.cos(Math.PI * k));
		}

		function shouldBailOut(x) {
			if (typeof x !== 'object'
						|| x === null
						|| x.behavior === undefined
						|| x.behavior === 'auto'
						|| x.behavior === 'instant') {
				return true;
			}

			if (typeof x === 'object'
						&& x.behavior === 'smooth') {
				return false;
			}

			throw new TypeError('behavior not valid');
		}

		function findScrollableParent(el) {
			var isBody;
			var hasScrollableSpace;
			var hasVisibleOverflow;

			do {
				el = el.parentNode;

				isBody = el === d.body;
				hasScrollableSpace =
					el.clientHeight < el.scrollHeight ||
					el.clientWidth < el.scrollWidth;
				hasVisibleOverflow =
					w.getComputedStyle(el, null).overflow === 'visible';
			} while (!isBody && !(hasScrollableSpace && !hasVisibleOverflow));

			isBody = hasScrollableSpace = hasVisibleOverflow = null;

			return el;
		}

		function step(context) {
			context.frame = w.requestAnimationFrame(step.bind(w, context));

			var time = now();
			var value;
			var currentX;
			var currentY;
			var elapsed = (time - context.startTime) / SCROLL_TIME;

			elapsed = elapsed > 1 ? 1 : elapsed;

			value = ease(elapsed);

			currentX = context.startX + (context.x - context.startX) * value;
			currentY = context.startY + (context.y - context.startY) * value;

			context.method.call(context.scrollable, currentX, currentY);

			if (currentX === context.x && currentY === context.y) {
				w.cancelAnimationFrame(context.frame);
				return;
			}
		}

		function smoothScroll(el, x, y) {
			var scrollable;
			var startX;
			var startY;
			var method;
			var startTime = now();
			var frame;

			if (el === d.body) {
				scrollable = w;
				startX = w.scrollX || w.pageXOffset;
				startY = w.scrollY || w.pageYOffset;
				method = original.scroll;
			} else {
				scrollable = el;
				startX = el.scrollLeft;
				startY = el.scrollTop;
				method = scrollElement;
			}

			if (frame) {
				w.cancelAnimationFrame(frame);
			}

			step({
				scrollable: scrollable,
				method: method,
				startTime: startTime,
				startX: startX,
				startY: startY,
				x: x,
				y: y,
				frame: frame
			});
		}

		w.scroll = w.scrollTo = function() {
			if (shouldBailOut(arguments[0])) {
				original.scroll.call(
					w,
					arguments[0].left || arguments[0],
					arguments[0].top || arguments[1]
				);
				return;
			}

			smoothScroll.call(
				w,
				d.body,
				~~arguments[0].left,
				~~arguments[0].top
			);
		};

		w.scrollBy = function() {
			if (shouldBailOut(arguments[0])) {
				original.scrollBy.call(
					w,
					arguments[0].left || arguments[0],
					arguments[0].top || arguments[1]
				);
				return;
			}

			smoothScroll.call(
				w,
				d.body,
				~~arguments[0].left + (w.scrollX || w.pageXOffset),
				~~arguments[0].top + (w.scrollY || w.pageYOffset)
			);
		};

		Element.prototype.scrollIntoView = function() {
			if (shouldBailOut(arguments[0])) {
				original.scrollIntoView.call(this, arguments[0] || true);
				return;
			}

			var scrollableParent = findScrollableParent(this);
			var parentRects = scrollableParent.getBoundingClientRect();
			var clientRects = this.getBoundingClientRect();

			if (scrollableParent !== d.body) {
				smoothScroll.call(
					this,
					scrollableParent,
					scrollableParent.scrollLeft + clientRects.left - parentRects.left,
					scrollableParent.scrollTop + clientRects.top - parentRects.top
				);
				w.scrollBy({
					left: parentRects.left,
					top: parentRects.top,
					behavior: 'smooth'
				});
			} else {
				w.scrollBy({
					left: clientRects.left,
					top: clientRects.top,
					behavior: 'smooth'
				});
			}
		};
	}

	if (typeof exports === 'object') {
		module.exports = { polyfill: polyfill };
	} else {
		polyfill();
	}

})(window, document);

;(function(e,t,n,r){e.fn.doubleTapToGo=function(r){if(!("ontouchstart"in t)&&!navigator.msMaxTouchPoints&&!navigator.userAgent.toLowerCase().match(/windows phone os 7/i))return false;this.each(function(){var t=false;e(this).on("click",function(n){var r=e(this);if(r[0]!=t[0]){n.preventDefault();t=r}});e(n).on("click touchstart MSPointerDown",function(n){var r=true,i=e(n.target).parents();for(var s=0;s<i.length;s++)if(i[s]==t[0])r=false;if(r)t=false})});return this}})(jQuery,window,document);

(function($){

	"use strict";

	if ( typeof shopkit.collapsibles != 'undefined' ) {

		$.each( shopkit.collapsibles, function(i, obj) {

			$(document).on('click', '.shopkit-'+obj.slug+'-dismiss', function() {

				$(this).toggleClass('shopkit-active').toggleClass('shopkit-notactive');
				$('#'+obj.name+'_section .shopkit-inner-wrapper').slideUp(200, function() {
					$('#'+obj.name+'_section').slideUp(200, function() {
						$(this).remove();
					});
				});

				if ( obj.remove === false ) {

					var ajax_data = {
						action: 'shopkit_section_session',
						section: obj.name,
						visibility: 'notshown'
					};

					$.post(shopkit.ajaxurl, ajax_data, function(response) {});
				}

				return false;

			});

			if ( obj.remove === false ) {

				$(window).load( function() {

					if ( $('.shopkit-'+obj.slug+'-trigger').length>0 ) {

						if ( $('#'+obj.name+'_section .shopkit-inner-wrapper').is(':visible') ) {
							$('.shopkit-'+obj.slug+'-trigger.shopkit-active').removeClass('shopkit-active').addClass('shopkit-notactive');
						}
						else {
							$('.shopkit-'+obj.slug+'-trigger.shopkit-notactive').removeClass('shopkit-notactive').addClass('shopkit-active');
						}
					}
				});
			}

			$(document).on('click', '.shopkit-'+obj.slug+'-trigger', function() {

				if ( $('#'+obj.name+'_section .shopkit-inner-wrapper').is(':visible') ) {

					$(this).removeClass('shopkit-notactive').addClass('shopkit-active');
					if ( obj.remove === false ) {
						var ajax_data = {
							action: 'shopkit_section_session',
							section: obj.name,
							visibility: 'notshown'
						};

						$.post(shopkit.ajaxurl, ajax_data, function(response) {});
					}
				}
				else {

					$(this).removeClass('shopkit-active').addClass('shopkit-notactive');
					if ( obj.remove === false ) {
						var ajax_data = {
							action: 'shopkit_section_session',
							section: obj.name,
							visibility: 'shown'
						};

						$.post(shopkit.ajaxurl, ajax_data, function(response) {});
					}
				}

				$('#'+obj.name+'_section .shopkit-inner-wrapper').slideToggle(200);

				return false;

			});

		});

	}

	$(document).ready(function() {
		var elem = $('#' + window.location.hash.replace('#', ''));
		if ( elem.length > 0 ) {
			window.scroll({
				top: elem.offset().top,
				left: 0,
				behavior: 'smooth'
			});
		}
	});

	$('a[href*=#]').on('click', function() {

		if ( $(this.hash).length > 0 ) {
			window.scroll({
				top: $(this.hash).offset().top,
				left: 0,
				behavior: 'smooth'
			});
		}

	});


	$( '.shopkit-menu li:has(ul)' ).doubleTapToGo();

	$(document).on( 'submit', '.shopkit-search-form', function() {

		if ( $(this).find('input[name="s"]').val() == '' ) {
			return false;
		}

	});

	$(document).on( 'click', '.shopkit-login-icon', function() {

		$(this).next().toggleClass('shopkit-active').fadeIn(200).find('input[type="text"]').focus();

		return false;

	});

	$(document).on( 'click', '.shopkit-login-close', function() {

		$(this).parent().toggleClass('shopkit-active').fadeOut(200);

	});

	$('.shopkit-menu .shopkit-menu-style-multi-column > ul > li > a').each( function() {
		$(this).replaceWith('<span class="shopkit-menu-style-multi-column-title">' + $(this).html() +'</span>');
	});

	$('.shopkit-menu img').each( function() {

		var curr_bg_src = $(this).attr('src');
		var curr_bg_pos = $(this).attr('data-background-position');
		curr_bg_pos = curr_bg_pos.split('-');

		var curr_bg_prnt = $(this).parent();
		var curr_bg = $(this).next().next();

		curr_bg_prnt.addClass('shopkit-menu-bg-active');

		curr_bg.css({
			'background-image':'url('+curr_bg_src+')'
		});

		if ( curr_bg_pos[0] == 'left' ) {
			curr_bg.css({
				'padding-left':'120px',
				'background-position':'left center',
				'background-repeat':'no-repeat'
			});
		}
		else if ( curr_bg_pos[0] == 'right' ) {
			curr_bg.css({
				'padding-right':'120px',
				'background-position':'right center',
				'background-repeat':'no-repeat'
			});
		}
		else if ( curr_bg_pos[0] == 'pattern' ) {
			curr_bg.css({
				'padding-right':'120px',
				'background-position':'center center'
			});
		}
		else if ( curr_bg_pos[0] == 'full' ) {
			curr_bg.css({
				'padding-right':'120px',
				'background-position':'center center'
			});
		}

		if ( curr_bg_pos[1] == 'portraid' ) {
			curr_bg.css({
				'background-size':'auto 100%'
			});
		}
		else if ( curr_bg_pos[1] == 'landscape' ) {
			curr_bg.css({
				'background-size':'100% auto'
			});
		}
		else if ( curr_bg_pos[1] == 'repeat' ) {
			curr_bg.css({
				'background-repeat':'repeat'
			});
		}
		else if ( curr_bg_pos[1] == 'width' ) {
			curr_bg.css({
				'background-size':'cover'
			});
		}
		$(this).remove();

	});

	var shopkit_ajax = 'not_active';

	function shopkit_ajax_call( el_action, el_id ) {

		var ajax_data = {
			action: el_action,
			product_id: el_id
		};

		return $.post(shopkit.ajaxurl, ajax_data, function(response) {
			if (response) {
				shopkit_ajax = 'notactive';
			}
			else {
				alert(shopkit.locale.ajax_error);
				shopkit_ajax = 'notactive';
			}

		});

	}

	$(document).on( 'click', '.shopkit-quickview-button', function() {

		if ( $('.shopkit-quickview').length>0 ) {
			return false;
		}

		if ( shopkit_ajax == 'active' ) {
			return false;
		}

		var curr = $(this);
		shopkit_ajax = 'active';

		$.when( shopkit_ajax_call( 'shopkit_quickview', curr.data('quickview-id') ) ).done( function(response) {

			response = $(response);
			response.hide();
			$('.shopkit-main').append(response);
			sort_bgs();
			response.fadeIn(200);

		});

		return false;
	});

	$(document).on( 'click', '.shopkit-quickview-close', function() {

		$(this).parent().fadeOut(200, function() { $(this).remove(); });

	});

	$(document).on( 'click', '.shopkit-cart-icon', function() {

		$(this).next().find('.shopkit-cart:first').fadeIn(200).toggleClass('shopkit-active');

		return false;

	});

	$(document).on( 'click', '.shopkit-woo-cart-close', function() {

		$(this).parent().toggleClass('shopkit-active').fadeOut(200);

	});

	function sort_bgs() {
		$('.shopkit-woo-bg').each( function(i, obj) {
			var setObj = ( $(this).attr('data-class') !== 'img' ? $(this).closest('.shopkit-loop-image-inner') : $(this).closest('.shopkit-loop-image-inner').find( 'img.wp-post-image' ) );
			setObj.css({'background' : 'url('+$(this).attr('data-url')+') center center'});
			$(this).remove();
		} );
	}
	sort_bgs();

	$(document.body).on( 'post-load', function() {
		sort_bgs();
	});

	$(document).on( 'added_to_cart', function( fragments, cart_hash, $thisbutton ) {
		var count = $('.shopkit-summary-items:first').text();
		$('.shopkit-cart-icon span').html(count);
	});

	$(document).on( 'added_to_cart', function(e,b,c) {
		if ( $(e.currentTarget.activeElement).next().is('.added_to_cart') ) {
			$(e.currentTarget.activeElement).next().after($(shopkit.locale.checkout));
		}
		else {
			$(e.currentTarget.activeElement).after($(shopkit.locale.checkout));
		}
	});

})(jQuery);