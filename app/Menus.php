<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
class Menus extends Model
{
    //
    protected $table = "Menus";

    public function categories(){
        return $this->belongsTo('App\Categories','cat_id','id');
    }

    public function menus(){
        return $this->belongsTo(self::class,'id','parent_id');
    }

    public function childrenMenus(){
        return $this->hasMany(self::class,'id','parent_id');
    }



}
