<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Illuminate\Notifications\Notifiable;
use App\Models\Country;
use App\Models\AgeGroupGender;
use App\Models\UserReport;
use App\Models\Registration;
use App\Models\Organization;
use App\Models\Venue;
use App\Models\Event;
use App\Models\Club;
use App\Models\ClubeRquest;
use App\Models\dayUser;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Request;


class User extends Authenticatable
{
    use Notifiable,LogsActivity;
    use HasRoles;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected static $logAttributes = ['name', 'email', 'ip_address'];
     public function getActivitylogOptions(): LogOptions
     {
         return LogOptions::defaults()
             ->logOnly(self::$logAttributes)
             ->useLogName('user_activity_log')
             ->setDescriptionForEvent(function (string $eventName) {
                 return "{$eventName}";
             });
     }
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'first_name',
         'last_name',
        'country_id',
        'organization_id',
        'dob',
        'email',
        'password',
        'is_approved',
        'guardian_name',
        'guardian_email',
        'guardian_number',
        'gender',
        'tel_number',
        'city',
        'address',
        'postal',
        'profile_pic',
        'season_id',
        'medical_report',
        'parent_id',
        'first_login',
        'membership_updated_year',
        'two_factor_code',
        'two_factor_expires_at',
        'enable_two_factor',
        'hrs_on',
    ];
    public function activityDescription()
    {
        return $this->first_name;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'email_verified_at',
        'two_factor_expires_at',
        'hrs_on'
    ];
    public function dayUser()
    {
        return $this->hasOne(dayUser::class);
    }
    public function clubRequests()
    {
        return $this->hasMany(ClubeRquest::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    
    public function venues()
    {
        return $this->hasMany(Venue::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_users')->withTimestamps();
    }

    public function eventOrganizers()
    {
        return $this->hasMany(Event::class);
    }
    public function getIpAddressAttribute(): ?string
    {
        return Request::ip();
    }
    public function userReports()
    {
        return $this->hasMany(UserReport::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function ageGroupGenders()
    {
        return $this->belongsToMany(AgeGroupGender::class, 'age_group_gender_user')->withPivot('time', 'one', 'two', 'third');
    }
    public function teams()
    {
        return $this->hasMany(Team::class, 'team_users');
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = Permission::select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }
    public function ageGroupGenderUsers()
    {
        return $this->belongsToMany(AgeGroupGenderUser::class, 'age_group_gender_user')->withPivot('time', 'one', 'two', 'third');
    }


    public function parent()
    {
        return $this->belongsTo('App\User', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\User', 'parent_id');
    }
    public function generateTwoFactorCode()
{
    $this->timestamps = false;
    $this->two_factor_code = rand(100000, 999999);
    $this->two_factor_expires_at = now()->addMinutes(2);
    $this->save();
}
public function resetTwoFactorCode()
{
    $this->timestamps = false;
    $this->two_factor_code = null;
    $this->two_factor_expires_at = null;
    $this->save();
}
}
