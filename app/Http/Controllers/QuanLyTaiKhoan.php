<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use App\User;
class QuanLyTaiKhoan extends Controller
{
    //

    public function getDanhSachAdmin(){
        $user = User::paginate(10);
        return view('admin/users/danhsachadmin',['user'=>$user]);
    }

    public function getDanhSachNguoiDung(){
        $customers =Customers::paginate();
        return view('admin/users/danhsachnguoidung',['customers'=>$customers]);
    }

    public function getXoa($id){
        $customers = Customers::find($id);
        $customers->delete();

        return redirect('admin/users/danhsachnguoidung')->with('ThongBao',"Bạn đã xoá thành công");
    }
}
