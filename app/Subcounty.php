<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
  protected $fillable = [
  'name','district_id','county_id'
  ];

  protected $attributes = [];
}
