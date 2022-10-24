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
Route::get('/', 'Home_pageController@home_page');
Route::get('/home', 'Home_pageController@home_page');

Route::get('/products', function () {
    return view('product');
});
// Route::get('product_category', function () {
//     return view('product.product_category');
// });
Route::get('/product_category', 'ProductController@product_category');

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
Route::get('/how_to_use', function () {
    return view('how_to_use');
});
// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::resource('text_topic', 'Text_topicController');
    Route::resource('hospital_near', 'Hospital_nearController');
    Route::resource('partner', 'PartnerController'); 
    Route::resource('time_zone', 'Time_zoneController');
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
Route::get('/welcome_line_pet', 'PetController@welcome_line_pet');
Route::get('/welcome_line_edit_pet', 'PetController@welcome_line_edit_pet');
Route::get('/edit_pet_login/{pet_id}', 'PetController@edit_pet_login');
Route::get('/edit_pet_airplane_login/{pet_id}', 'PetController@edit_pet_airplane_login');


Route::get('/welcome_check_in_line', 'Check_inController@welcome_check_in_line');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('pet', 'PetController')->except(['show']);
    Route::resource('user', 'UserController');
    Route::resource('profile', 'ProfileController');
    Route::resource('post', 'PostController');
    // Route::get('/post/create', 'PostController@create')->name('post_create');
    Route::resource('lost_pet', 'Lost_PetController');
    Route::get('/blood_bank', 'Blood_bankController@index');
    Route::get('/my_post', 'Lost_PetController@mypost');
    Route::resource('order-product', 'OrderProductController');
    Route::resource('order', 'OrderController');
    Route::get('/my_post_peddyshare', 'PostController@my_post_index');

});

Route::get('/pet/{id}', 'PetController@show');
Route::get('hospital_near', 'Hospital_nearController@index');
Route::get('petland_near', 'Hospital_nearController@pet_land_index');


Route::get('/post', 'PostController@index');
Route::get('login_line/post', 'PostController@login_line_post');

// Route::resource('comment', 'CommentController');
// Route::get('comment/{id}', 'CommentController@test');
// Route::resource('like', 'LikeController');
// Route::resource('like', 'LikeController');
Route::resource('adoptpet', 'AdoptpetController');
// Route::resource('profile', 'ProfileController');
Route::resource('pet_category', 'Pet_CategoryController');
// Route::resource('mylog', 'MylogController');


//RICH MENU LINE
Route::get('/login_line_reg_pet', 'PetController@welcome_line'); // ลงทะเบียนสัตว์
Route::get('/login_line_near_hospital', 'PetController@welcome_line_Hospital_near'); // รพ.ใกล้ฉัน
Route::get('/login_line_near_petland', 'PetController@welcome_line_petland_near'); // pet land ใกล้ฉัน
Route::get('/login_line_lost_pet', 'Lost_PetController@lost_pet_line'); // ตามหาเจ้าตัวแสบ
Route::get('/login_line_blood_bank', 'Blood_bankController@blood_bank_line');// หน้าindex ธนาคารเลือด
Route::get('/login_line_profile', 'ProfileController@profile_edit_line');// แก้ไขโปรไฟล์
Route::get('/login_line_profile2', 'ProfileController@profile_edit_line2');

// Route::get('login_line_petdating', 'Hospital_nearController@index'); // petdating
Route::get('/login_line_petdating', function () {
    return view('soon');
});

// Route::get('/login_line_near_petland', function () {
//     return view('soon2');
// });

Route::middleware(['auth', 'role:admin-partner,partner'])->group(function () {
    Route::resource('blood_bank', 'Blood_bankController')->except(['index','blood_bank_line']);
    Route::get('lost_pet_by_partner', 'Lost_PetController@lost_pet_by_partner');
    Route::get('check_in_admin', 'Check_inController@index');
    Route::get('/check_in/gallery', 'Check_inController@gallery');
    Route::get('/check_in/add_new_check_in', 'Check_inController@add_new_check_in');
    Route::get('/manage_user_partner', 'PartnerController@manage_user');
	Route::get('/create_user_partner', 'PartnerController@create_user_partner');
    Route::get('/partner_index', function () {
        return view('partner_admin/partner_index');
    });
    Route::get('/media', function () {
        return view('partner_admin/media');
    });
    Route::get('order_admin', 'OrderController@order_admin');
    // Route::get('blood_bank/wait_user', 'Blood_bankController@wait_user');
Route::get('/product_admin', 'ProductController@product_admin');
Route::get('/dashboard_partner', 'PartnerController@dashboard_partner');
Route::get('/how_to_use_partner', function () {
        return view('partner_admin/how_to_use_partner');
    });

});

Route::resource('check_in', 'Check_inController')->except(['index','show']);

Route::resource('product', 'ProductController');
Route::get('/user_pet/{id}', 'UserController@user_pet');
Route::get('/user_pet_checklist/{id}', 'UserController@user_pet_checklist');
Route::get('/view_qr_code_checklist/{id}', 'UserController@view_qr_code_checklist');

// Route::get('/petdating', function () {
//     return view('petdating');
// });

//set_new_richMenu
Route::get('set_new_richMenu', 'API\LineApiController@set_new_richMenu');

Route::resource('disease', 'DiseaseController');


// test_for_dev
Route::get('test_for_dev/send_line_lost_pet', 'test_for_devController@send_line_lost_pet');
Route::get('test_for_dev', 'test_for_devController@test_for_dev');
Route::get('test_for_dev/test_send_png', 'test_for_devController@test_send_png');
Route::get('test_for_dev/lat_lng_pro', 'test_for_devController@lat_lng_pro');

Route::get('BC_to_user_line', 'test_for_devController@BC_to_user_line');
