@extends('admin.index')

@section('adminContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form autocomplete="off" action="{{ url('/admin/theatre/update') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                    <h3>
                        Edit theatre
                    </h3>
                    
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $theatre->id }}">

                    <div class="sign__group">
                        <input value="{{ $theatre->theatre_name }}" type="text" class="sign__input" placeholder="Theatre Name" name="theatre_name">

                        @if ($errors->has('theatre_name'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('theatre_name') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input id="cinemas" type="hidden" name="cinemas">

                        <div class="filter__item" id="filter__movie">
							<span class="filter__item-label">Total numbers of cinemas:</span>

							<div class="filter__item-btn cinemas-list dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="{{ $theatre->cinemas }}">
								<span></span>
							</div>

							<ul class="filter__item-menu cinemas-list dropdown-menu scrollbar-movie" aria-labelledby="filter-genre">
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
							</ul>
                        </div>
                    </div>

                    <div class="sign__group">
                        <label for="theatre_img" class="sign__input" style="cursor: pointer">
                            <span>
                                <i class="fas fa-upload"></i>
                                <span id="theatre">{{ $theatre->theatre_image }}<span>
                            </span>
                        </label>

                        <input value="{{ $theatre->theatre_image}}" id="theatre_img" type="file" class="sign__input" name="theatre_image" style="display: none;">
                    
                        @if ($errors->has('theatre_image'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('theatre_image') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <textarea class="sign__textarea" name="description">{{ $theatre->description }}</textarea>
                    
                        @if ($errors->has('description'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('description') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $theatre->location }}" type="text" class="sign__input" placeholder="Location" name="location">
                    
                        @if ($errors->has('location'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('location') }}
                                </small>
                            </div>
                        @endif
                    </div>

                    <div class="sign__group">
                        <input value="{{ $theatre->contact_no }}"  type="text" class="sign__input" placeholder="Contact Number" name="contact_no">
                    
                        @if ($errors->has('contact_no'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('contact_no') }}
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