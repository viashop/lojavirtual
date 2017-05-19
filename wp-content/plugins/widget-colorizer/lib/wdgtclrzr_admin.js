(function($){
"use strict";

	function wdgtclrzr_init_picker(widget) {
		widget.find('.wdgtclrzr-color' ).wpColorPicker( {
			change: _.throttle( function() {
			$(this).trigger('change');
			}, 3000 )
		});
	}

	function wdgtclrzr_update_picker(event, widget) {
		wdgtclrzr_init_picker(widget);
	}

	$(document).on('widget-added widget-updated', wdgtclrzr_update_picker);

	$(document).ready( function() {
		$( '#widgets-right .widget:has(.wdgtclrzr-color)' ).each( function () {
			wdgtclrzr_init_picker( $(this) );
		} );
	} );


	$(document).on('click', '.wdgtclrzr-upload' , function() {
		var $el = $(this);
		var upload = $el.parent().find("input.wdgtclrzr-background-input"), frame;
		frame = wp.media({
			title: $el.data('choose'),
			button: {
				text: $el.data('update'),
				close: false
			}
		});
		frame.on( 'select', function() {
			var attachment = frame.state().get('selection').first();
			frame.close();
			upload.val(attachment.attributes.url);
		});
		frame.open();
	});

	var ajaxLoading = false;

	$(document).on('click', '.wdgtclrzr-save' , function() {
		if ( ajaxLoading ) {
			return false;
		}
		ajaxLoading = true;
		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');
		var curr_name = prompt(wdgtclrzr.s_save);

		if ( curr_name == '' || curr_name == 'Custom' ) {
			alert(wdgtclrzr.s_setname);
			return false;
		}
		if ( curr_name === null ) {
			return false;
		}

		var curr_data = {
			action: 'wdgtclrzr_save',
			curr_name: curr_name,
			curr_mode: curr_mode,
			c_title: curr_el.find('input[id$="c_title"]').val(),
			c_text: curr_el.find('input[id$="c_text"]').val(),
			c_link: curr_el.find('input[id$="c_link"]').val(),
			c_hover: curr_el.find('input[id$="c_hover"]').val(),
			c_background: curr_el.find('input[id$="c_background"]').val(),
			bg_image: curr_el.find('input[id$="bg_image"]').val(),
			bg_orientation: curr_el.find('select[id$="bg_orientation"] option:selected').val(),
			f_title: curr_el.find('select[id$="f_title"] option:selected').val(),
			f_title_size: curr_el.find('select[id$="f_title_size"] option:selected').val(),
			f_title_height: curr_el.find('select[id$="f_title_height"] option:selected').val(),
			f_title_style: curr_el.find('select[id$="f_title_style"] option:selected').val(),
			f_title_weight: curr_el.find('select[id$="f_title_weight"] option:selected').val(),
			f_text: curr_el.find('select[id$="f_text"] option:selected').val(),
			f_text_size: curr_el.find('select[id$="f_text_size"] option:selected').val(),
			f_text_height: curr_el.find('select[id$="f_text_height"] option:selected').val(),
			f_text_style: curr_el.find('select[id$="f_text_style"] option:selected').val(),
			f_text_weight: curr_el.find('select[id$="f_text_weight"] option:selected').val(),
			c_border_top: curr_el.find('input[id$="c_border_top"]').val(),
			c_border_right: curr_el.find('input[id$="c_border_right"]').val(),
			c_border_bottom: curr_el.find('input[id$="c_border_bottom"]').val(),
			c_border_left: curr_el.find('input[id$="c_border_left"]').val(),
			b_top_width: curr_el.find('input[id$="b_top_width"]').val(),
			b_right_width: curr_el.find('input[id$="b_right_width"]').val(),
			b_bottom_width: curr_el.find('input[id$="b_bottom_width"]').val(),
			b_left_width: curr_el.find('input[id$="b_left_width"]').val(),
			p_top: curr_el.find('input[id$="p_top"]').val(),
			p_right: curr_el.find('input[id$="p_right"]').val(),
			p_bottom: curr_el.find('input[id$="p_bottom"]').val(),
			p_left: curr_el.find('input[id$="p_left"]').val(),
			e_radius: curr_el.find('input[id$="e_radius"]').val(),
			e_shadow: curr_el.find('input[id$="e_shadow"]').val(),
			custom_css: curr_el.find('textarea[id$="custom_css"]').val()
		};

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				$('select[id$="-preset"]').append('<option value="'+curr_data.curr_name+'">'+curr_data.curr_name+'</option>');
				alert(wdgtclrzr.s_saved);
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

		return false;
	});

	$(document).on('click', '.wdgtclrzr-delete' , function() {
		if ( ajaxLoading ) {
			return false;
		}

		if ( confirm(wdgtclrzr.s_sure) === false ) {
			return false;
		};

		ajaxLoading = true;

		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');
		var curr_data = {
			action: 'wdgtclrzr_delete',
			curr_mode: curr_mode,
			curr_name: curr_el.find('select[id$="preset"] option:selected').val()
		};

		if ( curr_data.curr_name == 'Custom' ) {
			alert(wdgtclrzr.s_alert);
			return false;
		}

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				$('select[id$="-preset"] option[value="'+curr_data.curr_name+'"]').remove();
				alert(wdgtclrzr.s_deleted);
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

		return false;
	});

	$(document).on('click', '.wdgtclrzr-load' , function() {
		if ( ajaxLoading ) {
			return false;
		}

		if ( confirm(wdgtclrzr.s_load) === false ) {
			return false;
		};

		ajaxLoading = true;

		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');
		var curr_data = {
			action: 'wdgtclrzr_load',
			curr_mode: curr_mode,
			curr_name: curr_el.find('select[id$="preset"] option:selected').val()
		};

		if ( curr_data.curr_name == 'Custom' ) {
			alert(wdgtclrzr.s_alert_load);
			return false;
		}

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				var curr_preset = $.parseJSON(wdgtclrzr_response);

				curr_el.find('input[id$="c_title"]').val(curr_preset.c_title);
				curr_el.find('input[id$="c_title"]').parent().prev().css('background-color', curr_preset.c_title);
				curr_el.find('input[id$="c_text"]').val(curr_preset.c_text);
				curr_el.find('input[id$="c_text"]').parent().prev().css('background-color', curr_preset.c_text);
				curr_el.find('input[id$="c_link"]').val(curr_preset.c_link);
				curr_el.find('input[id$="c_link"]').parent().prev().css('background-color', curr_preset.c_link);
				curr_el.find('input[id$="c_hover"]').val(curr_preset.c_hover);
				curr_el.find('input[id$="c_hover"]').parent().prev().css('background-color', curr_preset.c_hover);
				curr_el.find('input[id$="c_background"]').val(curr_preset.c_background);
				curr_el.find('input[id$="c_background"]').parent().prev().css('background-color', curr_preset.c_background);
				curr_el.find('input[id$="bg_image"]').val(curr_preset.bg_image);
				curr_el.find('select[id$="bg_orientation"]').val(curr_preset.bg_orientation);
				curr_el.find('select[id$="f_title"]').val(curr_preset.f_title).trigger('change');
				curr_el.find('select[id$="f_title_size"]').val(curr_preset.f_title_size+'px').trigger('change');
				curr_el.find('select[id$="f_title_height"]').val(curr_preset.f_title_height+'px').trigger('change');
				curr_el.find('select[id$="f_title_style"]').val(curr_preset.f_title_style).trigger('change');
				curr_el.find('select[id$="f_title_weight"]').val(curr_preset.f_title_weight).trigger('change');
				curr_el.find('select[id$="f_text"]').val(curr_preset.f_text).trigger('change');
				curr_el.find('select[id$="f_text_size"]').val(curr_preset.f_text_size+'px').trigger('change');
				curr_el.find('select[id$="f_text_height"]').val(curr_preset.f_text_height+'px').trigger('change');
				curr_el.find('select[id$="f_text_style"]').val(curr_preset.f_text_style).trigger('change');
				curr_el.find('select[id$="f_text_weight"]').val(curr_preset.f_text_weight).trigger('change');
				curr_el.find('input[id$="c_border_top"]').val(curr_preset.c_border_top);
				curr_el.find('input[id$="c_border_top"]').parent().prev().css('background-color', curr_preset.c_border_top);
				curr_el.find('input[id$="c_border_right"]').val(curr_preset.c_border_right);
				curr_el.find('input[id$="c_border_right"]').parent().prev().css('background-color', curr_preset.c_border_right);
				curr_el.find('input[id$="c_border_bottom"]').val(curr_preset.c_border_bottom);
				curr_el.find('input[id$="c_border_bottom"]').parent().prev().css('background-color', curr_preset.c_border_bottom);
				curr_el.find('input[id$="c_border_left"]').val(curr_preset.c_border_left);
				curr_el.find('input[id$="c_border_left"]').parent().prev().css('background-color', curr_preset.c_border_left);
				curr_el.find('input[id$="b_top_width"]').val(curr_preset.b_top_width);
				curr_el.find('input[id$="b_right_width"]').val(curr_preset.b_right_width);
				curr_el.find('input[id$="b_bottom_width"]').val(curr_preset.b_bottom_width);
				curr_el.find('input[id$="b_left_width"]').val(curr_preset.b_left_width);
				curr_el.find('input[id$="p_top"]').val(curr_preset.p_top);
				curr_el.find('input[id$="p_right"]').val(curr_preset.p_right);
				curr_el.find('input[id$="p_bottom"]').val(curr_preset.p_bottom);
				curr_el.find('input[id$="p_left"]').val(curr_preset.p_left);
				curr_el.find('input[id$="e_radius"]').val(curr_preset.e_radius);
				curr_el.find('input[id$="e_shadow"]').val(curr_preset.e_shadow);
				curr_el.find('textarea[id$="custom_css"]').val(curr_preset.custom_css);

				alert(wdgtclrzr.s_loaded);
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

		return false;
	});

	$(document).on('click', '.wdgtclrzr-reset' , function() {

		if ( confirm(wdgtclrzr.s_reset) === false ) {
			return false;
		};

		var curr_el = $(this).closest('.wdgtclrzr-widget');

		curr_el.find('input[id$="c_title"]').val('');
		curr_el.find('input[id$="c_title"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_text"]').val('');
		curr_el.find('input[id$="c_text"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_link"]').val('');
		curr_el.find('input[id$="c_link"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_hover"]').val('');
		curr_el.find('input[id$="c_hover"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_background"]').val('');
		curr_el.find('input[id$="c_background"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="bg_image"]').val('');
		curr_el.find('select[id$="bg_orientation"] option[value="left-landscape"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_title"] option[value="Default"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_title_size"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_title_height"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_title_style"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_title_weight"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_text"] option[value="Default"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_text_size"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_text_height"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_text_style"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('select[id$="f_text_weight"] option[value="normal"]').attr('selected','selected').trigger('change');
		curr_el.find('input[id$="c_border_top"]').val('');
		curr_el.find('input[id$="c_border_top"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_border_right"]').val('');
		curr_el.find('input[id$="c_border_right"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_border_bottom"]').val('');
		curr_el.find('input[id$="c_border_bottom"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="c_border_left"]').val('');
		curr_el.find('input[id$="c_border_left"]').parent().prev().removeAttr('style');
		curr_el.find('input[id$="b_top_width"]').val('');
		curr_el.find('input[id$="b_right_width"]').val('');
		curr_el.find('input[id$="b_bottom_width"]').val('');
		curr_el.find('input[id$="b_left_width"]').val('');
		curr_el.find('input[id$="p_top"]').val('');
		curr_el.find('input[id$="p_right"]').val('');
		curr_el.find('input[id$="p_bottom"]').val('');
		curr_el.find('input[id$="p_left"]').val('');
		curr_el.find('input[id$="e_radius"]').val('');
		curr_el.find('input[id$="e_shadow"]').val('');
		curr_el.find('textarea[id$="custom_css"]').val('');


		return false;
	});

	$(document).on('click', '.wdgtclrzr-import' , function() {

		var curr_el = $(this).closest('.wdgtclrzr-widget');

		curr_el.find('.wdgtclrzr-textarea.wdgtclrzr-import-textarea').slideDown();

		return false;

	});

	$(document).on('click', '.wdgtclrzr-import-ajax', function() {
		if ( ajaxLoading ) {
			return false;
		}

		ajaxLoading = true;

		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');

		var curr_data = {
			action: 'wdgtclrzr_import',
			curr_mode: curr_mode,
			curr_styles: curr_el.find('#wdgtclrzr-import').val()
		};

		curr_el.find('.wdgtclrzr-textarea.wdgtclrzr-import-textarea').slideUp();

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				alert(wdgtclrzr.s_success);
				window.location.reload();
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

	});


	$(document).on('click', '.wdgtclrzr-export-selected' , function() {
		if ( ajaxLoading ) {
			return false;
		}

		ajaxLoading = true;

		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');

		var curr_data = {
			action: 'wdgtclrzr_export',
			curr_mode: curr_mode,
			curr_name: curr_el.find('select[id$="preset"] option:selected').val()
		};

		if ( curr_data.curr_name == 'Custom' ) {
			alert(wdgtclrzr.s_alert_load);
			return false;
		}

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				window.prompt("Copy to clipboard: Ctrl+C, Enter", wdgtclrzr_response);
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

		return false;
	});

	$(document).on('click', '.wdgtclrzr-export-all' , function() {
		if ( ajaxLoading ) {
			return false;
		}

		ajaxLoading = true;

		var curr_el = $(this).closest('.wdgtclrzr-widget');
		var curr_mode = curr_el.data('mode');

		var curr_data = {
			action: 'wdgtclrzr_export',
			curr_mode: curr_mode,
			curr_name: 'all'
		};

		$.post(wdgtclrzr.ajaxurl, curr_data, function(wdgtclrzr_response) {
			if (wdgtclrzr_response) {
				window.prompt("Copy to clipboard: Ctrl+C, Enter", wdgtclrzr_response);
				ajaxLoading = false;
			} else { 
				alert('fail');
				ajaxLoading = false;
			}
		});

		return false;
	});

})(jQuery);