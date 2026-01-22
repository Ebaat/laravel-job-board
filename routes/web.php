<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', IndexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);


Route::get('/job', [JobsController::class, 'index']);

Route::resource('blog', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('tags', TagController::class);



Route::get('/tags/test-many', [App\Http\Controllers\TagController::class, 'testmanytomany']);

// Authentication Routes
Route::get('/signup', [App\Http\Controllers\AuthController::class, 'showSignupForm']);
Route::post('/signup', [App\Http\Controllers\AuthController::class, 'signup']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
