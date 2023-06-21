<?php
namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class GenderTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['Male'],
            ['Female']
        ];

        foreach ($genders as $key => $value){
             Gender::create([
                'name' => $value[0]
            ]);
    }
    }
    
}
