<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'slug', 'eng','nl', 'fr','link', 'link_status'
    ];
}
