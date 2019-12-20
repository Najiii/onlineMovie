@extends('layouts.app')

@section('content')
<div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- registration form -->
                    <form autocomplete="off" method="POST" action="{{ route('register') }}" class="sign__form">
                        @csrf 
                        <a href="{{ url('/') }}" class="sign__logo" style="margin-bottom: 20px">
							<img src="img/logo.png" alt="">
                        </a>

                        <div class="sign__group">
                            <input id="name" type="text" class="sign__input @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" >
                        
                            @if ($errors->has('name'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('name') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input id="email" type="email" class="sign__input @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                            
                            @if ($errors->has('email'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('email') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input type="password" name="password" class="sign__input @error('password') is-invalid @enderror" placeholder="Password">
                        
                            @if ($errors->has('password'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('password') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input type="text" name="phone_no" class="sign__input @error('phone_no') is-invalid @enderror" placeholder="Contact #">
                        
                            @if ($errors->has('phone_no'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('phone_no') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input type="text" name="credit_card" class="sign__input @error('credit_card') is-invalid @enderror" placeholder="Credit Card">
                        
                            @if ($errors->has('credit_card'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('credit_card') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                        
                        <button class="sign__btn" type="submit">
                                {{ __('Sign Up') }}
                        </button>

                        <span class="sign__text">Already have an account? <a href="{{ url('register/') }}">Sign in!</a></span>
                    </form>
                    <!-- registration form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
