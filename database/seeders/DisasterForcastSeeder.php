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
                // 'english_title' => 'English Title',
                // 'marathi_title' => 'मराठी शीर्षक',
                'english_description' => 'Cyclone Biparjoy moved after Gujarat. Vigilance warning to 4 states',
                'marathi_description' => 'बिपरजॉय चक्रीवादळ गुजरातनंतर सरकले. 4 राज्यांना सतर्कतेचा इशारा ',
                // 'forcast_date' => 'Forcast Date',
                // 'expired_date' => 'Expire Date',
                // 'english_image' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
                // 'marathi_image' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
                // 'english_pdf' => 'English Pdf',
                // 'marathi_pdf' => 'Marathi Pdf',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
    }
}