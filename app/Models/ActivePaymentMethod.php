<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivePaymentMethod extends Model
{
    use HasFactory;
    public $table = 'active_payment_methods';
    



    public $fillable = [
        'status'
    ];
    public function bankTransfer()
    {
        return $this->belongsTo(BankTransfer::class);
    } public function Vipps()
    {
        return $this->belongsTo(Vipps::class);
    } 
    public function Stripe()
    {
        return $this->belongsTo(Stripe::class);
    }
    public function qrPayment()
    {
        return $this->belongsTo(QrPayment::class);
    }
   
}
