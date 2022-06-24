@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-2">{{ $inventory->title }}</h2>
                <p>Penulis : </p>
                <h5>{{ $inventory->category->name }}</h5>

               

                @if ($inventory->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $inventory->image) }}" alt="{{ $inventory->category->name }}" class="img-fluid mt-3">
                    </div>
                @endif
                {!! $inventory->desc !!}
                <a href="{{ $inventory->link }}" class="btn btn-success">Download Book</a>
                <a href="/inventory" class="btn btn-primary text-decoration-none">Kembali ke Inventory</a>
            </div>
        </div>
    </div>

    
@endsection