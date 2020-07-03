<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = "Comments";

    public function products(){
        return $this->belongsTo('App\Products','pro_id','id');
    }
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function customers(){
        return $this->belongsTo('App\Customers','customer_id','id');
    }
}
