<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AthleticSetting extends Model
{
    use HasFactory;
    public $table = 'atheletic_settings';




    public $fillable = [
        'organization_id',
        'field_events',
        'track_events',
        'total_events',
        'track_event_method',
        'heat_method',
        'first_place',
        'second_place',
        'third_place',
        'group_first_place',
        'group_second_place',
        'group_third_place'

    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
