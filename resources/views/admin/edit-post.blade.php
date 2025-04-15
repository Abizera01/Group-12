@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Post</h2>

    <form action="{{ route('admin.updatePost', $post->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <select name="author_id" class="form-control" required>
                @foreach($authors as $author)
                <option value="{{ $author->id }}" @if($post->author_id == $author->id) selected @endif>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update Post</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
