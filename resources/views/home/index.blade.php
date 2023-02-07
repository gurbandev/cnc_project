@extends('layouts.app')
@section('title')
    CNC
@endsection
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/slider/ads1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads3.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads4.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads5.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads6.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads7.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div>
        <div class="text-center row justify-content-center mt-5">
            <h3 class="ff-bebas mb-0">OUR PRODUCTS</h3>
            <p class="line col-3"><span class="line-p ff-poppins2">latest products</span></p>
        </div>
        <div class="row row-cols-sm-2 row-cols-md-3 justify-content-center">
            @foreach($products as $product)
                <div class="col">
                    <div class="col-12">
                        <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}"
                             class="img-fluid mx-auto center" alt="">
                    </div>
                    <p>{{$product->name}}</p>
                    <p>{{$product->barcode}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

