@extends('layouts.app')

@section('content')
<div class="sign section--bg" data-bg="/img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- registration form -->
                    <form autocomplete="off" method="POST" action="{{ route('password.email') }}" class="sign__form">
                        @csrf 

                        <a href="{{ url('/') }}" class="sign__logo">
							<img src="/img/logo.png" alt="">
                        </a>

                        <div class="sign__group">
                            <input id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Valid Email" autofocus>
                            
                            @if ($errors->has('email'))
                                <div class="error text-danger">
                                    <small>
                                        {{ $errors->first('email') }}
                                    </small>
                                </div>
                            @endif
                        </div>

                        <button class="sign__btn" type="submit">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>
                    <!-- registration form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
