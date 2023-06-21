<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueDetail extends Model
{
    use HasFactory;
    protected $table = 'venue_details';

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'venue_id',
        'track_event_name',
        'max_length',
                'track_event_count',
        'field_event_name',
    ];
    
    public function Venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function mainEvent()
    {
        return $this->belongsTo(MainEvent::class);
    }

   
}
