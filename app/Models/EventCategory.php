<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainEvent;
class EventCategory extends Model
{
    public $table = 'event_categories';
    



    public $fillable = [
        'name',
    ];
    public function mainEvents()
    {
        return $this->hasMany(MainEvent::class);
    }
}
