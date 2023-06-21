<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailVerificationSetting extends Model
{
    use HasFactory;
    public $table = 'email_verification_settings';
    public $timestamps=false;



    public $fillable = [
        'organization_id',
        'subject',
        'logo',
        'title',
        'content',
        'footer',
        'reset_pw_subject',
        'reset_pw_content'
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
