@extends('layouts.main')
@section('container')
    <h1 class="mb-5">Book Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/categories/{{ $category->slug }}">
                    <div class="card bg-dark text-white">
                        @if ($category->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $inventory->category->name }}" class="img-fluid mt-3">
                    </div>
                @endif
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-0" style="background-color: rgba(0, 0, 0, 0.5)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
    
