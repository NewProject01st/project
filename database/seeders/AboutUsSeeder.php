<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\Budget;
use App\Models\ OrganizationChart;
use App\Models\ ConstitutionHistory;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Budget::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'English Title',
                'marathi_title' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'is_deleted' => false,
                'is_active' => true,
               
            ]);

            OrganizationChart::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'english_title' => 'English Title',
                    'marathi_title' => 'Marathi Title',
                    'english_image' => 'English Description',
                    'marathi_image' => 'Marathi Description',
                    'is_deleted'=>false,
                    'is_active'=>true,
               
                ]);
                ConstitutionHistory::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'english_title' => 'English Title',
                        'marathi_title' => 'Marathi Title',
                        'english_description' => 'English Image',
                        'marathi_description' => 'Marathi Image',
                        'is_deleted'=>false,
                        'is_active'=>true,
               
                    ]);
    }
}
