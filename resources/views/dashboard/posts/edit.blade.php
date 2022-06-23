@extends('dashboard.layout.main')

@section('containts')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit</h1>
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/posts/{{ $post->id }}">
@method('PUT')
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
  </div>
  <div class="mb-3">
    <label for="excerpt" class="form-label">Excerpt</label>
    <input type="text" class="form-control" id="excerpt" name="excerpt" value="{{ $post->excerpt }}">
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea class="form-control" id="body" rows="3" name="body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
@endsection