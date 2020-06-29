<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    //
    public function getLienHe(){
        $contacts = Contact::all();
        return view('admin/lienhe/index',['contacts'=>$contacts]);
    }
}
