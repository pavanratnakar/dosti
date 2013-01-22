/* ---------------------------------------------------- */
/*		Navigation Dropdowns
/* ---------------------------------------------------- */

$(function() {

	$('#nav ul').css('width', 'auto');
	$('#header').after('<div class="subnav-background"></div>');

	$('#nav li').hover(function() {
		$(this).children('ul').hide().stop(true, true).slideDown(200);
	}, function() {
		$(this).children('ul').stop(true, true).fadeOut(0, function() {
			$('.subnav-background').slideUp(200);
			$('#header').removeClass('active');
		});
	});

	$('#nav li').hover(function() {
		if( $(this).children('ul').length > 0 ) {
			var containerWidth = $('.container').width(),
				subWidth = $(this).children('ul').width(),
				pos = $(this).position(),
				left = containerWidth - subWidth - ( pos.left + ( $(this).width() / 2 )),
				margin = ( $(this).children('ul').children('li').size() - 1 ) * 30;
				
			$(this).children('ul').css('right', left+margin);
			$(this).addClass('hover');
			$('.subnav-background').stop(true, true).slideDown(200);
			$('#header').addClass('active');
		}
	}, function() {
		$(this).removeClass('hover');
		
	});
});

/* end Navigation Dropdowns */

/* ---------------------------------------------------- */
/*		Input Placeholders
/* ---------------------------------------------------- */

$(function() {
	$('[placeholder]').focus(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur().parents('form').submit(function() {
		$(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
			}
		})
	});
})

/* end Input Placeholders */

/* ---------------------------------------------------- */
/*		Homepage Project Grid
/* ---------------------------------------------------- */

$(function(){
	$('#projects-slider').gridnav({
		rows	: 2,
		type	: {
			mode		: 'sequpdown',
			speed		: 350,
			easing		: 'easeOutCubic',
			factor		: 50,
			reverse		: false,
			timeout		: 3000
		}
	});
});

/* end Homepage Project Grid */

/* ---------------------------------------------------- */
/*		Blog Post Carousel
/* ---------------------------------------------------- */

$(function() {
	/*$('.carousel').jcarousel({
		animation: 600,
		easing: 'easeOutCubic'
	});*/
});

/* end Blog Post Carousel */

/* ---------------------------------------------------- */
/*		Grayscale Image Hover Effect
/* ---------------------------------------------------- */

$(function() {
	
	// clone image
	$('.single_image img, .multi_images img, .blog-posts .post-image').each(function(){
		var el = $(this);
		el.css({"position":"absolute"}).wrap("<div class='img-wrapper' style='display: inline-block;'>").clone().addClass('img-grayscale').css({"position":"absolute","z-index":"998","opacity":"1"}).insertBefore(el).queue(function(){
			var el = $(this);
			el.parent().css({"width":this.width,"height":this.height});
			el.dequeue();
		});
		this.src = grayscale(this.src);
	});
	
	// Fade image 
	$('.single_image img, .multi_images img, .blog-posts .post-image').mouseover(function(){
		$(this).parent().find('img:first').stop().animate({opacity:0.3}, 400);
	})
	$('.img-grayscale').mouseout(function(){
		$(this).stop().animate({opacity:1}, 400);
	});		
	
	// Grayscale w canvas method
	function grayscale(src){
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
    }

});

/* end Blog Post Carousel */

/* ---------------------------------------------------- */
/*		Fancybox
/* ---------------------------------------------------- */

$(function(){
	// Images
	$("a.single_image").fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade',
		'titlePosition'	: 'over'
	});
	$("a.multi_images").fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade',
		'titlePosition'	: 'over'
	});

	//Iframe
	$("a.iframe").fancybox({
		'width'				: '75%',
		'height'			: '75%',
		'autoScale'     	: false,
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade',
		'type'				: 'iframe',
		'titleShow'		    : false
	});

	// Youtube Video
	$(".youtube_video").click(function() {
		$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'fade',
				'transitionOut'	: 'fade',
				'title'			: this.title,
				'width'		    : 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});

		return false;
	});
});

/* end Fancybox */

/* ---------------------------------------------------- */
/*		Accordion Content
/* ---------------------------------------------------- */

$(function() {
	$('.acc-container').hide();
	$('.acc-trigger:first').addClass('active').next().show();

	var fullWidth = $('.acc-container').outerWidth(true);
	$('.acc-trigger').css('width', fullWidth);
	$('.acc-container').css('width', fullWidth);
	
	$('.acc-trigger').click(function(e) {
		if( $(this).next().is(':hidden') ) {
			$('.acc-trigger').removeClass('active').next().slideUp(300);
			$(this).toggleClass('active').next().slideDown(300);
		}
		e.preventDefault();
	});
});

/* end Accordion Content */

/* ---------------------------------------------------- */
/*		Content Tabs
/* ---------------------------------------------------- */

$(function() {
	$('.tab-content').hide();
	$('.tabs li:first').addClass('active').show();
	$('.tab-content:first').show();

	$('.tabs li').click(function(e) {
		$('.tabs li').removeClass('active');
		$(this).addClass('active');
		$('.tab-content').hide();

		var activeTab = $(this).find('a').attr('href');
		$(activeTab).fadeIn();

		e.preventDefault();
	});
});

/* end Content Tabs */


/* ---------------------------------------------------- */
/*		Single Work Slider(s)
/* ---------------------------------------------------- */
/*
$(function() {
	$('#single-project .slider')
		.after('<div class="single-project-slider-nav">')
		.each(function(){
			var p = this.parentNode;
			$(this).cycle({
				fx: 'fade',
				pager:  $('.single-project-slider-nav', p),
				pause: true,
				speed: 600
			});    
	});
});
*/
/* end Single Work Slider */



var pavan_dosti
{
	login : 
	{
		init : function()
		{
			var login_validator = $("#texttests").validate(
			{
				debug: true,
				errorElement: "em",
				errorContainer: $("#warning, #summary"),
				errorPlacement: function(error, element) 
				{
					error.appendTo( element.parent("td").next("td") );
				},
				success: function(label) 
				{
					label.text("ok!").addClass("success");
				},
				rules:
				{
					number: {
						required:true,
						minlength:3,
						maxlength:15,
						number:true	
					},
					secret: "buga",
					math: 
					{
						equal: 11	
					}
				}
			});
		}
	}
}
