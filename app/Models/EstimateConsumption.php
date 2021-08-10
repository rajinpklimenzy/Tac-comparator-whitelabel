<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateConsumption extends Model
{
    
    protected $table = 'estimate_consumption';
    protected $fillable = ['id','residents', 'building_type', 'Isolation_level', 'Heating_system', 'E_mono','E_day',
	    'E_night','E_excl_night', 'G'
    ];
}
