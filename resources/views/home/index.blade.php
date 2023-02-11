@extends('layouts.app')
@section('title')
    CNC
@endsection
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/slider/ads2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/slider/ads3.jpg')}}" class="d-block w-100" alt="...">
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
    <div class="px-3">
        <div class="text-center row justify-content-center mt-5 pt-5">
            <h1 class="mb-0 ff-bebas">OUR PRODUCTS</h1>
            <p class="line col-3"><span class="line-p ff-poppins2 fs-vw">latest products</span></p>
        </div>
        <div class="row justify-content-around pt-4">
            @foreach($products as $product)
                <div class="col-4 col-md-3 m-3 px-3 border rounded text-center">
                    <div class=" border rounded mt-3">
                    <!-- <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}"
                             class="img-fluid" alt="">
                              -->
                        <img src="{{asset('img/img_arden/pycak.png')}}" class="round w-100" alt="...">
                    </div>
                    <p class="text-start fs-vw pt-3">{{$product->name}}</p>
                    <p class="text-start fs-vw">{{$product->barcode}}</p>
                </div>
            @endforeach
        </div>
        <div class="text-center pt-3">
            <div>
                <button type="button" class="btn btn-warning py-2"><b class="px-5">Show all</b></button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center row justify-content-center mt-5 pt-5">
            <h1 class="mb-0 ff-bebas">CATALOGS</h1>
            <p class="line col-3"><span class="line-p ff-poppins2 fs-vw">fresh products</span></p>
        </div>

        <div class="row justify-content-around pt-4">
            <div class="col-5 col-md-2 mt-3">
                <img src="{{asset('img/img_arden/arden1.jpg')}}" class="round img-fluid" alt="...">
            </div>

            <div class="col-5 col-md-2 mt-3">
                <img src="{{asset('img/img_arden/arden2.jpg')}}" class="round img-fluid" alt="...">
            </div>

            <div class="col-5 col-md-2 mt-3">
                <img src="{{asset('img/img_arden/arden3.jpg')}}" class="round img-fluid" alt="...">
            </div>

            <div class="col-5 col-md-2 mt-3">
                <img src="{{asset('img/img_arden/arden4.jpg')}}" class="round img-fluid" alt="...">
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-warning text-dark float-end"><i class="bi-arrow-up"></i></button>
    </div>
@endsection

