@extends('layout')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">
        {{ request()->is('admin/login') ? 'Admin Login' : 'User Login' }}
    </h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ request()->is('admin/login') ? route('admin.login.submit') : route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">{{ request()->is('admin/login') ? 'Admin Email' : 'Email' }}</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ request()->is('admin/login') ? 'Admin Password' : 'Password' }}</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-dark">
                {{ request()->is('admin/login') ? 'Login as Admin' : 'Login' }}
            </button>
        </div>
    </form>

    <div class="mt-3 text-center">
        @if(!request()->is('admin/login'))
            <a href="{{ url('/register') }}" class="btn btn-secondary">Register</a>
            <a href="{{ url('/admin/login') }}" class="btn btn-outline-dark">Admin Login</a>
        @else
            <a href="{{ url('/login') }}" class="btn btn-secondary">User Login</a>
        @endif
    </div>
</div>
@endsection
