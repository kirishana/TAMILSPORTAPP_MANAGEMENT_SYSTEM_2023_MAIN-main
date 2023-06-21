<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['CountryAdmin', 'web'],
            ['OrganizationAdmin', 'web'],
            ['ClubAdmin', 'web'],
            ['EventOrganizer', 'web'],
            ['Starter', 'web'],
            ['Judge', 'web'],
            ['Player', 'web'],
            ['SuperAdmin', 'web'],



        ];
        foreach ($array as $key => $value) :
            $array2[] = [
                'name' => $value[0],
                'guard_name' => $value[1]

            ];
        endforeach;
        DB::table('roles')->insert($array2);
    }
}
