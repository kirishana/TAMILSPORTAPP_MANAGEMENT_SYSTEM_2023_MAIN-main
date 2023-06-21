<?php

namespace App\Models;

use App\Models\Organization;
use App\Models\Venue;
use App\Models\Season;
use App\Models\SportsCategory;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public $table = 'leagues';




    public $fillable = [
        'name',
        'sports_category_id',
        'venue_id',
        'organization_id',
        'season_id',
        'from_date',
        'to_date',
        'reg_start_date',
        'reg_end_date',
        'champions',
        'tracks'
    ];


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function sportsCategory()
    {
        return $this->belongsTo(SportsCategory::class);
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class);
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
