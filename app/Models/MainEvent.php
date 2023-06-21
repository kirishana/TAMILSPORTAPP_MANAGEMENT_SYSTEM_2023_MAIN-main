<?php

namespace App\Models;
use App\Models\EventCategory;
use App\Models\Organization;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class MainEvent extends Model
{
    public $table = 'main_events';
    



    public $fillable = [
        'name',
        'event_category_id',
        'organization_id',
        'price',
        'discount'
    ];
    public $timestamps = false;
    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);

    }
    public function venueDetails()
    {
        return $this->hasMany(VenueDetail::class);
    }
}
