<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $movie->title }}</title>

        @include('master.stylesheet') 
    </head>
    <body>
        @include('master.navbar') 

        <!-- details -->
        <section class="section details">
            <!-- details background -->
            <div class="details__bg" data-bg="/img/home/home__bg.jpg"></div>
            <!-- end details background -->

            <!-- details conent -->
            <div class="container">
                <div class="row">
                    <!-- title -->
                    <div class="col-12">
                        <h1 class="details__title">
                            {{ $movie->title }}
                        </h1>
                    </div>
                    <!-- end title -->

                    <!-- content -->
                    <div class="col-10">
                        <div class="card card--detailscard card--details card--series">
                            <div class="row">
                                <!-- card cover -->
                                <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                                    <div class="card__cover">
									    <img src="{{ asset('movieImages/' . $movie->poster) }}" alt="">
								    </div>
                                </div>
                                <!-- end card cover -->

                                <!-- card content -->
                                <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
                                    <div class="card__content">
                                        <div class="card__wrap">
                                            <span class="card__rate">
                                                <i class="fas fa-star"></i>8.4
                                            </span>
                                        </div>

                                        <ul class="card__meta">
										    <li><span>Genre:</span> <a>{{ $movie->genre }}</a></li>
										    <li><span>Release year:</span> {{ $movie->release}}</li>
                                            <li><span>Director:</span><a>{{ $movie->director}}</a></li>
                                            <li><span>Language:</span><a>{{ $movie->language}}</a></li>
                                        </ul>
                                        
                                        <div class="card__description card__description--details">
                                            {{ $movie->description }}
                                        </div>
                                    </div>
                                </div>
                                <!-- end card content -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-xl-12">
                        <div class="plyr__video-embed" id="player">
                            <iframe src="{{ $movie->trailer_link }}" crossorigin allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div>
                    </div>

                    @php
                        $pictures = array("picture_1", "picture_2", "picture_3", "picture_4", "picture_5", "picture_6");
                    @endphp

                    <div class="gallery container">
                        <div class="row vertical-align ">
                            @foreach ($pictures as $picture)
                                <figure class="col-xl-4 col-12">
                                    <a data-fancybox="gallery" href="{{ asset('movieImages/' . $movie->$picture) }}">
                                        <img class="img-responsive" src="{{ asset('movieImages/' . $movie->$picture) }}">
                                    </a> 
                                </figure>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">    
                        <div class="details__wrap">
                            <!-- availables -->
                            @if( auth()->user())
                            <div class="details__devices">
                                
                                @if( isset($tickets) && count($tickets) > 0 )
                                    <div class="container">
                                        @php
                                            $prevThreatre = null;
    
                                            foreach($tickets as $row)
                                            {
                                                if($prevThreatre == $row->theatre_name){
                                                    echo "<a href=../book/info/" . $row->id . ">";
                                                    echo "<button class='ticket__btn'>" . $row->date_time . " cinema: " . $row->cinema . " price " . $row->price . "Rs </button>"; 
                                                    echo "</a>";
                                                }
                                                else {
                                                    $prevThreatre = $row->theatre_name;
                                                    echo "<h3 class='col-xl-12'>" . $row->theatre_name. ":" . "</h3>";
                                                    echo "<a href=../book/info/" . $row->id . ">";
                                                    echo "<button class='ticket__btn'>" . $row->date_time . " cinema: " . $row->cinema . " price " . $row->price . "Rs </button>"; 
                                                    echo "</a>";
                                                }
                                            }   
                                        @endphp
                                    </div>
                                @else
                                    <button class="details__btn">
                                        <i class="fas fa-times"></i> No Shows
                                    </button>
                                @endif

                            @elseif( auth()->guest() )
                                @if( isset($tickets) && count($tickets) > 0 )
                                    <div class="container">
                                        <h2 style="color: white; font-weight: 300; text-transform: uppercase;">available show</h2>
                                        <hr/>
                                        @php
                                            $prevThreatre = null;
    
                                            foreach($tickets as $row)
                                            {
                                                if($prevThreatre == $row->theatre_name){
                                                    echo "<h3 class='col-xl-12' style='color: white ; font-weight: 300'>" . $row->theatre_name. ":" . "</h3>";
                                                    echo "<p class='col-xl-6' style='color: white;'>" . $row->date_time . " cinema: " . $row->cinema . " price " . $row->price . "Rs </p>"; 
                                                    echo "<hr/>";
                                                }
                                                else {
                                                    $prevThreatre = $row->theatre_name;
                                                    echo "<h3 class='col-xl-12' style='color: white; font-weight: 300'>" . $row->theatre_name. ":" . "</h3>";
                                                    echo "<p class='col-xl-6' style='color: white;'>" . $row->date_time . " cinema: " . $row->cinema . " price " . $row->price . "Rs </p>"; 
                                                    echo "<hr/>";
                                                }
                                            }   
                                        @endphp
                                    </div>
                                @endif
                            </div>
                            <!-- end availables -->
                            @endif
                            <!-- end share -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="content__head">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- content title -->
                            <h2 class="content__title">
                                Discover
                            </h2>
                            <!-- end content title -->

						    <!-- content tabs nav -->
                            <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Reviews</a>
                                </li>
                            </ul>
                            <!-- end content tabs nav -->

                            <!-- content mobile tabs nav -->
						    <div class="content__mobile-tabs" id="content__mobile-tabs">
                                <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="button" value="More">
                                    <span></span>
                                </div>
    
                                <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Reviews</a></li>
    
                                        {{-- <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">More Movies</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <!-- end content mobile tabs nav -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <!-- content tabs -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                                <div class="row">
                                    <!-- reviews -->
                                    <div class="col-12">
                                        <div class="reviews">
                                            <ul class="reviews__list review__carousel owl-carousel">
                                                @foreach ($approvedReviews as $approvedReview)
                                                <li class="reviews__item item">
                                                    <div class="reviews__autor">
                                                        <i class="reviews__avatar far fa-user"></i>
                                                        <span class="reviews__name">{{ $approvedReview->title }}</span>
                                                        <span class="reviews__time">{{ $approvedReview->created_at }} by {{ $approvedReview->user_name}}</span>
    
                                                        <span class="reviews__rating"><i class="fas fa-star"></i>{{ $approvedReview->rating }}</span>
                                                    </div>
                                                    <p class="reviews__text">{{ $approvedReview->review }}</p>
                                                </li>
                                                @endforeach
                                            </ul>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="review__nav review__nav--prev" type="button">
                                                            <i class="fas fa-arrow-left"></i>
                                                        </button>
                                            
                                                        <button class="review__nav review__nav--next" type="button">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            @if( auth()->user() && !$reviewed )
                                                <form autocomplete="off" action="/review/add" method="POST" class="form" id="review__form">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $movie->id }}" name="movie_id">
                                                    <input type="hidden" value="{{ $movie->title }}" name="movie_name">

                                                    @if( !auth()->guest())
                                                    <input type="hidden" value="{{ Auth::user()->name }}" name="user_name">
                                                    @endif

                                                    <input name="title" type="text" class="form__input" placeholder="Title">

                                                    @if ($errors->has('title'))
                                                        <div class="error text-danger">
                                                            <small>
                                                                {{ $errors->first('title') }}
                                                            </small>
                                                        </div>
                                                    @endif

                                                    <textarea name="review" class="form__textarea" placeholder="Review"></textarea>
                                                    @if ($errors->has('review'))
                                                        <div class="error text-danger">
                                                            <small>
                                                                {{ $errors->first('review') }}
                                                            </small>
                                                        </div>
                                                    @endif

                                                    <div class="form__slider">
                                                        <div class="form__slider-rating" id="slider__rating"></div>
                                                        <div class="form__slider-value" id="form__slider-value"></div>
                                                    </div>

                                                    <input type="hidden" name="rating" id="rating">

                                                    <button type="submit" class="form__btn" id="review_submit">Send</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="mailto:moiveeonline@gmail.com">support@flixgo.com</a></li>
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
