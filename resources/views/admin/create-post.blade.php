@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Post</h2>

    <form action="{{ route('admin.storePost') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <select name="author_id" class="form-control" required>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Publish Post</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
