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


Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload/add', 'UploadController@upload');


Auth::routes();

Route::get('/home', 'HomeController@index');

//路由群组,名称空间
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['web','auth']],function () {
    Route::get('/', 'IndexController@index');
    Route::resource('domainConfig','IndexController');
    Route::resource('systemConfig','SystemConfigController');
    Route::resource('webNaviga','WebNavigaController');
    Route::resource('users','UsersController');
    Route::resource('friendshipLink','FriendshipLinkController');
    Route::resource('cooperativeAdver','CooperativeAdverController');
    Route::resource('singlePageInfo','SinglePageInfoController');
    Route::resource('productType','ProductTypeController');
    Route::resource('productInfo','ProductInfoController');
    Route::resource('useCaseType','UseCaseTypeController');
    Route::resource('useCaseInfo','UseCaseInfoController');
    Route::resource('newsType','NewsTypeController');
    Route::resource('newsInfo','NewsInfoController');
    Route::resource('feedback','FeedbackController');
});

//路由群组,名称空间
Route::group(['prefix' => '/','namespace' => 'Portal','middleware' => ['web']],function () {
    Route::get('/', 'PortalHomeController@index');
    Route::resource('singlePageInfo','SinglePageInfoController');
    Route::resource('productInfo','ProductInfoController');
});


