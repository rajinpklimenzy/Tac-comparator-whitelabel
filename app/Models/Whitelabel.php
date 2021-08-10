<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whitelabel extends Model
{
    protected $table='hostnames';
    protected $fillable = [
        'fqdn', 'redirect_to', 'force_https','under_maintenance_since','website_id','email','name','logo','activate','locale','wizard'
    ];
}
