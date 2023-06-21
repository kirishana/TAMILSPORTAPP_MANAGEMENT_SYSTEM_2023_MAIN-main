<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class JudgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'  => 'judge tamilsangam',
            'dob' => '1996-05-05',
            'userId' => 'TS 0005',
            'is_approved' => 1,
            'status'=>2,
            'email' => 'judge@gmail.com',
            'password' => Hash::make('password'),
            'country_id' => 1,
            'organization_id' => 1

        ]);
    }
}
