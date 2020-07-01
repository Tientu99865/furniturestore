<?php

namespace App\Http\Controllers\Frontend;

use App\Discounts;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{

    public function addProduct(Request $request,$id){
        $product = Products::select('name','selling_price','promoted_price','image')->find($id);

        if (!$product) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'options' => [
                'promoted_price' => $product->promoted_price,
                'image' => $product->image
                ]

        ]);


        return redirect()->back()->with('ThongBao','Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
    }
    public function updateCart(Request $request){
        $product = Products::select('name','selling_price','promoted_price','image')->find($id);

        if (!$product) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'options' => [
                'promoted_price' => $product->promoted_price,
                'image' => $product->image
            ]

        ]);
    }
    public function getAddProduct(Request $request,$id){
        $product = Products::select('name','selling_price','promoted_price','image')->find($id);

        if (!$product) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->selling_price,
            'options' => [
                'promoted_price' => $product->promoted_price,
                'image' => $product->image
            ]

        ]);


        return redirect()->back()->with('ThongBao','Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
    }


    public function getListShoppingCart(){
        $products = \Cart::content();
        $discount = null;
        $total_after_discount  = null;
        return view('pages.shopping.index',['products'=>$products,'discount'=>$discount,'total_after_discount'=>$total_after_discount]);
    }

    public function getDeleteShoppingCart($id){
       \Cart::remove($id);
        return redirect()->back();
    }

    public function postDiscountCode(Request $request){
        $this->validate($request,
            [
                'discount_code'=>'required'
            ],
            [
                'discount_code.required' => 'Bạn chưa nhập mã giảm giá.'
            ]);
        $discount = DB::table('discounts')->where('code',$request->discount_code)->get();
        $total = str_replace(',', '', \Cart::subtotal());
        $products = \Cart::content();
       if ($discount->isEmpty()){
           return redirect()->route('get.list.shopping.cart')->with('Loi','Mã giảm giá không đúng! Vui lòng thử lại.');
       }else{
           $dis_price = $discount[0]->dis_price;
           $total_after_discount = $total - $dis_price ;
           return view('pages.shopping.index')->with(['total_after_discount'=>$total_after_discount,'discount'=>$discount,'products'=>$products])->with('ThongBao','Áp dụng mã giảm giá thành công !');
       }
    }
}
