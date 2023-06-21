<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'  => 'norway sangam',
            'dob' => '1996-05-05',
            'userId' => 'TS 0003',
            'is_approved' => 1,
            'status'=>2,
            'email' => 'country@admin.com',
            'password' => Hash::make('password'),
            'country_id' => 1
        ]);

        // $role = Role::create(['name' => 'CountryAdmin', 'status' => 1, 'slug' => Str::slug('Country Admin', '-')]);
    }
}
