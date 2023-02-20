@extends('layouts.app')
@section('title', 'Lastes')
@section('content')
    <div class="text-center pb-3">
        <h1 class=" pb-2">Taze harytlar</h1>
        <hr>
    </div>
    <div class="row">
        @foreach($products as $product)
            <a href="{{\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 2 ? route("bits.show", $product->category_id): route('products.inShow', $product->category_id)}}" class="col-6 col-sm-4 col-md-3  text-decoration-none text-dark">
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
            </a>
        @endforeach
    </div>
    {{--{!! $products->links() !!}--}}
@endsection