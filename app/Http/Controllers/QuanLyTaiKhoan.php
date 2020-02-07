<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class QuanLyTaiKhoan extends Controller
{
    //

    public function getDanhSachAdmin(){
        $user = User::paginate(10);
        return view('admin/users/danhsachadmin',['user'=>$user]);
    }
}
