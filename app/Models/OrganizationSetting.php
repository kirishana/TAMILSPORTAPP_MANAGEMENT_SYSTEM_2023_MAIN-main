<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;

class OrganizationSetting extends Model
{
    public $table = 'org_settings';




    public $fillable = [
        'organization_id',
        'org_logo',
        'header',
        'footer',
        'invoice_logo',
        'player_number_logo',
        'staff_id',
        'active',
        'discount',
        'two_factor_auth'
        

    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
