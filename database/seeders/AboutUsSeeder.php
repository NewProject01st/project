<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\ObjectiveGoals;
use App\Models\StateDisasterManagementAuthority;
use App\Models\DisasterManagementPortal;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisasterManagementPortal::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'English Title',
            'marathi_title' => 'Marathi Title',
            'english_description' => 'English Image',
            'marathi_description' => 'Marathi Image',
            'english_image' => 'English Image',
            'marathi_image' => 'Marathi Image',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        ObjectiveGoals::create([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'English Title',
                'marathi_title' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'is_deleted' => false,
                'is_active' => true,
               
            ]);

            StateDisasterManagementAuthority::create([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'English Title',
                'marathi_title' => 'Marathi Title',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'english_image' => 'English Image',
                'marathi_image' => 'Marathi Image',
                'is_deleted'=>false,
                'is_active'=>true,
            
            ]);

           
    }
}
