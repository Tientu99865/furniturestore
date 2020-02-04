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

Route::get('admin/dangnhap','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');

//Route group admin

Route::group(['prefix'=>'admin'],function (){
    //Trang chu
    Route::get('trangchu','TrangChuController@getQuanLy');
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

    //Slide
    Route::group(['prefix'=>'slide'],function (){
        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');

        Route::get('danhsach','SlideController@getDanhSach');

        Route::get('xoa/{id}','SlideController@getXoa');

        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');
    });

    //Product
    Route::group(['prefix'=>'sanpham'],function (){
        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');

        Route::get('danhsach','SanPhamController@getDanhSach');

        Route::get('xoa/{id}','SanPhamController@getXoa');

        Route::get('sua/{id}','SanPhamController@getSua');
        Route::post('sua/{id}','SanPhamController@postSua');
    });

});
