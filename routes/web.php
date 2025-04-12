<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);