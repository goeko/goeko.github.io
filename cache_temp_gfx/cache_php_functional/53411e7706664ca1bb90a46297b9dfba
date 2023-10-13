var platform = 'webapp';
var isStandalone = (typeof window.navigator["standalone"] !== 'undefined')?window.navigator["standalone"]:false;
var ua = navigator.userAgent.toLowerCase();
var android = (/android/i.test(ua));
if (android) {
	platform = 'android';
	// var mvp = document.getElementById('viewport');
	var mvp = document.querySelector('meta[name=viewport]');
	var mvp_content = mvp.getAttribute('content');
	mvp.setAttribute('content',mvp_content+', height=device-height');
}


gfxh = {}
gfxh.init = function () {

	$menu = $('#menuWrapper');
	$menu_block = $('#menu_block');
	$('#tiny_menu').bind('click', function(){
		if ( $menu_block.is(":visible") ) {
			$menu.css({
				'z-index':'999'
			});
			$menu_block.css({'display':'none'});
		} else {
			$menu.css({
				'z-index':'100'
			});
			$menu_block.css({'display':'block'});

		}
	});


	// var defaults = {
	// 	text: 'Top',
	// 	min: 200,
	// 	inDelay:600,
	// 	outDelay:400,
	// 	containerID: 'toTop',
	// 	containerHoverID: 'toTopHover',
	// 	scrollSpeed: 1200,
	// 	easingType: 'easeOutQuart'
	// };
	// $().UItoTop(defaults);

	// if($('h1').length >0 ){
	// 	$h1 = $('h1');
	// 	$h1.each(function (i,e) {
	// 		$this = $(this);
	// 		if($this.width() > $('#mainContent').width()){
	// 			$(this).css({
	// 				'width':'100%',
	// 				'text-overflow': 'ellipsis',
	// 				'white-space': 'nowrap',
	// 				'overflow': 'hidden',
	// 			});
	// 		}
	// 	})
	// }

	//var isStandalone = (typeof window.navigator["standalone"] !== 'undefined')?window.navigator["standalone"]:false;

	var li = $('#middleContent li');
	if(li.length > 0){
		li.each(function(i,e){
			$this = $(this);
			$this.css({
				"color":"#C8564b"
			});
			$this.wrapInner('<span style="color:#555555"></div>');
		});
	}

	$('#slider').css({
		'visibility':'visible'
	});

	$(document).foundation('section', {deep_linking: true}, function (response) {
		// console.log(response.errors);
	});

	// Wenn auf der Startseite.
	if ($('#pid_335').length > 0) {
		$topnews = $('#c1596');
		$topnews_slider_first = $('#c1596');
		var topnews = $topnews.html();
		var topnews_image = $('#orbit img').first().attr('src');
		$('#orbit li').first().remove();
		$('#c1597').hide(); // Parent: Datensatz Einfügen
		$('#orbit').prepend('<li><img src="' + topnews_image + '" width="1200" height="600" alt=""><div class="orbit-caption">'+topnews+'</div></li>');
	// } else {
		// var links = [];
		// $('#menu_block > a').each(function () {
		// 	links.push($(this).attr('src'));
		// })
		//
		//
		// $('#menu_block > a').eq().attr('src');
		// $('#orbit img').eq().attr('src');
	} else {
		$('#slider').click(function () {
			$(this).toggleClass('slider_maxheight');

			// $(this).animate({
			// 	height: "600px"
			// }, 240, function() {
			// 	// Animation complete.
			// });
		})
	}


	// //$('#footer_right')
	parent_element = $('#c1615.csc-default');
	parent_element.find('.clear').remove();
	parent_element.find('.text-links').remove()
	parent_element.find('p').remove()
	child_elements = parent_element.find('.csc-default').clone();
	$('#orbitfooter').append(child_elements);
	$('#c1615.csc-default').remove();


	$(document).foundation('orbit', {
		animation: 'fade',
		timer_speed: 10000,
		animation_speed: 520,
		bullets: false,
		stack_on_small: false,
		navigation_arrows: true,
		slide_number: false,
		container_class: 'orbit-container',
		stack_on_small_class: 'orbit-stack-on-small',
		next_class: 'orbit-next',
		prev_class: 'orbit-prev',
		timer_container_class: 'orbit-timer',
		timer_paused_class: 'paused',
		timer_progress_class: 'orbit-progress',
		slides_container_class: 'orbit-slides-container',
		bullets_container_class: 'orbit-bullets',
		bullets_active_class: 'active',
		slide_number_class: 'orbit-slide-number',
		caption_class: 'orbit-caption',
		active_slide_class: 'active',
		orbit_transition_class: 'orbit-transitioning'
	});

	$(document).foundation();

	gfxh.setResponsivMenu();
	gfxh.hideAddressBar();
	gfxh.setForms();
	gfxh.setContent();
	gfxh.toTop();
	$.stayInWebApp();
}

