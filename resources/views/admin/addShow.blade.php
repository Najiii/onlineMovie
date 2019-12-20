@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form autocomplete="off" action="{{ url('/admin/show/insert') }}" method="POST" class="sign__form" enctype="multipart/form-data" id="show_form">
                    <h3>
                        Add Show
                    </h3>
                    
                    {{ csrf_field() }}
                    <div class="sign__group">
                        <input id="movie_name" type="hidden" name="movie_name">

                        <div class="filter__item" id="filter__movie">
							<span class="filter__item-label">Select movie:</span>

							<div class="filter__item-btn movie__btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="{{ $movies[0]->title }}">
								<span></span>
							</div>

							<ul class="filter__item-menu movie-list dropdown-menu scrollbar-movie" aria-labelledby="filter-genre">
                                @foreach ($movies as $movie)
                                    <li>{{ $movie->title }}<li>
                                @endforeach
							</ul>
						</div>
                        <!-- end filter item -->
                        @if ($errors->has('movie_name'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('movie_name') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input id="theatre_name" type="hidden" name="theatre_name">

                        <div class="filter__item" id="filter__theatre">
							<span class="filter__item-label">Select theatre:</span>

							<div class="filter__item-btn theatre__btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="{{ $theatres[0]->theatre_name }}">
								<span></span>
							</div>

							<ul class="filter__item-menu theatre-list dropdown-menu scrollbar-theatre" aria-labelledby="filter-genre">
                                @foreach ($theatres as $theatre)
                                    <li>{{ $theatre->theatre_name }}<li>
                                @endforeach
							</ul>
						</div>
                        <!-- end filter item -->
                        @if ($errors->has('theatre_name'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('theatre_name') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input id="cinemas_show" type="hidden" name="cinema">

                        <div class="filter__item" id="filter__movie">
							<span class="filter__item-label">At which cinema of theatre:</span>

							<div class="filter__item-btn cinemas_show dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="1">
								<span></span>
							</div>

							<ul class="filter__item-menu cinemas_show dropdown-menu scrollbar-movie" aria-labelledby="filter-genre">
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
							</ul>
                        </div>

                        @if ($errors->has('cinema'))
                        <div class="error text-danger">
                            <small>
                                {{ $errors->first('cinema') }}
                            </small>
                        </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input class="sign__input" type="text" name="price" placeholder="Price" style="width: 30%">

                        @if ($errors->has('price'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('price') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <span class="filter__item-label">Select date & time for movie:</span>
                        <input name="date_time" type="text" class="movie_date sign__date"/>

                        @if ($errors->has('date_time'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('date_time') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="sign__btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection