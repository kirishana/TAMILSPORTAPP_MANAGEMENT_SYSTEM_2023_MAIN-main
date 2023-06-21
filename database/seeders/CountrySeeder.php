<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder {

    public function run()
    {
       $array=[
            [1,  'Sri Lanka',118,12],
            [2,  'Norway',95,19],
            // [3,  'United kingdom',12],
       ];
       foreach ($array as $key => $value):
        $array2[] = [
        'id' => $value[0],
        // 'sortname' => $value[1],
        'name' => $value[1],
        'currency_id' => $value[2],
        'country_code_id'=>$value[3]


        ];
    endforeach ;
DB::table('countries')->insert($array2);
    }

}