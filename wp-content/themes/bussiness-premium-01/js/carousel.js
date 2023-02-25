$(document).ready(function() {

	$(".wq-banner").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 4500,
		autoplayHoverPause: true,
		smartSpeed: 750,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ]
	});

	$(".wq-carousel_depoimentos").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3500,
		autoplayHoverPause: true,
		smartSpeed:1000,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ]
	});

	$(".wq-projeto_carousel").owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed: 750,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ]
	});

	$(".wq-carousel_treinamentos").owlCarousel({
		loop: false,
		nav: false,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		smartSpeed: 750,
		// autoplay: true,
		// autoplayTimeout: 3000,
		// autoplayHoverPause: true,
		responsiveClass: true,
		responsive:{
			0:{
				items:1,
				margin: 10
			},
			500:{
				items:1,
				margin: 15
			},
			740:{
				items:2,
				margin: 20
			},
			1000:{
				items:3,
				margin: 35
			}
		}
	});



});
