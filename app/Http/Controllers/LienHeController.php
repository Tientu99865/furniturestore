<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LienHeController extends Controller
{
    //
    public function getLienHe(){
        $contacts = Contact::all()->where('user_id',null);
        $contact_details = null;
        return view('admin/lienhe/index',['contacts'=>$contacts,'contact_details'=>$contact_details]);
    }

    public function getChiTiet($id){
        $contact_details = Contact::find($id);
        $contacts = Contact::all()->where('user_id',null);
        $replys = Contact::all()->where('parent_id',$id);
        return  view('admin.lienhe.index',['contacts'=>$contacts,'contact_details'=>$contact_details,'replys'=>$replys]);
    }

    public function postReply(Request $request,$id){
        $this->validate($request,
            [
                'msg'=>'required'
            ],
            [
                'msg.required'=>'Bạn chưa nhập nội dung trả lời',
            ]);

        $reply = new Contact();
        $contact = Contact::find($id);
        $contact->status = 1;
        $contact->save();
        $reply->id_customer = null;
        $reply->user_id = Auth::guard('web')->user()->id;
        $reply->parent_id = $id;
        $reply->content = $request->msg;

        $reply->save();

        return redirect()->back()->with('ThongBao','Bạn đã trả lời liên hệ của khách hàng thành công');
    }

    public function getDelete($id){
        $contact = Contact::find($id);
        $contact_parents = Contact::all()->where('parent_id',$id);
        foreach ($contact_parents as $contact_parent){
            $contact_parent->delete();
        }
        if ($contact->parent_id != null){
            $contact->delete();
            return redirect()->back()->with('ThongBao','Bạn đã xóa thành công');
        }else{
            $contact->delete();
            return redirect('admin/lienhe/index')->with('ThongBao','Bạn đã xóa thành công');
        }
    }
}
