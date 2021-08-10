<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tooltip extends Model
{
    protected $fillable = [
        'slug', 'field_name', 'NL_tooltip','FR_tooltip'
    ];
}
