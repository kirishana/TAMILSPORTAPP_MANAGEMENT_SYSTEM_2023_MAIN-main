<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrPayment extends Model
{
    use HasFactory;
    public $table = 'qr_payments';
    
    public $fillable = [
        'organization_id',
        'name',
        'no',
        'qr_code',
        'qr_logo'
      
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
