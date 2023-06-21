<?php
namespace Database\Seeders;

use App\Models\SportsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class SportsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['Athletic'],
            ['Cricket'],
            ['FootBall'],
            ['Carrom']
        ];

        foreach ($genders as $key => $value){
             SportsCategory::create([
                'name' => $value[0]
            ]);
    }
    }
    
}
