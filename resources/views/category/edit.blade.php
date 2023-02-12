@extends('layouts.app')
@section('title')
    @lang('app.category') - @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="fs-4 fw-semibold text-center mb-3">
                    Categorya duzeltmek
                </div>

                <form action="{{ route('categories.update', $old_category->id )}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf

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

                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">
                            Surat 
                        </label>
                        <div>
                            <img src="{{$old_category->image ? Storage::url('products/sm/' . $old_category->image) : Storage::url('not_found/not_found.png')}}"
                                 class="border rounded col-12 img-resize-category mb-3" alt="">
                        </div>
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