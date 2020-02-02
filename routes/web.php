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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',function (){
    return view('admin/layout/index');
});

//Route group admin

Route::group(['prefix'=>'admin'],function (){

   Route::get('trangchu',function (){
       return view('admin/trangchu/index');
   });
    //Categories
    Route::group(['prefix'=>'danhmuc'],function (){
        Route::get('them','DanhMucController@getThem');
        Route::post('them','DanhMucController@postThem');

        Route::get('danhsach','DanhMucController@getDanhSach');

        Route::get('xoa/{id}','DanhMucController@getXoa');

        Route::get('sua/{id}','DanhMucController@getSua');
        Route::post('sua/{id}','DanhMucController@postSua');
    });
    //Menu
    Route::group(['prefix'=>'menu'],function (){
       Route::get('them','MenuController@getThem');
       Route::post('them','MenuController@postThem');

       Route::get('danhsach','MenuController@getDanhSach');

       Route::get('xoa/{id}','MenuController@getXoa');

        Route::get('sua/{id}','MenuController@getSua');
        Route::post('sua/{id}','MenuController@postSua');
    });
});
