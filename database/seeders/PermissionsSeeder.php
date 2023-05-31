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
                'route_name' => 'Main Menu',
                'url' => 'list-main-menu',
                'permission_name' => 'Main Menu List',
            ]);

            Permissions::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'route_name' => 'Sub Menu',
                'url' => 'list-sub-menu',
                'permission_name' => 'Sub Menu List',
            ]);

            
    }
}
