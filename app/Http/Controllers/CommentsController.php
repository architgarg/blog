<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required | min:4']);
        $post->addComment(request('body'));
        return back();
    }
}
