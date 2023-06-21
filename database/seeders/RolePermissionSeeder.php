<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'first_name'  => 'suvarna',
            'last_name'     =>'nathan',
            'country_id'=>10,
            'dob'=>'1996-05-05',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        
        $role = Role::create(['name' => 'Admin']);

        $permissions=[
            [
                'group_name'=>'organization',
                'permissions'=>[
                    'organization.create',
                    'organization.view',
                    'organization.edit',
                    'organization.delete',
                ],
            ],
            [
                'group_name'=>'club',
                'permissions'=>[
                    'club.create',
                    'club.view',
                    'club.edit',
                    'clubdelete',
                ]
            ]
                ];
        for($i=0;$i<count($permissions);$i++)
        {
            $permissionGroup=$permissions[$i]['group_name'];
            for($j=0;$j<count($permissions[$i]['permissions']);$j++)
            {
            $permission=Permission::create(['name'=>$permissions[$i]['permissions'][$j],'group_name'=>$permissionGroup]);
            $user->givePermissionTo($permission);
            $permission->assignRole($role);
            }
        }
    }
    }

