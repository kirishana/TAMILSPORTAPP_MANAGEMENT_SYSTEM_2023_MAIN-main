<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarathonPoint extends Model
{
    use HasFactory;
    public $table = 'marathon_points';

    protected $fillable = [
        'league_id',
        'club_id',
        'points',
    ];
    public $timestamps = false;
    public function league()
    {
        return $this->belongsTo(Leauge::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

}
