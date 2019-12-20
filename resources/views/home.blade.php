@extends('layouts.app')

@section('content')
<div class="page-404 section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-404__wrap">
                    <div class="page-404__content">
                        @if (auth()->user()->isAdmin == 1)
                            <h1 class="page-404__title fas fa-tools">
                            </h1>

                            <p class="page-404__text">You're now logged in as Administrator!</p>
                            <a href="{{ url('/') }}" class="page-404__btn">go back</a>
                            <a href="{{ url('admin') }}" class="page-404__btn">go dashboard</a>
                        @else
                            <h1 class="page-404__title far fa-heart">
                            </h1>

                            <p class="page-404__text">You're now logged in as User!</p>
                            <a href="{{ url('/') }}" class="page-404__btn">go back</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
