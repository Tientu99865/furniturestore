<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = "posts";

    public function slide(){
        return $this->belongsTo(Slides::class,'slide_id','id');
    }
}
