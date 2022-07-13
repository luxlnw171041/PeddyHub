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
Route::get('/user_language/{language}/{user_id}','API\API_language@change_language');

// หารูปภาพสัตว์เลี้ยง
Route::get('/select_img_pet/{pet_id}','API\API_Lost_PetController@select_img_pet');

// หาจังหวัด
Route::get('/select_province/','API\LocationController@show_location_P');
Route::get('/select_amphoe/{province}','API\LocationController@show_location_A');
Route::get('/select_tambon/{province}/{amphoe}','API\LocationController@show_location_T');
Route::get('/select_lat_lng/{province}/{amphoe}/{tambon}','API\LocationController@show_location_latlng');

Route::get('/change_language_fromline/{language}/{user_id}', 'API\API_language@change_language_fromline');

Route::get('search_my_location/{latlng}/{distance}', 'Hospital_nearController@search_my_location');
Route::get('search_my_location_recommend/{latlng}/{distance}', 'Hospital_nearController@search_my_location_recommend');

Route::get('search_location_by_T_recommend/{input_province}/{input_amphoe}/{input_tambon}', 'Hospital_nearController@search_location_by_T_recommend');

Route::get('search_location_by_T/{input_province}/{input_amphoe}/{input_tambon}', 'Hospital_nearController@search_location_by_T');

Route::get('/search_data_user/{user_id}', 'Blood_bankController@search_data_user');
Route::get('/search_data_pet_of_user/{user_id}', 'Blood_bankController@search_data_pet_of_user');

Route::post('/send_data_to_user', 'Blood_bankController@send_data_to_user');

Route::get('/cf_blood_user/{blood_id}/{cf_or_nocf}', 'Blood_bankController@cf_blood_user');
Route::get('/check_cf_blood_foruser/{blood_id}', 'Blood_bankController@check_cf_blood_foruser');

Route::get('/update_lost_pet/nosend/{id}', 'Lost_PetController@update_lost_pet_nosend');
Route::get('/update_lost_pet/send_line/{id}', 'Lost_PetController@update_lost_pet_send_line');

Route::get('/select_category/','API\CategoryController@category');
Route::get('/select_sub_category/{category}','API\CategoryController@sub_category');
Route::get('/select_size/{size}','API\CategoryController@sub_size');
Route::get('/select_species/{species}','API\CategoryController@species');

Route::get('/search_name/{id_partner_name_area}/{text_name_area}/{name}','API\PartnersController@search_name');
Route::get('/show_group_risk/{id}/{id_partner_name_area}/{name_disease}','API\PartnersController@show_group_risk');

Route::post('/send_risk_group', 'API\PartnersController@send_risk_group');
Route::get('/submit_show_homepage/{partner_id}/{input_show_homepage}', 'API\PartnersController@submit_show_homepage');

Route::post('/save_img_url', 'API\ImageController@save_img_url');
Route::post('/admin_create_img_check_in', 'API\ImageController@admin_create_img_check_in');
Route::post('/create_img_check_in', 'API\ImageController@create_img_check_in');
Route::get('/create_new_area_check_in/{name_partner}/{name_new_check_in}', 'Check_inController@create_new_area_check_in');

Route::get('/user_like_post/{user_id}/{post_id}', 'PostController@user_like_post');
Route::get('/un_user_like_post/{user_id}/{post_id}', 'PostController@un_user_like_post');
Route::get('/show_all_comment/{post_id}', 'PostController@show_all_comment');
Route::get('/show_data_profile/{user_id}', 'PostController@show_data_profile');
Route::get('/check_data_partner/{user_organization}','API\PartnersController@check_data_partner');
Route::get('/change_color_navbar/{color_navbar}/{name_partner}', 'API\PartnersController@change_color_navbar');
Route::get('/change_color_menu/{color_navbar}/{name_partner}/{class_color_menu}', 'API\PartnersController@change_color_menu');