$(window).bind('resize', function () {
	gfxh.setResponsivMenu();
})
gfxh.setResponsivMenu = function () {

	$headerWrapper = $('#headerWrapper');
	$tiny_menu = $('#tiny_menu');
	$menu = $('#menuWrapper');

	$sliderWrapper = $('#sliderWrapper');
	$contentWrapper = $('#contentWrapper');
	$footerWrapper = $('#footerWrapper');
	$footer = $('#footer');

	$tiny_menu.unbind();
	$tiny_menu.bind('click', function(){
		$menu_block = $('#menu_block');

		if (android) {
			$menu_block.find('a').each(function(index) {
				$(this).click(function( event ) {
					event.stopPropagation();
				});
			});
		}

		if ( $menu_block.css('display')=='block' && $(window).scrollTop() < $menu_block.height() ) {
			$menu.css({
				'z-index':'99'
			});
			$menu_block.css({'display':'none'});
		} else {
			$menu.css({
				'z-index':'100'
			});
			$menu_block.css({'display':'block'});
		}

		// if ($.browser.opera) {
		// 	var target = 'html';
		// } else {
			var target = 'html,body';
		// }
		$(target).animate({
			scrollTop: 0
		}, 750 , function (){ location.hash = '#top'; });

	});
	if ($tiny_menu.is(':visible')) {
		var headerHeight = $headerWrapper.height();
		var footerHeight = $footerWrapper.height();
		$headerWrapper.css({
			'position':'fixed',
			'top':'0',
			'left':'0',
			'right':'0',
			'z-index':'99',
		});
		$footerWrapper.css({
			'position':'fixed',
			'bottom':'0',
			'left':'0',
			'right':'0',
			'z-index':'999',
		});
		$menu.css({
			'padding-top':headerHeight+'px'
		})
		$contentWrapper.css({
			'padding-bottom':footerHeight+'px'
		})

		//$('#menu_block').height(window.innerHeight - headerHeight - footerHeight);

	} else {
		$headerWrapper.removeAttr('style');
		$sliderWrapper.removeAttr('style');
		$contentWrapper.removeAttr('style');
		$footerWrapper.removeAttr('style');
	}
}


// Hide address bar on devices like the iPhone
//---------------------------------------------
gfxh.hideAddressBar = function () {
	// Big screen. Fixed chrome likely.
	if(screen.width > 980 || screen.height > 980) return;
	// Standalone (full screen webapp) mode
	if(window.navigator.standalone === true) return;
	// Page zoom or vertical scrollbars
	if(window.innerWidth !== document.documentElement.clientWidth) {
		// Sometimes one pixel too much. Compensate.
		if((window.innerWidth - 1) !== document.documentElement.clientWidth) return;
	}
	setTimeout(function() {
		// Already scrolled?
		if(window.pageYOffset !== 0) return;

		window.scrollTo(0, window.pageYOffset + 1);

		// // Perform autoscroll
		// window.scrollTo(0, 1);

		// // Reset body height and scroll
		// if(bodyTag !== undefined) bodyTag.style.height = window.innerHeight + 'px';
		// window.scrollTo(0, 0);
	}, 500);
}

