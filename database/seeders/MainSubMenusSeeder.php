<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainSubMenus;


class MainSubMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 1,
            'menu_name_marathi' => 'Budget',
            'menu_name_english' => 'Budget',
            'url' => 'https://www.sumagoinfotech.com/',
            'order_no' => 1,
            'is_active' => true,
            'is_static' => true,
           
        ]);
    }
}