<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'contract_id', 'condition', 'NL_description', 'FR_description'
    ];
}
