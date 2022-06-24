@extends('layouts.main')
@section('container')

    <div class="card mb-3">
        <h1 class="mb-3 text-center">Books</h1>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/inventories">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit" >Search</button>
                      </div>
                </form>
            </div>
        </div>
        @if($inventories->count())
                @if ($inventories[0]->image)
                    <div class="text-center" style="rounded mx-auto d-block; overflow:hidden;">
                        <img src="{{ asset('storage/' . $inventories[0]->image) }}" alt="{{ $inventories[0]->category->name }}" class="img-fluid">
                    </div>
                @endif
        <div class="card-body text-center">
            <h5 class="card-title">{{ $inventories[0]->title }}</h5>
            <p>Penulis : {{ $inventories[0]->penulis }}</p>
            <p>
                <small class="text-muted">
                    <a href="/categories/{{ $inventories[0]->category->slug }}" class="text-decoration-none">{{ $inventories[0]->category->name }}</a>
                </small>
            </p>
            <p class="card-text">{{ $inventories[0]->pendek }}</p>
            <a href="/inventories/{{ $inventories[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($inventories->skip(1) as $inventory)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if ($inventory->image)
                        <img src="{{ asset('storage/' . $inventory->image) }}" alt="{{ $inventory->category->name }}" class="img-fluid">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $inventory->title }}</h5>
                      <p>Penulis : {{ $inventory->penulis }}</p>
                      <div><p>Jenis : {{ $inventory->category->name }} </p></div>
                      <p class="card-text">{{ $inventory->pendek }}</p>
                      <a href="/inventories/{{ $inventory->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-4">No Book Found!</p>
    @endif
@endsection
    
