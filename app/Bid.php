<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bid extends Model
{
    use Notifiable;

    public function product(){
        return $this->hasOne('App\Product', 'sku', 'product_id');
    }
}
