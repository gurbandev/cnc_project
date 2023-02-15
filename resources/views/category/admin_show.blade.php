@extends('layouts.app')
@section('title')
    Category show
@endsection
@section('content')
    <div class="">
        <div class="fs-2 text-uppercase text-center mt-3 fw-semibold mb-3">
            @if($category->parent_id)
                {{\App\Http\Controllers\CategoryController::findParent($category->parent, '')}}
            @endif
            <span class="text-decoration-underline text-primary" style="cursor: default;">{{$category->name}}</span>
        </div>
        <hr>
        <div class="row">
            @foreach($products as $product)
                <div class="col-6 col-lg-3">
                    @include('app.product')
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection