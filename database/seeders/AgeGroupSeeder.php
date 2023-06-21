<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\AgeGroup;
class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            ['1-10', 1, 1],
            ['11-20', 1, 1],
            ['21-25', 1, 1],
            ['27', 1, 1],
            ['28-35', 1, 1],

            
    ];
       foreach ($array as $key => $value):
        $array2[] = [
        'name' => $value[0],
        'status' => $value[1],
        'organization_id' => $value[2],

        ];
    endforeach ;
DB::table('age_groups')->insert($array2);
    }
}
