<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function getView(){
        return view('pages/lienhe');
    }

    public function postContact(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required|numeric',
                'address'=>'required',
                'msg'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập họ tên của bạn',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng của email',
                'phone_number.required'=>'Bạn chưa nhập số điện thoại',
                'phone_number.numeric'=>'Số điện thoại phải là kiểu số',
                'address.required'=>'Bạn chưa nhập địa chỉ',
                'msg.required'=>'Bạn chưa nhập nhập nội dung muốn gửi cho chúng tôi!',
            ]);

            $contact = new Contact();
            $contact->id_customer = Auth::guard('customers')->user()->id;
            $contact->content = $request->msg;
            $contact->status = false;

            $contact->save();

        return redirect()->back()->with('ThongBao','Cảm ơn bạn đã gửi liên hệ với chúng tôi! Chúng tôi sẽ liên hệ lại bạn sớm nhất!');
    }
}
