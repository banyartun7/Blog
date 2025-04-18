<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\subscribeController;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
Route::post('/blogs/{blog:slug}/subscription', [subscribeController::class, 'subscriptionHandler']);

//Admin Routes
Route::middleware('can:admin')->group(function(){
    Route::resource('/admin/blogs', AdminController::class);
});