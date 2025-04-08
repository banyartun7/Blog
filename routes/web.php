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

Route::get('/', function () {
    return view('blogs', ['blogs' => Blog::latest()->get()]);//lazy loading with() ka relationship method name yay ya
});

Route::get('/blogs/{blog:slug}', function(Blog $blog){
    return view('blog',['blog' => $blog]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function(Category $category){
    return view('blogs', ['blogs' => $category->blog]);
});

Route::get('/users/{user:username}', function(User $user){
    return view('blogs', ['blogs' => $user->blogs]);
});