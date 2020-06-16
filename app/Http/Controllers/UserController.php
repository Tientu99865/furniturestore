<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
class UserController extends Controller
{
    //
    public function getDangNhapAdmin(){
        return view('admin/login');
    }

    public function postDangNhapAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:6|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu không thể nhỏ hơn 6 ký tự',
                'password.max'=>'Mật khẩu không thể lớn hơn 32 ký tự'
            ]);
        $data = $request->only('email','password');
        if (Auth::guard('web')->attempt($data)){
            return redirect('admin/trangchu');
        }
        else
        {
            return redirect('admin/dangnhap')->with('Loi','Đăng nhập không thành công');
        }
    }

    public function getDangKyAdmin(){
        return view('admin/register');
    }

    public function postDangKyAdmin(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:32',
                're_password'=>'required|same:password'
            ],
            [
                'name.required'=>'Bạn chưa nhập họ tên của bạn',
                'name.min'=>'Họ tên của bạn phải nhập lớn hơn 3 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng của email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu không thể nhỏ hơn 6 ký tự',
                'password.max'=>'Mật khẩu không thể lớn hơn 32 ký tự',
                're_password.required'=>'Bạn chưa nhập mật khẩu',
                're_password.same'=>'Mật khẩu không trùng nhau'
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('admin/dangky')->with('ThongBao','Bạn đã đăng ký thành công');
    }

    public function getDangXuatAdmin(){
        Auth::guard('web')->logout();

        return redirect('admin/dangnhap');
    }
}
