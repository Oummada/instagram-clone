<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//feed
Route::get('/feed', [PostController::class, 'feed'])->name('feed');


//profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('editprofile', [ProfileController::class, 'editprofile'])->name('editprofile');


//posts
Route::get('postPage', [PostController::class, 'postPage'])->name('newPost');
Route::post('postnew', [PostController::class, 'store'])->name('store');