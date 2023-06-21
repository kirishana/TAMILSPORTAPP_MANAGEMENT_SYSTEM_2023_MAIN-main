<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ReportName extends Model
{
    public $table = 'report_names';
    



    public $fillable = [
        'name',
        

    ];
    public function userReports()
    {
        return $this->hasMany(UserReport::class);
    }
}
