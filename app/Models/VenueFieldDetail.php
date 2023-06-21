<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueFieldDetail extends Model
{
    use HasFactory;
    protected $table = 'venue_field_details';

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'venue_id',
        'field_event_name',
    ];
    
    public function Venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
