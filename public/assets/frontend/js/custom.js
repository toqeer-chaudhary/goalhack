

/*------------------------------------------------------------------------------------
    
JS INDEX
=============

01 - Main Slider JS
02 - Counter JS
03 - Gallery JS
04 - Hover Direction JS
05 - Search JS
06 - Team Slider JS
07 - Testimonial Slider JS
08 - Accordian JS
09 - Youtube Popup JS
10 - Btn To Top JS
11 - Responsive Menu JS
12 - Preloader JS



-------------------------------------------------------------------------------------*/


(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {

		/* 
		=================================================================
		01 - Main Slider JS
		=================================================================	
		*/

		$(".lesun-slide").owlCarousel({
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			items: 1,
			nav: true,
			dots: false,
			autoplay: true,
			loop: true,
			navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
			mouseDrag: true,
			touchDrag: true
		});

		$(".lesun-slide").on("translate.owl.carousel", function () {
			$(".lesun-main-slide h2, .lesun-main-slide p").removeClass("animated fadeInUp").css("opacity", "0");
			$(".lesun-main-slide .lesun-btn").removeClass("animated fadeInDown").css("opacity", "0");
		});
		$(".lesun-slide").on("translated.owl.carousel", function () {
			$(".lesun-main-slide h2, .lesun-main-slide p").addClass("animated fadeInUp").css("opacity", "1");
			$(".lesun-main-slide .lesun-btn").addClass("animated fadeInDown").css("opacity", "1");
		});


		/* 
		=================================================================
		02 - Counter JS
		=================================================================	
		*/


		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});


		/* 
		=================================================================
		03 - Gallery JS
		=================================================================	
		*/

		$(".gallery-lightbox").magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			},
			zoom: {
				enabled: true,
				duration: 300,
				easing: 'ease-in-out',
				opener: function (openerElement) {

					return openerElement.is('img') ? openerElement : openerElement.find('img');
				}
			}
		});


		/* 
		=================================================================
		04 - Hover Direction JS
		=================================================================	
		*/

		$('#da-thumbs div.project_list').each(function () {
			$(this).hoverdir();
		});


		/* 
		=================================================================
		05 - Search JS
		=================================================================	
		*/

		if ($('.search-icon').length) {
			$('.search-icon').on('click', function () {
				$(this).toggleClass('active');
				$(this).next('.search-form').toggleClass('now-visible');
			});
		}

		/* 
		=================================================================
		06 - Team Slider JS
		=================================================================	
		*/

		$(".team-slider").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 30,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: true,
			dots: false,
			navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 4
				},
				1200: {
					items: 4
				}
			}
		});


		/* 
		=================================================================
		07 - Testimonial Slider JS
		=================================================================	
		*/

		$(".testimonial-slide").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 20,
			touchDrag: true,
			mouseDrag: true,
			items: 1,
			nav: false,
			dots: true,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				0: {
					items: 1
				},
				480: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				},
				1200: {
					items: 1
				}
			}
		});

		/* 
		=================================================================
		08 - Accordian JS
		=================================================================	
		*/

		$('.accordion').on('shown.bs.collapse', function (e) {
			$(e.target).parent().addClass('active_acc');
			$(e.target).prev().find('.switch').removeClass('fa-plus');
			$(e.target).prev().find('.switch').addClass('fa-minus');
		});
		$('.accordion').on('hidden.bs.collapse', function (e) {
			$(e.target).parent().removeClass('active_acc');
			$(e.target).prev().find('.switch').addClass('fa-plus');
			$(e.target).prev().find('.switch').removeClass('fa-minus');
		});


		/* 
		=================================================================
		09 - Youtube Popup JS
		=================================================================	
		*/

		$('.popup-youtube').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});


		/* 
		=================================================================
		10 - Btn To Top JS
		=================================================================	
		*/
		if ($("body").length) {
			var btnUp = $('<div/>', {
				'class': 'btntoTop'
			});
			btnUp.appendTo('body');
			$(document).on('click', '.btntoTop', function () {
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			});
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > 200) $('.btntoTop').addClass('active');
				else $('.btntoTop').removeClass('active');
			});
		}


		/* 
		=================================================================
		11 - Responsive Menu JS
		=================================================================	
		*/
		$("ul#lesun_navigation").slicknav({
			prependTo: ".lesun-responsive-menu"
		});


		/* 
		=================================================================
		12 - Preloader JS
		=================================================================	
		*/

		$(window).on('load', function () {
			$("#status").fadeOut();
			$("#preloader").delay(500).fadeOut("slow");
		})


	});
}(jQuery));

