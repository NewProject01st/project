<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialIcon;

class SocialIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialIcon::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'icon' => '1_english.jpg',
                'url' => 'https://www.facebook.com/mynashikmc/',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
        SocialIcon::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'icon' => '2_english.jpg',
                'url' => 'https://instagram.com/my_nmc',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
        SocialIcon::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'icon' => '3_english.jpg',
                'url' => 'https://twitter.com/my_nmc',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
        SocialIcon::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'icon' => '4_english.jpg',
                'url' => 'https://www.youtube.com/c/mynmc',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
        SocialIcon::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'icon' => '5_english.jpg',
                'url' => 'https://nmc.gov.in',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
    }
}