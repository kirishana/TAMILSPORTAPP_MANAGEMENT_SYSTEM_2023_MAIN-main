<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dayUser extends Model
{
    use HasFactory;
    protected $table = 'day_users';
    protected $guarded  = ['id',
    'date'

];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
