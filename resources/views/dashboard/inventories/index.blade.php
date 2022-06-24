@extends('dashboard.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List Inventories</h1>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel
            </div>
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
            {{ session('success') }}
            </div>
          @endif

          <div class="table-responsive col-lg-8">
            <a href="/dashboard/inventories/create" class="btn btn-success mb-3">Create new inventory</a>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($inventories as $inventory)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventory->title }}</td>
                    <td>{{ $inventory->category->name }}</td>
                    <td>
                        <a href="/dashboard/inventories/{{ $inventory->slug }}" class="text-decoration-none"><button class="text-decoration-none border-0 btn btn-primary">View</button></a>
                        <a href="/dashboard/inventories/{{ $inventory->slug }}/edit" class="text-decoration-none d-inline"><button class="text-decoration-none border-0 btn btn-warning">Edit</button></a>
                        <form action="/dashboard/inventories/{{ $inventory->slug }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="text-decoration-none border-0 btn btn-danger" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</main>

@endsection


