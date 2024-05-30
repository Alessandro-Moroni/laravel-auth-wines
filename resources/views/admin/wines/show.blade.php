@extends('layouts.admin')

@section('content')
    <div class="container py-5 d-flex">
        <h2 class="me-3">{{ $wine->name }}</h2>


        <form action="{{ route('admin.wines.destroy', $wine) }}" method="POST" class="d-inline-block"
            onsubmit="return confirm('Are you sure want to delete {{ $wine->name }}?')">
            @csrf
            @method('DELETE')


            <button type="submit" class="btn btn-danger me-3">
                <i class="fa-solid fa-face-sad-cry"></i>
            </button>

            <a type="" class="btn btn-primary" href="{{ route('admin.wines.index') }}">
                <i class="fa-solid fa-face-grin-beam-sweat"></i>
            </a>

        </form>

    </div>
    <div class="container my-3 d-flex">

        <div class="container w-25">

            <img src="{{ $wine->image }}" alt="">

        </div>
        <div class="container">

            <p><i class="fa-solid fa-location-dot"></i> Posizione: {{ $wine->location }}</p>
            <p>Enoteca: {{ $wine->winery }}</p>
            <p>Voto: {{ $wine->rating_average }}</p>
            <p>Recensioni totali: {{ $wine->rating_reviews }}</p>

        </div>





    </div>
@endsection
