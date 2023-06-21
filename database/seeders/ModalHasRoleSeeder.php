<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ModalHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [8, 'App\User', '1'],
            [2, 'App\User', '2'],
            [1, 'App\User', '3'],
            [5, 'App\User', '4'],
            [6, 'App\User', '5'],

        ];
        foreach ($array as $key => $value) :
            $array2[] = [
                'role_id' => $value[0],
                'model_type' => $value[1],
                'model_id' => $value[2],

            ];
        endforeach;
        DB::table('model_has_roles')->insert($array2);
    }
}
