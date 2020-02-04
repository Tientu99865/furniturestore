<?php

namespace App\Http\Controllers;

use App\Slides;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function getThem(){
        return view('admin/slide/them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100',
                'image'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên ảnh slide',
                'name.min'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'image.required'=>'Bạn chưa chọn ảnh slide',
            ]);
        $slide = new Slides();
        $slide->name = $request->name;
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/slide/them')->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/slide/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/slide',$Hinh);
            $slide->image = $Hinh;
        }
        if ($request->has('mota')){
            $slide->content = $request->mota;
        }else
        {
            $slide->content = "";
        }
        if ($request->has('link')){
            $slide->link = $request->link;
        }else
        {
            $slide->link = "";
        }
        $slide->save();

        return redirect('admin/slide/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $slide = Slides::all();
        return view('admin/slide/danhsach',['slide'=>$slide]);
    }

    public function getXoa($id){
        $slide = Slides::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $slide = Slides::find($id);
        return view('admin/slide/sua',['slide'=>$slide]);
    }

    public function postSua(Request $request,$id){
        $slide = Slides::find($id);
        $this->validate($request,
            [
                'name'=>'required|min:2|max:100',
//                'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:5000'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên ảnh slide',
                'name.min'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
//                'image.required'=>'Bạn chưa chọn ảnh slide',
//                'image.mimes'=>'file ảnh phải có định dạng : jpeg,png,jpg,gif,svg.',
//                'image.max'=>'Ảnh slide phải có kích thướng nhỏ hơn 5000kb.',
            ]);
        $slide->name = $request->name;
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/slide/sua/'.$id)->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/slide/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/slide',$Hinh);
            unlink('upload/slide/'.$slide->image);
            $slide->image = $Hinh;
        }
        if ($request->has('mota')){
            $slide->content = $request->mota;
        }else
        {
            $slide->content = "";
        }
        if ($request->has('link')){
            $slide->link = $request->link;
        }else
        {
            $slide->link = "";
        }
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
