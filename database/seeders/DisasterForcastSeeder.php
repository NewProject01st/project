<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisasterForcast;

class DisasterForcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisasterForcast::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'Cyclone Biparjoy moved after Gujarat. Vigilance warning to 4 states',
                'marathi_title' => 'बिपरजॉय चक्रीवादळ गुजरातनंतर सरकले. 4 राज्यांना सतर्कतेचा इशारा',
                'english_description' => 'Cyclone Biparjoy moved after Gujarat. Vigilance warning to 4 states',
                'marathi_description' => 'बिपरजॉय चक्रीवादळ गुजरातनंतर सरकले. 4 राज्यांना सतर्कतेचा इशारा ',
              
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
    }
}