<?php

namespace App\Http\Controllers\Frontend;

use App\Discounts;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Invoice_details;
use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function viewOrder(){
        if (Auth::guard('customers')->check()){
            return view('pages/order');
        }else{
            return redirect('tai-khoan/index')->with('Loi','Bạn phải đăng nhập trước khi thanh toán.');
        }
    }

    public function postOrder(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required|numeric',
                'address'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập họ tên của bạn',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng của email',
                'phone_number.required'=>'Bạn chưa nhập số điện thoại',
                'phone_number.numeric'=>'Số điện thoại phải là kiểu số',
                'address.required'=>'Bạn chưa nhập địa chỉ'
            ]);
        $invoice = new Invoice();
        $invoice->customer_id = Auth::guard('customers')->user()->id;
        $invoice->note = $request->note;
        if ($request->has('discount_code')){
            $invoice->discount_code = $request->discount_code;
        }else{
            $invoice->discount_code = '';
        }

        $invoice->total_cost = $request->total_cost;
        $invoice->created_at = now();

        $invoice->save();

        $products = \Cart::content();
        foreach ($products as $product){
            $invoice_details = new Invoice_details();
            $invoice_details->invoice_id = $invoice->id;
            $invoice_details->id_products = $product->id;

            $productId = Products::find($product->id);
            $productId->quantity = $productId->quantity - $product->qty;
            $productId->save();
            $invoice_details->quantity = $product->qty;
            $invoice_details->total = $product->qty*$product->price;

            $invoice_details->save();
        }

        if ($invoice->id){
            $customer = Auth::guard('customers')->user();
            $email = Auth::guard('customers')->user()->email;
            $code = bcrypt(md5(time().$email));
            $url = route('customer.verify.invoice',['id' => $invoice->id,'code'=>$code,]);

            $invoice->code_verify = $code;
            $invoice->save();

            $data = [
                'route' => $url,
                'invoice'=>$invoice,
                'products'=>$products,
                'customer'=>$customer
            ];

            Mail::send('email.verify_invoice',$data,function ($message) use ($email){
                $message->to($email,'Xác nhận hoá đơn')->subject('Xác nhận hoá đơn');
            });
        }


        \Cart::destroy();

        return redirect('/')->with('ThongBao','Bạn đã đặt hàng thành công. Vui lòng kiểm tra mail để xác nhận đơn hàng. Xin cảm ơn quý khách.');
    }

    public function verifyInvoice(Request $request){
        $code = $request->code;
        $id = $request->id;

        $checkInvoice = Invoice::where([
            'code_verify' => $code,
            'id' => $id
        ])->first();

        if (!$checkInvoice){
            return redirect('/')->with('Loi','Xin lỗi ! Đường dẫn xác nhận hoá đơn không tồn tại . Vui lòng thử lại hoặc liên hệ lại với cửa hàng . Xin cảm ơn!');
        }

        $checkInvoice->verify = 1;
        $checkInvoice->time_verify = Carbon::now();
        $checkInvoice->save();

        return redirect('/')->with('ThongBao','Xác nhận hoá đơn thành công. Cảm ơn quý khách đã tin dùng sản phẩm của chúng tôi. Chúng tôi sẽ giao hàng đến với bạn sớm nhất có thể .Xin cảm ơn !');
    }
}
