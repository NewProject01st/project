<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;


class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'The Disaster Management cells Nashik Municipal Corporation geared up for the monsoon',
            'marathi_title' => 'नाशिक महापालिकेचे आपत्ती व्यवस्थापन कक्ष पावसाळ्यासाठी सज्ज',
            'english_description' => '"We are taking various measures to prevent water from getting logged," the official said.',
            'marathi_description' => '"आम्ही पाणी साचू नये यासाठी विविध उपाययोजना करत आहोत," असे अधिकाऱ्याने सांगितले.',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'url' => 'https://www.esakal.com/uttar-maharashtra/nashik/nmc-disaster-management-plan-of-municipal-corporation-in-wake-of-monsoon-nashik-news-psl98',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Mock Fire Drill demo given to Nashik people for safety.',
            'marathi_title' => 'नाशिककरांना सुरक्षिततेसाठी मॉक फायर ड्रिलचा डेमो दिला.',
            'english_description' => 'Mock Fire Drill',
            'marathi_description' => 'मॉक फायर ड्रिल ',
            'english_image' => '2_english.png',
            'marathi_image' => '2_marathi.png',
            'url' => 'https://nmcdm.org.in/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Massive Fire Breaks Out at Jindal Company in Nashik',
            'marathi_title' => 'नाशिकमधील जिंदाल कंपनीला भीषण आग',
            'english_description' => 'The Jindal Company in Nashik was engulfed in a massive fire, but was brought under control by the Nashik Fire Brigade.',
            'marathi_description' => 'नाशिकमधील जिंदाल कंपनीला भीषण आग लागली होती, परंतु नाशिक अग्निशमन दलाने ती नियंत्रित केली.',
            'english_image' => '3_english.png',
            'marathi_image' => '3_marathi.png',
            'url' => 'https://nmcdm.org.in/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}