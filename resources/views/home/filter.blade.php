@extends('layouts.app')
@section('title')
    Filter
@endsection
@section('content')
    <div class="h1 pt-3 pb-3 text-center">
        Filter page
    </div>
    <hr>
    <div class="pt-2 row">
        @if(isset($success))
            @foreach($products as $product)
                <a href="{{\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 2 ? route("bits.show", $product->category_id): route('products.inShow', $product->category_id)}}" class="text-decoration-none text-dark col-6 col-sm-4 col-md-3">
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
        @else
            <div class="py-10">
                <p class="text-center"><i class="bi-arrow-right"></i></p>
                <h4 class="text-center">Haryt tapylmady! <p class="text-secondary mt-3">(barkod yada harydyn adyny girip gorun!)</p></h4>
            </div>
        @endif
    </div>
@endsection