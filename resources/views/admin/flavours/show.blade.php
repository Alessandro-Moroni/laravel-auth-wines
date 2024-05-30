@extends('layouts.admin')

@section('content')
    <div class="container py-5 d-flex">
        <h2 class="me-3 text-capitalize">{{ $flavour->name }}</h2>

        <ul class="overflow-auto h_70_vh me-4">
            @foreach ($flavour->wines as $wine)
                <li><a href="{{ route('admin.wines.show', $wine) }}" class="text-capitalize text-light">{{ $wine->name }}</a></li>
            @endforeach
        </ul>

        <form action="{{ route('admin.wines.destroy', $flavour) }}" method="POST" class="d-inline-block"
            onsubmit="return confirm('Are you sure want to delete {{ $flavour->name }}?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger me-3">
                <i class="fa-solid fa-face-sad-cry"></i>
            </button>

        </form>


        <div>
            <a type="" class="btn btn-primary" href="{{ route('admin.wines.index') }}">
                <i class="fa-solid fa-face-grin-beam-sweat"></i>
            </a>
        </div>
    </div>
@endsection
