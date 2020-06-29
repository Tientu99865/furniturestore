<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    protected $table = 'invoice_details';
    public $timestamps = false;

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
