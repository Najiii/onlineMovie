<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movie Online</title>

        @include('master.stylesheet') 
    </head>
    <body>
        @include('master.navbar') 

        <section class="home">
            <div class="owl-carousel home__bg">
                <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
                <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
                <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
                <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="home__title"><b>NEW</b> MOVIES</h1>

                        <button class="home__nav home__nav--prev" type="button">
                            <i class="fas fa-arrow-left"></i>
                        </button>

                        <button class="home__nav home__nav--next" type="button">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel home__movies">@foreach ($movies as $movie) 
                    <div class="item">
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ asset('movieImages/' . $movie->poster) }}" alt="">
                                <a href="{{ url('/movie/' . $movie->id) }}" class="card__play">
									<i class="fas fa-play"></i>
								</a>
                            </div>
                            <div class="card__content">
								<h3 class="card__title">
                                    <a href="{{ url('/movie/' . $movie->id) }}">{{ $movie->title }}</a>
                                </h3>
								<span class="card__category">
									<a href="#">{{ $movie->genre }}</a>
                                </span>
							</div>
                        </div>
                    </div> @endforeach 
                </div>
            </div>
        </section>

        <section class="section content__head">
		    <div class="container">
			    <div class="row">
				    <!-- section title -->
				    <div class="col-12">
				    	<h2 class="section__title section__title--no-margin"><b>HOW</b> IT WORKS?</h2>
				    </div>
				    <!-- end section title -->

				    <!-- how box -->
				    <div class="col-12 col-md-6 col-lg-4">
				    	<div class="how">
				    		<span class="how__number">01</span>
				    		<h3 class="how__title">Create an account</h3>
				    		<p class="how__text">First & foremost an user should make an account on our website to book any of the movies related to the theaters on our website.</p>
				    	</div>
				    </div>
				    <!-- ebd how box -->

				    <!-- how box -->
				    <div class="col-12 col-md-6 col-lg-4">
				    	<div class="how">
				    		<span class="how__number">02</span>
				    		<h3 class="how__title">Choose your Plan</h3>
				    		<p class="how__text">You can buy tickets just by selecting a movie and show timings & also there is three classes for a movie theatre: Gold, Platinum or Box class.</p>
				    	</div>
				    </div>
				    <!-- ebd how box -->

				    <!-- how box -->
				    <div class="col-12 col-md-6 col-lg-4">
				    	<div class="how">
                            <span class="how__number">03</span>
				    		<h3 class="how__title">Book via MovieOnline</h3>
				    		<p class="how__text">It has never been an issue to find an old movie or TV show on the internet. However, this is not the case with the new releases on <b>MovieOnline</b></p>
				    	</div>
				    </div>
				    <!-- ebd how box -->
			    </div>
		    </div>
	    </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <!-- section title -->
                    <div class="col-12">
                        <h2 class="home__title section__title--no-margin"><b>Our</b> Partners</h2>
                    </div>
                    <!-- end section title -->
    
                    <!-- section text -->
                    <div class="col-12">
                        <p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
                    </div>
                    <!-- end section text -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
    
                    <!-- partner -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a class="partner">
                            <img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
                        </a>
                    </div>
                    <!-- end partner -->
                </div>
            </div>
        </section>
            

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <!-- footer list -->
                    <div class="col-12 col-md-3">
                        <h6 class="footer__title">Download Our App</h6>
                        <ul class="footer__app">
                            <li><a href="#"><img src="{{ asset('Download_on_the_App_Store_Badge.svg') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('google-play-badge.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->
    
                    <!-- footer list -->
                    <div class="col-6 col-sm-4 col-md-3">
                        <h6 class="footer__title">Resources</h6>
                        <ul class="footer__list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Pricing Plan</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->
    
                    <!-- footer list -->
                    <div class="col-6 col-sm-4 col-md-3">
                        <h6 class="footer__title">Legal</h6>
                        <ul class="footer__list">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->
    
                    <!-- footer list -->
                    <div class="col-12 col-sm-4 col-md-3">
                        <h6 class="footer__title">Contact</h6>
                        <ul class="footer__list">
                            <li><a href="mailto:moiveeonline@gmail.com">moiveeonline@gmail.com</a></li>
                        </ul>
                        <ul class="footer__social">
                            <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                            <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                            <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                            <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                        </ul>
                    </div>
                    <!-- end footer list -->
    
                    <!-- footer copyright -->
                    <div class="col-12">
                        <div class="footer__copyright">
                            <ul>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end footer copyright -->
                </div>
            </div>
        </footer>
        @include('master.scripts')

        <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type)
                {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
                }
            @endif
        </script>
    </body>
</html>
