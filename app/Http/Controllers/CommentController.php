<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Mail\SubscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $subscribers = $blog->subscribers->filter(fn($subscriber)=>$subscriber->id !== auth()->id());
        $subscribers->each(function($subscriber) use ($blog){
            Mail::to($subscriber->email)->send(new SubscriberMail($blog));
        });
        return redirect('blogs/'.$blog->slug)->with('status', config('alert.comment.create'));
    }
}
