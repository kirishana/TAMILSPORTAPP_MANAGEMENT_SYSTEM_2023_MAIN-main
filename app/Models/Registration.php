<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Registration extends Model
{
    use HasFactory;

    public $table = 'registrations';




    public $fillable = [
        'user_id',
        'organization_id',
        'season_id',        
        'gender',
        'status',
        'league_id',
        'totalfee',
        'discount',
        'trans_id',
        'payment_method'
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function league()
    {
        return $this->belongsTo(League::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
