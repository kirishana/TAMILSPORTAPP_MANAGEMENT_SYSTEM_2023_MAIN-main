<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\MainEvent;
class MainEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            ['40m', 1, 1],
            ['60m', 1, 1],
            ['100m', 1, 1],
            ['LongJump', 2, 1],
            ['HighJump', 2, 1],

            
    ];
       foreach ($array as $key => $value):
        $array2[] = [
        'name' => $value[0],
        'event_category_id' => $value[1],
        'organization_id' => $value[2],

        ];
    endforeach ;
DB::table('main_events')->insert($array2);
    }
}
