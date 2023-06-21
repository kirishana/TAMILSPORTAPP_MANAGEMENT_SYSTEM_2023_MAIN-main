<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\ReportName;

class ReportNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            ['PoliceReport'],
            ['MedicalReport'],
            ['NIC/Passport']

        ];

        foreach ($reports as $key => $value){
            ReportName::create([
                'name' => $value[0]
            ]);
    }
    
    }
}
