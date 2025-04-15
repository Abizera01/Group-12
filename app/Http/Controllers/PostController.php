<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ Import base Controller

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id(); // ✅ assign author
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post created with author!');
    }

    public function edit($id)
{
    $post = Post::findOrFail($id); // or Post::where('id', $id)->first()
    return view('posts.edit', compact('post'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
}


     public function destroy($id)
{
        $post = Post::findOrFail($id);
        $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
}


}
