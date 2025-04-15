@extends('layout') <!-- Uses the layout.blade.php -->

@section('content')





    <h2 class="mb-4">Blog Posts</h2>




    
  
    <!-- New Post Button -->
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Post</a>



    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>

    
</form>

    <!-- Posts List -->
    @forelse ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->body }}</p>

                <p class="text-muted mb-2">
                    <small>By: {{ $post->author?->name ?? 'Unknown Author' }}</small>
                </p>
            

                <!-- Action Buttons -->
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No blog posts found.</p>
     

    @endforelse
@endsection

