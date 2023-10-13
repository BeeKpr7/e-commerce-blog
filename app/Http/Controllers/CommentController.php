<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store (Post $post)
    {
        $attributes = request()->validate(['body' => 'required|min:5']);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return back();
    }
}
