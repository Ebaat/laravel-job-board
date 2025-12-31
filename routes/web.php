<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', [IndexController::class, 'index']);

Route::get('/job', [JobsController::class, 'index']);

Route::get('/about', [IndexController::class, 'about']);

Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/blog', [PostController::class, 'index']);

Route::get('/blog/create', [PostController::class, 'create']);

Route::get('/blog/delete', [PostController::class, 'delete']);

Route::get('/blog/{id}', action: [PostController::class, 'show']);

Route::get('/comments', [App\Http\Controllers\CommentController::class, 'index']);

Route::get('/comments/create', [App\Http\Controllers\CommentController::class, 'create']);

Route::get('/tags', [App\Http\Controllers\TagController::class, 'index']);

Route::get('/tags/create', [App\Http\Controllers\TagController::class, 'create']);

Route::get('/tags/test-many', [App\Http\Controllers\TagController::class, 'testmanytomany']);
