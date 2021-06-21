<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    function offer()
    {
        return $this->hasOne('App\Shops_detail', 'id', 'offer_id');
    }
}
