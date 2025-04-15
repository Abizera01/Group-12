@extends('layouts.admin')

@section('content')
<h2>Edit Post</h2>

<form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Body:</label>
        <textarea name="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
@endsection
