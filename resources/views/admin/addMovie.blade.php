@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form autocomplete="off" action="{{ url('/admin/movie/insert') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                    <h3>
                        Add Movie
                    </h3>
                    
                    {{ csrf_field() }}
                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Title" name="title">

                        @if ($errors->has('title'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('title') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <textarea placeholder="Description" class="sign__textarea" name="description"></textarea>
                    
                        @if ($errors->has('description'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('description') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Director" name="director">
                    
                        @if ($errors->has('director'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('director') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Released Year" name="release">
                    
                        @if ($errors->has('release'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('release') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Genre" name="genre">
                    
                        @if ($errors->has('genre'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('genre') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Language" name="language">
                    
                        @if ($errors->has('language'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('language') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input type="text" class="sign__input" placeholder="Trailer Link" name="trailer_link">
                        
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
                                <span id="poster">Upload Poster<span>
                            </span>
                        </label>

                        <input id="posterFile" type="file" class="sign__input" name="poster" style="display: none;">
                    
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
                                <span id="picOne">Upload Picture #1<span>
                            </span>
                        </label>

                        <input id="pictureOne" type="file" class="sign__input" name="picture_1" style="display: none;">
                    
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
                                <span id="picTwo">Upload Picture #2<span>
                            </span>
                        </label>

                        <input id="pictureTwo" type="file" class="sign__input" name="picture_2" style="display: none;">
                    
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
                                <span id="picThree">Upload Picture #3<span>
                            </span>
                        </label>

                        <input id="pictureThree" type="file" class="sign__input" name="picture_3" style="display: none;">
                    
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
                                <span id="picFour">Upload Picture #4<span>
                            </span>
                        </label>

                        <input id="pictureFour" type="file" class="sign__input" name="picture_4" style="display: none;">
                    
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
                                <span id="picFive">Upload Picture #5<span>
                            </span>
                        </label>

                        <input id="pictureFive" type="file" class="sign__input" name="picture_5" style="display: none;">
                    
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
                                <span id="picSix">Upload Picture #6<span>
                            </span>
                        </label>

                        <input id="pictureSix" type="file" class="sign__input" name="picture_6" style="display: none;">
                    
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