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

            Permissions::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'route_name' => 'News Bar',
                    'url' => 'list-marquee',
                    'permission_name' => 'News Bar',
                ]);

                
            Permissions::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'route_name' => 'Slider',
                    'url' => 'list-slide',
                    'permission_name' => 'Slider',
                ]);
                Permissions::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'route_name' => 'Disaster Web Portal',
                        'url' => 'list-disaster-management-web-portal',
                        'permission_name' => 'Disaster Web Portal',
                    ]);

                    Permissions::create(
                        [
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                            'route_name' => 'Disaster Management News',
                            'url' => 'list-disaster-management-news',
                            'permission_name' => 'Disaster Management News',
                        ]);

                        Permissions::create(
                            [
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'route_name' => 'Weather',
                                'url' => 'list-weather',
                                'permission_name' => 'Weather',
                            ]);

                            Permissions::create(
                                [
                                    'created_at' => \Carbon\Carbon::now(),
                                    'updated_at' => \Carbon\Carbon::now(),
                                    'route_name' => 'Disaster Forcast',
                                    'url' => 'list-disasterforcast',
                                    'permission_name' => 'Disaster Forcast',
                                ]);
    

            
    }
}
