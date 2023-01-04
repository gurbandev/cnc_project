@extends('layouts.app')
@section('title')
    CNC
@endsection
@section('content')
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
@endsection

