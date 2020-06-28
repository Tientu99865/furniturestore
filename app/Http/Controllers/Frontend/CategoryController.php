<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function view($id){
        $category = Categories::find($id);
        $categories = Categories::all();
        $products = DB::table('products')->where('cat_id',$id)->paginate(10);
        return view('pages.danhmuc',['category'=>$category,'categories'=>$categories,'products'=>$products]);
    }
}
