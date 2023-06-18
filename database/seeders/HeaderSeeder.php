<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialIcon;
use App\Models\Tollfree;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialIcon::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'icon' => 'facebook.jpeg',
            'url' => 'facebook.com',
            'is_deleted'=>false,
            'is_active'=>true,
           
        ]);
        SocialIcon::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'icon' => 'tweeter.jpeg',
            'url' => 'tweeter.com',
            'is_deleted'=>false,
            'is_active'=>true,
           
        ]);
        SocialIcon::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'icon' => 'insta.jpeg',
            'url' => 'insta.com',
            'is_deleted'=>false,
            'is_active'=>true,
           
        ]);
        SocialIcon::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'icon' => 'indeed.jpeg',
            'url' => 'indeed.com',
            'is_deleted'=>false,
            'is_active'=>true,
           
        ]);
        Tollfree::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_tollfree_no' => '0000 00000',
            'marathi_tollfree_no' => '0000 00000',
            'is_deleted'=>false,
            'is_active'=>true,
           
        ]);

    }
}