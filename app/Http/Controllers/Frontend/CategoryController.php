<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function view($id){
        $category = Categories::find($id);
        $categories = Categories::all();
        return view('pages.danhmuc',['category'=>$category,'categories'=>$categories]);
    }
}
