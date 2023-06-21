<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AgeGroupGender extends Model
{
    use HasFactory;
    public $table = 'age_group_genders';




    public $fillable = [
        'age_group_event_id',
        'gender_id',
        'starter_id',
        'judge_id',
        'time',
        'status',
        'prize_given',
        'starting_time',
        'ending_time'
    ];

    public function ageGroupEvent()
    {
        return $this->belongsTo(AgeGroupEvent::class)->orderBy('age_group_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class)->groupBy('id');
    }
    public function judge()
    {
        return $this->belongsTo(User::class, 'judge_id');
    }

    public function starter()
    {
        return $this->belongsTo(User::class, 'starter_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'age_group_gender_user')->withPivot('time', 'one', 'two', 'third');
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'age_group_gender_team')->withPivot('time', 'one', 'two', 'third', 'league_id');
    }
   
}
