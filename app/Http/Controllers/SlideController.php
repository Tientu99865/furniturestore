<?php

namespace App\Http\Controllers;

use App\Posts;
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
                'title'=>'required|min:2|max:100',
                'image'=>'required',
                'short_description'=>'required',
                'text_content'=>'required',
            ],
            [
                'title.required'=>'Bạn chưa nhập tên ảnh slide',
                'title.min'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'title.max'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'image.required'=>'Bạn chưa chọn ảnh slide',
                'short_description.required'=>'Bạn chưa nhập mô tả ngắn',
                'text_content.required'=>'Bạn chưa nhập nội dung tin tức',
            ]);
        $slide = new Slides();
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
        $slide->save();
        $slide_id = $slide->id;
        $post = new Posts();
        $post->title = $request->title;
        $post->slide_id = $slide_id;
        $post->short_description = $request->short_description;
        $post->content = $request->text_content;

        $post->save();

        return redirect('admin/slide/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $posts = Posts::orderBy('id','DESC')->paginate(10);
        return view('admin/slide/danhsach',['posts'=>$posts]);
    }

    public function getXoa($id){
        $post = Posts::find($id);
        $post->delete();

        return redirect('admin/slide/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $post = Posts::find($id);
        return view('admin/slide/sua',['post'=>$post]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'title'=>'required|min:2|max:100',
                'short_description'=>'required',
                'text_content'=>'required',
            ],
            [
                'title.required'=>'Bạn chưa nhập tên ảnh slide',
                'title.min'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'title.max'=>'Tên ảnh phải có độ dài từ 2 đến 100 ký tự',
                'short_description.required'=>'Bạn chưa nhập mô tả ngắn',
                'text_content.required'=>'Bạn chưa nhập nội dung tin tức',
            ]);
        $post =  Posts::find($id);
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->content = $request->text_content;

        $post->save();

        $slide = Slides::find($post->slide_id);
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
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
