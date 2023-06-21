<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\League;
use App\Models\Season;
use App\Models\Organization;

class Venue extends Model
{
    public $table = 'venues';
    



    public $fillable = [
        'name',
        'location',
        'tp',
        'city',
        'mobile',
        'tracks',
        'email',
        'season_id',
        'user_id',
        'status',
        'map',
        'latitude',
        'longitude',
        'state',
        'organization_id',
        'person_name',
      
    ];
   
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function venueDetails()
    {
        return $this->hasMany(VenueDetail::class);
    }
    public function venueFieldDetails()
    {
        return $this->hasMany(VenueFieldDetail::class);
    }
    

}
