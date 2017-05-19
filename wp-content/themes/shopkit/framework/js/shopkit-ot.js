(function($){

	"use strict";

	function shopkit_show_element_options(el) {
		var show = '.shopkit-ot-'+el.val()+'-wrap';
		var wrap = el.closest('.option-tree-setting-body');
		wrap.find(show).show();
		wrap.find(show+' input,'+show+' select').prop('disabled', false);
	}

	function shopkit_hide_element_options(el) {
		el.closest('.option-tree-setting-body').find('.shopkit-ot-hide-wrap').each( function() {
			$(this).find('input,select').prop('disabled', 'disabled');
			$(this).hide();
		});
	}
	$(document).on('change', '.inside > div[id$="_elements_on_left"] .option-tree-setting-body .shopkit-select-element, .inside > div[id$="_elements_on_right"] .option-tree-setting-body .shopkit-select-element', function() {
		shopkit_hide_element_options($(this));
		shopkit_show_element_options($(this));
	});

	$(window).load( function() {
		$('.inside > div[id$="_elements_on_left"] .option-tree-setting-body .shopkit-select-element, .inside > div[id$="_elements_on_right"] .option-tree-setting-body .shopkit-select-element').each( function() {
			shopkit_show_element_options($(this));
		});
	});

	$(document).on('click', '#shopkit-save', function() {
		$('#option-tree-settings-api .option-tree-ui-buttons .button-primary').click();
		return false;
	});

	$(document).on('click', '#install-demo:not(.disabled)', function() {

		if ( !confirm(shopkit.locale.demo_install) ) {
			return false;
		}

		$(this).addClass('disabled');

		$('#shopkit-demo').append('<br/><br/><code id="shopkit-demo-status">Init</code><span id="shopkit-demo-progress"><span id="shopkit-demo-progress-bar"></span></span>');

		pingAjax('initDemo', '');

		return false;

	});

	var demo = {
		states : {
			initDemo : {
				status : false
			},
			addImage : {
				status : false
			},
			addDatabase : {
				status : false
			},
			addWidgets : {
				status : false
			},
			addPlugins : {
				status : false
			},
			closeDemo : {
				status : false
			}
		}
	}
	var demoSections = 6;
	var demoProgress = false;

	function pingAjax(getMode, data) {

		if ( demoProgress === false ) {

			if ( data == '' ) {
				data = {
					mode: getMode
				}
			}

			var parsedResponse;

			$.when( call_ajax( data ) ).done( function(response) {

				try {
					parsedResponse = $.parseJSON(response);
				}
				catch (e) {
					alert('AJAX Error!');
					return false;
				}

				demoProgress = true;

				if ( parsedResponse.progress == 'success' ) {
					demo.states[getMode].status = true;
					$.each( demo.states, function(n, obj) {
						setStatus(parsedResponse.msg);
						setDemoProgress( demoSections );
						if ( demo.states[n].status === false ) {
							demoProgress = false;
							pingAjax(n,'');
							return false;
						}
						--demoSections;
					});
				}
				else if ( parsedResponse.progress == 'notdone' ) {
					data = {
						mode: getMode,
						progress: JSON.stringify( parsedResponse.progressData )
					}
					setStatus(parsedResponse.msg.replace('##',parsedResponse.progressData.next));
					setDemoImageProgress(parsedResponse.progressData.next);
					demoProgress = false;
					pingAjax(getMode, data);
					return false;
				}
				else {
					alert('AJAX Error!');
					return false;
				}

				if ( parsedResponse.state == 'closeDemo' ) {
					$('#shopkit-demo-progress-bar').css({'width':'100%'}).html('100%');
					alert(shopkit.locale.demo_complete);
					location.reload();
				}

			});

		}

	}

	function setStatus(msg) {
		$('#shopkit-demo-status').html(msg);
	}

	function setDemoImageProgress(next) {
		var currentState = 5+(Math.floor(parseInt(next)/21*8));
		$('#shopkit-demo-progress-bar').css({'width':currentState+'%'}).html(currentState+'%');
	}

	function setDemoProgress(demoSections) {
		switch(demoSections) {
			case 6:
				$('#shopkit-demo-progress-bar').css({'width':'2%'}).html('2%');
			break;
			case 5:
				$('#shopkit-demo-progress-bar').css({'width':'5%'}).html('5%');
			break;
			case 4:
				$('#shopkit-demo-progress-bar').css({'width':'85%'}).html('85%');
			break;
			case 3:
				$('#shopkit-demo-progress-bar').css({'width':'90%'}).html('85%');
			break;
			case 2:
				$('#shopkit-demo-progress-bar').css({'width':'95%'}).html('90%');
			break;
			case 1:
				$('#shopkit-demo-progress-bar').css({'width':'97%'}).html('95%');
			break;
			case 0:
				$('#shopkit-demo-progress-bar').css({'width':'99%'}).html('97%');
			break;
			default:
				$('#shopkit-demo-progress-bar').css({'width':'99%'}).html('99%');
			break;
		}
	}

	function call_ajax(data) {

		data['action'] = 'shopkit_demo_install';
		data['_shopkit_nonce'] = shopkit.nonce;

		return $.post(shopkit.ajax, data, function(response) {

		});

	}

	$('#section_elements .option-tree-setting-title').prop('disabled', true);

	$('form').bind('submit', function () {
		$(this).find('#section_elements .option-tree-setting-title').prop('disabled', false);
	});

	$('#shopkit_demo_install').prop('disabled', true);

})(jQuery);