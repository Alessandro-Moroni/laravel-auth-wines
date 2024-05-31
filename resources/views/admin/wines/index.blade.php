@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-5">Wines</h1>



    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class="container">
        <form action="{{route('admin.wines.index')}}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="toSearch" placeholder="Search Wines" aria-label="Search">
            <button class="btn btn-success" type="search">Search</button>
        </form>
    </div>

    <div class="container">
        <div class="row row-cols-3">
            @foreach ($wines as $wine)
                <div class="col py-3">
                    <div class="card pt-3 h-100" style="width: 18rem;">
                        <img src="{{ $wine->image }}" class="card-img-top" alt="{{ $wine->name }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $wine->name }}</h3>
                            <h5 class="card-text">{{ $wine->winery }}</h5>
                            <span>voto: {{ $wine->rating_average }}</span>
                            <p>{{ $wine->rating_reviews }}</p>
                            <p class="location">{{ $wine->location }}</p>

                            <a type="" class="btn btn-success" href="{{ route('admin.wines.show', $wine) }}">
                                <i class="fa-solid fa-face-grin-tongue-wink"></i>
                            </a>
                            <a type="" class="btn btn-warning" href="{{ route('admin.wines.edit', $wine) }}">
                                <i class="fa-solid fa-face-frown"></i>
                            </a>

                            <form action="{{ route('admin.wines.destroy', $wine) }}" method="POST" class="d-inline-block"
                                onsubmit="return confirm('Are you sure want to delete {{ $wine->name }}?')">
                                @csrf
                                @method('DELETE')


                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-face-sad-cry"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        {{ $wines->links('pagination::bootstrap-5') }}
    </div>

@endsection
