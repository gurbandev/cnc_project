@extends('layouts.app')
@section('title', 'Lastes')
@section('content')
    <div class="text-center pb-3">
        <h1 class=" pb-2">Taze harytlar</h1>
        <hr>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="my-3 border rounded-4 py-2">
                    <div class="mx-2">
                        <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto d-block img-resize" alt="">
                    </div>
                    <div class="text-center">
                        {{$product->name}}
                    </div>
                    <div class="text-center">
                        {{$product->barcode}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--{!! $products->links() !!}--}}
@endsection