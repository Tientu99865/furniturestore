<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class QuanLyTaiKhoan extends Controller
{
    //

    public function getDanhSachAdmin()
    {
        $user = User::orderBy('id','DESC')->paginate(10);
        return view('admin/users/danhsachadmin', ['user' => $user]);
    }

    public function getDanhSachNguoiDung()
    {
        $customers = Customers::paginate();
        return view('admin/users/danhsachnguoidung', ['customers' => $customers]);
    }

    public function viewAddRole($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin/users/themquyen', ['user' => $user, 'roles' => $roles]);
    }

    public function addRole(Request $request, $id)
    {
        $this->validate($request,
            [
                'roles' => 'required',
            ],
            [
                'roles.required' => 'Bạn chưa chọn chức vụ cho tài khoản này',
            ]);
        $user = User::find($id);
        $roles = $request->roles;
        $user->syncRoles($roles);

        return redirect('admin/users/danhsachadmin')->with('ThongBao', 'Bạn đã thêm chức vụ cho tài khoản thành công!');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $nameRoles = $user->getRoleNames();
        foreach ($nameRoles as $nameRole){
            $user->removeRole($nameRole);
        }
        $user->delete();

        return redirect('admin/users/danhsachadmin')->with('ThongBao', "Bạn đã xoá thành công");
    }
}
