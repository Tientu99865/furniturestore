<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use App\Slides;
use Illuminate\Http\Request;
use App\Menus;
class PagesController extends Controller
{

    public function trangchu(){
        $products = Products::all()->sortByDesc('id');
        $categories = Categories::all()->sortByDesc('id');
        $slides = Slides::all()->sortByDesc('id')->take(3);
        return view('pages/trangchu',['slides'=>$slides,'categories'=>$categories,'products'=>$products]);
    }

    public function test(){
        return view('email.verify_invoice');
    }
}
