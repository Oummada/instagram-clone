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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', function () {
    return view('auth/register');
})->name('register');



Route::group(['middleware'=>'auth'],function(){
//feed
Route::get('/', [PostController::class, 'feed'])->name('feed');


//profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('editprofile/{id}', [ProfileController::class, 'editprofile'])->name('editprofile');
Route::PATCH('updated', [ProfileController::class, 'updateProfile'])->name('updateProfile');


//posts
Route::get('postPage', [PostController::class, 'postPage'])->name('newPost');
Route::post('postnew', [PostController::class, 'store'])->name('store');
});