<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
class PageController extends Controller
{
    //
    public function trangchu(){
        $menu = Menus::all();
        return view('pages/trangchu',['menu'=>$menu]);
    }
}
