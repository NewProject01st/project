<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\Budget;
use App\Models\ OrganizationChart;
use App\Models\ ConstitutionHistoryModel;
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
                'marathi_title' => 'Marathi Title',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'is_deleted'=>"1",
                'is_active'=>"1",
               
            ]);

            OrganizationChart::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'english_title' => 'English Title',
                    'marathi_title' => 'Marathi Title',
                    'english_image' => 'English Description',
                    'marathi_image' => 'Marathi Description',
                    'is_deleted'=>"1",
                    'is_active'=>"1",
               
                ]);
                ConstitutionHistoryModel::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'english_title' => 'English Title',
                        'marathi_title' => 'Marathi Title',
                        'english_description' => 'English Image',
                        'marathi_description' => 'Marathi Image',
                        'is_deleted'=>"1",
                        'is_active'=>"1",
               
                    ]);
    }
}
