<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    
     protected $fillable = [
        'supplier_id', 
        'product_id', 
        'product_name',
        'postalcode_id',
        'description', 
        'tariff_description', 
        'type',
        'contract_duration',
        'service_level_payment',
        'service_level_invoicing',
        'service_level_contact',
        'customer_condition',
        'origin',
        'pricing_type',
        'green_percentage',
        'subscribe_url',
        'terms_url',
        'ff_pro_rata',
        'inv_period',
        'validity_period',
        'totals',
        'breakdown',
        'featured'
    ];
     
     
    public function supplier() 
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

}
