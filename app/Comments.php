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
        return $this->belongsTo('App\Users','user_id','id');
    }
}
