<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveCampaign extends Model
{
    
	protected $table='activecampaigns';
    protected $fillable = [
        'ac_id','first_name', 'last_name', 'phone','email','tags','customer_acct_name','orgname','initiated_from'
    ];
}
