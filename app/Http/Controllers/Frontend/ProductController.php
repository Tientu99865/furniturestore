<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Comments;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Import_invoice;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function getProductDetail($id){
        $categories = Categories::all()->where('parent_id','!=',null);
        $images = Gallery::all()->where('id_product',$id);
        $product = Products::find($id);
        $comments = Comments::all()->where('pro_id',$id);
        $products = Products::all()->where('cat_id',$product->cat_id)->random(3);
        $import_invoice = Import_invoice::where('pro_id',$id)->latest()->get();
        $bestProducts = Products::orderBy('sell_number','DESC')->limit(3)->get();
        return view('pages/chitietsanpham',
            [
                'product'=>$product,
                'images'=>$images,
                'import_invoice'=>$import_invoice,
                'categories'=>$categories,
                'products'=>$products,
                'comments'=>$comments,
                'bestProducts'=>$bestProducts
            ]);
    }
}
