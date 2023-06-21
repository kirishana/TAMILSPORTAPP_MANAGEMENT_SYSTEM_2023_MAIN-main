<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventCategory;
class DummyUsers extends Seeder
{
   

    public function run()
    {
        $eventCategories = [
            ['Track event'],
            ['Field event'],
            ['Group event'],
        ];

        foreach ($eventCategories as $key => $value){
             EventCategory::create([
                'name' => $value[0],
            ]);
    }
}

}