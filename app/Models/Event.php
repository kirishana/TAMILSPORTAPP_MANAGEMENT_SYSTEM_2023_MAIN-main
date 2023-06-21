<?php

namespace App\Models;

use App\User;
use App\Models\AgeGroup;
use App\Models\MainEvent;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = 'events';

    public $fillable = [
        'event_name',
        'user_id',
        'venue_id',
        'organization_id',
        'season_id',
        'rules',
        'date',
        'main_event_id',
        'participants_count',
        'tracks'
    ];
    public function league()
    {
        return $this->belongsTo(League::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ageGroups()
    {
        return $this->belongsToMany(AgeGroup::class)->using(AgeGroupEvent::class)->withPivot('id');
    }


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function mainEvent()
    {
        return $this->belongsTo(MainEvent::class);
    }

    public function registrations()
    {
        return $this->belongsToMany(Registration::class);
    }
    public function groupRegistrations()
    {
        return $this->hasMany(GroupRegistration::class);
    }
}
