@extends('layouts.app')

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form autocomplete="off" action="{{ url('/admin/user/update') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                    <h3>
                        Edit user
                    </h3>
                    
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="sign__group">
                        <input value="{{ $user->name }}"class="sign__input" type="text" name="name" placeholder="Name">

                        @if ($errors->has('name'))
                            <div class="error text-danger">
                                <small>
                                    {{ $errors->first('name') }}
                                </small>
                            </div>
                        @endif
                    </div>


                    <button type="submit" class="sign__btn">Submit</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="sign section--bg" data-bg="/img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form autocomplete="off" action="{{ url('/user/update') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                            @csrf
                            <a href="{{ url('/') }}" class="sign__logo">
                                <img src="/img/logo.png" alt="">
                            </a>
                            <input type="hidden" value="{{ $user->id }}" name="id">
                                
                            <div class="sign__group">
                                <input placeholder="Name" id="name" type="text" class="sign__input @error('email') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                            
                                @if ($errors->has('name'))
                                    <div class="error text-danger">
                                        <small>
                                            {{ $errors->first('name') }}
                                        </small>
                                    </div>
                                @endif
                            </div>
    
                            <div class="sign__group">
                                <input placeholder="Email" id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="current-password">
    
                                @if ($errors->has('email'))
                                    <div class="error text-danger">
                                        <small>
                                            {{ $errors->first('email') }}
                                        </small>
                                    </div>
                                @endif
                            </div>

                            <div class="sign__group">
                                <input type="text" name="phone_no" class="sign__input @error('phone_no') is-invalid @enderror" value="{{ $user->phone_no}}" required placeholder="Contact #">
                                
                                @if ($errors->has('phone_no'))
                                    <div class="error text-danger">
                                        <small>
                                            {{ $errors->first('phone_no') }}
                                        </small>
                                    </div>
                                @endif
                            </div>

                            <div class="sign__group">
                                <input type="text" name="credit_card" class="sign__input @error('credit_card') is-invalid @enderror" value="{{ $user->credit_card }}" required placeholder="Credit Card">
                            
                                @if ($errors->has('credit_card'))
                                    <div class="error text-danger">
                                        <small>
                                            {{ $errors->first('credit_card') }}
                                        </small>
                                    </div>
                                @endif
                            </div>
    
                            
                            <button class="sign__btn" type="submit">
                                {{ __('Update') }}
                            </button>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection