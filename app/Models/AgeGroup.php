<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Gender;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    public $table = 'age_groups';




    public $fillable = [
        'name',
        'status',
        'organization_id'

    ];
    public function events()
    {
        return $this->belongsToMany(Event::class)->using(AgeGroupEvent::class)->withPivot('id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function genders()
    {
        return $this->belongsToMany(AgeGroupGender::class, 'age_group_genders', 'age_group_event_id')->withTimestamps();
    }
}
