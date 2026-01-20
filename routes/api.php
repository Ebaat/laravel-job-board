<?php

use App\Http\Controllers\Api\v1\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;


Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);
});
