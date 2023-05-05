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
            'menu_name_marathi' => 'About',
            'menu_name_english' => 'About',
            'url' => 'https://www.sumagoinfotech.com/',
            'order_no' => 1,
            'is_active' => true,
           
        ]);
    }
}