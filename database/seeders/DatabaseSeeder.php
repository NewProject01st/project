<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(TendersSeeder::class);
        $this->call(PoliciesActsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesPermissionSeeder::class);
        $this->call(MainMenusSeeder::class);
        $this->call(MainSubMenusSeeder::class);
        $this->call(DynamicPagesSeeder::class);
        $this->call(MarqueeSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(DisasterManagementNewsSeeder::class);
        $this->call(EmergencyContactSeeder::class);
        $this->call(HomeTenderSeeder::class);
        $this->call(GeneralContactSeeder::class);    
        $this->call(DisasterManagementWebPortalSeeder::class);    
        
    }
}