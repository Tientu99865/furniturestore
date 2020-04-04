<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LienHeController extends Controller
{
    //
    public function getLienHe(){
        return view('admin/lienhe/index');
    }
}