gfxh.setForms = function () {
	window.setTimeout(function() {
		if (window.innerWidth < 769) {
			$('form').on('focusin', function() {
				$('#headerWrapper').hide();
				$('#footerWrapper').hide();
			});
			$('form').on('focusout', function() {
				$('#headerWrapper').show();
				$('#footerWrapper').show();
			});
		}
	}, 150);

	// var inputs = $('.csc-form-element-textline, .csc-form-element-textarea');
	// if (inputs.length > 0) {
	// 	inputs.each(function(index) {
	// 		$this = $(this);
	// 		var label = $this.find('label');
	// 		var text = label.text();
	// 		label.hide();
	// 		var input = $this.find('input');
	// 		if (input.length > 0) {
	// 			$this.find('input').attr('placeholder', text);
	// 		}
	// 		var input = $this.find('textarea');
	// 		if (input.length > 0) {
	// 			$this.find('textarea').attr('placeholder', text);
	// 		}
	// 	});
	// }
}

gfxh.setContent = function () {

	$('body').addClass($('body').data('parent'));

	// FRONTOPAGE
	if ($('body#pid_335').length > 0) {
		$('#contentWrapperBlock a').each(function(i, e){
			$this = $(e);
			$href = $this.attr('href');
			$div = $this.parents('.csc-default').eq(0);
			// $div = $this.parents('.row').eq(0);
			// $div = $this.closest('.row').eq(0);
			// $div = $this.parent().parent().parent().parent().parent();
			$div.css({'cursor':'pointer'});
			$div.attr('onclick', 'document.location.href = \''+$href+'\';');
			// $div.bind('mouseover', function () {
			// 	console.log($href);
			// })
			// $div.bind('click', function () {
			// 	document.location.href = $href;
			// })
		});
	}

	// //$('#footer_right')
	// parent_element = $('#c1614.csc-default');
	// parent_element.find('.clear').remove();
	// parent_element.find('.text-links').remove()
	// parent_element.find('p').remove()
	//
	// child_elements = parent_element.find('.csc-default');
	// child_elements_length = child_elements.length;
	//
	// child_elements.hide();
	// child_elements.eq(0).show();
	//
	// console.log(child_elements_length);
	//
	// element_height = 130;
	// iterator = 0;
	//
	// function nextChild(iterator) {
	// 	window.setTimeout(function (iterator) {
	// 		child_elements.eq(iterator).fadeOut(700, "linear", function () {
	// 			iterator++;
	// 			child_elements.eq(iterator).fadeIn(250, "linear", function () {
	// 				if (iterator == child_elements_length-1) {
	// 					iterator = -1;
	// 				}
	// 				nextChild(iterator);
	// 			})
	// 		});
	// 	}, 3200, iterator);
	// }
	//
	//
	// nextChild(iterator);
}

gfxh.toTop = function () {
	// $('body').prepend('<a name="top_" id="top_"></a>');
	$('body').append('<div class="back-to-top" id="back-top">\
		<a href="javascript:void(0)" class="back-to-top">TOP</a>\
	</div>');
	$("#back-top").hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > $('#header_block').height()) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});
	jQuery('.back-to-top').click(function () {
		jQuery('html, body').animate({
			scrollTop: 0
		}, 'fast');
	});
}


$(document).ready(function() {
	gfxh.init();
});
var supportsOrientationChange = "onorientationchange" in window,
	orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

window.addEventListener(orientationEvent, function() {
	$menu = $('#menuWrapper');
	$menu_block = $('#menu_block');

	$menu.attr('style', '');
	$menu_block.attr('style', '');

	window.location.reload();
}, false);
