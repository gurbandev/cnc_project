@extends('layouts.app')
@section('title', 'Show')
@section('content')
    <div class="container-sm px-md-5">
        <p class="h1 text-center ff-bebas mt-3 mb-0  mb-md-5 pb-md-3">{{$category->name}}</p>
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 pt-4 pt-md-5">
                <div class="row pb-5">
                    <div class="col-12 col-md-5">
                        <img src="{{$category->image ? Storage::url('categories/' . $category->image) : Storage::url('not_found/not_found.png')}}"
                             class="img-fluid rounded mx-auto d-block img-resize-in_show" alt="">
                    </div>
                    <div class="col-12 col-md-6 pt-2 pt-md-0">
                        <h4 class="">Description</h4>
                        <p>{{$category->description}}</p>
                    </div>
                </div>
                <div class="">
                    <div class="col-12 col-md-11">
                        <hr>
                    </div>
                    <div class="rounded-top col-12 col-md-11 font-small">
                        <h3 class="my-3 my-md-5">Ölçegler</h3>
                        <table class="table table-striped table-hover">
                            <thead class="bg-table">
                            <tr class="">
                                <th scope="col">Harydyň kody</th>
                                <th scope="col">A <br> inch</th>
                                <th scope="col">B <br> inch</th>
                                <th scope="col">C <br> inch</th>
                                <th scope="col">D <br> inch</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            @foreach($products as $product)
                                <tr class="">
                                    <th>{{$product->barcode}}</th>
                                    <td>{{App\Http\Controllers\ProductController::getAttribute($product->head_diameter_id)}}</td>
                                    <td>{{App\Http\Controllers\ProductController::getAttribute($product->working_area_bit_id)}}</td>
                                    <td>{{App\Http\Controllers\ProductController::getAttribute($product->bottom_diameter_id)}}</td>
                                    <td>{{App\Http\Controllers\ProductController::getAttribute($product->bottom_zone_id)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-11 col-md-3">
                <div class="px-0 pb-3 pb-md-0 ">
                    <h3 class="ff-bebas text-center pb-2">our products</h3>
                    <div class="row justify-content-center ">
                        @foreach($ourcategories as $ourcategory)
                            <a href="{{route('bits.show', $ourcategory->id)}}" class="text-decoration-none">
                                <div class="row border my-2 rounded-2 text-style col-12">
                                    <div class="col p-1 pe-0 ps-2 ps-md-0">
                                        <img src="{{$ourcategory->image ? Storage::url('category/sm/' . $ourcategory->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto ms-md-2 d-block img-resize-min float-start float-md-none" alt="">
                                    </div>
                                    <div class="col-10 col-md-9 ps-2 ps-md-3 row align-items-center" style="padding-left: 0px; !important;">
                                        <p class="ff-bebas h4 mb-0 ps-0">{{$ourcategory->name}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
