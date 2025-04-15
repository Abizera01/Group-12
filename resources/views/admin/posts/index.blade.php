@extends('layouts.admin')

@section('content')
<h1>All Posts</h1>
<a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create New Post</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Title</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
