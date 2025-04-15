<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// =====================
// Authentication Routes
// =====================

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ===========================
// Public Post Listing (index)
// ===========================
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// ===============
// Root Redirection
// ===============
Route::get('/', fn() => redirect()->route('posts.index'));

// ===========================
// Authenticated User Routes
// ===========================
Route::middleware(['auth'])->group(function () {
    // Other post routes except index (create, store, edit, etc.)
    Route::resource('posts', PostController::class)->except(['index']);

    // Admin-only routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('posts', PostController::class);
    });


    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/posts/create', [AdminController::class, 'createPost'])->name('admin.createPost');
        Route::post('/posts/store', [AdminController::class, 'storePost'])->name('admin.storePost');
        Route::get('/posts/edit/{id}', [AdminController::class, 'editPost'])->name('admin.editPost');
        Route::post('/posts/update/{id}', [AdminController::class, 'updatePost'])->name('admin.updatePost');
        Route::delete('/posts/delete/{id}', [AdminController::class, 'deletePost'])->name('admin.deletePost');
    });
    
});
