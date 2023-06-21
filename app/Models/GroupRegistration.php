<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRegistration extends Model
{
    use HasFactory;
    public $table = 'group_registrations';

    public $fillable = [
        'club_id',
        'event_id',
        'organization_id',
        'season_id',
        'status',
        'league_id',
        'totalfee',
        'trans_id',
        'age_group_gender_id',
        'inv_no'
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function league()
    {
        return $this->belongsTo(League::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function ageGroupGender()
    {
        return $this->belongsTo(AgeGroupGender::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'group_registration_teams');
    }
}
