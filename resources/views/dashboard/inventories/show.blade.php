@extends('dashboard.layout.main')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Inventory View</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <div class="row my-3">
                    <div class="col-md-8">
                        <h1 class="mb-2">{{ $inventory->title }}</h2>
                        <p>Penulis : {{ $inventory->penulis }}</p>
                        {!! $inventory->desc !!}
                        <a href="/dashboard/inventories" class="btn btn-primary"><span>Kembali ke Home Inventory</span></a>
                        <a href="/dashboard/inventories/{{ $inventory->slug }}/edit" class="btn btn-warning"><span>Edit</span></a>
        
                        <form action="/dashboard/inventories/{{ $inventory->slug }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                        </form>
                        
                        @if ($inventory->image)
                            <div style="max-height:350px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $inventory->image) }}" alt="{{ $inventory->category->name }}" class="img-fluid mt-3">
                            </div>
                        @endif
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
@endsection


