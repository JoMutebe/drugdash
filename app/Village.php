<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
  protected $fillable = [
  'name','district_id','county_id','subcounty_id','parish_id'
  ];

  protected $attributes = [];
}
