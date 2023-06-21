<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AgeGroupGenderUser extends Model
{
    use HasFactory;
    public $table = 'age_group_gender_user';




    public $fillable = [
        'id',
        'age_group_gender_id',
        'user_id',
        'league_id',
        'time',
        'one',
        'two',
        'third',
        'marks'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'users');
    }
   
    public function ageGroupGenders()
    {
        return $this->hasMany(AgeGroupGender::class, 'age_group_gender_id', 'id');
    }
    public function ageGroupEvent()
    {
        return $this->belongsTo(AgeGroupEvent::class);
    }
}
