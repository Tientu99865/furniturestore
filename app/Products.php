<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "Products";

    public function categories(){
        return $this->belongsTo('App\Categories','cat_id','id');
    }

    public function comments(){
        return $this->hasMany('App\Comments','pro_id','id');
    }

    public function manufacture(){
        return $this->belongsTo('App\Manufacture','manu_id','id');
    }

    public function gallery(){
        return $this->belongsTo('App\Gallery','id_product','id');
    }
}
