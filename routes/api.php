<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Locations\LocationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostsController::class, 'posts']);
Route::get('/posts/{id}', [PostsController::class, 'postsById']);
Route::post('/posts', [PostsController::class, 'postsSave']);

Route::get('/locations', [LocationsController::class, 'locations']);
Route::get('/locations/{id}', [LocationsController::class, 'locationsById']);
Route::post('/locations', [LocationsController::class, 'locationsSave']);