<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
    'status','details','healtfacility_id','total','fullfiled','created_by','updated_by'];

    protected $attributes = [];
}
