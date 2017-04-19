<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
  protected $fillable = [
  'name','district_id','county_id','subcounty_id'
  ];

  protected $attributes = [];
}
