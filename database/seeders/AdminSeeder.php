<?php

namespace Database\Seeders;

use App\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends DatabaseSeeder
{

    public function run()
    {
        $user = User::create([
            'first_name'  => 'norway',
            'last_name'=>'tamilsangam',
            'dob' => '1996-05-05',
            'userId' => 'TS 0001',
            'is_approved' => 1,
            'status'=>2,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'country_id' => 1,
            'first_login'=>1
        ]);

        // $role = Role::create(['name' => 'SuperAdmin', 'status' => 1, 'slug' => Str::slug('Super Admin', '-')]);

        $permissions = [
           
            [
                'module' => 'All Organizations',

                'permissions' => [
                    'View-Organization',
                    'Edit-Organization',


                ],
            ],
            [
                'module' => 'All Staffs',

                'permissions' => [
                    'Create-staff2',
                    'View-staff',
                    'Edit-staff',
                    'Delete-staff'
                ],
            ],
            [
                'module' => 'All Members',

                'permissions' => [
                    'Create-org-member',
                    'View-org-member',
                    'Edit-org-member',
                    'Delete-org-member'
                ],
            ],
            [
                'module' => 'Settings-org',

                'permissions' => [
                    'ViewSettings',
                    'EditSettings',
                ],
            ],
            [
                'module' => 'masterData',

                'permissions' => [
                    'createMasterData',
                    'viewMasterData',
                    'editMasterData',
                ],
            ],
                   //venue
                   [
                    'module' => 'Add New-venue',
    
                    'permissions' => [
                        'Create-Venue',
    
                    ],
                ],
                [
                    'module' => 'All Venues',
    
                    'permissions' => [
                        'Create-venue2',
                        'View-venue',
                        'Edit-venue',
                        'Delete-venue',
                    ],
                ],
                //leagues
            [
                'module' => 'Add New-league',

                'permissions' => [
                    'Create-league',

                ],
            ],
            [
                'module' => 'All Leagues',

                'permissions' => [
                    
                    'Create-league2',
                    'view-leagues',
                    'Edit-league',
                    'cancel-league',
                    

                ],
            ],
                 //users
                 [
                    'module' => 'Add New-user',
    
                    'permissions' => [
                        'Create-user',
    
                    ],
                ],
                [
                    'module' => 'All Users',
    
                    'permissions' => [
                        'Create-user2',
                        'View-user',
                        'Edit-user',
                        'Delete-user',
                    ],
                ],
                [
                    'module' => 'ImportUsers',
    
                    'permissions' => [
                       'import-users',
                    ],
                ],
                //event
            [
                'module' => 'Add New-event',

                'permissions' => [
                    'Create-event',

                ],
            ],
   


            [
                'module' => 'Events List',

                'permissions' => [
                    'viewevent',
                    'editevent',
                    'deleteevent'
                ],
            ],
            [
                'module' => 'participants',

                'permissions' => [
                    'view-participants',
                   
                ],
            ],
            [
                'module' => 'groupEventRegs',

                'permissions' => [
                    'view-regs',
                   
                ],
            ],
            [
                'module' => 'cancellation',

                'permissions' => [
                    'view-cancellation',
                    'edit-cancellation'
                   
                ],
            ],
            [
                'module' => 'marathon',

                'permissions' => [
                    'view-marathon',
                   
                ],
            ],
            [
                'module' => 'Event Results',

                'permissions' => [
                    'viewresults'
                ],
            ],
        
              //payment req
              [
                'module' => 'payment requests',

                'permissions' => [
                    'view-request',
                    'approve-request',

                ],
            ],
              //reports
              [
                'module' => 'iframes',

                'permissions' => [
                    'view-iframe',

                ],
            ],
            //club

            [
                'module' => 'Add New-club',

                'permissions' => [
                    'Create-Club',

                ],
            ],
            [
                'module' => 'All Clubs',

                'permissions' => [
                    'Create-Club2',
                    'View-Club',
                    'Edit-Club',
                    'Delete-Club',
                ],
            ],
                 
            //teams
            [
                'module' => 'Add New-team',

                'permissions' => [
                    'Create-team',

                ],
            ],
            [
                'module' => 'All Teams',

                'permissions' => [
                    'Create-team2',
                    'View-team',
                    'Edit-team',
                    'Delete-team',
                ],
            ],


            //members
            [
                'module' => 'Add New-member',

                'permissions' => [
                    'Create-member',

                ],
            ],
            [
                'module' => 'AllClubMembers',

                'permissions' => [
                    'Create-member2',
                    'View-events',
                    'edit-member',
                    'delete-member'

                ],
            ],
            [
                'module' => 'Settings-club',

                'permissions' => [
                    'ViewSettings-club',
                    'EditSettings-club',
                ],
            ],
     
            [
                'module' => 'importClubMember',

                'permissions' => [
                    'import-member',

                ],
            ],
            [
                'module' => 'Payments',

                'permissions' => [
                    'ViewPayments',

                ],
            ],
            //payment
            [
                'module' => 'eventApprovals',

                'permissions' => [
                    'viewApprovals',
                    'editApprovals'

                ],
            ],
            //teams
            [
                'module' => 'Add New-players',

                'permissions' => [
                    'Create-player',

                ],
            ],
            //familymembers
            [
                'module' => 'CreateFamilyMember',

                'permissions' => [
                    'Create-familMembers',
                   
                ],
            ],
            [
                'module' => 'FamilyMembers',

                'permissions' => [
                    'Create-familMember',
                    'Edit-familMember',
                    'event-familMember',
                ],
            ],

          
           
            //seasons
            [
                'module' => 'Add New-season',

                'permissions' => [
                    'Create-season',

                ],
            ],
            [
                'module' => 'Seasons Lists',

                'permissions' => [

                    'Create-season2',
                    'View-season',
                    'Edit-season',
                    'Delete-season'
                ],
            ],
       
          

            


            //news
            [
                'module' => 'Add New-news',

                'permissions' => [
                    'Add-News',

                ],
            ],
            [
                'module' => 'Scheduled',

                'permissions' => [
                    'View-news',
                    'Edit-news',
                ],
            ],
            [
                'module' => 'Drafted',

                'permissions' => [
                    'Drafted-news',

                ],
            ],
           
            //settings
            [
                'module' => 'Settings',

                'permissions' => [
                    'GeneralSettings',
                ],
            ],
            

        ];
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['module'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $user->givePermissionTo($permission);
                // $permission->assignRole($role);
            }
        }
    }
}
