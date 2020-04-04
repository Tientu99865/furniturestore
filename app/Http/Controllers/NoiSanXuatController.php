<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;

class NoiSanXuatController extends Controller
{
    //
    public function getThem(){
        $manufacture = Manufacture::all();
        return view('admin/noisanxuat/them',['manufacture'=>$manufacture]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:1|max:100|unique:manufacture'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên nơi sản xuất',
                'name.min'=>'Tên nơi sản xuất phải có độ dài từ 1 đến 100 ký tự',
                'name.max'=>'Tên nơi sản xuất phải có độ dài từ 1 đến 100 ký tự',
                'name.unique'=>'Tên nơi sản xuất này đã tồn tại'
            ]);
        $manufacture = new Manufacture();
        $manufacture->name = $request->name;

        $manufacture->save();

        return redirect('admin/noisanxuat/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $manufacture = Manufacture::paginate(10);
        return view('admin/noisanxuat/danhsach',['manufacture'=>$manufacture]);
    }

    public function getXoa($id){
        $manufacture = Manufacture::find($id);
        $manufacture->delete();

        return redirect('admin/noisanxuat/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $manufacture = Manufacture::all()->find($id);

        return view('admin/noisanxuat/sua',['manufacture'=>$manufacture]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:1|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên nơi sản xuất',
                'name.min'=>'Tên nơi sản xuất phải có độ dài từ 1 đến 100 ký tự',
                'name.max'=>'Tên nơi sản xuất phải có độ dài từ 1 đến 100 ký tự',
            ]);
        $manufacture = Manufacture::all()->find($id);
        $manufacture->name = $request->name;

        $manufacture->save();

        return redirect('admin/noisanxuat/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
