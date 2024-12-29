<?php

use Illuminate\Support\Facades\Route;

// Define your API routes here
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth.token')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    
    // Blog Routes
    Route::get('/blogs', [BlogController::class, 'index']);              // List all blogs
    Route::post('/blogs', [BlogController::class, 'store']);             // Create a new blog
    Route::get('/blogs/{blog}', [BlogController::class, 'show']);        // Show a specific blog
    Route::put('/blogs/{blog}', [BlogController::class, 'update']);      // Update a specific blog
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);  // Delete a specific blog
    
});