<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = "Categories";

    public function menus(){
        return $this->hasMany('App\Menus','cat_id','id');
    }

    public function products(){
        return $this->hasMany('App\Products','cat_id','id');
    }
}
