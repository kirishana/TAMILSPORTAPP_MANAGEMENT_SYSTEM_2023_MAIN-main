<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Spatie\Permission\Models\Role;

class Message extends Model
{
    use HasFactory;
    // use softDeletes;
    protected $table= 'messages';
  


    public $fillable = [
     'id',
     'content_title',
     'content',
    // 'role_id',
     'timestamps',
     
    
 ];
 
 protected $dates= ['deleted_at'];

 public function roles()
    {
        return $this->belongsToMany(Role::class, 'message_role')->withTimestamps();
    }
}
