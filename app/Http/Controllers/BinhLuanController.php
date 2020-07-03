<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    public function getView(){
        $comments = Comments::all();
        return view('admin.binhluan.quanlybinhluan',['comments'=>$comments]);
    }

    public function getDelete($id){
        $comment = Comments::find($id);
        $comment_parents = Comments::all()->where('parent_id',$id);
        foreach ($comment_parents as $comment_parent){
            $comment_parent->delete();
        }
        if ($comment->parent_id != null){
            $comment->delete();
            return redirect()->back()->with('ThongBao','Bạn đã xóa thành công');
        }else{
            $comment->delete();
            return redirect('admin/quanlybinhluan/danhsach')->with('ThongBao','Bạn đã xóa thành công');
        }
    }

    public function getReply($id){
        $comment = Comments::find($id);
        $replys = Comments::all()->where('parent_id',$id);

        return view('admin.binhluan.traloi',['comment'=>$comment,'replys'=>$replys]);
    }

    public function postReply(Request $request,$id){
        $this->validate($request,
            [
                'comment'=>'required'
            ],
            [
                'comment.required'=>'Bạn chưa nhập nội dung trả lời bình luận',
            ]);

        $comment = new Comments();
        $comment->pro_id = $request->pro_id;
        $comment->customer_id = null;
        $comment->user_id = Auth::guard('web')->user()->id;
        $comment->parent_id = $id;
        $comment->content = $request->comment;

        $comment->save();

        return redirect()->back()->with('ThongBao','Bạn đã trả lời bình luận thành công');

    }
}
