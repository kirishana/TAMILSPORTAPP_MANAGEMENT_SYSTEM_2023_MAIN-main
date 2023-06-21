<?php

namespace App\Models;
use App\Models\League;

use Illuminate\Database\Eloquent\Model;

class SportsCategory extends Model
{
    public $table = 'sports_categories';
    



    public $fillable = [
        'name',
    ];
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
}
