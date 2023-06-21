<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Country extends Model
{
    // use Eloquent;
    protected $table = 'countries';
    protected $guarded  = ['id'];
    protected $searchableColumns = ['name','currency_id','country_code_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function organization()
    {
        return $this->hasOne(Organization::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function countryCode()
    {
        return $this->belongsTo(CountryCode::class);
    }
    public function clubs(){
        return $this->hasMany(Club::class);
    }
}
