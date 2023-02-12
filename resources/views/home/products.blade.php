@extends('layouts.app')
@section('title', 'Products show')
@section('content')
    <div class="container px-sm-5">
        <div class="text-center row justify-content-center mt-5 pt-5">
            <h1 class="mb-0 ff-bebas">CATEGORY</h1>
            <p class="line col-6 col-sm-3"><span class="line-p ff-poppins2 fs-vw">fresh products</span></p>
        </div>
        <div class="row row-cols-sm-2 row-cols-md-3 justify-content-around pt-4 px-3 px-sm-0 text-dark">
            @foreach($categories as $category)
                @if(count($category->children))
                    <a class="text-decoration-none col" href="{{ route('products', $category->id) }}">
                        <div class="mx-2 mt-4 text-dark text-center">
                            <img src="{{$category->image ? Storage::url('categories/' . $category->image) : Storage::url('not_found/not_found.png')}}"
                                 class="border rounded col-12 img-resize-category" alt="">
                            <p class="fs-vw pt-3 ff-poppins2">{{$category->name}}</p>
                        </div>
                    </a>
                @else
                    <a class="text-decoration-none" href="{{ route('products.show', $category->id) }}">
                        <div class="mx-2 mt-4 text-dark text-center">
                            <img src="{{$category->image ? Storage::url('categories/' . $category->image) : Storage::url('not_found/not_found.png')}}"
                                 class="border rounded col-12 img-resize-category" alt="">
                            <p class="fs-vw pt-3 ff-poppins2">{{$category->name}}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="text-center pt-3">
            <div>
                <button type="button" class="btn btn-warning py-2 mt-3 ff-poppins2"><b class="px-5">Show all</b>
                </button>
            </div>
        </div>
        <div class="text-center row justify-content-center mt-5 pt-5">
            <h1 class="mb-0 ff-bebas">CATALOGS</h1>
            <p class="line col-6 col-sm-3"><span class="line-p ff-poppins2 fs-vw">fresh products</span></p>
        </div>

        <div class="row justify-content-around pt-4 mx-3">
            <div class="col-6 col-sm-5 col-md-2-5 rounded mt-3">
                <img src="{{asset('img/img_arden/arden1.jpg')}}" class="rounded round img-fluid " alt="...">
            </div>

            <div class="col-6 col-sm-5 col-md-2-5 rounded mt-3">
                <img src="{{asset('img/img_arden/arden2.jpg')}}" class="rounded round img-fluid " alt="...">
            </div>

            <div class="col-6 col-sm-5 col-md-2-5 rounded mt-3">
                <img src="{{asset('img/img_arden/arden3.jpg')}}" class="rounded round img-fluid " alt="...">
            </div>

            <div class="col-6 col-sm-5 col-md-2-5 rounded mt-3">
                <img src="{{asset('img/img_arden/arden4.jpg')}}" class="rounded round img-fluid " alt="...">
            </div>
        </div>
    </div>
@endsection