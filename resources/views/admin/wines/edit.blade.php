@extends('layouts.admin')

@section('content')
    <div class="container">

        <form action="{{ route('admin.wines.update', $wine) }}" method="POST" class="mb-3">

            @csrf
            @method('PUT')

            <h1>{{ $wine->title }}</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name', $wine->name) }}" aria-describedby="emailHelp">
                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="winery" class="form-label">Winery</label>
                <textarea name="winery" id="winery" value="" class="form-control @error('winery') is-invalid @enderror"
                    cols="50" rows="5">{{ old('winery', $wine->winery) }}</textarea>
                @error('winery')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">String URL for the image</label>
                <input type="text" name="image" class="form-control @error('image') is-invalid @enderror"
                    id="image" value="{{ old('image', $wine->image) }}" aria-describedby="emailHelp">
                @error('image')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating_average" class="form-label">rating_average</label>
                <input type="text" name="rating_average"
                    class="form-control @error('rating_average') is-invalid @enderror" id="rating_average"
                    value="{{ old('rating_average', $wine->rating_average) }}" aria-describedby="emailHelp">
                @error('rating_average')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rating_reviews" class="form-label">rating_reviews</label>
                <input type="text" name="rating_reviews"
                    class="form-control @error('rating_reviews') is-invalid @enderror" id="rating_reviews"
                    value="{{ old('rating_reviews', $wine->rating_reviews) }}" aria-describedby="emailHelp">
                @error('rating_reviews')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">location</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                    id="location" value="{{ old('location', $wine->location) }}" aria-describedby="emailHelp">
                @error('location')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary me-3">Update wine</button>

            <button type="reset" class="btn btn-warning me-3">Reset</button>

        </form>

    </div>
@endsection
