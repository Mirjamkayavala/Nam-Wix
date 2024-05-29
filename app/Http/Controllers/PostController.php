<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
    //    return "Hello";
        // dd($posts);
        // $posts =Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        // $post = Post::with('user')->latest()->get();
        // if ($posts->isEmpty()) {
        //     return redirect()->route('posts.index')->with('error', 'No posts found');
        // }
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('posts.store', $post->id)->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $posts = \App\Models\Post::all();
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    { 
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }


}
