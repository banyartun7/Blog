<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
    return view('blogs', ['blogs' => Blog::latest()
                            ->filter(request(['search','category','author']))
                            ->paginate(6)
                            ->withQueryString()
                            ]);//lazy loading with() ka relationship method name yay ya
    }

    public function show(Blog $blog){
        return view('blog',['blog' => $blog, 'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);    
    }
}
