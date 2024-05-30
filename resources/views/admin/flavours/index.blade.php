@extends('layouts.admin')

@section('content')
    <h1 class="text-center my-5">Wines</h1>

    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        <div class="row row-cols-3">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-decoration-underline" scope="col">Nome</th>
                        <th class="text-decoration-underline" scope="col">Funzioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flavours as $flavour)
                    <tr>
                        <th class="text-capitalize">{{ $flavour->name }}</th>
                        <td class="d-flex">
                            <a href="{{ route('admin.flavours.show', $flavour) }}" class="btn btn-success me-2"><i class="fa-solid fa-face-grin-tongue-wink"></i></a>
                            <form action="{{ route('admin.flavours.destroy', $flavour) }}" method="POST" onsubmit="return confirm('Are you sure want to delete {{ $flavour->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-face-sad-cry"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
