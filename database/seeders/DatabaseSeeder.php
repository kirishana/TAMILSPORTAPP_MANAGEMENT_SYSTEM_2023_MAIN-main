<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencySeeder::class);
        $this->call(CountryCodeSeeder::class);

        $this->call(CountrySeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DummyUsers::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(GeneralSettings::class);
        $this->call(GenderTable::class);
        $this->call(SportsCategorySeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(OrganizationSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(ModalPermissionSeeder::class);
        // $this->call(RoleHasPermissionSeeder::class);
        $this->call(ModalHasRoleSeeder::class);
        // $this->call(CountryAdminSeeder::class);
        // $this->call(AgeGroupSeeder::class);
        // $this->call(MainEventSeeder::class);
        // $this->call(StarterSeeder::class);
        // $this->call(JudgeSeeder::class);
        $this->call(ReportNameSeeder::class);
    }
}
