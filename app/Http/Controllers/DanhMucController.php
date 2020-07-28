<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class DanhMucController extends Controller
{
    //
    public function getThem(){
        $categories = Categories::all();
        return view('admin/danhmuc/them',['categories'=>$categories]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100|unique:categories',
                'position'=>'required|numeric|min:1'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên danh mục',
                'name.min'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên danh mục này đã tồn tại',
                'position.required'=>'Bạn chưa nhập vị trí cho danh mục',
                'position.numeric'=>'Vị trí của danh mục phải là kiểu số',
                'position.min'=>'Vị trí ko thể nhập nhỏ hơn 1',
            ]);
        $categorie = new Categories();
        $categorie->name = $request->name;
        $categorie->position = $request->position;
        if ($request->has('parent_id')){
            $categorie->parent_id = $request->parent_id;
        }else
        {
            $categorie->parent_id = "";
        }
        $categorie->save();

        return redirect('admin/danhmuc/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $categories = Categories::orderBy('id','DESC')->paginate(10);
        return view('admin/danhmuc/danhsach',['categories'=>$categories]);
    }

    public function getXoa($id){
        $categories = Categories::find($id);
        $categories->delete();

        return redirect('admin/danhmuc/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $categories = Categories::all()->find($id);

        return view('admin/danhmuc/sua',['categories'=>$categories]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100',
                'position'=>'required|numeric|min:1'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên danh mục',
                'name.min'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên danh mục phải có độ dài từ 2 đến 100 ký tự',
                'position.required'=>'Bạn chưa nhập vị trí cho danh mục',
                'position.numeric'=>'Vị trí của danh mục phải là kiểu số',
                'position.min'=>'Vị trí ko thể nhập nhỏ hơn 1',
            ]);
        $categorie = Categories::all()->find($id);
        $categorie->name = $request->name;
        $categorie->position = $request->position;
        if ($request->has('parent_id')){
            $categorie->parent_id = $request->parent_id;
        }else
        {
            $categorie->parent_id = "";
        }

        $categorie->save();

        return redirect('admin/danhmuc/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
