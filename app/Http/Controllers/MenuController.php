<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Categories;
class MenuController extends Controller
{
    //
    public function getThem(){
        $menu_parent = new Menus();
        $cat_parent = new Menus();
        $menu = Menus::all();
        $categories = Categories::all();
        return view('admin/menu/them',['menu'=>$menu,'categories'=>$categories,'menu_parent'=>$menu_parent,'cat_parent'=>$cat_parent]);
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
        if ($request->has('parent_id')){
            $menu->parent_id = $request->parent_id;
        }else
        {
            $menu->parent_id = "";
        }
        if ($request->has('cat_id')){
            $menu->cat_id = $request->cat_id;
        }else
        {
            $menu->cat_id = "";
        }
        if ($request->has('url')){
            $menu->url =  $request->url;
        }else{
            $menu->url =  "";
        }
        $menu->save();

        return redirect('admin/menu/them')->with('ThongBao',"Bạn đã thêm menu thành công");
    }

    public function getDanhSach(){
        $menu = Menus::paginate(10);
        return view('admin/menu/danhsach',['menu'=>$menu]);
    }

    public function getXoa($id){
        $menu = Menus::find($id);
        $menu->delete();

        return redirect('admin/menu/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $menu = Menus::all()->find($id);
        $categories = Categories::all();
        return view('admin/menu/sua',['menu'=>$menu,'categories'=>$categories]);
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
        if ($request->has('parent_id')){
            $menu->parent_id = $request->parent_id;
        }else
        {
            $menu->parent_id = "";
        }
        if ($request->has('cat_id')){
            $menu->cat_id = $request->cat_id;
        }else
        {
            $menu->cat_id = "";
        }
        if ($request->has('url')){
            $menu->url =  $request->url;
        }else{
            $menu->url =  "";
        }
        $menu->save();

        return redirect('admin/menu/sua/'.$id)->with('ThongBao',"Bạn đã sửa menu thành công");
    }
}
