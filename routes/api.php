<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/lineapi', 'API\LineApiController@store');

Route::get('/change_language/{language}/{user_id}', 'API\API_language@change_language');
Route::get('/change_country/{user_id}','API\LocationController@change_country');
Route::get('/user_language/{language}/{user_id}','API\LocationController@user_language');

// หารูปภาพสัตว์เลี้ยง
Route::get('/select_img_pet/{pet_id}','API\API_Lost_PetController@select_img_pet');

// หาจังหวัด
Route::get('/select_province/','API\LocationController@show_location_P');
Route::get('/select_amphoe/{province}','API\LocationController@show_location_A');
Route::get('/select_tambon/{province}/{amphoe}','API\LocationController@show_location_T');
Route::get('/select_lat_lng/{province}/{amphoe}/{tambon}','API\LocationController@show_location_latlng');
