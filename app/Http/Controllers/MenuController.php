<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
class MenuController extends Controller
{
    //
    public function getThem(){
        return view('admin/menu/them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100|unique:menus,name',
                'position'=>'required|digits:1,100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên menu',
                'name.min'=>'Tên menu phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên menu phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên menu này đã tồn tại',
                'position.required'=>'Bạn chưa điền vị trí cho menu',
                'position.digits'=>'Vị trí chỉ được nhập số từ 1 đến 100'
            ]);
        $menu = new Menus;
        $menu->name = $request->name;
        $menu->position = $request->position;
        $menu->display = 1;
        if ($request->has('url')){
            $menu->url =  $request->url;
        }else{
            $menu->url =  "";
        }
        $menu->save();

        return redirect('admin/menu/them')->with('ThongBao',"Bạn đã thêm menu thành công");
    }

    public function getDanhSach(){
        $menu = Menus::all();
        return view('admin/menu/danhsach',['menu'=>$menu]);
    }

    public function getXoa($id){
        $menu = Menus::find($id);
        $menu->delete();

        return redirect('admin/menu/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $menu = Menus::find($id);

        return view('admin/menu/sua',['menu'=>$menu]);
    }

    public function postSua(Request $request,$id){
        $menu = Menus::find($id);

        $this->validate($request,
            [
                'name'=>'required|min:2|max:100',
                'position'=>'required|digits:1,100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên menu',
                'name.min'=>'Tên menu phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên menu phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên menu này đã tồn tại',
                'position.required'=>'Bạn chưa điền vị trí cho menu',
                'position.digits'=>'Vị trí chỉ được nhập số từ 1 đến 100'
            ]);
        $menu->name = $request->name;
        $menu->position = $request->position;
        $menu->display = 1;
        if ($request->has('url')){
            $menu->url =  $request->url;
        }else{
            $menu->url =  "";
        }
        $menu->save();

        return redirect('admin/menu/sua/'.$id)->with('ThongBao',"Bạn đã sửa menu thành công");
    }
}
