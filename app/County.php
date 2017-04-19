<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $fillable = [
    'name','district_id'
    ];

    protected $attributes = [];
}
