<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Inquary extends Model
{
    use HasFactory;

    public $table = 'inquaries';




    public $fillable = [
        'user_id',
        'organization_id',
        'league_id',
        'status',
        'leave_or_delete',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
