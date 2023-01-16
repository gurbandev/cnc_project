@extends('layouts.app')
@section('title')
    Category edit
@endsection
@section('content')
    <div class="h4 mb-3">
        Category edit
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">parent_id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">In stocks</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->parent_id?:0}}</td>
                    <td>

                    </td>
                    <td>
                        @if($category->parent_id)
                            {{\App\Http\Controllers\CategoryController::getCategoryTree($category, $category->name)}}
                        @endif
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-decoration-none">
                            {{ $category->name }} <i class="bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        <p>{{\App\Http\Controllers\CategoryController::getProductCount($category->id)}}</p>
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm">
                            <i class="bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $category->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="delete{{ $category->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5 fw-semibold" id="delete{{ $category->id }}Label">
                                            {{ $category->name }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('categories.delete', $category->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="bi-trash"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection