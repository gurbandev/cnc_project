@extends('layouts.app')
@section('title')
    Create stanok
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="text-center px-5 mt-5 col-6">
            <h3>Stanok gosmak</h3>
            <hr>
            <form action="{{ route('machines.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="weight_id" class="form-label fw-semibold">
                        weight
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('weight_id') is-invalid @enderror" name="weight_id" id="weight_id"
                            required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 6)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('weight_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="working_area_id" class="form-label fw-semibold">
                        working area
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('working_area_id') is-invalid @enderror" name="working_area_id"
                            id="working_area_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 2)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('working_area_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="maxWorking_speed_id" class="form-label fw-semibold">
                        Max working speed
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('maxWorking_speed_id') is-invalid @enderror" name="maxWorking_speed_id"
                            id="maxWorking_speed_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 7)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('maxWorking_speed_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="maxTraveling_speed_id" class="form-label fw-semibold">
                        Max traveling speed
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('maxTraveling_speed_id') is-invalid @enderror"
                            name="maxTraveling_speed_id" id="maxTraveling_speed_id" required autofocus>
                        <option value="{{null}}" select='selected'>Yok</option>
                        @foreach($attributes as $attribute)
                            @if($attribute->attribute_id == 8)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('maxTraveling_speed_id')
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
                    <label for="description" class="form-label fw-semibold">
                        <span class="text-danger">Description</span>
                    </label>
                    <input type="text" class="form-control  " name="description" id="description"  value="{{ old('description') }}" >
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">
                        Surat gosmak
                    </label>
                    <input type="file" accept="image/jpeg" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                </div>

                <button class="btn btn-primary w-100 mb-5" type="submit">
                    Save
                </button>
            </form>
        </div>
    </div>

@endsection