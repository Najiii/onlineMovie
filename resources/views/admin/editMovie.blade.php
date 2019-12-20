@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form autocomplete="off" action="{{ url('/admin/movie/update') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                    <h3>
                        Edit Movie
                    </h3>
                    
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $movie->id }}">

                    <div class="sign__group">
                        <input value="{{ $movie->title }}" type="text" class="sign__input" placeholder="Title" name="title">

                        @if ($errors->has('title'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('title') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <textarea class="sign__textarea" name="description">{{ $movie->description }}</textarea>
                    
                        @if ($errors->has('description'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('description') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $movie->director }}" type="text" class="sign__input" placeholder="Director" name="director">
                    
                        @if ($errors->has('director'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('director') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $movie->release }}" type="text" class="sign__input" placeholder="Released Year" name="release">
                    
                        @if ($errors->has('release'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('release') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $movie->genre }}" type="text" class="sign__input" placeholder="Genre" name="genre">
                    
                        @if ($errors->has('genre'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('genre') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $movie->language }}" type="text" class="sign__input" placeholder="Language" name="language">
                    
                        @if ($errors->has('language'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('language') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $movie->trailer_link }}" type="text" class="sign__input" placeholder="Trailer Link" name="trailer_link">
                        
                        @if ($errors->has('trailer_link'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('trailer_link') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="posterFile" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="poster">
                                    {{ $movie->poster }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->poster }}" id="posterFile" type="file" class="sign__input" name="poster" style="display: none;">
                    
                        @if ($errors->has('poster'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('poster') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureOne" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picOne">
                                    {{ $movie->picture_1 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_1 }}" id="pictureOne" type="file" class="sign__input" name="picture_1" style="display: none;">
                    
                        @if ($errors->has('picture_1'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_1') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureTwo" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picTwo">
                                    {{ $movie->picture_2 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_2 }}"  id="pictureTwo" type="file" class="sign__input" name="picture_2" style="display: none;">
                    
                        @if ($errors->has('picture_2'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_2') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureThree" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picThree">
                                    {{ $movie->picture_3 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_3 }}" id="pictureThree" type="file" class="sign__input" name="picture_3" style="display: none;">
                    
                        @if ($errors->has('picture_3'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_3') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureFour" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picFour">
                                    {{ $movie->picture_4 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_4 }}" id="pictureFour" type="file" class="sign__input" name="picture_4" style="display: none;">
                    
                        @if ($errors->has('picture_4'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_4') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureFive" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picFive">
                                    {{ $movie->picture_5 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_5 }}" id="pictureFive" type="file" class="sign__input" name="picture_5" style="display: none;">
                    
                        @if ($errors->has('picture_5'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_5') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <label for="pictureSix" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="picSix">
                                    {{ $movie->picture_6 }}
                                <span>
                            </span>
                        </label>

                        <input value="{{ $movie->picture_6 }}" id="pictureSix" type="file" class="sign__input" name="picture_6" style="display: none;">
                    
                        @if ($errors->has('picture_6'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('picture_6') }}
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