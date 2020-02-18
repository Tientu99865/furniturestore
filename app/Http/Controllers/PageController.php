<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function trangchu(){
        return view('pages/trangchu');
    }
}
