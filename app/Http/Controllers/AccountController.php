<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function getIndex(){
        return view('pages.tai-khoan.index');
    }
}
