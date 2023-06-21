<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalSetting extends Model
{
    protected $table = 'general_settings';

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'title',
        'name',
        'telephone',
        'address',
        'dashboard_logo',
        'signup_logo',
        'header',
        'website_url'
        
       
    
    ];
}
