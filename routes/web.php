<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', action: function () {
    $blogs = Blog::latest();
    if(request('search')){
        $blogs = $blogs->where('title', 'LIKE' ,'%'.request('search').'%');
    }
    return view('blogs', ['blogs' => $blogs->get(), 'categories' => Category::all()]);//lazy loading with() ka relationship method name yay ya
});

Route::get('/blogs/{blog:slug}', action: function(Blog $blog){
    return view('blog',['blog' => $blog, 'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
})->where('blog', '[A-z\d\-_]+');

Route::get(uri: '/categories/{category:slug}', action: function(Category $category){
    return view('blogs', ['blogs' => $category->blog, 'categories' => Category::all(), 'currentCategory' => $category]);
});

Route::get('/users/{user:username}', function(User $user){
    return view('blogs', ['blogs' => $user->blogs]);
});