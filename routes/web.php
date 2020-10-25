<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/tweets', [TweetController::class, 'index']);
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy']);
    Route::post('/tweets/{tweet}/thumbnail', [TweetController::class, 'uploadThumbnail']);
    Route::get('/explore', [ExploreController::class, 'index']);

    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store']);
    Route::delete('/tweets/{tweet}/dislike', [TweetLikeController::class, 'destroy']);

    Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profile');
    Route::get('/{user:username}/edit', [ProfileController::class, 'edit'])->middleware('can:update,user');
    Route::patch('/{user}', [ProfileController::class, 'update'])->middleware('can:update,user');

    Route::post('/{user}/avatar', [ProfileController::class, 'uploadAvatar'])->middleware(('can:update,user'));

    Route::post('/{user}/follow', [FollowsController::class, 'store']);
});
