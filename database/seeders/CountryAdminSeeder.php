<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CountryAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            [1, 'App\User', '3'],
            [3, 'App\User', '3'],   
            [4, 'App\User', '3'],    
            [5, 'App\User', '3'],
            [2, 'App\User', '3'],
            [8, 'App\User', '3'],
            [9, 'App\User', '3'],
            [10, 'App\User', '3'],
            [78, 'App\User', '3'],
            [79, 'App\User', '3'],
            [80, 'App\User', '3'],
            [81, 'App\User', '3'],
            [91, 'App\User', '3'],
            [92, 'App\User', '3'],        
    ];
       foreach ($array as $key => $value):
        $array2[] = [
        'permission_id' => $value[0],
        'model_type' => $value[1],
        'model_id' => $value[2],

        ];
    endforeach ;
DB::table('model_has_permissions')->insert($array2);
    }
}
