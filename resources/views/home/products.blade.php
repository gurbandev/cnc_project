@extends('layouts.app')
@section('title', 'Products show')
@section('content')
    <div class="py-5 my-5">
        <div class="row row-cols-sm-2 row-cols-md-3 justify-content-center py-5">
            @foreach($categories as $category)
                @if(count($category->children))
                    <a class="text-decoration-none" href="{{ route('products', $category->id) }}">
                        <div class="col">
                            <div class="col-12">
                                <img src="{{$category->image ? Storage::url('products/sm/' . $category->image) : Storage::url('not_found/not_found.png')}}"
                                     class="img-fluid mx-auto center" alt="">
                            </div>
                            <p class="text-dark">{{$category->name}}</p>
                        </div>
                    </a>
                @else
                    <a class="text-decoration-none" href="{{ route('products.show', $category->id) }}">
                        <div class="col">
                            <div class="col-12">
                                <img src="{{$category->image ? Storage::url('products/sm/' . $category->image) : Storage::url('not_found/not_found.png')}}"
                                     class="img-fluid mx-auto center" alt="">
                            </div>
                            <p class="text-dark">{{$category->name}}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection