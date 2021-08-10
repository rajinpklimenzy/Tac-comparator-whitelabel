<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceLimitation extends Model
{
    protected $fillable = [
        'SL_payment', 'SL_invoice','SL_contact','NL_description','FR_description'
    ];
}
