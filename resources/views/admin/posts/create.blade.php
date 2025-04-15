@extends('layouts.admin')

@section('content')
<h2>Create New Post</h2>

<form method="POST" action="{{ route('admin.posts.store') }}">
    @csrf
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Body:</label>
        <textarea name="body" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>
@endsection
