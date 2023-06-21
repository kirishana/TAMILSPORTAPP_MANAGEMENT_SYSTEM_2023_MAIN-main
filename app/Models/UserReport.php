<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class UserReport extends Model
{
    use HasFactory;
    public $table = 'user_reports';
    



    public $fillable = [
        'user_id',
        'report_name_id',
        'reports'
        

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reportName()
    {
        return $this->belongsTo(ReportName::class);
    }

}
