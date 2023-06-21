<?php

namespace App\Models;
use App\Models\Event;
use App\Models\AgeGroup;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $table = 'genders';
    



    public $fillable = [
        'name',
    ];
    public function events()
        {
            return $this->belongsToMany(Event::class,'event_genders')->withPivot('time');
        }
        public function eventAgegroup()
        {
            return $this->belongsToMany(AgeGroup::class,'age_group_genders')->withPivot('time');
        }
    
}
