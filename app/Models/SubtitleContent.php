<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubtitleContent extends Model
{
    
    protected $fillable = [
        'title_id', 'subtitle', 'content','FR_subtitle','NL_subtitle'
    ];
}
