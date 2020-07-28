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


//Dang nhap
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');
//Dang Ky
Route::get('admin/dangky', 'UserController@getDangKyAdmin');
Route::post('admin/dangky', 'UserController@postDangKyAdmin');
//Dang xuat
Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');
//Route group admin

Route::group(['prefix' => 'admin', 'middleware' => ['can:login']], function () {
    Route::get('admin', function () {
        return view('admin/layout/index');
    });
    //Trang chu
    Route::group(['middleware' => ['can:login']], function () {
        Route::get('trangchu', 'TrangChuController@getQuanLy');
    });
    //Categories
    Route::group(['prefix' => 'danhmuc'], function () {
        Route::group(['middleware' => ['can:add categories']], function () {
            Route::get('them', 'DanhMucController@getThem');
        });
        Route::group(['middleware' => ['can:add categories']], function () {
            Route::post('them', 'DanhMucController@postThem');
        });

        Route::group(['middleware' => ['can:view categories']], function () {
            Route::get('danhsach', 'DanhMucController@getDanhSach');
        });
        Route::group(['middleware' => ['can:delete categories']], function () {
            Route::get('xoa/{id}', 'DanhMucController@getXoa');
        });
        Route::group(['middleware' => ['can:edit categories']], function () {
            Route::get('sua/{id}', 'DanhMucController@getSua');
        });
        Route::group(['middleware' => ['can:edit categories']], function () {
            Route::post('sua/{id}', 'DanhMucController@postSua');
        });
    });
    //Slide
    Route::group(['prefix' => 'slide'], function () {
        Route::group(['middleware' => ['can:add slides']], function () {
            Route::get('them', 'SlideController@getThem');
        });
        Route::group(['middleware' => ['can:add slides']], function () {
            Route::post('them', 'SlideController@postThem');
        });

        Route::group(['middleware' => ['can:view slides']], function () {
            Route::get('danhsach', 'SlideController@getDanhSach');
        });
        Route::group(['middleware' => ['can:delete slides']], function () {
            Route::get('xoa/{id}', 'SlideController@getXoa');
        });
        Route::group(['middleware' => ['can:edit slides']], function () {
            Route::get('sua/{id}', 'SlideController@getSua');
        });
        Route::group(['middleware' => ['can:edit slides']], function () {
            Route::post('sua/{id}', 'SlideController@postSua');
        });
    });

    //Product
    Route::group(['prefix' => 'sanpham'], function () {
        Route::group(['middleware' => ['can:add products']], function () {
            Route::get('them', 'SanPhamController@getThem');
        });
        Route::group(['middleware' => ['can:add products']], function () {
            Route::post('them', 'SanPhamController@postThem');
        });

        Route::group(['middleware' => ['can:view products']], function () {
            Route::get('danhsach', 'SanPhamController@getDanhSach');
        });
        Route::group(['middleware' => ['can:delete products']], function () {
            Route::get('xoa/{id}', 'SanPhamController@getXoa');
        });
        Route::group(['middleware' => ['can:edit products']], function () {
            Route::get('sua/{id}', 'SanPhamController@getSua');
        });
        Route::group(['middleware' => ['can:edit products']], function () {
            Route::post('sua/{id}', 'SanPhamController@postSua');
        });
        Route::group(['middleware' => ['can:detail products']], function () {
            Route::get('chitiet/{id}', 'SanPhamController@getChiTiet');
        });
    });

    //Noi san xuat
    Route::group(['prefix' => 'noisanxuat'], function () {
        Route::group(['middleware' => ['can:add made in']], function () {
            Route::get('them', 'NoiSanXuatController@getThem');
        });
        Route::group(['middleware' => ['can:add made in']], function () {
            Route::post('them', 'NoiSanXuatController@postThem');
        });

        Route::group(['middleware' => ['can:view made in']], function () {
            Route::get('danhsach', 'NoiSanXuatController@getDanhSach');
        });
        Route::group(['middleware' => ['can:delete made in']], function () {
            Route::get('xoa/{id}', 'NoiSanXuatController@getXoa');
        });
        Route::group(['middleware' => ['can:edit made in']], function () {
            Route::get('sua/{id}', 'NoiSanXuatController@getSua');
        });
        Route::group(['middleware' => ['can:edit made in']], function () {
            Route::post('sua/{id}', 'NoiSanXuatController@postSua');
        });
    });

    //User and admin
    Route::group(['prefix' => 'users'], function () {
        Route::group(['middleware' => ['can:view users']], function () {
            Route::get('danhsachadmin', 'QuanLyTaiKhoan@getDanhSachAdmin');
        });
        Route::group(['middleware' => ['can:view customers']], function () {
            Route::get('danhsachnguoidung', 'QuanLyTaiKhoan@getDanhSachNguoiDung');
        });

        Route::group(['middleware' => ['can:view roles for users']], function () {
            Route::get('themchucvu/{id}', 'QuanLyTaiKhoan@viewAddRole');
        });
        Route::group(['middleware' => ['can:add roles for users']], function () {
            Route::post('themchucvu/{id}', 'QuanLyTaiKhoan@addRole');
        });
        Route::group(['middleware' => ['can:delete users']], function () {
            Route::get('xoa/{id}', 'QuanLyTaiKhoan@getXoa');
        });
    });

    //Contact
    Route::group(['prefix' => 'lienhe'], function () {
        Route::group(['middleware' => ['can:view contacts']], function () {
            Route::get('index', 'LienHeController@getLienHe');
            Route::get('chitiet/{id}', 'LienHeController@getChiTiet');
            Route::get('xoa/{id}', 'LienHeController@getDelete');
            Route::post('traloi/{id}', 'LienHeController@postReply');
        });

    });

    //Comment
    Route::group(['prefix' => 'quanlybinhluan'], function () {
        Route::group(['middleware' => ['can:comment role']], function () {
            Route::get('danhsach', 'BinhLuanController@getView');
            Route::get('xoa/{id}', 'BinhLuanController@getDelete');
            Route::get('traloi/{id}', 'BinhLuanController@getReply');
            Route::post('traloi/{id}', 'BinhLuanController@postReply');
        });

    });

    //Roles
    Route::group(['prefix' => 'chucvu'], function () {

        Route::group(['middleware' => ['can:add roles']], function () {
            Route::get('them', 'ChucVuController@getThem');
        });
        Route::group(['middleware' => ['can:add roles']], function () {
            Route::post('them', 'ChucVuController@postThem');
        });

        Route::group(['middleware' => ['can:view roles']], function () {
            Route::get('danhsach', 'ChucVuController@getDanhsach');
        });
        Route::group(['middleware' => ['can:delete roles']], function () {
            Route::get('xoa/{id}', 'ChucVuController@getXoa');
        });
        Route::group(['middleware' => ['can:edit roles']], function () {
            Route::get('sua/{id}', 'ChucVuController@getSua');
        });
        Route::group(['middleware' => ['can:edit roles']], function () {
            Route::post('sua/{id}', 'ChucVuController@postSua');
        });
    });
    //Thong Ke Doanh Thu
    Route::group(['prefix' => 'thongke'], function () {
        Route::group(['middleware' => ['can:all revenue']], function () {
            Route::get('doanhthu', 'ThongKeController@getDoanhThu');
            Route::get('filter', 'ThongKeController@getFilter');
            Route::get('sanphambanchay', 'ThongKeController@getBanChay');
            Route::get('filter-best-product', 'ThongKeController@getFilterBestProduct');

            Route::get('donhang', 'ThongKeController@getOrder');
        });
    });


    //Invoice
    Route::group(['prefix' => 'giaodich'], function () {
        Route::group(['prefix' => 'hoadonnhap'], function () {

            Route::group(['middleware' => ['can:add import invoices']], function () {
                Route::get('them', 'HoaDonNhapController@getThem');
            });
            Route::group(['middleware' => ['can:add import invoices']], function () {
                Route::post('them', 'HoaDonNhapController@postThem');
            });
            Route::group(['middleware' => ['can:add import invoices for new product']], function () {
                Route::get('themId/{id}', 'HoaDonNhapController@getThemId');
            });
            Route::group(['middleware' => ['can:add import invoices for new product']], function () {
                Route::post('themId/{id}', 'HoaDonNhapController@postThemId');
            });

            Route::group(['middleware' => ['can:view import invoices']], function () {
                Route::get('danhsach', 'HoaDonNhapController@getDanhsach');
            });
            Route::group(['middleware' => ['can:delete import invoices']], function () {
                Route::get('xoa/{id}', 'HoaDonNhapController@getXoa');
            });
            Route::group(['middleware' => ['can:edit import invoices']], function () {
                Route::get('sua/{id}', 'HoaDonNhapController@getSua');
            });
            Route::group(['middleware' => ['can:edit import invoices']], function () {
                Route::post('sua/{id}', 'HoaDonNhapController@postSua');
            });
        });
        Route::group(['prefix' => 'hoadonban'], function () {
            Route::get('pdf/{id}', 'HoaDonBanController@getPDF');
//            Route::group(['middleware' => ['can:invoice details']], function () {
            Route::get('chitiethoadonban/{id}', 'HoaDonBanController@getInvoiceDetails');

            Route::get('dagiaohang/{id}', 'HoaDonBanController@getDelivered');

            Route::get('dathanhtoan/{id}', 'HoaDonBanController@getPaid');
            Route::get('huydonhang/{id}', 'HoaDonBanController@getCancel');
//            });
        });
    });

});
//Front end page
Route::get('/', 'PagesController@trangchu');

