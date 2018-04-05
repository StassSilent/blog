<?php

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




Route::get('/login', function (){
return  view('/auth/login');
});
Route::get('/reg', function (){
    return  view('/reg');
});
Route::post('/reg','UserCpController@user_store');
//Route::get('/reg', 'UserCpController@reg');

Auth::routes();
Route::group(['middleware'=>'auth','admin'],function () {
    Route::get('/admin_panel','AdminController@panel');
Route::post('/admin_panel','AdminController@block');

});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
//    Route::get('/{user}/', 'UserCpController@get_info');
    Route::get('/{user}', 'UserCpController@get_info');

});



//Route::post('/regm', 'AuthController@auth');

//Route::get('/{user}/', 'UserCpController@get_info');





