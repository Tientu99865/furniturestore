<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
   public function getView(){
        return view('pages.tai-khoan.thong-tin');
   }

   public function postChangeInfo(Request $request){
       $this->validate($request,
           [
               'name'=>'required|min:3',
               'phone_number'=>'required|numeric',
               'address'=>'required',
           ],
           [
               'name.required'=>'Bạn chưa nhập họ tên của bạn',
               'name.min'=>'Họ tên của bạn phải nhập lớn hơn 3 ký tự',
               'phone_number.required'=>'Bạn chưa nhập số điện thoại',
               'phone_number.numeric'=>'Số điện thoại phải là kiểu số',
               'address.required'=>'Bạn chưa nhập địa chỉ'
           ]);
       $customer = Customers::find(Auth::guard('customers')->user()->id);
       $customer->name = $request->name;
       $customer->phone_number = $request->phone_number;
       $customer->address = $request->address;
       $customer->save();

       return redirect()->back()->with('ThongBao','Bạn đã thay đổi thông tin thành công');
   }

   public function getChangePassword(){
       return view('pages.tai-khoan.thay-doi-mat-khau');
   }

   public function postChangePassword(Request $request){
       $this->validate($request,
           [
               'password'=>'required|min:6|max:32',
               're_password'=>'required|same:password',
           ],
           [
               'password.required'=>'Bạn chưa nhập mật khẩu',
               'password.min'=>'Mật khẩu không thể nhỏ hơn 6 ký tự',
               'password.max'=>'Mật khẩu không thể lớn hơn 32 ký tự',
               're_password.required'=>'Bạn chưa nhập lại mật khẩu',
               're_password.same'=>'Mật khẩu không trùng nhau'
           ]);
       $customer = Customers::find(Auth::guard('customers')->user()->id);
       $customer->password = bcrypt($request->password);

       return redirect()->back()->with('ThongBao','Bạn đã thay đổi mật khẩu thành công');
   }

   public function getViewMessage($id){
       $contacts = Contact::all()->where('id_customer',$id);
       $replys = Contact::all()->where('parent_id',$contacts[0]->id);
       return view('pages.tai-khoan.tin-nhan',['contacts'=>$contacts,'replys'=>$replys]);
   }

   public function postReply(Request $request){
       $this->validate($request,
           [
               'msg'=>'required'
           ],
           [
               'msg.required'=>'Bạn chưa nhập nội dung trả lời',
           ]);

       $contact = new Contact();
       $contact->id_customer = Auth::guard('customers')->user()->id;
       $contact->user_id = null;
       $contact->content = $request->msg;
       $contact->status = false;

       $contact->save();

       return redirect()->back()->with('ThongBao','Bạn đã trả lời liên hệ cửa hàng thành công');
   }
}
