<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function subscriptionHandler(Blog $blog){
        if(auth()->user()->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return redirect('blogs/'.$blog->slug)->with('status', config('alert.subscribeAlert.subscribe'));
    }
}
