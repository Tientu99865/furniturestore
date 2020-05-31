<?php

namespace App\Http\Controllers;

use App\Slides;
use Illuminate\Http\Request;
use App\Menus;
class PagesController extends Controller
{
    //

    public function trangchu(){
//        $menus = Menus::all()->where('parent_id',null)
//            ->with('childrenMenus')
//            ->get();
        $slides = Slides::all()->sortByDesc('id')->take(3);
        return view('pages/trangchu',['slides'=>$slides]);
//        ,compact('menus')
    }
}
