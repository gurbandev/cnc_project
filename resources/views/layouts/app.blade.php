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
</head>
<body class="bg-light">
@include('app.nav')
<div class="container-xl">
    <div class="row">
        @auth
        @include('app.sidebar')
        @endauth
        <div class="col">
            @yield('content')
        </div>
    </div>
</div>

{{--<script type="text/javascript" src="{{asset('js/font.js')}}"></script>--}}
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/splide.min.js') }}"></script>
</body>
</html>
