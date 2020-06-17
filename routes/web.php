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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

Route::get('/', function () {
});

Route::get('admin',function (){
    return view('admin/layout/index');
});
//Dang nhap
Route::get('admin/dangnhap','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
//Dang Ky
Route::get('admin/dangky','UserController@getDangKyAdmin');
Route::post('admin/dangky','UserController@postDangKyAdmin');
//Dang xuat
Route::get('admin/dangxuat','UserController@getDangXuatAdmin');
//Route group admin

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){
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

        Route::get('chitiet/{id}','SanPhamController@getChiTiet');
    });

    //Noi san xuat
    Route::group(['prefix'=>'noisanxuat'],function (){
        Route::get('them','NoiSanXuatController@getThem');
        Route::post('them','NoiSanXuatController@postThem');

        Route::get('danhsach','NoiSanXuatController@getDanhSach');

        Route::get('xoa/{id}','NoiSanXuatController@getXoa');

        Route::get('sua/{id}','NoiSanXuatController@getSua');
        Route::post('sua/{id}','NoiSanXuatController@postSua');
    });

    //User and admin
    Route::group(['prefix'=>'users'],function (){
        Route::get('danhsachadmin','QuanLyTaiKhoan@getDanhSachAdmin');

        Route::get('danhsachnguoidung','QuanLyTaiKhoan@getDanhSachNguoiDung');

        Route::get('xoa/{id}','QuanLyTaiKhoan@getXoa');
    });

    //Contact
    Route::group(['prefix'=>'lienhe'],function (){
        Route::get('index','LienHeController@getLienHe');

    });

    //Discount
    Route::group(['prefix'=>'magiamgia'],function (){
        Route::get('them','MaGiamGiaController@getThem');
        Route::post('them','MaGiamGiaController@postThem');

        Route::get('danhsach','MaGiamGiaController@getDanhSach');

        Route::get('xoa/{id}','MaGiamGiaController@getXoa');

        Route::get('sua/{id}','MaGiamGiaController@getSua');
        Route::post('sua/{id}','MaGiamGiaController@postSua');
    });

    //Roles
    Route::group(['prefix'=>'chucvu'],function (){
        Route::get('them','ChucVuController@getThem');
        Route::post('them','ChucVuController@postThem');

        Route::get('danhsach','ChucVuController@getDanhsach');

        Route::get('xoa/{id}','ChucVuController@getXoa');

        Route::get('sua/{id}','ChucVuController@getSua');
        Route::post('sua/{id}','ChucVuController@postSua');
    });

    //Invoice
    Route::group(['prefix'=>'giaodich'],function (){
        Route::group(['prefix'=>'hoadonnhap'],function(){
           Route::get('danhsach','HoaDonNhapController@getDanhsach');

            Route::get('them','HoaDonNhapController@getThem');
            Route::post('them','HoaDonNhapController@postThem');

            Route::get('themId/{id}','HoaDonNhapController@getThemId');
            Route::post('themId/{id}','HoaDonNhapController@postThemId');

            Route::get('xoa/{id}','HoaDonNhapController@getXoa');

            Route::get('sua/{id}','HoaDonNhapController@getSua');
            Route::post('sua/{id}','HoaDonNhapController@postSua');
        });
    });

});

//Front end page
Route::get('/','PagesController@trangchu');

Route::get('danhmuc/{id}','Frontend\CategoryController@view');

Route::get('chi-tiet-san-pham/{id}','Frontend\ProductController@getProductDetail');

Route::group(['prefix'=>'tai-khoan'],function (){

    Route::get('index','AccountController@getIndex')->name('get.index.account');

    Route::post('dang-nhap','AccountController@postLogin');

    Route::post('dang-ky','AccountController@postRegister');

    Route::get('dang-xuat','AccountController@getLogout');

    Route::get('xac-nhan-tai-khoan','AccountController@verifyAccount')->name('customer.verify.account');

    Route::get('quen-mat-khau','AccountController@getForgotPassword');

    Route::post('quen-mat-khau','AccountController@sendCodeResetPassword');

    Route::get('cai-lai-mat-khau','AccountController@resetPassword')->name('get.link.reset.password');

    Route::post('cai-lai-mat-khau','AccountController@saveResetPassword');
});
