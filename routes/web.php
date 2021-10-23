<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [RestaurantController::class, 'showFrontPage'])->name('front_page.index');
Route::get('comments/{id}', [CommentController::class, 'show'])->name('comments.show');
Route::get('restaurants/show/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');

//////////////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('restaurants', RestaurantController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('users', UserController::class);

    Route::post('comments/store/{id}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{id}/crear', [CommentController::class, 'create'])->name('comments.create');
});
