<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageRole extends Model
{
    use HasFactory;
    protected $table = "message_role";

    protected $fillable = [ 'message_id',
                            'role_id',
                            'timestamps'];
}
