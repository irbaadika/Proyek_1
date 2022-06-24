@extends('layouts.main')
@section('container')
<h1 class="mb-5">Course Category : {{ $category }}</h1>
<div class="card mb-3">
                @if ($inventories[0]->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $inventories[0]->image) }}" alt="{{ $inventories[0]->category->name }}" class="img-fluid mt-3">
                    </div>
                @endif
    <div class="card-body text-center">
        <h5 class="card-title">{{ $inventories[0]->title }}</h5>
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
                @if ($inventories[0]->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $inventories[0]->image) }}" alt="{{ $inventories[0]->category->name }}" class="img-fluid mt-3">
                    </div>
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{ $inventory->title }}</h5>
                  <p>
                    <small class="text-muted">
                        <a href="/categories/{{ $inventories[0]->category->slug }}" class="text-decoration-none">{{ $inventories[0]->category->name }}</a>
                    </small>
                </p>
                  <p class="card-text">{{ $inventory->pendek }}</p>
                  <a href="/inventories/{{ $inventory->slug }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
    
