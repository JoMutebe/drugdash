<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockitemchanges extends Model
{
    protected $fillale = [
      'id','stockitem_id','healthfacility_id','type','occured_at','value','balance','created_by','updated_by'
    ];

    protected $attributes = [

    ];
}
