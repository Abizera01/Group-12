@extends('layout')

@section('content')
    <h2>Create Post</h2>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Author</label>

            @php use Illuminate\Support\Facades\Auth; @endphp
            @if(Auth::check())
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
            @else
                <input type="text" class="form-control" value="Guest" readonly>
            @endif
        </div>

        <button class="btn btn-success">Save</button>
    </form>
    @endsection


