<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');
