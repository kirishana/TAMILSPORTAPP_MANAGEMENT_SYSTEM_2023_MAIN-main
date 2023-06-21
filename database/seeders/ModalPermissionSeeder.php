<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ModalPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
            [6, 'App\User', '2'],
            [7, 'App\User', '2'],   
            [15, 'App\User', '2'],    
            [16, 'App\User', '2'],
            [17, 'App\User', '2'],
            [18, 'App\User', '2'],
            [19, 'App\User', '2'],
            [20, 'App\User', '2'],
            [21, 'App\User', '2'],
            [22, 'App\User', '2'],
            [23, 'App\User', '2'],
            [24, 'App\User', '2'],
            [25, 'App\User', '2'],
            [26, 'App\User', '2'],
            [27, 'App\User', '2'],
            [28, 'App\User', '2'],
            [29, 'App\User', '2'],
            [30, 'App\User', '2'],
            [31, 'App\User', '2'],
            [32, 'App\User', '2'],
            [33, 'App\User', '2'],
            [34, 'App\User', '2'],
            [35, 'App\User', '2'],
            [36, 'App\User', '2'],
            [37, 'App\User', '2'],
            [38, 'App\User', '2'],
            [39, 'App\User', '2'],
            [40, 'App\User', '2'],
            [41, 'App\User', '2'],
            [42, 'App\User', '2'],
            [43, 'App\User', '2'],
            [44, 'App\User', '2'],
            [45, 'App\User', '2'],
            [46, 'App\User', '2'],
            [47, 'App\User', '2'],
            [48, 'App\User', '2'],
            [49, 'App\User', '2'],
            [50, 'App\User', '2'],

            [6, 'App\User', '3'],
            [7, 'App\User', '3'],   
            [15, 'App\User', '3'],    
            [16, 'App\User', '3'],
            [17, 'App\User', '3'],
            [18, 'App\User', '3'],
            [19, 'App\User', '3'],
            [20, 'App\User', '3'],
            [21, 'App\User', '3'],
            [23, 'App\User', '3'],
            [22, 'App\User', '3'],
            [24, 'App\User', '3'],
            [25, 'App\User', '3'],
            [26, 'App\User', '3'],
            [27, 'App\User', '3'],
            [28, 'App\User', '3'],
            [29, 'App\User', '3'],
            [30, 'App\User', '3'],
            [31, 'App\User', '3'],
            [32, 'App\User', '3'],
            [33, 'App\User', '3'],
            [34, 'App\User', '3'],
            [35, 'App\User', '3'],
            [36, 'App\User', '3'],
            [37, 'App\User', '3'],
            [38, 'App\User', '3'],
            [39, 'App\User', '3'],
            [40, 'App\User', '3'],
            [41, 'App\User', '3'],
            [42, 'App\User', '3'],
            [43, 'App\User', '3'],
            [44, 'App\User', '3'],
            [45, 'App\User', '3'],
            [46, 'App\User', '3'],
            [47, 'App\User', '3'],
            [48, 'App\User', '3'],
            [49, 'App\User', '3'],
            [50, 'App\User', '3'],



            [6, 'App\User', '5'],
            [7, 'App\User', '5'],   
            [15, 'App\User', '5'],    
            [16, 'App\User', '5'],
            [17, 'App\User', '5'],
            [18, 'App\User', '5'],
            [19, 'App\User', '5'],
            [20, 'App\User', '5'],
            [21, 'App\User', '5'],
            [22, 'App\User', '5'],
            [23, 'App\User', '5'],
            [24, 'App\User', '5'],
            [25, 'App\User', '5'],
            [26, 'App\User', '5'],
            [27, 'App\User', '5'],
            [28, 'App\User', '5'],
            [29, 'App\User', '5'],
            [30, 'App\User', '5'],
            [31, 'App\User', '5'],
            [32, 'App\User', '5'],
            [33, 'App\User', '5'],
            [34, 'App\User', '5'],
            [35, 'App\User', '5'],
            [36, 'App\User', '5'],
            [37, 'App\User', '5'],
            [38, 'App\User', '5'],
            [39, 'App\User', '5'],
            [40, 'App\User', '5'],
            [41, 'App\User', '5'],
            [42, 'App\User', '5'],
            [43, 'App\User', '5'],
            [44, 'App\User', '5'],
            [45, 'App\User', '5'],
            [46, 'App\User', '5'],
            [47, 'App\User', '5'],
            [48, 'App\User', '5'],
            [49, 'App\User', '5'],
            [50, 'App\User', '5'],



            [6, 'App\User', '6'],
            [7, 'App\User', '6'],   
            [15, 'App\User', '6'],    
            [16, 'App\User', '6'],
            [17, 'App\User', '6'],
            [18, 'App\User', '6'],
            [19, 'App\User', '6'],
            [20, 'App\User', '6'],
            [21, 'App\User', '6'],
            [22, 'App\User', '6'],
            [23, 'App\User', '6'],
            [24, 'App\User', '6'],
            [25, 'App\User', '6'],
            [26, 'App\User', '6'],
            [27, 'App\User', '6'],
            [28, 'App\User', '6'],
            [29, 'App\User', '6'],
         


        
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
