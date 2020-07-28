<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Posts;
use App\Products;
use App\Slides;
use Illuminate\Http\Request;
use App\Menus;
class PagesController extends Controller
{

    public function trangchu(){
        $products = Products::all()->sortByDesc('id');
        $categories = Categories::all()->where('parent_id',null)->sortByDesc('id');
        $posts = Posts::orderBy('id','DESC')->get();
        return view('pages/trangchu',['posts'=>$posts,'categories'=>$categories,'products'=>$products]);
    }

//    public function test(){
//        return view('email.verify_invoice');
//    }

    public function getSearch(Request $request){
        $products = Products::where('name','like','%'.$request->key.'%')->orWhere('selling_price','like','%'.$request->key.'%')->get();
        $categories = Categories::all()->where('parent_id','!=',null);
        $key = $request->key;

        return view('pages.search',['products'=>$products,'categories'=>$categories,'key'=>$key]);
    }
}
