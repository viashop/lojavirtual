jQuery( function( $ ) {

	if ( typeof wc_add_to_cart_params === 'undefined' )
		return false;

	$( document ).on( 'click', '.add_to_cart_button.nc-read-more', function() {
		
		var product_id = $(this).attr('data-product_id');
		
		var $thisbutton = $( this );

		if ( $thisbutton.is( '.add_to_cart_button.nc-read-more' ) ) {

			$thisbutton.removeClass( 'added' );
			$thisbutton.addClass( 'nc-loading' );

			var data = {
				action: 'nc_add_to_cart_callback',
				product_id: product_id
			};

			$( 'body' ).trigger( 'adding_to_cart', [ $thisbutton, data ] );

			$.post( nc.ajax, data, function( response ) {

				if ( ! response )
					return;

				var this_page = window.location.toString();

				this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );

				$thisbutton.removeClass('nc-loading');

				if ( response.error && response.product_url ) {
					window.location = response.product_url;
					return;
				}

				fragments = response.fragments;
				cart_hash = response.cart_hash;

				if ( fragments ) {
					$.each(fragments, function(key, value) {
						$(key).addClass('updating');
					});
				}

				$('.shop_table.cart, .updating, .cart_totals,.widget_shopping_cart_top').fadeTo('400', '0.6').block({message: null, overlayCSS: {background: 'transparent url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } } );
				
				$thisbutton.addClass( 'added' );
				

				if ( ! wc_add_to_cart_params.is_cart && $thisbutton.parent().find( '.added_to_cart' ).size() === 0 ) {
					$thisbutton.replaceWith( ' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart nc-read-more" title="' + 
					wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + ' &rarr;</a>' );
				}
				

				if ( fragments ) {
					$.each(fragments, function(key, value) {
						$(key).replaceWith(value);
					});
				}

				$('.widget_shopping_cart, .updating, .widget_shopping_cart_top').stop(true).css('opacity', '1').unblock();

				$('.widget_shopping_cart_top').load( this_page + ' .widget_shopping_cart_top:eq(0) > *', function() {

					$("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass('buttons_added').append('<input type="button" value="+" id="add1" class="plus" />').prepend('<input type="button" value="-" id="minus1" class="minus" />');

					$('.widget_shopping_cart_top').stop(true).css('opacity', '1').unblock();

					$('body').trigger('cart_page_refreshed');
				});
				
				$('.shop_table.cart').load( this_page + ' .shop_table.cart:eq(0) > *', function() {

					$("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass('buttons_added').append('<input type="button" value="+" id="add1" class="plus" />').prepend('<input type="button" value="-" id="minus1" class="minus" />');

					$('.shop_table.cart').stop(true).css('opacity', '1').unblock();

					$('body').trigger('cart_page_refreshed');
				});				

				$('.cart_totals').load( this_page + ' .cart_totals:eq(0) > *', function() {
					$('.cart_totals').stop(true).css('opacity', '1').unblock();
				});

				$('body').trigger( 'added_to_cart', [ fragments, cart_hash ] );
			});

			return false;

		} else {
			return true;
		}

	});

});
