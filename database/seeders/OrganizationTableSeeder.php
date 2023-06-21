<?php

namespace Database\Seeders;
use App\Models\Organization;

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization=Organization::create([
            'name'=>'TamilSangam',
            'email'=>'organization1@gmail.com',
            'tpnumber'=>'0775789236',
            'address'=>'norway',
            'state'=>'north',
            'city'=>'norway',
            'postalcode'=>'5000',
            'country_id'=>1,
            'season_id'=>1,
            'status'=>1,
            'prefix'=>'TS'

        ]);
    }
}
