<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $primaryKey = "sku";

    protected $dates = ['deleted_at'];

    public function cUser (){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function uUser (){
        return $this->hasOne('App\User', 'id', 'updated_by');
    }

    public function dUser (){
        return $this->hasOne('App\User', 'id', 'deleted_by');
    }

    public function bid (){
        return $this->hasOne('App\Bid', 'product_id', 'sku');
    }
}
