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
                'marathi_title' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे. लोरेम इप्सम हा 1500 च्या दशकापासून उद्योगाचा मानक डमी मजकूर आहे, जेव्हा एका अज्ञात प्रिंटरने एक प्रकारची गॅली घेतली आणि टाइप नमुना पुस्तक बनवण्यासाठी ते स्क्रॅम्बल केले. हे केवळ पाच शतकेच टिकले नाही, तर इलेक्ट्रॉनिक टाइपसेटिंगमध्ये देखील झेप घेतली आहे, मूलत: अपरिवर्तित आहे. 1960 च्या दशकात लॉरेम इप्सम पॅसेज असलेली लेट्रासेट शीट्स आणि अलीकडे लॉरेम इप्समच्या आवृत्त्यांसह अल्डस पेजमेकर सारख्या डेस्कटॉप प्रकाशन सॉफ्टवेअरसह ते लोकप्रिय झाले.
                ',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'is_deleted'=>false,
                'is_active'=>true,
               
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
                ConstitutionHistoryModel::create(
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
