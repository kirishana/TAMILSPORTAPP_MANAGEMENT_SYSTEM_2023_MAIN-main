<?php
namespace Database\Seeders;

use App\generalSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class GeneralSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generals = [
            ['Tamil Sangam Norway',
            'Tamil Sangam',
            '+47 467 73 535',
            'Stovner vel, Fjellstuveien 26, 0982 Oslo, Norway.',
            'tamilsangam@gmail.com',
            'Tamil Sangam Norway | Stovner vel, Fjellstuveien 26, 0982 Oslo, Norway. | Ph:+47 467 73 535 | Email:post@norwaytamilsangam.com'
        
        ],
        ];

        foreach ($generals as $key => $value){
             generalSetting::create([
                'name' => $value[0],
                'title'=>$value[1],
            'telephone'=>$value[2],
                'address'=>$value[3],
                'email'=>$value[4],
                'footer'=>$value[5],

            ]);
    }
    }
    
}
?>
