<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    use HasFactory;
    public $table = 'teams';




    public $fillable = [
        'name',
        'club_id',
        'gender_id',
        'age_group_id'

    ];
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function ageGroup()
    {
        return $this->belongsTo(AgeGroup::class);
    }
    public function users()
    {

        return $this->belongsToMany(User::class, 'team_users');
    }
    public function groupRegistrations()
    {
        return $this->belongsToMany(Team::class,'group_registration_teams');
    }
}
