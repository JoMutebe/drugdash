<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $fillable = [
    	'order_id','item_id','quantity','price','created_by','updated_by'
    ];

    protected $attributes = [];
}
