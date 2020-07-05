<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "Contacts";

    public function customer(){
        return $this->belongsTo('App\Customers','id_customer','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
