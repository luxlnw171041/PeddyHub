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
Route::get('/product', function () {
    return view('product');
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
Route::get('/pet_insurance', function () {
    return view('pet_insurance');
});
// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::resource('text_topic', 'Text_topicController');
    Route::resource('hospital_near', 'Hospital_nearController');

});
// END ADMIN


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit_profile', 'userController@edit_profile');
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
    Route::resource('user', 'UserController');
    Route::resource('profile', 'ProfileController');
    Route::resource('post', 'PostController');
    Route::get('/post/create', 'PostController@create')->name('post_create');
    Route::resource('lost_pet', 'Lost_PetController');
    Route::get('/blood_bank', 'Blood_bankController@index');
    Route::get('/my_post', 'Lost_PetController@mypost');

});


Route::get('/post', 'PostController@index');


Route::resource('comment', 'CommentController');
Route::get('comment/{id}', 'CommentController@test');
Route::resource('like', 'LikeController');
Route::resource('like', 'LikeController');
Route::resource('adoptpet', 'AdoptpetController');
// Route::resource('profile', 'ProfileController');
Route::resource('pet_category', 'Pet_CategoryController');
// Route::resource('mylog', 'MylogController');


//RICH MENU LINE
Route::get('/login_line_reg_pet', 'PetController@welcome_line'); // ลงทะเบียนสัตว์
Route::get('/login_line_near_hospital', 'PetController@welcome_line_Hospital_near'); // รพ.ใกล้ฉัน
Route::get('/login_line_lost_pet', 'Lost_PetController@lost_pet_line'); // ตามหาเจ้าตัวแสบ
Route::get('/login_line_blood_bank', 'Blood_bankController@blood_bank_line');// หน้าindex ธนาคารเลือด
Route::get('/login_line_profile', 'ProfileController@profile_edit_line');// แก้ไขโปรไฟล์
Route::get('/login_line_profile2', 'ProfileController@profile_edit_line2');
Route::get('hospital_near', 'Hospital_nearController@index');

Route::middleware(['auth', 'role:admin-partner'])->group(function () {
    Route::resource('blood_bank', 'Blood_bankController')->except(['index','blood_bank_line']);
    // Route::get('blood_bank/wait_user', 'Blood_bankController@wait_user');
});