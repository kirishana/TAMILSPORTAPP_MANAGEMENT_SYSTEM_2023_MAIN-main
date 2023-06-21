<?php

namespace App\Models;

use App\Models\League;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    public $table = 'seasonss';




    public $fillable = [
        'name',
        'status'
    ];
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function groupRegistrations()
    {
        return $this->hasMany(GroupRegistration::class);
    }
}
