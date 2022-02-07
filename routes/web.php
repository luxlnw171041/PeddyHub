<?php

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
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/privacy_policy', function () {
    return view('privacy_policy');
});
Route::get('/terms_of_service', function () {
    return view('terms_of_service');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit_profile', 'ProfileController@edit_profile');
// Google login
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// Facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Line login
Route::get('login/line', 'Auth\LoginController@redirectToLine')->name('login.line');
Route::get('login/line/callback', 'Auth\LoginController@handleLineCallback');

Route::get('/welcome_line', 'PetController@welcome_line');
Route::get('/welcome_line_pet', 'PetController@welcome_line_pet');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('pet', 'PetController');
    Route::resource('profile', 'ProfileController');
});
Route::resource('post', 'PostController');
Route::get('/post/create', 'PostController@create')->name('post_create');

Route::resource('comment', 'CommentController');
Route::get('comment/{id}', 'CommentController@test');
Route::resource('like', 'LikeController');
Route::resource('like', 'LikeController');
Route::resource('adoptpet', 'AdoptpetController');