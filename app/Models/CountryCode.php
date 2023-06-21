<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;
    public $table = 'country_code';




    public $fillable = [
        'currency_iso_code',
       

    ];
    public function Country()
    {
        return $this->hasOne(Country::class);
    }
}
