$(document).ready(function() {


	$(".wq-carousel_depoimentos").owlCarousel({
		items:1,
		loop:true,
		nav: false,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		smartSpeed:1000,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ]
	});

	$(".wq-carousel_treinamentos").owlCarousel({
		loop:false,
		nav: false,
		navText: [ '<span class="flaticon-arrow-left"></span>', '<span class="flaticon-arrow-right"></span>' ],
		responsiveClass:true,
		smartSpeed:550,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				margin: 10
			},
			500:{
				items:2,
				margin: 15
			},
			740:{
				items:3,
				margin: 20
			},
			1000:{
				items:3,
				margin: 35
			}
		}
	});



});
