<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Club extends Model
{
    use HasFactory;
    public $table = 'clubs';

    protected $fillable = [
        'club_registation_num',
        'club_name',
        'club_email',
        'club_start_date',
        'city',
        'state',
        'postal',
        'country_id',
        'club_logo',
        'tpnumber',
        'mobile',
        'season_id',
        'user'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function groupRegistrations()
    {
        return $this->hasMany(GroupRegistration::class);
    }
    public function marathonPoints()
    {
        return $this->hasMany(MarathonPoint::class);
    }
}
