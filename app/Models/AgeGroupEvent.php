<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AgeGroupEvent extends Pivot
{
    use HasFactory;
    public $table = 'age_group_event';


    public $fillable = [
        'event_id',
        'age_group_id'
    ];

    public function ageGroupGenders()
    {
        return $this->hasMany(AgeGroupGender::class, 'age_group_event_id', 'id');
    }

    public function ageGroup() 
    {
        return $this->belongsTo(AgeGroup::class);
    }
    public function Event()
    {
        return $this->belongsTo(Event::class);
    }
    public function ageGroupGenderUser()
    {
        return $this->belongsTo(AgeGroupGenderUser::class);
    }
}
