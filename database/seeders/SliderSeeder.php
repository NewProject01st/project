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
            'english_title' => 'Maharashtra battles forest fires',
            'marathi_title' => 'महाराष्ट्र जंगलातील आगीशी लढत आहे',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
            // 'image_alt' => '1_marathi',
            'url' => 'https://www.google.com/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Kerala floods displace thousands',
            'marathi_title' => 'केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत',
            'english_description' => 'In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure. ',
            'marathi_description' => 'ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.',
            'english_image' => '2_english.jpeg',
            'marathi_image' => '2_marathi.jpeg',
            // 'image_alt' => '2_marathi',
            'url' => 'https://www.google.com/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Odisha prepares for Cyclone Yaas',
            'marathi_title' => 'ओडिशा यास चक्रीवादळाची तयारी करत आहे',
            'english_description' => 'In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.',
            'marathi_description' => 'मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.',
            'english_image' => '3_english.jpeg',
            'marathi_image' => '3_marathi.jpeg',
            // 'image_alt' => '3_marathi',
            'url' => 'https://www.google.com/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}