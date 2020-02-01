<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = "Menus";

    public function categories(){
        return $this->hasMany('App\Categories','cat_id','id');
    }

}
