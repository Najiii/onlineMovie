@extends('layouts.app')

@section('content')
<div class="sign section--bg" data-bg="/img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- reset form -->
                    <form autocomplete="off" method="POST" action="{{ route('password.update') }}" class="sign__form">
                        @csrf 

                        <input type="hidden" name="token" value="{{ $token }}">

                        <a href="{{ url('/') }}" class="sign__logo" style="margin-bottom: 20px">
							<img src="/img/logo.png" alt="">
                        </a>
                        <div class="sign__group">
                            <input id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Valid Email" autofocus>

                            @if ($errors->has('email'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('email') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input id="password" type="password" class="sign__input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                            @if ($errors->has('password'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('password') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <div class="sign__group">
                            <input id="password-confirm" type="password" class="sign__input" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        
                            @if ($errors->has('password_confirmation'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                </div>
                            @endif
                        </div>
                        
                        <button class="sign__btn" type="submit">
                                {{ __('Reset Password') }}
                        </button>
                    </form>
                    <!-- reset form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
