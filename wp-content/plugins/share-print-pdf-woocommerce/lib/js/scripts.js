(function($){
"use strict";

	var ajax_active = false;

	function get_shares() {

		var fb = $('.wcspp-facebook:not(.wcspp-activated)');
		if ( fb.length > 0 ) {
			$.getJSON( 'http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls=' + wcspp.product_url, function( fbdata ) {
				fb.find('span').html(fbdata[0].total_count);
				fb.addClass('wcspp-activated');
			});
		}

/*
		var tw = $('.wcspp-twitter:not(.wcspp-activated)');
		if ( tw.length > 0 ) {
			$.getJSON( 'http://cdn.api.twitter.com/1/urls/count.json?url=' + wcspp.product_url + '&callback=?', function( twitdata ) {
				tw.find('span').html(twitdata.count);
				tw.addClass('wcspp-activated');
			});
		}
*/

		var lin = $('.wcspp-linked:not(.wcspp-activated)');
		if ( lin.length > 0 ) {
			$.getJSON( 'http://www.linkedin.com/countserv/count/share?url=' + wcspp.product_url + '&callback=?', function( linkdindata ) {
				lin.find('span').html(linkdindata.count);
				lin.addClass('wcspp-activated');
			});
		}

	}
	if ( wcspp.showcounts == 'yes' ) {
		get_shares();
	}

	var readyImgs = {};
	function getBase64FromImageUrl(url, name) {
		var img = new Image();

		img.setAttribute('crossOrigin', 'anonymous');

		img.onload = function () {
			var canvas = document.createElement("canvas");
			canvas.width =this.width;
			canvas.height =this.height;

			var ctx = canvas.getContext("2d");
			ctx.drawImage(this, 0, 0);

			var dataURL = canvas.toDataURL("image/png");

			readyImgs[name] = dataURL;

		};

		img.src = url;
	}

	$.fn.print = function() {
		if (this.size() > 1){
			this.eq( 0 ).print();
			return;
		} else if (!this.size()){
			return;
		}

		var strFrameName = ("wpspp-printer-" + (new Date()).getTime());

		var jFrame = $( "<iframe name='" + strFrameName + "'>" );

		jFrame
			.css( "width", "1px" )
			.css( "height", "1px" )
			.css( "position", "absolute" )
			.css( "left", "-999px" )
			.appendTo( $( "body:first" ) )
		;

		var objFrame = window.frames[ strFrameName ];

		var objDoc = objFrame.document;

		objDoc.open();
		objDoc.write( "<!DOCTYPE html>" );
		objDoc.write( "<html>" );
		objDoc.write( "<head>" );
		objDoc.write( "<title>" );
		objDoc.write( document.title );
		objDoc.write( "</title>" );
		objDoc.write( "<style>" + wcspp.style + "</style>" );
		objDoc.write( "</head>" );
		objDoc.write( "<body>" );
		objDoc.write( this.html() );
		objDoc.write( "</body>" );
		objDoc.write( "</html>" );
		objDoc.close();

		objFrame.focus();
		objFrame.print();

		setTimeout(
			function(){
			jFrame.remove();
		},
		(60 * 1000)
		);
	}

	var pdfData = {};

	$.fn.printPdf = function(vars) {

		var strFrameName = ("wpspp-pdf-" + (new Date()).getTime());

		var jFrame = $( "<iframe name='" + strFrameName + "'>" );

		jFrame
			.css( "width", "1px" )
			.css( "height", "1px" )
			.css( "position", "absolute" )
			.css( "left", "-999px" )
			.appendTo( $( "body:first" ) )
		;

		var objFrame = window.frames[ strFrameName ];

		var objDoc = objFrame.document;

		pdfData.header_after = [
			'\n',
			vars.header_after
		];

		if ( vars.header_after == '' ) {
			pdfData.header_after = [];
		}

		pdfData.product_before = [
			'\n',
			vars.product_before
		];

		if ( vars.product_before == '' ) {
			pdfData.product_before = [];
		}

		pdfData.product_after = [
			'\n',
			vars.product_after
		];

		if ( vars.product_after == '' ) {
			pdfData.product_after = [];
		}

		getBase64FromImageUrl(vars.site_logo, 'site_logo');
		getBase64FromImageUrl(vars.product_image, 'product_image');
		getBase64FromImageUrl(vars.product_img0, 'product_img0');
		getBase64FromImageUrl(vars.product_img1, 'product_img1');
		getBase64FromImageUrl(vars.product_img2, 'product_img2');
		getBase64FromImageUrl(vars.product_img3, 'product_img3');

		setTimeout( function() {
			waitForElement( objDoc, objFrame, jFrame, vars );
		}, 333 );

	}

	function getPdf(objDoc, objFrame, jFrame, vars) {

		var site_logo = {};

		if ( vars.site_logo == '' ) {
			var site_logo = {
				width:0,
				image:'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [0, 0]
			};
		}
		else {
			site_logo = {
				width:45,
				image:readyImgs.site_logo,
				fit: [37, 37]
			};
		}

		var product_img0 = {};

		if ( vars.product_img0 == '' ) {
			product_img0 = {
				width:0,
				image:'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [0, 0]
			};
		}
		else {
			product_img0 = {
				width:125,
				image:readyImgs.product_img0,
				fit: [125, 9999]
			};
		}

		var product_img1 = {};

		if ( vars.product_img1 == '' ) {
			product_img1 = {
				width:0,
				image:'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [0, 0]
			};
		}
		else {
			product_img1 = {
				width:125,
				image:readyImgs.product_img1,
				fit: [125, 9999]
			};
		}

		var product_img2 = {};

		if ( vars.product_img2 == '' ) {
			product_img2 = {
				width:0,
				image:'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [0, 0]
			};
		}
		else {
			product_img2 = {
				width:125,
				image:readyImgs.product_img2,
				fit: [125, 9999]
			};
		}

		var product_img3 = {};

		if ( vars.product_img3 == '' ) {
			product_img3 = {
				width:0,
				image:'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [0, 0]
			};
		}
		else {
			product_img3 = {
				width:125,
				image:readyImgs.product_img3,
				fit: [125, 9999]
			};
		}

		var product_img = {};

		if ( vars.product_image == '' ) {
			product_img = {
				width:270,
				image: 'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAC0lEQVQIW2NkAAIAAAoAAggA9GkAAAAASUVORK5CYII=',
				fit: [250,9999]
			};
		}
		else {
			product_img = {
				width:270,
				image: readyImgs.product_image,
				fit: [250,9999]
			};
		}

		var pdfcontent = {
			content: [
				{
					alignment: 'justify',
					columns: [
						site_logo,
						[
							{
								text: vars.site_title,
								style: 'header'
							},
							{
								text: vars.site_description
							}
						]
					]
				},
				pdfData.header_after,
				'\n',
				{
					image: 'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAEklEQVQIW2NkYGD4D8QMjDAGABMaAgFVG7naAAAAAElFTkSuQmCC',
					width:510,
					height:0.5,
					alignment: 'center'
				},
				pdfData.product_before,
				'\n',
				{
					alignment: 'justify',
					columns: [
						{
							text: vars.product_title,
							style: 'title',
							alignment: 'left'
						},
						{
							text: vars.product_price,
							style: 'title',
							alignment: 'right'
						}
					]
				},
				'\n',
				vars.product_meta,
				vars.product_link,
				vars.product_categories,
				vars.product_tags,
				'\n\n',
				{
					alignment: 'justify',
					columns: [
						product_img,
						[
							{
								text: vars.product_description
							},
							'\n',
							{
								text: vars.product_attributes,
								style: 'meta'
							},
							'\n',
							{
								text: vars.product_dimensions,
								style: 'meta'
							},
							'\n',
							{
								text: vars.product_weight,
								style: 'meta'
							}
						]
					]
				},
				'\n',
				{
					alignment: 'justify',
					columns: [
						product_img0,
						product_img1,
						product_img2,
						product_img3
					]
				},
				'\n\n',
				vars.product_content,
				pdfData.product_after
				
			],
			styles: {
				header: {
					fontSize: 20
				},
				title: {
					fontSize: 24
				},
				meta: {
					fontSize: 12
				}
			},
			defaultStyle: {
				fontSize: 11
			}
		}

		objDoc.open();
		objDoc.write( "<!DOCTYPE html>" );
		objDoc.write( "<html>" );
		objDoc.write( "<head>" );
		objDoc.write( "<title>" );
		objDoc.write( document.title );
		objDoc.write( "</title>" );
		objDoc.write( "<script type='text/javascript' src='" + wcspp.pdfmake + "'></script>" );
		objDoc.write( "<script type='text/javascript' src='" + wcspp.pdffont + "'></script>" );
		objDoc.write( "</head>" );
		objDoc.write( "<body>" );
		objDoc.write( "<script>pdfMake.createPdf("+JSON.stringify(pdfcontent, null, 4)+").download('"+vars.site_title+' - '+vars.product_title+".pdf');</script>" );
		objDoc.write( "</body>" );
		objDoc.write( "</html>" );
		objDoc.close();

		objFrame.focus();

		setTimeout(
			function(){
			jFrame.remove();
		},
		(60 * 1000)
		);
	}

	function waitForElement(objDoc, objFrame, jFrame, vars) {
		var checked = false;
		$.each( readyImgs, function(i, o) {
			if ( typeof o !== "undefined" ) {
				checked = true;
			}
		});

		if ( checked === true ) {
			getPdf(objDoc, objFrame, jFrame, vars);
		}
		else {
			setTimeout( function() {
				waitForElement( objDoc, objFrame, jFrame, vars );
			}, 333 );
		}
	}

	var ajax = 'notactive';

	function wcspp_ajax( action, product_id, type ) {

		var data = {
			action: action,
			type: type,
			product_id: product_id
		}

		return $.post(wcspp.ajax, data, function(response) {
			if (response) {
				ajax = 'notactive';
			}
			else {
				alert('Error!');
				ajax = 'notactive';
			}

		});

	}

	$(document).on('click', '.wcspp-navigation .wcspp-print a', function() {

		if ( ajax == 'active' ) {
			return false;
		}

		var curr = $(this);
		var product_id = curr.closest('.wcspp-navigation').data('wcspp-id');

		ajax = 'active';


		$.when( wcspp_ajax( 'wcspp_quickview', product_id, 'print' ) ).done( function(response) {

			response = $(response);

			response.find('img[srcset]').removeAttr('srcset');

			$('body').append(response);

		});

		return false;
	});

	$(document).on('click', '.wcspp-navigation .wcspp-pdf a', function() {

		if ( ajax == 'active' ) {
			return false;
		}

		var curr = $(this);
		var product_id = curr.closest('.wcspp-navigation').data('wcspp-id');

		ajax = 'active';


		$.when( wcspp_ajax( 'wcspp_quickview', product_id, 'pdf' ) ).done( function(response) {

			response = $(response);

			response.find('img[srcset]').removeAttr('srcset');

			$('body').append(response);

		});

		return false;
	});

	$(document).on( 'click', '.wcspp-quickview .wcspp-quickview-close', function() {

		$(this).parent().remove();

		return false;

	});

	$(document).on( 'click', '.wcspp-quickview .wcspp-page-wrap .wcspp-go-print', function() {

		$('.wcspp-page-wrap').print();

		return false;

	});

	$(document).on( 'click', '.wcspp-quickview .wcspp-page-wrap .wcspp-go-pdf', function() {

		var vars = $(this).parent().data('wcspp-pdf');

		$(this).parent().printPdf(vars);

		return false;

	});

})(jQuery);