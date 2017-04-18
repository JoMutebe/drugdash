<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
      'name','dho_name','region','dho_office_tel', 'dho_mobile_tel','zone','medicines_manager_name','medicines_manager_tel','address'
    ];

    protected $attributes = [];
}
