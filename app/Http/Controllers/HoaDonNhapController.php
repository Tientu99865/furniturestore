<?php

namespace App\Http\Controllers;

use App\Import_invoice;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoaDonNhapController extends Controller
{
    //
    public function getDanhsach(){
        $invoices = Import_invoice::paginate(10);

        return view('admin/giaodich/hoadonnhap/danhsach',['invoices'=>$invoices]);
    }

    public function getThem(){
        $products = Products::all();

        return view('admin/giaodich/hoadonnhap/them',['products'=>$products]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'pro_id'=>'required',
                'import_price'=>'required|numeric',
                'selling_price'=>'required|numeric',
                'promoted_price'=>'required|numeric',
                'quantity'=>'required|numeric'
            ],
            [
                'pro_id.required'=>'Bạn chưa chọn sản phẩm',
                'import_price.required'=>'Bạn chưa nhập giá tiền nhập hàng',
                'import_price.numeric'=>'Giá tiền nhập phải là kiểu số!Vui lòng nhập lại.',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm này',
                'selling_price.numeric'=>'Giá bán sản phẩm phải là kiểu số!Vui lòng nhập lại.',
                'promoted_price.required'=>'Bạn chưa nhập giá khuyến mại của sản phẩm này',
                'promoted_price.numeric'=>'Giá tiền khuyến mại phải là kiểu số!Vui lòng nhập lại.',
                'quantity.required'=>'Bạn chưa nhập số lượng nhập hàng',
                'quantity.numeric'=>'Số lượng nhập phải là kiểu số! Vui lòng nhập lại'
            ]);
        $invoice = new Import_invoice();
        $invoice->pro_id = $request->pro_id;
        if ($request->has('import_price') || $request->has('quantity')){
            $import_price = $request->import_price;
            $quantity = $request->quantity;
            if ($import_price < 0 || $quantity < 0){
                return redirect('admin/giaodich/hoadonnhap/them')->with('Loi','Giá tiền nhập và số lượng không thể nhỏ hơn 0');
            }else{
                $invoice->import_price = $import_price;
                $invoice->quantity = $quantity;
            }
        }
        //Gia san pham
        if ($request->has('selling_price') || $request->has('promoted_price') || $request->has('import_price'))
        {
            $promoted_price = $request->promoted_price;
            $selling_price = $request->selling_price;
            $import_price = $request->import_price;
            if ($promoted_price < 0 || $selling_price < 0 || $import_price < 0){
                return redirect('admin/giaodich/hoadonnhap/them')->with('Loi','Giá nhập , giá bán sản phẩm và giá khuyến mại không thế nhỏ hơn 0');
            }else{
                $invoice->selling_price = $selling_price;
                $invoice->promoted_price = $promoted_price;
                $invoice->import_price = $import_price;
            }

            if ($selling_price < $import_price){
                return redirect('admin/giaodich/hoadonnhap/them')->with('Loi','Giá bán sản phẩm không được nhỏ hơn giá nhập sản phẩm');
            }elseif ($import_price < $promoted_price || $selling_price < $promoted_price){
                return redirect('admin/giaodich/hoadonnhap/them')->with('Loi','Giá khuyến mại không được lớn hơn giá nhập và giá bán sản phẩm');
            }elseif ($promoted_price > ($selling_price - $import_price)){
                return redirect('admin/giaodich/hoadonnhap/them')->with('Loi','Giá khuyến mại không được lớn hơn số tiền lãi bán sản phẩm');
            }
        }

        $product = Products::find($request->pro_id);
        $product->quantity +=  $request->quantity;
        $product->save();
        $invoice->user_id = Auth::user()->id;
        $invoice->total = $request->import_price*$request->quantity;
        $invoice->save();

        return redirect('admin/giaodich/hoadonnhap/them')->with('ThongBao',"Bạn đã thêm hoá đơn nhập thành công");
    }

    public function getXoa($id){
        $invoice = Import_invoice::find($id);

        $invoice->delete();

        return redirect('admin/giaodich/hoadonnhap/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $invoice = Import_invoice::find($id);
        $products = Products::all();
        return view('admin/giaodich/hoadonnhap/sua',['invoice'=>$invoice,'products'=>$products]);
    }

    public function postSua(Request $request,$id){
        $invoice = Import_invoice::find($id);
        $this->validate($request,
            [
                'pro_id'=>'required',
                'import_price'=>'required|numeric',
                'selling_price'=>'required|numeric',
                'promoted_price'=>'required|numeric',
                'quantity'=>'required|numeric'
            ],
            [
                'pro_id.required'=>'Bạn chưa chọn sản phẩm',
                'import_price.required'=>'Bạn chưa nhập giá tiền nhập hàng',
                'import_price.numeric'=>'Giá tiền nhập phải là kiểu số!Vui lòng nhập lại.',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm này',
                'selling_price.numeric'=>'Giá bán sản phẩm phải là kiểu số!Vui lòng nhập lại.',
                'promoted_price.required'=>'Bạn chưa nhập giá khuyến mại của sản phẩm này',
                'promoted_price.numeric'=>'Giá tiền khuyến mại phải là kiểu số!Vui lòng nhập lại.',
                'quantity.required'=>'Bạn chưa nhập số lượng nhập hàng',
                'quantity.numeric'=>'Số lượng nhập phải là kiểu số! Vui lòng nhập lại'
            ]);
        $invoice->pro_id = $request->pro_id;
        $product = Products::find($request->pro_id);
        $product->quantity -= $invoice->quantity;
        $product->quantity += $request->quantity;
        $product->save();
        if ($request->has('import_price') || $request->has('quantity')){
            $import_price = $request->import_price;
            $quantity = $request->quantity;
            if ($import_price < 0 || $quantity < 0){
                return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('Loi','Giá tiền nhập và số lượng không thể nhỏ hơn 0');
            }else{
                $invoice->import_price = $import_price;
                $invoice->quantity = $quantity;
            }
        }
        //Gia san pham
        if ($request->has('selling_price') || $request->has('promoted_price') || $request->has('import_price'))
        {
            $promoted_price = $request->promoted_price;
            $selling_price = $request->selling_price;
            $import_price = $request->import_price;
            if ($promoted_price < 0 || $selling_price < 0 || $import_price < 0){
                return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('Loi','Giá nhập , giá bán sản phẩm và giá khuyến mại không thế nhỏ hơn 0');
            }else{
                $invoice->selling_price = $selling_price;
                $invoice->promoted_price = $promoted_price;
                $invoice->import_price = $import_price;
            }

            if ($selling_price < $import_price){
                return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('Loi','Giá bán sản phẩm không được nhỏ hơn giá nhập sản phẩm');
            }elseif ($import_price < $promoted_price || $selling_price < $promoted_price){
                return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('Loi','Giá khuyến mại không được lớn hơn giá nhập và giá bán sản phẩm');
            }elseif ($promoted_price > ($selling_price - $import_price)){
                return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('Loi','Giá khuyến mại không được lớn hơn số tiền lãi bán sản phẩm');
            }
        }
        $invoice->user_id = Auth::user()->id;
        $invoice->total = $request->import_price*$request->quantity;
        $invoice->save();

        return redirect('admin/giaodich/hoadonnhap/sua/'.$id)->with('ThongBao',"Bạn đã sửa hoá đơn nhập thành công");
    }
}
