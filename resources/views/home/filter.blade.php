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
                <div class="col-6 col-md-4 col-lg-3">
                    @include('app.product')
                </div>
            @endforeach
        @else
            <h1 class="text-center py-10">Haryt tapylmady! <p class="text-secondary mt-3">(barkod yada harydyn adyny girip gorun)</p></h1>
        @endif
    </div>
@endsection