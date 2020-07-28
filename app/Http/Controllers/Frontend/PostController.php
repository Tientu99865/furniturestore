<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getView($id){
        $post = Posts::find($id);
        return view('pages.tin-tuc',['post'=>$post]);
    }
}
