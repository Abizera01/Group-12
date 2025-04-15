@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.createPost') }}" class="btn btn-primary mb-3">+ Create New Post</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name ?? 'N/A' }}</td>
                <td>{{ $post->author->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.editPost', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.deletePost', $post->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
