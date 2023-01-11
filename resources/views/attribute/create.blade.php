@extends('layouts.app')
@section('title')
    Aýratynlyk Döretmek
@endsection
@section('content')
    <div class="container-xl py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="fs-4 fw-semibold text-center mb-3">
                    Aýratynlyk Döretmek
                </div>

                <form action="{{ route('attributes.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="attribute" class="form-label fw-semibold">
                            Haýsy Ayratynlykda
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('attribute') is-invalid @enderror" name="attribute" id="attribute" required autofocus>
                            @foreach($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{$attribute->name}}</option>
                            @endforeach
                        </select>
                        @error('attribute')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--Name--}}
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">value<span class="text-danger">*</span></label>
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