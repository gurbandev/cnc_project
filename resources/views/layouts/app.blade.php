<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/gurban.css')}}">
</head>
<body>
<div class="container-sm">
    @include('app.nav')
    <div class="row">
        @auth
        <div class="col-sm-12 col-md-4 col-lg-3">
            <div class=" px-0 bg-white shadow ">
                @include('app.sidebar')
            </div>
        </div>
        @endauth
        <div class="col">
            @yield('content')
        </div>
            <div class="container">
                <a class="btn btn-warning text-dark float-end me-4" href="#"><x-icon.arrow_up/></a>
            </div>
    </div>
    <div>
        @include('app.footer')
    </div>
</div>

{{--<script type="text/javascript" src="{{asset('js/font.js')}}"></script>--}}
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/splide.min.js') }}"></script>

</body>
</html>
