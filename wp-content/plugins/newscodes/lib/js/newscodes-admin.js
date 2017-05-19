;(function(e){e.fn.nc_marquee=function(t){return this.each(function(){var n=e.extend({},e.fn.nc_marquee.defaults,t),r=e(this),i,s,o,u,a,f=3,l="animation-play-state",c=false,h=function(e,t,n){var r=["webkit","moz","MS","o",""];for(var i=0;i<r.length;i++){if(!r[i])t=t.toLowerCase();e.addEventListener(r[i]+t,n,false)}},p=function(e){var t=[];for(var n in e){if(e.hasOwnProperty(n)){t.push(n+":"+e[n])}}t.push();return"{"+t.join(",")+"}"},d=function(){r.timer=setTimeout(M,n.delayBeforeStart)},v={pause:function(){if(c&&n.allowCss3Support){i.css(l,"paused")}else{if(e.fn.pause){i.pause()}}r.data("runningStatus","paused");r.trigger("paused")},resume:function(){if(c&&n.allowCss3Support){i.css(l,"running")}else{if(e.fn.resume){i.resume()}}r.data("runningStatus","resumed");r.trigger("resumed")},toggle:function(){v[r.data("runningStatus")=="resumed"?"pause":"resume"]()},destroy:function(){clearTimeout(r.timer);r.find("*").andSelf().unbind();r.html(r.find(".js-marquee:first").html())}};if(typeof t==="string"){if(e.isFunction(v[t])){if(!i){i=r.find(".js-marquee-wrapper")}if(r.data("css3AnimationIsSupported")===true){c=true}v[t]()}return}var m={},g;e.each(n,function(e,t){g=r.attr("data-"+e);if(typeof g!=="undefined"){switch(g){case"true":g=true;break;case"false":g=false;break}n[e]=g}});n.duration=n.speed||n.duration;u=n.direction=="up"||n.direction=="down";n.gap=n.duplicated?parseInt(n.gap):0;r.wrapInner('<div class="js-marquee"></div>');var y=r.find(".js-marquee").css({"margin-right":n.gap,"float":"left"});if(n.duplicated){y.clone(true).appendTo(r)}r.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');i=r.find(".js-marquee-wrapper");if(u){var b=r.height();i.removeAttr("style");r.height(b);r.find(".js-marquee").css({"float":"none","margin-bottom":n.gap,"margin-right":0});if(n.duplicated)r.find(".js-marquee:last").css({"margin-bottom":0});var w=r.find(".js-marquee:first").height()+n.gap;n.duration=(parseInt(w,10)+parseInt(b,10))/parseInt(b,10)*n.duration}else{a=r.find(".js-marquee:first").width()+n.gap;s=r.width();n.duration=(parseInt(a,10)+parseInt(s,10))/parseInt(s,10)*n.duration}if(n.duplicated){n.duration=n.duration/2}if(n.allowCss3Support){var E=document.body||document.createElement("div"),S="marqueeAnimation-"+Math.floor(Math.random()*1e7),x="Webkit Moz O ms Khtml".split(" "),T="animation",N="",C="";if(E.style.animation){C="@keyframes "+S+" ";c=true}if(c===false){for(var k=0;k<x.length;k++){if(E.style[x[k]+"AnimationName"]!==undefined){var L="-"+x[k].toLowerCase()+"-";T=L+T;l=L+l;C="@"+L+"keyframes "+S+" ";c=true;break}}}if(c){N=S+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s infinite "+n.css3easing;r.data("css3AnimationIsSupported",true)}}var A=function(){i.css("margin-top",n.direction=="up"?b+"px":"-"+w+"px")},O=function(){i.css("margin-left",n.direction=="left"?s+"px":"-"+a+"px")};if(n.duplicated){if(u){i.css("margin-top",n.direction=="up"?b:"-"+(w*2-n.gap)+"px")}else{i.css("margin-left",n.direction=="left"?s+"px":"-"+(a*2-n.gap)+"px")}f=1}else{if(u){A()}else{O()}}var M=function(){if(n.duplicated){if(f===1){n._originalDuration=n.duration;if(u){n.duration=n.direction=="up"?n.duration+b/(w/n.duration):n.duration*2}else{n.duration=n.direction=="left"?n.duration+s/(a/n.duration):n.duration*2}if(N){N=S+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s "+n.css3easing}f++}else if(f===2){n.duration=n._originalDuration;if(N){S=S+"0";C=e.trim(C)+"0 ";N=S+" "+n.duration/1e3+"s 0s infinite "+n.css3easing}f++}}if(u){if(n.duplicated){if(f>2){i.css("margin-top",n.direction=="up"?0:"-"+w+"px")}o={"margin-top":n.direction=="up"?"-"+w+"px":0}}else{A();o={"margin-top":n.direction=="up"?"-"+i.height()+"px":b+"px"}}}else{if(n.duplicated){if(f>2){i.css("margin-left",n.direction=="left"?0:"-"+a+"px")}o={"margin-left":n.direction=="left"?"-"+a+"px":0}}else{O();o={"margin-left":n.direction=="left"?"-"+a+"px":s+"px"}}}r.trigger("beforeStarting");if(c){i.css(T,N);var t=C+" { 100%  "+p(o)+"}",l=e("style");if(l.length!==0){l.filter(":last").append(t)}else{e("head").append("<style>"+t+"</style>")}h(i[0],"AnimationIteration",function(){r.trigger("finished")});h(i[0],"AnimationEnd",function(){M();r.trigger("finished")})}else{i.animate(o,n.duration,n.easing,function(){r.trigger("finished");if(n.pauseOnCycle){d()}else{M()}})}r.data("runningStatus","resumed")};r.bind("pause",v.pause);r.bind("resume",v.resume);if(n.pauseOnHover){r.bind("mouseenter mouseleave",v.toggle)}if(c&&n.allowCss3Support){M()}else{d()}})};e.fn.nc_marquee.defaults={allowCss3Support:true,css3easing:"linear",easing:"linear",delayBeforeStart:1e3,direction:"left",duplicated:false,duration:5e3,gap:20,pauseOnCycle:false,pauseOnHover:false}})(jQuery);
(function($){
	$.fn.nc_ticker = function(options) {
		var defaults = {
			speed: 700,
			pause: 4000,
			showItems: 3,
			animation: '',
			mousePause: true,
			isPaused: false,
			direction: 'up',
			height: 0
		};
	
		var options = $.extend(defaults, options);
	
		moveUp = function(obj2, height, options){
			if(options.isPaused)
				return;
			
			var obj = obj2.children('ul.newscodes-wrap');
			
			var clone = obj.children('li:first').clone(true);
			
			if(options.height > 0)
			{
				height = obj.children('li:first').height();
			}		
			
			obj.animate({top: '-=' + height + 'px'}, options.speed, function() {
				$(this).children('li:first').remove();
				$(this).css('top', '0px');
			});
			
			if(options.animation == 'fade')
			{
				obj.children('li:first').fadeOut(options.speed);
				if(options.height == 0)
				{
				obj.children('li:eq(' + options.showItems + ')').hide().fadeIn(options.speed).show();
				}
			}
	
			clone.appendTo(obj);
		};
		
		moveDown = function(obj2, height, options){
			if(options.isPaused)
				return;
			
			var obj = obj2.children('ul.newscodes-wrap');
			
			var clone = obj.children('li:last').clone(true);
			
			if(options.height > 0)
			{
				height = obj.children('li:first').height();
			}
			
			obj.css('top', '-' + height + 'px')
				.prepend(clone);
				
			obj.animate({top: 0}, options.speed, function() {
				$(this).children('li:last').remove();
			});
			
			if(options.animation == 'fade')
			{
				if(options.height == 0)
				{
					obj.children('li:eq(' + options.showItems + ')').fadeOut(options.speed);
				}
				obj.children('li:first').hide().fadeIn(options.speed).show();
			}
		};
		
		return this.each(function() {
			var obj = $(this);
			var maxHeight = 0;
	
			obj.css({overflow: 'hidden', position: 'relative'})
				.children('ul.newscodes-wrap').css({position: 'absolute', margin: 0, padding: 0, width: '100%'})
				.children('li').css({margin: 0, padding: 0});
	
			if(options.height == 0)
			{
				obj.children('ul.newscodes-wrap').children('li').each(function(){
					if($(this).height() > maxHeight)
					{
						maxHeight = $(this).height()+50;
					}
				});
	
				obj.children('ul.newscodes-wrap').children('li').each(function(){
					$(this).height(maxHeight);
				});
	
				obj.height(maxHeight * options.showItems );
	
			}
			else
			{
				obj.height(options.height);
			}
	
			var interval = setInterval(function(){ 
				var currMaxHeight = maxHeight;
				if(options.direction == 'up')
				{ 
					moveUp(obj, currMaxHeight, options); 
				}
				else
				{ 
					moveDown(obj, currMaxHeight, options); 
				} 
			}, options.pause);
			
			if(options.mousePause)
			{
				obj.bind("mouseenter",function(){
					options.isPaused = true;
				}).bind("mouseleave",function(){
					options.isPaused = false;
				});
			}
		});
	};

	"use strict";

	String.prototype.nc_escape_chars = function() {
		return this.replace(/\\n/g, "\\n")
			.replace(/\\'/g, "\\'")
			.replace(/\\"/g, '\\"')
			.replace(/\\&/g, "\\&")
			.replace(/\\r/g, "\\r")
			.replace(/\\t/g, "\\t")
			.replace(/\\b/g, "\\b")
			.replace(/\\f/g, "\\f");
	};

	$.fn.selectWithText = function selectWithText(targetText) {
		return this.each(function () {
			var $selectElement, $options, $targetOption;

			$selectElement = $(this);
			$options = $selectElement.find('option');
			$targetOption = $options.filter(
				function () {return $(this).text() == targetText}
			);

			if ($targetOption) {
				return $targetOption;
			}
		});
	}


	var nc_loading = 'notactive';

	function nc_ajax( settings ) {

		var data = {
			action: 'nc_admin_ajax_factory',
			nc_settings: settings
		}

		return $.post(nc.ajax, data, function(response) {
			if (response) {
				nc_loading = 'notactive';
			}
			else {
				alert('Error!');
				nc_loading = 'notactive';
			}

		});

	}

	function nc_get_control( control, type ) {

		if ( type == 'typography' ) {

			return {
				'font-color' : $('[name="'+control+'[font-color]"]').val(),
				'font-family' : $('[name="'+control+'[font-family]"]').val(),
				'font-size' : $('[name="'+control+'[font-size]"]').val(),
				'font-style' : $('[name="'+control+'[font-style]"]').val(),
				'font-variant' : $('[name="'+control+'[font-variant]"]').val(),
				'font-weight' : $('[name="'+control+'[font-weight]"]').val(),
				'letter-spacing' : $('[name="'+control+'[letter-spacing]"]').val(),
				'line-height' : $('[name="'+control+'[line-height]"]').val(),
				'text-decoration' : $('[name="'+control+'[text-decoration]"]').val(),
				'text-transform' : $('[name="'+control+'[text-transform]"]').val(),
				'text-align' : $('[name="'+control+'[text-align]"]').val()
			};

		}

	}

	function nc_get_style( styleName ) {
		return {
			'name' : styleName,
			'nc_heading': nc_get_control( 'nc_heading', 'typography'),
			'nc_heading_hover': $('#nc_heading_hover').val(),
			'nc_meta': nc_get_control( 'nc_meta', 'typography'),
			'nc_meta_background': $('#nc_meta_background').val(),
			'nc_excerpt': nc_get_control( 'nc_excerpt', 'typography'),
			'nc_taxonomy_color': $('#nc_taxonomy_color').val(),
			'nc_taxonomy_background': $('#nc_taxonomy_background').val(),
			'nc_navigation': nc_get_control( 'nc_navigation', 'typography'),
			'nc_navigation_hover': $('#nc_navigation_hover').val(),
			'nc_navigation_style': $('#nc_navigation_style').val(),
			'nc_tabs': nc_get_control( 'nc_tabs', 'typography'),
			'nc_tabs_hover': $('#nc_tabs_hover').val(),
			'nc_tabs_style': $('#nc_tabs_style').val(),
			'nc_format_standard': $('#nc_format_standard').val(),
			'nc_format_aside': $('#nc_format_aside').val(),
			'nc_format_chat': $('#nc_format_chat').val(),
			'nc_format_gallery': $('#nc_format_gallery').val(),
			'nc_format_link': $('#nc_format_link').val(),
			'nc_format_image': $('#nc_format_image').val(),
			'nc_format_quote': $('#nc_format_quote').val(),
			'nc_format_status': $('#nc_format_status').val(),
			'nc_format_video': $('#nc_format_video').val(),
			'nc_format_audio': $('#nc_format_audio').val(),
			'nc_tabs_padding': $('#nc_tabs_padding').val(),
			'nc_image_padding': $('#nc_image_padding').val(),
			'nc_meta_padding': $('#nc_meta_padding').val(),
			'nc_heading_padding': $('#nc_heading_padding').val(),
			'nc_excerpt_padding': $('#nc_excerpt_padding').val(),
			'nc_pagination_padding': $('#nc_pagination_padding').val()
		}
	}

	$(document).on('click', '#nc-create-style', function() {

		var groupName = $('#newscodes-groups').val();

		if ($('#newscodes-styles').find('option[data-group="'+groupName+'"]').length>9) {
			alert( 'Group can have up to 10 styles! Please create a new group!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var settings = {
			'type' : 'new'
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('body').append($(response));

			$('#nc-preview-style').trigger('click');

			$('.hide-color-picker').each(function(){
				$(this).wpColorPicker({
					defaultColor: true,
					hide: true
				});
			});

		});

		return false;

	});

	$(document).on('click', '#nc-edit-style', function() {

		var styleName = $('#newscodes-styles').val();
		var groupName = $('#newscodes-groups').val();
		var groupDefault = $('#newscodes-groups').find('option[value="'+groupName+'"]').attr('data-type');

		if ( groupName == '' ) {
			alert( 'Group not selected!' );
			return false;
		}

		if ( styleName == '' ) {
			alert( 'Style not selected!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var settings = {
			'type' : 'edit',
			'style' : styleName,
			'group' : groupName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('body').append($(response));

			$('#nc_name').prop('disabled',true);
			$('#nc_name').attr('disabled','disabled');

			$('.hide-color-picker').each(function(){
				$(this).wpColorPicker({
					defaultColor: true,
					hide: true
				});
			});

			if ( groupDefault == 'default' ) {
				$('#nc-save-style').hide();
				$('#nc-save-style-side').hide();
			}

			$('#nc-preview-style').trigger('click');

		});

		return false;

	});

	$(document).on('click', '#nc-discard-style', function() {

		$('#newscodes-edit').remove();

		return false;

	});

	$(document).on('click', '#nc-generator-discard', function() {
		
		$('#newscodes-shortcode-generator').remove();
		
		return false;
		
	});

	$(document).on('click', '#nc-save-style', function() {

		var styleName = $('#nc_name').val();
		var groupName = $('#newscodes-groups').val();

		if ($('#newscodes-styles').find('option[data-group="'+groupName+'"]').length>9) {
			alert( 'Group can have up to 10 styles! Please create a new group!' );
			return false;
		}

		if ( groupName == '' ) {
			alert( 'Group not selected!' );
			return false;
		}

		if ( styleName == '' ) {
			alert( 'Name not set!' );
			return false;
		}

		var hasName = $('#newscodes-styles option[value="'+ styleName.replace(/\s+/g, '-').toLowerCase()+'"]');

		if (hasName.length>0) {
			if ( !confirm ('Style class already exists! Overwrite?') ) {
				alert('Style class already exists! Try another name!');
				return false;
			}
		}

		if ( $('#nc_name').prop('disabled') === false ) {
			$('#nc_name').prop('disabled', true);
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'save',
			'name' : styleName,
			'group' : groupName,
			'style' : nc_get_style(styleName)
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var setReturn = $.parseJSON(response);

			if ($('#newscodes-styles').find('option[value=""]').length==1) {
				$('#newscodes-styles').find('option[value=""]').hide();
			}
			if ($('#newscodes-styles').find('option[value="'+setReturn.slug+'"]').length==0) {
				$('#newscodes-styles').append($('<option value="'+setReturn.slug+'" data-group="'+groupName+'">'+setReturn.name+'</option>'));
				$('#newscodes-styles').find('option[value="'+setReturn.slug+'"]').prop('selected',true).attr('selected',true);
			}

			wrap.removeClass('nc-loading');
			alert('Saved!');

		});

		return false;

	});

	$(document).on('click', '#nc-save-as-style', function() {

		var groupName = $('#nc-choose-group').val();

		if ( groupName == '' ) {
			alert( 'Group not selected!' );
			return false;
		}

		if ($('#newscodes-styles').find('option[data-group="'+groupName+'"]').length>9) {
			alert( 'Group can have a maximum od 10 styles!' );
			return false;
		}

		var styleName = prompt('New name');

		if ( styleName === null ) {
			return false;
		}

		if ( styleName == '' ) {
			alert( 'Name not set!' );
			return false;
		}

		var hasName = $('#newscodes-styles option[value="'+ styleName.replace(/\s+/g, '-').toLowerCase()+'"]');

		if (hasName.length>0) {
			if ( !confirm ('Style class already exists! Overwrite?') ) {
				alert('Style class already exists! Try another name!');
				return false;
			}
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'save',
			'name' : styleName,
			'group' : groupName,
			'style' : nc_get_style(styleName)
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var setReturn = $.parseJSON(response);

			if ($('#newscodes-styles').find('option[value=""]').length==1) {
				$('#newscodes-styles').find('option[value=""]').hide();
			}
			if ($('#newscodes-styles').find('option[value="'+setReturn.slug+'"]').length==0) {
				$('#newscodes-styles').append($('<option value="'+setReturn.slug+'" data-group="'+groupName+'">'+setReturn.name+'</option>'));
			}

			wrap.removeClass('nc-loading');
			alert('Saved!');

		});

		return false;

	});

	$(document).on('click', '#nc-delete-style', function() {

		var styleName = $('#newscodes-styles').val();
		var groupName = $('#newscodes-groups').val();

		if ( groupName == '' ) {
			alert( 'Group not selected!' );
			return false;
		}

		if ( groupName == 'default' ) {
			alert( 'Default styles cannot be deleted!' );
			return false;
		}

		if ( styleName == '' ) {
			alert( 'Style not selected!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'delete',
			'slug' : styleName,
			'group' : groupName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('#newscodes-styles option[value="'+styleName+'"]').remove();

			if ( $('#newscodes-styles option[data-group="'+groupName+'"]').length == 0 ) {
				$('#newscodes-styles').find('option[value=""]').show();
			}
			else {
				$('#newscodes-styles').find('option[data-group="'+groupName+'"]:first').prop('selected',true).attr('selected',true);
			}

			wrap.removeClass('nc-loading');
			alert('Deleted!');

		});

		return false;

	});

	$(document).on('click', '#nc-preview-style', function() {

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'preview',
			'name' : 'preview',
			'preview' : $('#nc-preview-type').val(),
			'style' : nc_get_style('preview')
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			wrap.removeClass('nc-loading');

			$('#newscodes-preview').html($(response));

			if ( $('#nc-preview-background:checked').length>0 ) {
				$('.newscodes-preview-inner').css('background-color', '#040404');
				$('#newscodes-preview').css('background-color', '#111');
			}
			else {
				$('#newscodes-preview,.newscodes-preview-inner').removeAttr('style');
			}

		});

		return false;

	});

	$(document).on('click', '#nc-create-group', function() {

		var groupName = prompt('Group name');

		if ( groupName === null ) {
			return false;
		}

		if ( groupName == '' ) {
			alert( 'Name not set!' );
			return false;
		}

		if ($('#newscodes-groups').find('option[value="'+groupName+'"]').length>0) {
			alert( )
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'group',
			'name' : groupName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var setReturn = $.parseJSON(response);

			if ($('#newscodes-groups').find('option[value=""]:visible').length==1) {
				$('#newscodes-groups').find('option[value=""]').hide();
				if ($('#newscodes-groups').find('option[value="'+setReturn.group+'"]').length==0) {
					$('#newscodes-groups').append($('<option value="'+setReturn.group+'">'+setReturn.name+'</option>'));
				}
			}
			else {
				if ($('#newscodes-groups').find('option[value="'+setReturn.group+'"]').length==0) {
					$('#newscodes-groups').append($('<option value="'+setReturn.group+'">'+setReturn.name+'</option>'));
				}
			}

			wrap.removeClass('nc-loading');
			alert('Created!');

		});

		return false;

	});

	$(document).on('click', '#nc-delete-group', function() {

		var groupName = $('#newscodes-groups').val();
		var groupType = $('#newscodes-groups').find('option[value="'+groupName+'"]').attr('data-type');

		if ( groupName == '' ) {
			alert( 'Group not selected!' );
			return false;
		}

		if ( groupType == 'default' ) {
			alert( 'Default groups cannot be deleted!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-style-editor');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'delete_group',
			'slug' : groupName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('#newscodes-groups option[value="'+groupName+'"]').remove();

			$('#newscodes-styles option').hide();
			$('#newscodes-styles option[data-group="'+$('#newscodes-groups').val()+'"]:first').prop('selected',true).attr('selected',true);
			$('#newscodes-styles option[data-group="'+$('#newscodes-groups').val()+'"]').show();

			wrap.removeClass('nc-loading');
			alert('Deleted!');

		});

		return false;

	});


/*
	$(document).on('click', 'span.newscodes-edit-close', function() {
		$('#newscodes-edit').remove();
	});
*/

	$(document).on('click', '#newscodes-preview, #newscodes-generator-preview, #newscodes-generator-preview *, #newscodes-preview *', function() {
		return false;
	});

	$(document).on('click', '#nc-save-style-side', function() {
		$('#nc-save-style').trigger('click');
	});

	$(document).on('click', '#nc-save-as-style-side', function() {
		$('#nc-save-as-style').trigger('click');
	});

	$(document).on('click', '#nc-discard-style-side', function() {
		$('#nc-discard-style').trigger('click');
	});

	$(document).on('click', '#nc-preview-style-side', function() {
		$('#nc-preview-style').trigger('click');
	});

	$(document).on('change', '#newscodes-groups', function() {
		var group = $(this).val();

		$('#newscodes-styles').find('option').hide();

		if ( $('#newscodes-styles').find('option[data-group="'+group+'"]').length == 0 ) {
			$('#newscodes-styles').find('option[value=""]').show().prop('selected',true).attr('selected',true);
		}
		else {
			$('#newscodes-styles').find('option[data-group="'+group+'"]').show();
			$('#newscodes-styles').find('option[data-group="'+group+'"]:first').prop('selected',true).attr('selected',true);
		}

	});

	$('#newscodes-groups').find('option:first').prop('selected',true).attr('selected',true);
	$('#newscodes-groups').trigger('change');

	$(document).on('click', '#nc-purcashe-code-remove', function() {

		if ( confirm('Delete purchase key?') === false ) {
			return;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#register');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'purchase_code_remove'
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			wrap.removeClass('nc-loading');

			var back = $.parseJSON( response );

			var inside = wrap.find('.inside');
			inside.fadeOut(200, function() {
				inside.html(back.html).fadeIn(200, function() {
					alert(back.msg);
				});
			});

		});

		return false;

	});

	$(document).on('click', '#nc-purcashe-code', function() {

		var purchaseCode = $('#newscodes-purchase-code').val();

		if ( purchaseCode == '' ) {
			alert( 'Please enter your purchase code!' );
			return false;
		}


		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#register');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'purchase_code',
			'purchase_code' : purchaseCode
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var back = $.parseJSON( response );

			if (typeof back.error == 'undefined') {
				wrap.removeClass('nc-loading');
				var inside = wrap.find('.inside');
				inside.fadeOut(200, function() {
					inside.html(back.html).fadeIn(200, function() {
						alert(back.msg);
					});
				});
			}
			else {
				alert(back.error);
			}



		});

		return false;

	});


	$(document).on( 'click', '#nc-update-optimizations', function() {

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#register');

		wrap.addClass('nc-loading');

		var css = $('#nc-css-optimize').val();

		var settings = {
			'type' : 'update_optimizations',
			'css' : css != null ? css : []
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var back = $.parseJSON( response );

			wrap.removeClass('nc-loading');

			alert( back.msg );

		});

		return false;

	});

	var sc_parameters = {};
	$(document).on('click', '#nc-generator-preview', function() {

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#nc-generator-preview');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'generator_preview',
			'name' : 'preview',
			'atts' : sc_parameters,
			'style' : $('#nc_style option:selected').val(),
			'group' : $('#nc_style option:selected').attr('data-group')
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			wrap.removeClass('nc-loading');

			$('#newscodes-generator-preview').html($(response));

			check_elements();

			if ( $('#nc-generator-preview').hasClass('nc-not-updated') ) {
				$('#nc-generator-preview').removeClass('nc-not-updated');
			}
			if ( $('#nc-generator-background:checked').length>0 ) {
				$('#newscodes-generator-preview').css('background-color', '#111');
			}
			else {
				$('#newscodes-generator-preview').removeAttr('style');
			}

		});

		return false;

	});

	function check_elements() {

		$('.newscodes.nc-type-news-marquee').each( function() {

			var el = $(this);

			el.find('.newscodes-wrap').nc_marquee({
				duration: 10000,
				delayBeforeStart: 0,
				duplicated: true,
				pauseOnHover: true,
				direction: $('#nc_marquee_direction').val()
			});
		});

		$('.newscodes.nc-type-news-ticker-tiny, .newscodes.nc-type-news-ticker, .newscodes.nc-type-news-ticker-compact').each( function() {

			var el = $(this);

			el.nc_ticker({
				showItems:$('#nc_ticker_visible').val(),
				direction:$('#nc_ticker_direction').val(),
				'animation':'fade'
			});

		});

		$('.nc-type-news-one-tabbed-posts .nc-figure-wrapper').on('mouseover', function(){

			var wrap = $(this).closest('ul');
			var el = $(this).closest('li');

			if (el.hasClass('nc-active')){
				return false;
			}

			wrap.find('li.nc-active .nc-tabbed-post').stop(true).fadeOut(150, function(){

				wrap.find('li.nc-active').removeClass('nc-active');

				el.addClass('nc-active').find('.nc-tabbed-post').stop(true).fadeIn(150, function(){
				});

			});

		});

	}

	$(document).on('click', '#nc-generator', function() {

		sc_parameters = {};

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var settings = {
			'type' : 'generator'
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('body').append($(response));

			$('#nc-generator-preview').trigger('click');

		});

		return false;

	});

	nc.sc_defaults;

	function sc_generate() {

		var obj = $('.nc-generator-editor').find('.newscodes-ui-checkbox, .newscodes-ui-input, .newscodes-ui-textarea, .newscodes-ui-select');
		var objLength = obj.length;

		obj.each( function() {
			var key = $(this).attr('name');
			var value = ( $(this).hasClass('newscodes-ui-checkbox' ) ? ( $(this).is(':checked') ? 'true' : 'false' ) : $(this).val() );

			if ( typeof nc.sc_defaults[key] !== 'undefined' ) {
				if ( nc.sc_defaults[key] != value ) {
					sc_parameters[key] = value;
				}
				else {
					if ( typeof sc_parameters[key] !== 'undefined' ) {
						delete sc_parameters[key];
					}
				}
			}

			if ( !--objLength ) {
				var filters = $('#nc-filter-manager-json').val();

				if ( filters !== '' ) {
					try {
						filters = $.parseJSON(filters);
					} catch (e) {
						filters = {};
					}
					if ( !$.isEmptyObject(filters) ) {

						var sc_filters = { 'filters': '', 'filter_terms': '', 'count': 0 };
						var sc_metas = { 'meta_keys': '', 'meta_values': '', 'meta_compares':'', 'meta_types':'', 'count': 0 };
						var filtersLength = filters.length;

						$.each( filters, function(n,v) {
							if ( v['type'] == 'taxonomy' ) {
								if ( sc_filters['count'] !== 0 ) {
									sc_filters['filters'] += '|';
									sc_filters['filter_terms'] += '|';
								}
								sc_filters['filters'] += v['taxonomy'];
								sc_filters['filter_terms'] += v['term'];
								sc_filters['count']++;
							}
							if ( v['type'] == 'meta' ) {
								if ( sc_metas['count'] !== 0 ) {
									sc_metas['meta_keys'] += '|';
									sc_metas['meta_values'] += '|';
									sc_metas['meta_compares'] += '|';
									sc_metas['meta_types'] += '|';
								}
								sc_metas['meta_keys'] += v['meta_key'];
								sc_metas['meta_values'] += v['meta_value'];
								sc_metas['meta_compares'] += v['meta_compare'];
								sc_metas['meta_types'] += v['meta_type'];
								sc_metas['count']++;
							}

							if ( !--filtersLength ) {
								if ( sc_filters['filters'] !== '' ) {
									sc_parameters['filters'] = sc_filters['filters'];
									sc_parameters['filter_terms'] = sc_filters['filter_terms'];
								}
								else {
									var check = [ 'filters', 'filter_terms' ];
									$.each( check, function(i,b) {
										if ( typeof sc_parameters[b] !== 'undefined' ) {
											delete sc_parameters[b];
										}
									});
								}
								if ( sc_metas['meta_keys'] !== '' ) {
									sc_parameters['meta_keys'] = sc_metas['meta_keys'];
									sc_parameters['meta_values'] = sc_metas['meta_values'];
									sc_parameters['meta_compares'] = sc_metas['meta_compares'];
									sc_parameters['meta_types'] = sc_metas['meta_types'];
								}
								else {
									var check = [ 'meta_keys', 'meta_values', 'meta_compares', 'meta_types' ];
									$.each( check, function(i,b) {
										if ( typeof sc_parameters[b] !== 'undefined' ) {
											delete sc_parameters[b];
										}
									});
								}
							}

						});
					}
				}
				else {
					var check = [ 'filters', 'filter_terms', 'meta_keys', 'meta_values', 'meta_compares', 'meta_types' ];
					$.each( check, function(i,b) {
						if ( typeof sc_parameters[b] !== 'undefined' ) {
							delete sc_parameters[b];
						}
					});
				}

				if ( !$.isEmptyObject(sc_parameters) ) {
					var generatedParameters = '[nc_factory';
					$.each( sc_parameters, function(k,v) {
						generatedParameters += ' '+k+'="'+v+'"';
					});
					generatedParameters += ']';
					$('#nc-generated-shortcode').html(generatedParameters);
				}
				else {
					$('#nc-generated-shortcode').html('[nc_factory]');
				}
				if ( !$('#nc-generator-preview').hasClass('nc-not-updated') ) {
					$('#nc-generator-preview').addClass('nc-not-updated');
				}
			}

		});
	}
	
	$(document).on( 'change', '.nc-filter-settings-collect', function() {
		if ( !$('#nc-update-filters').hasClass('nc-not-updated') ) {
			$('#nc-update-filters').addClass('nc-not-updated');
		}
	});

	$(document).on( 'change', '.newscodes-ui-checkbox, .newscodes-ui-input, .newscodes-ui-textarea, .newscodes-ui-select', function() {
		sc_generate();
	});

	function nc_do_filters_update() {

		var filters = $('#nc-composer-filters-wrap');

		var filterSettings = {};

		var paramFilters = '';
		var paramFilterTerms = '';

		var paramMetaKeys = '';
		var paramMetaValues = '';
		var paramMetaCompares = '';
		var paramMetaTypes = '';

		var counter = filters.find('.nc-composer-filter').length;

		var im = 0;
		var it = 0;

		filters.find('.nc-composer-filter').each(function(i, element) {

			var el = $(this);
			var hasError = false;

			filterSettings[i] = {};

			filterSettings[i]['type'] = el.find('.nc-type').val();

			if (filterSettings[i]['type']=='meta') {
				filterSettings[i]['meta_key'] = el.find('.type_meta[data-param="meta_key"]').val();
				if (!filterSettings[i]['meta_key']){
					hasError = true;
				}
				else {
					paramMetaKeys += (im>0?'|'+filterSettings[i]['meta_key']:filterSettings[i]['meta_key']);
				}
				filterSettings[i]['meta_value'] = el.find('.type_meta[data-param="meta_value"]').val();
				if (!filterSettings[i]['meta_value']){
					hasError = true;
				}
				else {
					paramMetaValues += (im>0?'|'+filterSettings[i]['meta_value']:filterSettings[i]['meta_value']);
				}
				filterSettings[i]['meta_compare'] = el.find('.type_meta[data-param="meta_compare"]').val();
				if (!filterSettings[i]['meta_compare']){
					hasError = true;
				}
				else {
					paramMetaCompares += (im>0?'|'+filterSettings[i]['meta_compare']:filterSettings[i]['meta_compare']);
				}
				filterSettings[i]['meta_type'] = el.find('.type_meta[data-param="meta_type"]').val();
				if (!filterSettings[i]['meta_type']){
					hasError = true;
				}
				else {
					paramMetaTypes += (im>0?'|'+filterSettings[i]['meta_type']:filterSettings[i]['meta_type']);
				}
				im++;
			}
			else if (filterSettings[i]['type']=='taxonomy'){
				var postType = $('#nc_post_type').val();

				filterSettings[i]['taxonomy'] = el.find('.nc-taxonomy[data-param="post_type_'+postType+'"]').val();
				if (!filterSettings[i]['taxonomy']){
					hasError = true;
				}
				else {
					paramFilters += (it>0?'|'+filterSettings[i]['taxonomy']:filterSettings[i]['taxonomy']);
				}
				filterSettings[i]['term'] = el.find('.nc-taxonomy-terms[data-param="taxonomy_'+filterSettings[i]['taxonomy']+'"]').val();
				if (!filterSettings[i]['term']){
					hasError = true;
				}
				else {
					paramFilterTerms += (it>0?'|'+filterSettings[i]['term']:filterSettings[i]['term']);
				}
				it++;
			}

			if (!--counter) {

				if ( hasError === true ) {
					alert('Empty values are not allowed!');
				}
				else {
					var jsonSettings = JSON.stringify(filterSettings).nc_escape_chars();
					$('#nc-filter-manager-json').val(jsonSettings).attr('value',jsonSettings);

					alert('Filters updated!');
					if ( $('#nc-update-filters').hasClass('nc-not-updated') ) {
						$('#nc-update-filters').removeClass('nc-not-updated');
					}
				}

			}

		});

	}

	$(document).on('click', '#nc-add-filter', function() {

		var filterWrap = $('#nc-composer-filters-wrap');
		var defaults = $('#nc-composer-filters-default').html();

		var html = $('<div class="nc-composer-filter">'+defaults+'</div>');

		filterWrap.append(html);

		var filter = filterWrap.find('.nc-composer-filter:last');

		filter.find('.nc-filter-settings-collect').hide();

		filter.find('.nc-type').show().find('option:first').prop('selected',true).attr('selected',true);
		filter.find('[data-param="post_type"]').show();

		var value = $('#nc_post_type').val();

		filter.find('.nc-taxonomy[data-param="post_type_'+value+'"]').show();

		if ( !$('#nc-update-filters').hasClass('nc-not-updated') ) {
			$('#nc-update-filters').addClass('nc-not-updated');
		}

	});

	$(document).on('click', '#nc-remove-filter', function() {
		$(this).closest('.nc-composer-filter').remove();
		$('#nc-update-filters').trigger('click');
	});

	$(document).on('click', '#nc-update-filters', function() {
		var activeFilters = $('#nc-composer-filters-wrap .nc-composer-filter').length;

		if ( activeFilters == 0 ) {
			$('#nc-filter-manager-json').val('').attr('value','');
			alert('Filters updated!');
		}

		nc_do_filters_update();
		sc_generate();

	});

	$(document).on('change', '.nc-type', function() {

		var filter = $(this).closest('.nc-composer-filter');

		filter.find('.nc-filter-settings-collect:not(.nc-type)').hide();
		filter.find('select:not(.nc-type),input').val();
		filter.find('input').attr('value', '');
		filter.find('select:not(.nc-type) option').prop('selected', false);

		var type = filter.find('.nc-type').val();

		if (type=='meta') {
			filter.find('.type_meta').show();
		}
		else if (type='taxonomy') {
			var value = $('#nc_post_type').val();
			filter.find('.nc-type').show();
			filter.find('.nc-taxonomy[data-param="post_type_'+value+'"]').show();
		}

	});


	$(document).on('change', '.nc-taxonomy', function() {

		var filter = $(this).closest('.nc-composer-filter');

		var value = $(this).val();

		filter.find('.nc-taxonomy-terms').hide();

		if (value!=''){
			filter.find('.nc-taxonomy-terms[data-param="taxonomy_'+value+'"]').show();
		}

	});

	$(document).on('click', '#nc-generator-save, #nc-generator-save-as', function() {

		if ( $.isEmptyObject(sc_parameters) ) {
			alert( 'Shortcode parameters are empty!' );
			return false;
		}

		if ( $(this).attr('id') == 'nc-generator-save' && $('#nc-generated-short').length > 0 ) {
			var shortcodeName = $('#nc-generated-short').attr('data-shortcode');
		}
		else {
			var shortcodeName = prompt('New name');

			if ( shortcodeName === null ) {
				return false;
			}

			if ( shortcodeName == '' ) {
				alert( 'Name not set!' );
				return false;
			}

			var hasName = $('#newscodes-shortcodes option[value="'+ shortcodeName.replace(/\s+/g, '-').toLowerCase()+'"]');

			if (hasName.length>0) {
				if ( !confirm ('Shortcode already exists! Overwrite?') ) {
					alert('Shortcode already exists! Try another name!');
					return false;
				}
			}

		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#newscodes-inner-controls');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'generator_save',
			'name' : shortcodeName,
			'parameters' : sc_parameters
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			var setReturn = $.parseJSON(response);

			if ($('#newscodes-shortcodes').find('option[value=""]').length==1) {
				$('#newscodes-shortcodes').find('option[value=""]').hide();
			}
			if ($('#newscodes-shortcodes').find('option[value="'+setReturn.slug+'"]').length==0) {
				$('#newscodes-shortcodes').append($('<option value="'+setReturn.slug+'">'+setReturn.name+'</option>'));
			}

			if ( $('#nc-generated-short').length > 0 ) {
				$('#nc-generated-short').attr('data-shortcode', setReturn.slug).html('[newscodes id="'+setReturn.slug+'"]');
			}
			else {
				$('#nc-generator-save-as').after('<span><strong>Short Version</strong><code id="nc-generated-short" data-shortcode="tesing-yea">[newscodes id="'+setReturn.slug+'"]</code></span>');
			}

			wrap.removeClass('nc-loading');
			alert('Saved!');

		});

		return false;

	});

	$(document).on('click', '#nc-generator-delete', function() {

		var shortcodeName = $('#newscodes-shortcodes').val();

		if ( shortcodeName == '' ) {
			alert( 'Style not selected!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $('#generator');

		wrap.addClass('nc-loading');

		var settings = {
			'type' : 'generator_delete',
			'slug' : shortcodeName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('#newscodes-shortcodes option[value="'+shortcodeName+'"]').remove();

			wrap.removeClass('nc-loading');
			alert('Deleted!');

		});

		return false;

	});

	$(document).on('click', '#nc-generator-edit', function() {

		var shortcodeName = $('#newscodes-shortcodes').val();

		if ( shortcodeName == '' ) {
			alert( 'Shortcode not selected!' );
			return false;
		}

		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var settings = {
			'type' : 'generator_edit',
			'shortcode' : shortcodeName
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			$('body').append($(response));

			sc_generate();

			$('#nc-generator-preview').trigger('click');

		});

		return false;

	});

})(jQuery);