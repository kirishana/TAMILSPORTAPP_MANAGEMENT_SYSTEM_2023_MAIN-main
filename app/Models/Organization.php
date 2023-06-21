<?php

namespace App\Models;

use App\Models\Country;
use App\User;
use App\Models\OrganizationSetting;
use App\Models\League;
use App\Models\Season;
use App\Models\AgeGroup;
use App\Models\MainEvent;
use Eloquent as Model;

/**
 * Class Organization
 * @package App\Models
 * @version September 23, 2021, 9:23 am UTC
 *
 * @property string $name
 * @property integer $user_id
 * @property string $email
 * @property integer $tpnumber
 * @property integer $mobile
 * @property string $address
 * @property string $state
 * @property integer $postalcode
 */
class Organization extends Model
{

    public $table = 'organizations';




    public $fillable = [
        'name',
        'email',
        'tpnumber',
        'mobile',
        'address',
        'state',
        'postalcode',
        'country_id',
        'city',
        'status',
        'season_id',
        'prefix',
        'orgnum'
        
    ];
    

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'tpnumber' => 'integer',
        'mobile' => 'integer',
        'orgnum' => 'string',
        'address' => 'string',
        'state' => 'string',
        'postalcode' => 'integer',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'tpnumber' => 'required',
        'address' => 'required',
        'state' => 'required',
        'postalcode' => 'required',
        'country_id' => 'required'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function leagues()
    {
        return $this->hasMany(League::class);
    }
    public function athelaticsetting()
    {
        return $this->hasOne(AthleticSetting::class);
    }
    public function orgsetting()
    {
        return $this->hasOne(OrganizationSetting::class);
    }
    public function bankTransfer()
    {
        return $this->hasOne(BankTransfer::class);
    }
    public function Vipps()
    {
        return $this->hasOne(Vipps::class);
    }
    public function qrPayment()
    {
        return $this->hasOne(QrPayment::class);
    }
    public function Stripe()
    {
        return $this->hasOne(Stripe::class);
    }
    public function ageGroups()
    {
        return $this->hasMany(AgeGroup::class);
    }
    public function mainEvents()
    {
        return $this->hasMany(MainEvent::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function groupRegistrations()
    {
        return $this->hasMany(GroupRegistration::class);
    }
    public function ActivePayment()
    {
        return $this->hasOne(ActivePaymentMethod::class);
    }
    public function emailVerificationSetting()
    {
        return $this->hasOne(emailVerificationSetting::class);
    }
}
