<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vipps extends Model
{
    use HasFactory;
    public $table = 'vipps';
    
    public $fillable = [
        'organization_id',
        'client_id',
        'client_secret',
        'merchant_serial',
        'subscription_key'
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
