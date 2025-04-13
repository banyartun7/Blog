<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $commentBody = request()->validate([
            'comment' => 'required'
        ]);
        $blog->comments()->create([
            'body' => $commentBody['comment'],
            'user_id' => auth()->id(),
            'blog_id' => $blog->id
        ]);
        return redirect('blogs/'.$blog->slug)->with('status', config('alert.comment.create'));
    }
}