Route::post('binhluan/{id}', 'Frontend\CommentController@postComment');

Route::get('danhmuc/{id}', 'Frontend\CategoryController@view');

Route::get('lienhe', 'Frontend\ContactController@getView');
Route::post('lienhe', 'Frontend\ContactController@postContact');

Route::get('chi-tiet-san-pham/{id}', 'Frontend\ProductController@getProductDetail');

Route::prefix('shopping')->group(function () {
    Route::get('them/{id}', 'Frontend\ShoppingCartController@getAddProduct');
    Route::post('them/{id}', 'Frontend\ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('danh-sach', 'Frontend\ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
    Route::get('xoa/{id}', 'Frontend\ShoppingCartController@getDeleteShoppingCart')->name('get.delete.shopping.cart');
    Route::post('magiamgia', 'Frontend\ShoppingCartController@postDiscountCode')->name('post.discount.shopping.cart');
//    Route::get('cap-nhat','Frontend\ShoppingCartController@getDeleteShoppingCart')->name('get.delete.shopping.cart');
});
Route::post('capnhat', 'Frontend\OrderController@update');
Route::get('thanhtoan', 'Frontend\OrderController@viewOrder');
Route::post('thanhtoan', 'Frontend\OrderController@postOrder');
Route::get('xac-nhan-hoa-don', 'Frontend\OrderController@verifyInvoice')->name('customer.verify.invoice');

Route::group(['prefix' => 'tai-khoan'], function () {

    Route::get('index', 'AccountController@getIndex')->name('get.index.account');

    Route::post('dang-nhap', 'AccountController@postLogin');

    Route::post('dang-ky', 'AccountController@postRegister');

    Route::get('dang-xuat', 'AccountController@getLogout');

    Route::get('xac-nhan-tai-khoan', 'AccountController@verifyAccount')->name('customer.verify.account');

    Route::get('quen-mat-khau', 'AccountController@getForgotPassword');

    Route::post('quen-mat-khau', 'AccountController@sendCodeResetPassword');

    Route::get('cai-lai-mat-khau', 'AccountController@resetPassword')->name('get.link.reset.password');

    Route::post('cai-lai-mat-khau', 'AccountController@saveResetPassword');
});

Route::get('tim-kiem', 'PagesController@getSearch');

Route::get('thong-tin-tai-khoan', 'Frontend\CustomerController@getView');

Route::post('thong-tin-tai-khoan', 'Frontend\CustomerController@postChangeInfo');

Route::get('thay-doi-mat-khau', 'Frontend\CustomerController@getChangePassword');

Route::get('tin-nhan/{id}', 'Frontend\CustomerController@getViewMessage');
Route::post('tra-loi', 'Frontend\CustomerController@postReply');

Route::post('thay-doi-mat-khau', 'Frontend\CustomerController@postChangePassword');

Route::get('tin-tuc/{id}', 'Frontend\PostController@getView');
