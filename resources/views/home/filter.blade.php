@extends('layouts.app')
@section('title')
    Filter
@endsection
@section('content')
    <div class="h1 pt-3 pb-3 text-center">
        Filter page
    </div>
    <hr>
    <div class="pt-2 row row-cols-sm-2 row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach($products as $product)
                <div class="col">
                    @include('app.product')
                </div>
            @endforeach
        </div>
@endsection