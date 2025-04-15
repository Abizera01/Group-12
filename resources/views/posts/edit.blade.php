@extends('layout')

@section('content')
    <h2>Edit Post</h2>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control" required>{{ $post->body }}</textarea>
        </div>

        <p>Author: {{ $post->author->name }}</p>

        <p>Author: {{ $post->author ? $post->author->name : 'Unknown' }}</p>
        <p>Author: {{ $post->author?->name ?? 'Unknown' }}</p>




        <button class="btn btn-primary">Update</button>
   
@endsection

