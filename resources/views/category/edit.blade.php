@extends('layouts.app')
@section('title')
    Category edit
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="fs-4 fw-semibold text-center mb-3">
                    Category duzeltmek
                </div>

                    <form action="{{ route('categories.update', $old_category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="parent_id" class="form-label fw-semibold">
                            Haýsysynyň içinde bolsun
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id" required autofocus>
                            @if(!$old_category->parent_id)
                                <option value="{{0}}">-</option>
                            @endif
                            @foreach($categories as $category)
                                <option value="{{ $category->parent_id }}" {{$old_category->parent_id == $category->id ? 'selected' : ''}}>{{ \App\Http\Controllers\CategoryController::getCategoryTree($category, $category->name) }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">
                            <span class="text-danger">TM</span> name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $old_category->name }}" required autofocus>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                        <div class="row justify-content-center">
                            <img src="{{$old_category->image ? Storage::url('categories/sm/' . $old_category->image) : Storage::url('not_found/not_found.png')}}"
                                 class="img-fluid" alt="">
                        </div>

                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">
                            Surat gosmak
                        </label>
                        <input type="file" accept="image/jpeg" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                        @error('image')
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