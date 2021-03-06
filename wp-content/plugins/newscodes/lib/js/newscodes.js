;(function(e){e.fn.nc_marquee=function(t){return this.each(function(){var n=e.extend({},e.fn.nc_marquee.defaults,t),r=e(this),i,s,o,u,a,f=3,l="animation-play-state",c=false,h=function(e,t,n){var r=["webkit","moz","MS","o",""];for(var i=0;i<r.length;i++){if(!r[i])t=t.toLowerCase();e.addEventListener(r[i]+t,n,false)}},p=function(e){var t=[];for(var n in e){if(e.hasOwnProperty(n)){t.push(n+":"+e[n])}}t.push();return"{"+t.join(",")+"}"},d=function(){r.timer=setTimeout(M,n.delayBeforeStart)},v={pause:function(){if(c&&n.allowCss3Support){i.css(l,"paused")}else{if(e.fn.pause){i.pause()}}r.data("runningStatus","paused");r.trigger("paused")},resume:function(){if(c&&n.allowCss3Support){i.css(l,"running")}else{if(e.fn.resume){i.resume()}}r.data("runningStatus","resumed");r.trigger("resumed")},toggle:function(){v[r.data("runningStatus")=="resumed"?"pause":"resume"]()},destroy:function(){clearTimeout(r.timer);r.find("*").andSelf().unbind();r.html(r.find(".js-marquee:first").html())}};if(typeof t==="string"){if(e.isFunction(v[t])){if(!i){i=r.find(".js-marquee-wrapper")}if(r.data("css3AnimationIsSupported")===true){c=true}v[t]()}return}var m={},g;e.each(n,function(e,t){g=r.attr("data-"+e);if(typeof g!=="undefined"){switch(g){case"true":g=true;break;case"false":g=false;break}n[e]=g}});n.duration=n.speed||n.duration;u=n.direction=="up"||n.direction=="down";n.gap=n.duplicated?parseInt(n.gap):0;r.wrapInner('<div class="js-marquee"></div>');var y=r.find(".js-marquee").css({"margin-right":n.gap,"float":"left"});if(n.duplicated){y.clone(true).appendTo(r)}r.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');i=r.find(".js-marquee-wrapper");if(u){var b=r.height();i.removeAttr("style");r.height(b);r.find(".js-marquee").css({"float":"none","margin-bottom":n.gap,"margin-right":0});if(n.duplicated)r.find(".js-marquee:last").css({"margin-bottom":0});var w=r.find(".js-marquee:first").height()+n.gap;n.duration=(parseInt(w,10)+parseInt(b,10))/parseInt(b,10)*n.duration}else{a=r.find(".js-marquee:first").width()+n.gap;s=r.width();n.duration=(parseInt(a,10)+parseInt(s,10))/parseInt(s,10)*n.duration}if(n.duplicated){n.duration=n.duration/2}if(n.allowCss3Support){var E=document.body||document.createElement("div"),S="marqueeAnimation-"+Math.floor(Math.random()*1e7),x="Webkit Moz O ms Khtml".split(" "),T="animation",N="",C="";if(E.style.animation){C="@keyframes "+S+" ";c=true}if(c===false){for(var k=0;k<x.length;k++){if(E.style[x[k]+"AnimationName"]!==undefined){var L="-"+x[k].toLowerCase()+"-";T=L+T;l=L+l;C="@"+L+"keyframes "+S+" ";c=true;break}}}if(c){N=S+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s infinite "+n.css3easing;r.data("css3AnimationIsSupported",true)}}var A=function(){i.css("margin-top",n.direction=="up"?b+"px":"-"+w+"px")},O=function(){i.css("margin-left",n.direction=="left"?s+"px":"-"+a+"px")};if(n.duplicated){if(u){i.css("margin-top",n.direction=="up"?b:"-"+(w*2-n.gap)+"px")}else{i.css("margin-left",n.direction=="left"?s+"px":"-"+(a*2-n.gap)+"px")}f=1}else{if(u){A()}else{O()}}var M=function(){if(n.duplicated){if(f===1){n._originalDuration=n.duration;if(u){n.duration=n.direction=="up"?n.duration+b/(w/n.duration):n.duration*2}else{n.duration=n.direction=="left"?n.duration+s/(a/n.duration):n.duration*2}if(N){N=S+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s "+n.css3easing}f++}else if(f===2){n.duration=n._originalDuration;if(N){S=S+"0";C=e.trim(C)+"0 ";N=S+" "+n.duration/1e3+"s 0s infinite "+n.css3easing}f++}}if(u){if(n.duplicated){if(f>2){i.css("margin-top",n.direction=="up"?0:"-"+w+"px")}o={"margin-top":n.direction=="up"?"-"+w+"px":0}}else{A();o={"margin-top":n.direction=="up"?"-"+i.height()+"px":b+"px"}}}else{if(n.duplicated){if(f>2){i.css("margin-left",n.direction=="left"?0:"-"+a+"px")}o={"margin-left":n.direction=="left"?"-"+a+"px":0}}else{O();o={"margin-left":n.direction=="left"?"-"+a+"px":s+"px"}}}r.trigger("beforeStarting");if(c){i.css(T,N);var t=C+" { 100%  "+p(o)+"}",l=e("style");if(l.length!==0){l.filter(":last").append(t)}else{e("head").append("<style>"+t+"</style>")}h(i[0],"AnimationIteration",function(){r.trigger("finished")});h(i[0],"AnimationEnd",function(){M();r.trigger("finished")})}else{i.animate(o,n.duration,n.easing,function(){r.trigger("finished");if(n.pauseOnCycle){d()}else{M()}})}r.data("runningStatus","resumed")};r.bind("pause",v.pause);r.bind("resume",v.resume);if(n.pauseOnHover){r.bind("mouseenter mouseleave",v.toggle)}if(c&&n.allowCss3Support){M()}else{d()}})};e.fn.nc_marquee.defaults={allowCss3Support:true,css3easing:"linear",easing:"linear",delayBeforeStart:1e3,direction:"left",duplicated:false,duration:5e3,gap:20,pauseOnCycle:false,pauseOnHover:false}})(jQuery);


(function($){

if ( typeof nc.fonts === 'object' ) {
	$.each( nc.fonts, function(e,f) {
		$('head').append('<link href="'+f+'" rel="stylesheet" type="text/css">');
	});
}

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
					maxHeight = $(this).height();
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
			var currMaxHeight = typeof nc.instances[obj.attr('ID')]['maxHeight'] === 'undefined' ? maxHeight : nc.instances[obj.attr('ID')]['maxHeight'];
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
})(jQuery);

(function($){
"use strict";

	String.prototype.getAttr = function (k) {
		var p = new RegExp('\\b' + k + '\\b', 'gi');
		return this.search(p) != -1 ? decodeURIComponent(this.substr(this.search(p) + k.length + 1).substr(0, this.substr(this.search(p) + k.length + 1).search(/(&|;|$)/))) : "";
	};

	var nc_loading = 'notactive';

	function nc_ajax( settings ) {

		var data = {
			action: 'nc_ajax_factory',
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

	function nc_resize() {

		$('.newscodes.nc-type-news-ticker-tiny, .newscodes.nc-type-news-ticker, .newscodes.nc-type-news-ticker-compact').each(function() {

			var obj = $(this);
			var maxHeight = 0;
			var showItems = nc.instances[obj.attr('ID')]['atts']['ticker_visible'];

			obj.removeAttr('style');
			obj.children('ul.newscodes-wrap').removeAttr('style');
			obj.children('ul.newscodes-wrap').children('li').removeAttr('style');

			obj.css({overflow: 'hidden', position: 'relative'})
			.children('ul.newscodes-wrap').css({position: 'absolute', margin: 0, padding: 0, width: '100%'})
			.children('li').css({margin: 0, padding: 0});

			obj.children('ul.newscodes-wrap').children('li').each(function(){
				if($(this).height() > maxHeight)
				{
					maxHeight = $(this).height();
				}
			});

			obj.children('ul.newscodes-wrap').children('li').each(function(){
				$(this).height(maxHeight);
			});

			obj.height(maxHeight * showItems );

			nc.instances[obj.attr('ID')]['maxHeight'] = maxHeight;

		});

	}

	$(document).on( 'click', '.newscodes[data-ajax="true"] .newscodes-pagination a', function() {
		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $(this).closest('.newscodes');
		var href = $(this).attr('href');

		wrap.addClass('nc-loading');

		var settings = {
			'paged' : href.indexOf('paged=') >= 0 ? href.getAttr('paged') : 1,
			'instance' : nc.instances[wrap.attr('ID')]
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			wrap.after($(response));
			var newWrap = wrap.next();

			wrap.fadeOut(300, function() {
				$(this).remove();
				newWrap.removeAttr('style');
			});

			newWrap.css({'margin-top':-wrap.outerHeight()+'px'}).fadeIn(300, function() {
				//$(this).removeAttr('style');
			});

		});

		return false;

	});

	$(document).on( 'click', '.newscodes[data-ajax="true"] .newscodes-load-more .nc-load-more', function() {
		if ( nc_loading == 'active' ) {
			return false;
		}
		nc_loading = 'active';

		var wrap = $(this).closest('.newscodes');
		var offset = wrap.find('li').length;

		wrap.addClass('nc-loading');

		var settings = {
			'offset' : offset,
			'instance' : nc.instances[wrap.attr('ID')]
		};

		$.when( nc_ajax( settings ) ).done( function(response) {

			if ($(response).find('li').length==0) {
				wrap.find('.newscodes-load-more').fadeOut(300, function() {
					$(this).remove();
				});
			}
			else {
				if (!wrap.hasClass('nc-type-news-columned-featured-list','nc-type-news-columned-featured-list-tiny','nc-type-news-columned-featured-compact')){
					$(response).find('li').each( function(i, el) {
						wrap.find('ul').append(el);
						var added = wrap.find('ul li:last');
						added.hide();
						setTimeout(function() {
							added.fadeIn();
						}, (i++)*100);
					});
				}
				else {
					if (wrap.find('.newscodes-wrap-load-more').length==0) {
						wrap.find('ul:eq(1)').after($('<ul class="newscodes-wrap newscodes-wrap-load-more"></ul>'));
					}
					var newWrap = wrap.find('.newscodes-wrap-load-more');
					$(response).find('li').each( function(i, el) {
						newWrap.append(el);
						var added = newWrap.find('li:last');
						added.hide();
						setTimeout(function() {
							added.fadeIn();
						}, (i++)*100);
					});
				}
			}


			wrap.removeClass('nc-loading');


		});

		return false;

	});

	$('.newscodes.nc-type-news-marquee').each( function() {

		var el = $(this);

		el.find('.newscodes-wrap').nc_marquee({
			duration: 10000,
			delayBeforeStart: 0,
			duplicated: true,
			pauseOnHover: true,
			direction: nc.instances[el.attr('ID')]['atts']['marquee_direction']
		});
	});

	$('.newscodes.nc-type-news-ticker-tiny, .newscodes.nc-type-news-ticker, .newscodes.nc-type-news-ticker-compact').each( function() {

		var el = $(this);

		el.nc_ticker({
			showItems:nc.instances[el.attr('ID')]['atts']['ticker_visible'],
			direction:nc.instances[el.attr('ID')]['atts']['ticker_direction'],
			'animation':'fade'
		});

	});

	if ( $('.newscodes.nc-type-news-ticker-tiny, .newscodes.nc-type-news-ticker, .newscodes.nc-type-news-ticker-compact').length > 0 ) {
		var nc_resize_id;
		$(window).resize(function() {
			clearTimeout(nc_resize_id);
			nc_resize_id = setTimeout(nc_resize, 300);
		});
	}

	$(document).on('click', '.newscodes-multi .nc-multi-terms li', function() {

		var el = $(this);

		if ( el.hasClass('current') ) {
			return false;
		}

		var wrap = el.closest('.newscodes-multi');

		el.parent().find('.current').removeClass('current');

		el.addClass('current');

		var current = wrap.find('.newscodes:visible');

		var selected = wrap.find('.newscodes:eq('+el.index()+')');

		current.fadeOut(300, function() {
			selected.css({'position':'','top':'','left':'','width':''});
		});

		selected.css({'position':'absolute','top':0,'left':0,'width':'100%'}).fadeIn(300, function() {
		});


	});


	$(document).on('mouseover', '.nc-type-news-one-tabbed-posts .nc-figure-wrapper', function(){

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


})(jQuery);