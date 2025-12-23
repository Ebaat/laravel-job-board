<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', [IndexController::class, 'index']);

Route::get('/job', [JobsController::class, 'index']);

Route::get('/about', [IndexController::class, 'about']);

Route::get('/contact', [IndexController::class, 'contact']);
