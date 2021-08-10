<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     protected $table = 'suppliers';
     
      protected $fillable = [
        'id',
        'name', 
        'logo', 
        'url', 
        'origin', 
        'customer_rating', 
        'greenpeace_rating',
        'type'         
        
    ];
}
