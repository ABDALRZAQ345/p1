<?php

namespace App\Http\Controllers;

use App\Models\Post;

class Searchcontroller extends Controller
{
    public function index()
    {

        $title = request()->search;
        $posts = Post::with('user')
            ->where(function ($query) use ($title) {
                $query->where('title', 'like', '%'.$title.'%')
                    ->orWhereHas('user', function ($query) use ($title) {
                        $query->where('name', 'like', '%'.$title.'%');
                    });
            })
            ->paginate(10)
            ->appends(['search' => $title]);

        return view('results', ['posts' => $posts]);
    }
}
