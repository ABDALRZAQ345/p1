<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $postsfromdb = Post::with('user')->paginate(10);

        return view('posts.index', ['all' => $postsfromdb]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.creat');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
        ]);
        $description = request()->description;
        $creator = Auth::user()->id;
        $title = request()->title;
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->user_id = $creator;
        $post->save();

        \Illuminate\Support\Facades\Mail::to($post->user->email)->queue(new \App\Mail\Postcreated($post));

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $validataed = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required '],
        ]);

        $post->update($validataed);

        return to_route('posts.show', $post);

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index');
    }
}
