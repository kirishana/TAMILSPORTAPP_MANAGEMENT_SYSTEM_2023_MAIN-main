<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            [1,'+61'],
            [2,'+32'],
            [3,'+45'],
            [4,'+358'],
            [5,'+33'],
            [6,'+49'],
            [7,'+852'],
            [8,'+91'],
            [9,'+965'],
            [10,'+60'],
            [11,'+960'],
            [12,'+94'],
            [13,'+46'],
            [14,'+41'],
            [15,'+380'],
            [16,'+971'],
            [17,'+44'],
            [18,'+1'],
            [19,'+47'],
           
          
       ];


       foreach ($array as $key => $value):
        $array2[] = [
        'id' => $value[0],
        'name' => $value[1],
        ];
    endforeach ;
DB::table('country_code')->insert($array2);
    }
    
}
