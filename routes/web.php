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


Route::get('/', "IndexController@getIndex");
Route::get('/index', "IndexController@getIndex");
//Route::get('/login', function (){
//return  view('/auth/login');
//});



Route::get('/reg', function (){
    return  view('/reg');

});
Route::get('/category', "categoryController@category");
Route::get('/category/{id}',"categoryController@getDetails");

Route::post('/create/add',"categoryController@store" );

Route::get('/forum',"ForumController@getForum" );


//Route::get('/category', "categoryController@category");
//Route::get('/category/{id}',"categoryController@getDetails");
//Route::get('/create',"categoryController@create" );
//Route::post('/create/add',"categoryController@store" );
//Route::get('/forum',"ForumController@getForum" );


Route::post('/reg','UserCpController@user_store');
//Route::get('/reg', 'UserCpController@reg');

Auth::routes();

Route::group(['middleware'=>'block'], function () {
    Route::get('/ch',"IndexController@message");
});




Route::group(['middleware'=>'admin'], function () {
    Route::get('/admin_panel','AdminController@panel');
    Route::post('/admin_panel','AdminController@panel')->name('find.post');
    Route::post('/admin_panel','AdminController@block1')->name('test.post');

});


Route::group(['middleware'=>'redactor'], function () {
Route::get('/redactor',"RedactorController@getRed" );
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create',"categoryController@create" );
    Route::get('/messages',"messageController@get_messages" );
//    Route::get('/{user}/', 'UserCpController@get_info');
    Route::get('/{user}', 'UserCpController@get_info');
Route::post('/modal', 'UserCpController@avaUpload');
Route::post('/user_cp','UserCpController@store_about')->name('about.post');


});





//Route::post('/regm', 'AuthController@auth');

//Route::get('/{user}/', 'UserCpController@get_info');





