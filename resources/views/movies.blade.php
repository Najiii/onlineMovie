<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movies</title>

        @include('master.stylesheet') 
    </head>
    <body>
        @include('master.navbar') 

        <section class="section section--first section--bg" data-bg="img/section/section.jpg" style="background: url(&quot;img/section/section.jpg&quot;) center center / cover no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__wrap">
                            <!-- section title -->
                            <h2 class="section__title">Movies list</h2>
                            <!-- end section title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- filter -->
	    <div class="filter">
            
        </div>
        <!-- end filter -->
        <!-- catalog -->
        <div class="catalog">
            <div class="container">
                <div class="row">
                    <!-- card -->
                    @foreach ($movies as $movie)
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="{{ asset('movieImages/' . $movie->poster) }}" alt="">
                                        <a href="{{ url('movie/' . $movie->id)}}" class="card__play">
										    <i class="fas fa-play"></i>
									    </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
								    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ url('movie/' . $movie->id) }}">{{ $movie->title }}</a></h3>
								    	<span class="card__category">
                                            <a>{{ $movie->genre}}</a>
								    	</span>

								    	<div class="card__wrap">
								    		<span class="card__rate"><i class="fas fa-star"></i>8.4</span>
								    	</div>

								    	<div class="card__description">
								    		<p>{{ $movie->description }}</p>
								    	</div>
								    </div>
							    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- paginator -->
                    @if ($page)
                        {{ $movies->links() }}
                    @else
                        @if ( isset($movies) && count($movies) == 0)
                            <h3 style="color: white; margin: 20px auto 30px; text-transform: uppercase;">
                                No such movies! :'(
                            </h3>
                        @endif
                        <div class="col-12">
                            <a href="{{ url('movies/') }}">
                                <button class="filter__btn" style="margin: 20px auto 30px;">Show all</button>
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>

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
