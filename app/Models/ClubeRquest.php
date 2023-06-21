<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class ClubeRquest extends Model
{
    use HasFactory;
    protected $table = 'club_requests';
    protected $guarded  = ['id',
    'old_club_id',
    'new_club_id',
    'status'

];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function oldClub()
    {
        return $this->belongsTo(Club::class, 'old_club_id');
    }

    public function newClub()
    {
        return $this->belongsTo(Club::class, 'new_club_id');
    }
}
