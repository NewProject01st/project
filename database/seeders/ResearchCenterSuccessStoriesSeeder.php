<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuccessStories;

class ResearchCenterSuccessStoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        SuccessStories::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Doe Samson',
            'marathi_title' => 'डो सॅमसन ',
            'english_description' => 'To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.            ',
            'marathi_description' => 'सर्व स्टेकहोल्डर्सचा समावेश असलेल्या आणि प्रतिबंध, सज्जता आणि शमन करण्याची संस्कृती वाढवणाऱ्या सर्वांगीण, सक्रिय, तंत्रज्ञानावर आधारित आणि शाश्वत विकास धोरणाद्वारे सुरक्षित आणि आपत्ती प्रतिरोधक भारताची निर्मिती करणे.            ',
            'english_designation' => 'Accountant',
            'marathi_designation' => 'लेखापाल ',
            'english_image' => 'head_english.png',
            'marathi_image' => 'head_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

             
        SuccessStories::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Jhon Sharma',
            'marathi_title' => 'जॉन शर्मा            ',
            'english_description' => 'To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.            ',
            'marathi_description' => 'सर्व स्टेकहोल्डर्सचा समावेश असलेल्या आणि प्रतिबंध, सज्जता आणि शमन करण्याची संस्कृती वाढवणाऱ्या सर्वांगीण, सक्रिय, तंत्रज्ञानावर आधारित आणि शाश्वत विकास धोरणाद्वारे सुरक्षित आणि आपत्ती प्रतिरोधक भारताची निर्मिती करणे.            ',
            'english_designation' => 'Project Manager            ',
            'marathi_designation' => 'प्रकल्प व्यवस्थापक            ',
            'english_image' => 'head_english.png',
            'marathi_image' => 'head_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
    }
}