@extends('layouts.app')
@section('title')
    CNC
@endsection
@section('content')
    <div class="row">
        <div class="col">
            @foreach($categories as $category)
                full_name: {{\App\Http\Controllers\CategoryController::getCategoryTree($category, $category->name)}}
                <br>
                name: {{$category->name}}
                <br>
                id: {{$category->id}}
                <br>
                parent_id: {{$category->parent_id}}
                <br>
                <br>
            @endforeach
        </div>
        <div class="col">
            @foreach($products as $product)
                @if($product->image)
                    <div class="card my-5" style="width: 18rem;">
                        <img src="{{Storage::url('products/' . $product->image)}}" class="card-img-top img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Product-name: {{$product->name}}</h5>
                            <p class="card-text">Product-description: {{$product->description}}</p>
                            <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Show</a>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>
@endsection

