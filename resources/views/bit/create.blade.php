@extends('layouts.app')
@section('title')
    Pycak gosmak
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="text-center px-5 mt-5 col-6">
            <h3>Pycak gosmak</h3>
            <hr>
            <form action="{{ route('bits.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="category_id" class="form-label fw-semibold">
                        Haýsy Kategorya
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required autofocus>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ \App\Http\Controllers\CategoryController::getCategoryTree($category, $category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="head_diameter_id" class="form-label fw-semibold">
                        A
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('head_diameter_id') is-invalid @enderror" name="head_diameter_id"
                            id="head_diameter_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 1)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('head_diameter_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="working_area_bit_id" class="form-label fw-semibold">
                        B
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('working_area_bit_id') is-invalid @enderror" name="working_area_bit_id"
                            id="working_area_bit_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 3)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('working_area_bit_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="bottom_diameter_id" class="form-label fw-semibold">
                        C
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('bottom_diameter_id') is-invalid @enderror" name="bottom_diameter_id"
                            id="bottom_diameter_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 3)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('bottom_diameter_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="bottom_zone_id" class="form-label fw-semibold">
                        D
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('bottom_zone_id') is-invalid @enderror" name="bottom_zone_id"
                            id="bottom_zone_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 4)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('bottom_zone_id')
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

                <div class="mb-3">
                    <label for="barcode" class="form-label fw-semibold">
                        <span class="text-danger">Barcode</span>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" id="barcode"  value="{{ old('barcode') }}" required autofocus>
                    @error('barcode')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">
                        <span class="text-danger">Description</span>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value="{{ old('description') }}" required autofocus>
                    @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
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

                <button class="btn btn-primary w-100 mb-5" type="submit">
                    Save
                </button>
            </form>
        </div>
    </div>

@endsection