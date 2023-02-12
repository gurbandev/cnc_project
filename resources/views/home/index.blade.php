@extends('layouts.app')
@section('title')
    CNC
@endsection
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide rounded" data-bs-ride="carousel" style="overflow: hidden">
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
    <div class="px-md-3 px-lg-5">
        <div class="text-center row justify-content-center mt-5 pt-5">
            <h1 class="mb-0 ff-bebas">OUR PRODUCTS</h1>
            <p class="line col-6 col-sm-3"><span class="line-p ff-poppins2 fs-vw">latest products</span></p>
        </div>
        <div class="row justify-content-around pt-4 px-0">
            @foreach($products as $product)
                <div class="col-6 col-lg-4" >
                    <div class="col-12 border rounded text-center mx-0 mt-4 ms-0">
                        <div class="mx-auto px-0">
                            <div class="mx-auto mt-2 mt-md-3 col-11 col-md-10">
                                <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="border rounded img-fluid img-resize_home" alt="">
                                <p class="text-sm-start fs-vw pt-3">{{$product->name}}</p>
                                <p class="text-sm-start fs-vw">{{$product->barcode}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center pt-3">
            <div>
                <button type="button" class="btn btn-warning py-2 mt-3 ff-poppins2"><b class="px-5">Show all</b></button>
            </div>
        </div>
        <div class="text-center row justify-content-center mt-5 pt-5" id="catalog">
            <h1 class="mb-0 ff-bebas">CATALOGS</h1>
            <p class="line col-6 col-sm-3"><span class="line-p ff-poppins2 fs-vw">fresh products</span></p>
        </div>

        <div class="row justify-content-around pt-4 pb-4 mx-0 mx-lg-3">
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
    <div class="container">
        <a class="btn btn-warning text-dark float-end" href="#"><i class="bi-arrow-up"></i></a>
    </div>
@endsection

