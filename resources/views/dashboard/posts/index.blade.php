@extends('dashboard.layout.main')

@section('containts')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Web Post Dashboard Perpus</h1>
</div>
<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Excerpt</th>
              <th scope="col">Body</th>
              <th scope="col">Edit/Update</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->excerpt }}</td>
                    <td>{{ $post->body }}</td>
                    <td><a href="/dashboard/posts/create" class="btn btn-info"><span data-feather="edit-3"></span></a>
                        <a href="/dashboard/posts/{{ $post-> id }}/edit" class="btn btn-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post-> id }}" method="post">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('u sure bout that')"><span data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
@endsection