<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import_invoice extends Model
{
    //
    protected $table = "import_invoice";

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function products(){
        return $this->belongsTo('App\Products','pro_id','id');
    }
}
