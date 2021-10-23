<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserControllerApi;
use App\Http\Controllers\api\CommentsControllerApi;
use App\Http\Controllers\api\RestaurantControllerApi;

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
});
Route::apiResource('users', UserControllerApi::class)->only('index', 'show');
Route::apiResource('restaurants', RestaurantControllerApi::class);
route::apiResource('comments', CommentsControllerApi::class)->only('store', 'destroy');




