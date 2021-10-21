<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RestaurantControllerApi;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::apiResource('restaurants', App\Http\Controllers\RestaurantControllerApi::class);

    


    Route::POST('comments/store/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{id}/crear', [App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
});
route::apiResource('comments',App\Http\Controllers\CommentsControllerApi::class );
Route::apiResource('users', App\Http\Controllers\UserController::class);
Route::apiResource('restaurants', App\Http\Controllers\RestaurantControllerApi::class);