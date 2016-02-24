$(document).ready(function() {

	// Testimonials Carousel
	// ---------------------------------------------------------------------------
	$('#testimonials-carousel').carousel({

		interval: 1000

	});

	$('#pause-carousel').click(function() {

		$('#testimonials-carousel').carousel('pause');
		$(this).hide();
		$( "#play-carousel").fadeIn(200);

	});

	$('#play-carousel').click(function() {

		$('#testimonials-carousel').carousel('cycle');
		$(this).hide();
		$( "#pause-carousel").fadeIn(200);

	});

});
