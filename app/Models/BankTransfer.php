<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransfer extends Model
{
    use HasFactory;
    public $table = 'bank_transfer';
    



    public $fillable = [
        'organization_id',
        'bank_name',
        'account_holder_name',
        'account_number',
        'account_branch',
        'swift_code',
        'info'
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
