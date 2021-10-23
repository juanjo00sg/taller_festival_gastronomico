<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\UserControllerApi;
use App\Http\Controllers\api\v1\CommentsControllerApi;
use App\Http\Controllers\api\v1\RestaurantControllerApi;

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

Route::post('login',[ AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout',[ AuthController::class, 'logout'])->name('api.logout');
});

Route::apiResource('users', UserControllerApi::class)->only('index', 'show');
Route::apiResource('restaurants', RestaurantControllerApi::class);
route::apiResource('comments', CommentsControllerApi::class)->only('store', 'destroy');


