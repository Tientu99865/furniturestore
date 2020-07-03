<?php

namespace App\Http\Controllers\Frontend;

use App\Comments;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment($id,Request $request){
        $comment = new Comments();
        $product = Products::find($id);
        $comment->pro_id = $id;
        if (Auth::guard('customers')->check()){
            $comment->customer_id = Auth::guard('customers')->user()->id;
        }
        $comment->user_id = null;
        $comment->content = $request->comment;

        $comment->save();

        return redirect('chi-tiet-san-pham/'.$id)->with('ThongBao','Viết bình luận thành công');
    }
}
