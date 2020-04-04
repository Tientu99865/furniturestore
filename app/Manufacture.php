<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    //
    protected $table = "Manufacture";

    public function products(){
        return $this->hasMany('App\Products','manu_id','id');
    }
}
