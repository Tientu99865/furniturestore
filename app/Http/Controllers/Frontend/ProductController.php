<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function getProductDetail($id){
        $product = Products::find($id);
        return view('pages/chitietsanpham',['product'=>$product]);
    }
}
