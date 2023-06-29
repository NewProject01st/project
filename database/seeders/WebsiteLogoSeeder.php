<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteLogo;

class WebsiteLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteLogo::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'logo' => 'logo.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}
