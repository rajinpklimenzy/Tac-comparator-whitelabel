<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'first_name', 'last_name','product_id', 'email', 'postal_code', 'last_seen', 'ip_address'
    ];
    
    protected $table = 'user_logs';
    
    public function getFullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }
    
    public function electricityConsumptions()
    {
        return $this->hasOne(ElectricityConsumption::class,'consumption_id','id');
    }
    
    public function gasCurrentsupplier()
    {
        return $this->hasOne(GasCurrentsupplier::class,'currentsupplier_id','id');
    }
}
