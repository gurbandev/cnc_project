@extends('layouts.app')
@section('title', 'Category Show')
@section('content')
    <div>
        @foreach($products as $product)
            {{$category->parent_id}}
        @endforeach
    </div>
@endsection
