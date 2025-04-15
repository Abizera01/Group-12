<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Author;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        $posts = Post::with('category', 'author')->latest()->get();
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.dashboard', compact('posts', 'categories', 'authors'));
    }

    // Show form to create a new post
    public function createPost()
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.create-post', compact('categories', 'authors'));
    }

    // Store a new post
    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        Post::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }

    // Edit post
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.edit-post', compact('post', 'categories', 'authors'));
    }

    // Update post
    public function updatePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        $post->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully.');
    }

    // Delete post
    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully.');
    }
}
