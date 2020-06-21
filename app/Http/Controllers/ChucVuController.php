<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ChucVuController extends Controller
{
    //
    public function getThem(){
        $permission = Permission::all();
        return view('admin/chucvu/them',['permission'=>$permission]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100|unique:roles',
            ],
            [
                'name.required'=>'Bạn chưa nhập tên chức vụ',
                'name.min'=>'Tên chức vụ phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên chức vụ phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên chức vụ này đã tồn tại'
            ]);
        $role = Role::create(['name'=>$request->name]);
        $role->save();

        $permission = $request->states;
        $role->syncPermissions($permission);


        return redirect('admin/chucvu/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $roles = Role::paginate(10);
        return view('admin/chucvu/danhsach',['roles'=>$roles]);
    }

    public function getXoa($id){
        $role = Role::findById($id);
        $role->revokePermissionTo($role->getPermissionNames());
        $role->delete();

        return redirect('admin/chucvu/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }
    public function getSua($id){
        $role = Role::findById($id);
        $pemissions = Permission::all();

        return view('admin/chucvu/sua',['role'=>$role,'permissions'=>$pemissions]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên chức vụ',
                'name.min'=>'Tên chức vụ phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên chức vụ phải có độ dài từ 2 đến 100 ký tự',
            ]);

        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();
        $role->revokePermissionTo($request->states);
        $permission = $request->states;
        $role->syncPermissions($permission);
        return redirect('admin/chucvu/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');

    }
}
