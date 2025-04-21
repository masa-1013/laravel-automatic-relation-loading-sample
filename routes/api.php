<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{user}/posts-with-comments', [UserController::class, 'postsWithComments']); 