$(document).ready(function (){
	/*==============================
	Menu
	==============================*/
	$('.header__btn').on('click', function() {
		$(this).toggleClass('header__btn--active');
		$('.header__nav').toggleClass('header__nav--active');
		$('.body').toggleClass('body--active');

		if ($('.header__search-btn').hasClass('active')) {
			$('.header__search-btn').toggleClass('active');
			$('.header__search').toggleClass('header__search--active');
		}
	});

	/*==============================
	Search
	==============================*/
	$('.header__search-btn').on('click', function() {
		$(this).toggleClass('active');
		$('.header__search').toggleClass('header__search--active');

		if ($('.header__btn').hasClass('header__btn--active')) {
			$('.header__btn').toggleClass('header__btn--active');
			$('.header__nav').toggleClass('header__nav--active');
			$('.body').toggleClass('body--active');
		}
	});


    /*==============================
	Section bg
	==============================*/
	$('.section--bg, .details__bg').each( function() {		
		if ($(this).attr("data-bg")){
			$(this).css({
				'background': 'url(' + $(this).data('bg') + ')',
				'background-position': 'center center',
				'background-repeat': 'no-repeat',
				'background-size': 'cover'
			});
		}
	});

    /*==============================
	Home
	==============================*/
	$('.home__bg').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		mouseDrag: false,
		touchDrag: false,
		items: 1,
		dots: false,
		loop: true,
		smartSpeed: 600,
		margin: 0,
	});

	$('.home__movies').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		mouseDrag: true,
		touchDrag: true,
		items: 4,
		dots: false,
		loop: true,
		margin: 20,
		responsiveClass: true,
		responsive:
		{
			0:
			{
				items: 2
			},

			600:
			{
				items: 3
			},

			1000:
			{
				items: 4
			}
		}
	});

	$('.review__carousel').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		mouseDrag: true,
		touchDrag: true,
		items: 4,
		dots: false,
		loop: true,
		margin: 20,
		responsiveClass: true,
		responsive:
		{
			0:
			{
				items: 1
			},

			600:
			{
				items: 1
			},

			1000:
			{
				items: 1
			}
		}
	});

	$('.review__nav--next').on('click', function() {
		$('.review__carousel').trigger('next.owl.carousel');
	});

	$('.review__nav--prev').on('click', function() {
		$('.review__carousel').trigger('prev.owl.carousel');
	});

	$('.home__bg .item').each( function() {
		if ($(this).attr("data-bg")){
			$(this).css({
				'background': 'url(' + $(this).data('bg') + ')',
				'background-position': 'center center',
				'background-repeat': 'no-repeat',
				'background-size': 'cover'
			});
		}
	});

	$('.home__carousel').owlCarousel({
		mouseDrag: false,
		touchDrag: false,
		dots: false,
		loop: true,
		autoplay: false,
		smartSpeed: 600,
		margin: 30,
		responsive : {
			0 : {
				items: 2,
			},
			576 : {
				items: 2,
			},
			768 : {
				items: 3,
			},
			992 : {
				items: 4,
			},
			1200 : {
				items: 4,
			},
		}
	});

	$('.home__nav--next').on('click', function() {
		$('.home__carousel, .home__bg').trigger('next.owl.carousel');
	});
	$('.home__nav--prev').on('click', function() {
		$('.home__carousel, .home__bg').trigger('prev.owl.carousel');
	});

	$(window).on('resize', function() {
		var itemHeight = $('.home__bg').height();
		$('.home__bg .item').css("height", itemHeight + "px");
	});
	$(window).trigger('resize');

	/*==============================
	Player
	==============================*/
	function initializePlayer() {
		if ($('#player').length) {
			const player = new Plyr('#player');
		} else {
			return false;
		}
		return false;
	}
	$(window).on('load', initializePlayer());
	/*==============================
	Slider - UI
	==============================*/
	/*==============================
	Range sliders
	==============================*/
	/*1*/
	function initializeThirdSlider() {
		if ($('#slider__rating').length) {
			var thirdSlider = document.getElementById('slider__rating');
			noUiSlider.create(thirdSlider, {
				range: {
					'min': 0,
					'max': 10
				},
				connect: [true, false],
				slide: function (event, ui)
				{
					$('#rating').val(ui.values[0]);
				},
				step: 0.1,
				start: 8.6,
				format: wNumb({
					decimals: 1,
				})
			});

			var thirdValue = document.getElementById('form__slider-value');

			thirdSlider.noUiSlider.on('update', function( values, handle ) {
				thirdValue.innerHTML = values[handle];
			});

			$("#slider").on('slide', function(event, values) {
				$("input.unibox-price-min").val(values[0]);
				$("input.unibox-price-max").val(values[1]);
			  });
		} else {
			return false;
		}
		return false;
	}
	$(window).on('load', initializeThirdSlider());
	/*==============================
	Review Submit
	==============================*/
	$('#review__form').submit(function() {
		$('#rating').val($('#form__slider-value').html());
	});
	/*==============================
	Scroll bar
	==============================*/
	$('.ticket-dropdown').mCustomScrollbar({
		axis: "y",
		scrollbarPosition: "outside",
		theme: "custom-bar"
	});
});
