(function($){

	"use strict";

	function wfsm_add_vendor_group(curr_group) {

		var curr_data = {
			action: 'wfsm_admin',
			wfsm_type: 'wfsm_add_vendor_group',
			wfsm_group: curr_group
		}

		return $.post(wfsm.ajax, curr_data, function(response) {
			if (response) {

			}
			else {
				alert('Error!');
			}

		});

	}

	function wfsm_add_custom_settings_group(curr_set) {

		var curr_data = {
			action: 'wfsm_admin',
			wfsm_type: 'wfsm_add_custom_settings_group',
			wfsm_setts: curr_set
		}

		return $.post(wfsm.ajax, curr_data, function(response) {
			if (response) {

			}
			else {
				alert('Error!');
			}

		});

	}

	function wfsm_add_custom_setting(curr_set,curr_setting_length,curr_setting_type) {

		var curr_data = {
			action: 'wfsm_admin',
			wfsm_type: 'wfsm_add_custom_setting',
			wfsm_set: curr_set,
			wfsm_setting_length: curr_setting_length,
			wfsm_setting_type: curr_setting_type
		}

		return $.post(wfsm.ajax, curr_data, function(response) {
			if (response) {

			}
			else {
				alert('Error!');
			}

		});

	}

	$('#wc_settings_wfsm_default_permissions').selectize({
		plugins: ['remove_button'],
		delimiter: ',',
		persist: false
	});

	$('.wfsm-vendor-group-users, .wfsm-vendor-user-permissions').each( function() {

		var curr = $(this);

		var curr_selected = $.parseJSON( curr.parent().attr('data-selected') );

		var curr_sel = curr.attr('multiple', 'multiple').selectize({
			items: [curr_selected],
			plugins: ['remove_button'],
			delimiter: ',',
			persist: false
		});

		curr_sel[0].selectize.setValue( curr_selected );

	});

	$(document).on( 'click', '#wfsm-add-vendor-group', function() {

		var curr = $(this);

		var curr_group = curr.parent().find('.wfsm-vendor-group').length;
	
		$.when( wfsm_add_vendor_group(curr_group) ).done( function(response) {

			response = $(response);
			response.find('select').each( function() {
				var curr_sel = $(this).attr('multiple', 'multiple').selectize({
					plugins: ['remove_button'],
					delimiter: ',',
					persist: false
				});
				curr_sel[0].selectize.clear();
			});

			curr.before(response);

		});
	
		return false;

	});


	$(document).on( 'click', '#wfsm-add-custom-settings-group', function() {

		var curr = $(this);

		var curr_set = curr.parent().find('.wfsm-custom-setting').length;
	
		$.when( wfsm_add_custom_settings_group(curr_set) ).done( function(response) {

			response = $(response);

			curr.prev().append(response);

		});
	
		return false;

	});


	$(document).on( 'click', '#wfsm-add-custom-setting', function() {

		var curr = $(this);
		var curr_parent = $(this).closest('.wfsm-custom-setting');

		var curr_set = curr_parent.attr('data-id');
		var curr_setting_length = curr_parent.find('.wfsm-added-custom-setting').length;
		var curr_setting_type = curr_parent.find('.wfsm-custom-setting-type').val();

		$.when( wfsm_add_custom_setting(curr_set,curr_setting_length,curr_setting_type) ).done( function(response) {

			response = $(response);
			response.find('.wfsm-added-custom-setting-title').text('...');

			curr.next().append(response);

		});
	
		return false;

	});


	$(document).on( 'click', '.wfsm-added-custom-setting-edit', function() {

		var curr = $(this);
		var curr_parent = $(this).closest('.wfsm-added-custom-setting');

		if ( curr_parent.hasClass('wfsm-active') ) {
			curr_parent.find('.wfsm-added-custom-setting-wrapper').removeAttr('style');
			setTimeout(function() {
				curr_parent.removeClass('wfsm-active');
			}, 200);
		}
		else {
			curr_parent.find('.wfsm-added-custom-setting-wrapper').css({'max-height':'1000px'});
			curr_parent.addClass('wfsm-active');
		}

		return false;

	});

	$(document).on( 'keyup', '.wfsm-custom-setting-name', function() {

		var title = $(this).val();

		$(this).closest('.wfsm-added-custom-setting').find('.wfsm-added-custom-setting-title').text(title);

	});

	$(document).on('click', '.wfsm-vendor-group-ui, .wfsm-custom-setting-ui, .wfsm-added-custom-setting-ui', function() {

		if ( !confirm( wfsm.localization.delete_element ) ) {
			return false;
		}

		$(this).parent().remove();

		return false;

	});


})(jQuery);