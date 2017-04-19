<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthfacility extends Model
{
  protected $fillable = [
  'name','general_tel','general_email','code','incharge_name','incharge_tel','store_manager_name','store_manager_tel','bio_stat_name','bio_stat_tel','number_of_staff','level','x_cord','y_cord','district_id','county_id','sub_county_id','parish_id','village_id'
  ];

  protected $attributes = [];
}
