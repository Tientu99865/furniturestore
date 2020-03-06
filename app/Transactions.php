<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $table = "Transactions";

    public function products(){
        return $this->hasMany('App\Products','pro_id','id');
    }
}
