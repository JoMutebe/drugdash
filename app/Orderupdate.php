<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderupdate extends Model
{
    protected $fillable =['order_id','description','created_by','updated_by'];

    protected $attributes = [];
}
