<?php

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('blogs', [BlogController::class, 'index']);
Route::get('blogs/{id}', [BlogController::class, 'show']);
Route::post('blog', [BlogController::class, 'store']);
Route::patch('blog', [BlogController::class, 'update']);
Route::delete('blog/{id}', [BlogController::class, 'destroy']);
