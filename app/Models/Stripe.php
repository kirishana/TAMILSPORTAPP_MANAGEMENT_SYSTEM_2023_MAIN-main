<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    use HasFactory;
    public $table = 'stripe';
    



    public $fillable = [
        'organization_id',
        'secret_key',
        'public_key',
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
