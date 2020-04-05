<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = "gallery";
    protected $fillable = ['id_product'];
    public function products(){
        return $this->belongsTo('App\Products','id_product','id');
    }
}
