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
        $price = $product->selling_price-$product->promoted_price;
        if (!$product) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $price,
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
        $price = $product->selling_price-$product->promoted_price;
        if (!$product) return redirect('/');

        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'promoted_price' => $product->promoted_price,
                'image' => $product->image
            ]

        ]);


        return redirect()->back()->with('ThongBao','Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
    }


    public function getListShoppingCart(){
        $products = \Cart::content();
        return view('pages.shopping.index',['products'=>$products]);
    }

    public function getDeleteShoppingCart($id){
       \Cart::remove($id);
        return redirect()->back();
    }

}
