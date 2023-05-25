<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainMenus;


class MainMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Home',
            'menu_name_marathi' => 'मुख्यपृष्ठ',
            'order_no' => 1,
            'url'=>'/',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'About Us',
            'menu_name_marathi' => 'आमच्याबद्दल',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Disasters',
            'menu_name_marathi' => 'संकटे',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        
        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Preparedness',
            'menu_name_marathi' => 'तयारी',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => ' Emergency Response',
            'menu_name_marathi' => 'आपत्कालीन प्रतिसाद',
            'order_no' => 5,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Citizen Action',
            'menu_name_marathi' => 'नागरिक कृती',
            'order_no' => 6,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Training Workshops',
            'menu_name_marathi' => 'प्रशिक्षण कार्यशाळा',
            'order_no' => 7,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => ' Policies and Legislation',
            'menu_name_marathi' => 'धोरणे आणि कायदे',
            'order_no' => 8,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => ' Resource Center',
            'menu_name_marathi' => 'संसाधन केंद्र',
            'order_no' => 9,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => ' News & Events',
            'menu_name_marathi' => 'बातम्या आणि कार्यक्रम',
            'order_no' => 10,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'menu_name_english' => 'Contact Us',
            'menu_name_marathi' => 'आमच्याशी संपर्क साधा',
            'order_no' => 11,
            'url'=> 'contact',
            'is_static'=>true,
            'is_active' => true,
           
        ]);



    }
}