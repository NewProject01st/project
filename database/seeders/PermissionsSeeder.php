<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Permissions::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'route_name' => 'about-us',
                'url' => 'about-us',
                'permission_name' => 'About Us Page',
            ]);

            Permissions::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'route_name' => 'test',
                'url' => 'test',
                'permission_name' => 'Test Us Page',
            ]);

            
    }
}
