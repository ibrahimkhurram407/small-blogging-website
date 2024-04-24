<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'text' => 'required',
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->topic = $request->topic;
        $post->text = $request->text;
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }
}
