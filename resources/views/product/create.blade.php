@extends('layouts.app')
@section('title')
    @lang('app.category') - @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="fs-4 fw-semibold text-center mb-3">
                    Haryt doretmek
                </div>

                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="category" class="form-label fw-semibold">
                            Haýsy Kategorya
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('category') is-invalid @enderror" name="category" id="category" required autofocus>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ \App\Http\Controllers\CategoryController::getCategoryTree($category, $category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">
                            <span class="text-danger">TM</span> name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ old('name') }}" required autofocus>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary w-100">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection