<?php
namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [
            ['2021',1],
        ];

        foreach ($seasons as $key => $value){
             Season::create([
                'name' => $value[0],
                'status'=>$value[1]
            ]);
    }
    }
}
