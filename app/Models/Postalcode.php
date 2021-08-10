<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postalcode extends Model
{
    
    protected $table = 'postalcode';
    protected $fillable = [
        'postalcode',
    ];
}
