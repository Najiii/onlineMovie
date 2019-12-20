$(document).ready(function () {
	/*==============================
	Admin Menu
	==============================*/
	$("#sidebar").mCustomScrollbar({
		theme: "minimal"
	});

	$('#sidebarCollapse').on('click', function () {
		$('#sidebar, #content').toggleClass('active');
		$('.collapse.in').toggleClass('in');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
	});

	/*==============================
	Poster & Pictures
	==============================*/
	$('#posterFile').change(function(){
		$('#poster').text(this.files[0].name);
	});

	$('#pictureOne').change(function(){
		$('#picOne').text(this.files[0].name);
	});

	$('#pictureTwo').change(function(){
		$('#picTwo').text(this.files[0].name);
	});

	$('#pictureThree').change(function(){
		$('#picThree').text(this.files[0].name);
	});

	$('#pictureFour').change(function(){
		$('#picFour').text(this.files[0].name);
	});

	$('#pictureFive').change(function(){
		$('#picFive').text(this.files[0].name);
	});

	$('#pictureSix').change(function(){
		$('#picSix').text(this.files[0].name);
	});

	$('#pictureSix').change(function(){
		$('#picSix').text(this.files[0].name);
	});

	$('#theatre_img').change(function(){
		$('#theatre').text(this.files[0].name);
	});
	/*==============================
	Filter
	==============================*/
	$('.movie-list li').each( function() {
		$(this).attr('data-value', $(this).text().toLowerCase());
	});

	$('.movie-list li').on('click', function() {
		var text = $(this).text();
		var item = $(this);
		var id = item.closest('.filter__item').attr('id');
		$('#'+id).find('.movie__btn input').val(text);
		$('#movie_name').val(text);
	});

	$('.theatre-list li').each( function() {
		$(this).attr('data-value', $(this).text().toLowerCase());
	});

	$('.theatre-list li').on('click', function() {
		var text = $(this).text();
		var item = $(this);
		var id = item.closest('.filter__item').attr('id');
		$('#'+id).find('.theatre__btn input').val(text);
		$('#theatre_name').val(text);
	});

	$('.cinemas-list li').each( function() {
		$(this).attr('data-value', $(this).text().toLowerCase());
	});

	$('.cinemas-list li').on('click', function() {
		var text = $(this).text();
		var item = $(this);
		var id = item.closest('.filter__item').attr('id');
		$('.cinemas-list input').val(text);
		$('#cinemas').val(text);
	});

	$('.cinemas_show li').each( function() {
		$(this).attr('data-value', $(this).text().toLowerCase());
	});

	$('.cinemas_show li').on('click', function() {
		var text = $(this).text();
		var item = $(this);
		var id = item.closest('.filter__item').attr('id');
		$('.cinemas_show input').val(text);
		$('#cinemas_show').val(text);
	});

	/*==============================
	Scroll bar
	==============================*/
	$('.scrollbar-movie').mCustomScrollbar({
		axis: "y",
		scrollbarPosition: "outside",
		theme: "custom-bar"
	});

	$('.scrollbar-theatre').mCustomScrollbar({
		axis: "y",
		scrollbarPosition: "outside",
		theme: "custom-bar"
	});

	/*==============================
	Calender & Time
	==============================*/
	$('.movie_date').datepicker({
		language: 'en',
		dateFormat: "dd-MM-yyyy",
		minDate: new Date(),
		timepicker: true,
		timeFormat: "hh:ii AA"
	});

	/*==============================
	Default values
	==============================*/
	function loadDefaultValues()
	{
		var movie = $('.movie__btn input').val();
		$('#movie_name').val(movie);

		var theatre = $('.theatre__btn input').val();
		$('#theatre_name').val(theatre);

		var cinemas = $('.cinemas-list input').val();
		$('#cinemas').val(cinemas);

		var cinemas_show = $('.cinemas_show input').val();
		$('#cinemas_show').val(cinemas_show);
	}

	$(window).on('load', loadDefaultValues());
});
