@extends('layouts.app')
@section('title')
    Category show
@endsection
@section('content')
    <div class="">
        <div class="fs-2 text-uppercase text-center mt-3 fw-semibold mb-3">
            {{$category->name}}
        </div>
        <hr>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
            @foreach($products as $product)
                <div class="col">
                    @include('app.product')
                </div>
            @endforeach
        </div>
    </div>
@endsection