<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Import_invoice;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function getProductDetail($id){
        $categories = Categories::all();
        $images = Gallery::all()->where('id_product',$id);
        $product = Products::find($id);
        $products = Products::all()->where('cat_id',$product->cat_id)->random(3);
        $import_invoice = Import_invoice::where('pro_id',$id)->latest()->get();
        return view('pages/chitietsanpham',['product'=>$product,'images'=>$images,'import_invoice'=>$import_invoice,'categories'=>$categories,'products'=>$products]);
    }
}
