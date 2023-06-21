<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [6,  '2'],
            [7,  '2'],
            [15,  '2'],
            [16,  '2'],
            [17,  '2'],
            [18,  '2'],
            [19,  '2'],
            [20,  '2'],
            [21,  '2'],
            [22,  '2'],
            [23,  '2'],
            [24,  '2'],
            [25,  '2'],
            [26,  '2'],
            [27,  '2'],
            [28,  '2'],
            [29,  '2'],
            [30,  '2'],
            [31,  '2'],
            [32,  '2'],
            [33,  '2'],
            [34,  '2'],
            [35,  '2'],
            [36,  '2'],
            [37,  '2'],
            [38,  '2'],
            [39,  '2'],
            [40,  '2'],
            [41,  '2'],
            [42,  '2'],
            [43,  '2'],
            [44,  '2'],
            [45,  '2'],
            [46,  '2'],
            [47,  '2'],
            [48,  '2'],
            [49,  '2'],
            [50,  '2'],

            [6,  '3'],
            [7,  '3'],
            [15,  '3'],
            [16,  '3'],
            [17,  '3'],
            [18,  '3'],
            [19,  '3'],
            [20,  '3'],
            [21,  '3'],
            [23,  '3'],
            [22,  '3'],
            [24,  '3'],
            [25,  '3'],
            [26,  '3'],
            [27,  '3'],
            [28,  '3'],
            [29,  '3'],
            [30,  '3'],
            [31,  '3'],
            [32,  '3'],
            [33,  '3'],
            [34,  '3'],
            [35,  '3'],
            [36,  '3'],
            [37,  '3'],
            [38,  '3'],
            [39,  '3'],
            [40,  '3'],
            [41,  '3'],
            [42,  '3'],
            [43,  '3'],
            [44,  '3'],
            [45,  '3'],
            [46,  '3'],
            [47,  '3'],
            [48,  '3'],
            [49,  '3'],
            [50,  '3'],



        ];
        foreach ($array as $key => $value) :
            $array2[] = [
                'permission_id' => $value[0],
                'role_id' => $value[1],

            ];
        endforeach;
        DB::table('role_has_permissions')->insert($array2);
    }
}
