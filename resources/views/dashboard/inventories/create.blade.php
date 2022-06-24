@extends('dashboard.layout.main')
@section('content')
    <!-- Main content -->
    <main>
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Inventory</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-lg-8">
                <form method="POST" action="/dashboard/inventories" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title">
                      @error('title')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
        
                    <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
        
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input id="desc" type="hidden" name="desc">
                        <trix-editor input="desc"></trix-editor>
                    </div>
                    
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Inventory</button>
                </form>
            </div>
        
            <script>
                document.addEventListener('trix-file-accept', function(e){
                    e.preventDefault();
                })
            </script>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
</main>
@endsection


