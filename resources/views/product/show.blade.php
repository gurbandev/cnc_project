@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="text-center pb-3">
        <h1 class="text-uppercase pb-2">{{$category->name}}</h1>
        <hr>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('app.product')
            </div>
        @endforeach
    </div>
    {!! $products->links() !!}
@endsection