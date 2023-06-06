<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Documentspublications;

class ResearchCenterDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documentspublications::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Maharashtra Battles Forest Fires',
            'marathi_title' => 'महाराष्ट्र जंगलातील आगीशी लढत आहे',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army.',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_pdf' => 'Maharashtra Battles Forest Fires.pdf',
            'marathi_pdf' => 'Maharashtra Battles Forest Fires.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        Documentspublications::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Kerala floods displace thousands ',
            'marathi_title' => 'केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत',
            'english_description' => 'In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure.',
            'marathi_description' => 'ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.',
            'english_pdf' => 'Kerala floods displace thousands.pdf',
            'marathi_pdf' => 'Kerala floods displace thousands.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        Documentspublications::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Odisha prepares for Cyclone Yaas ',
            'marathi_title' => 'ओडिशा यास चक्रीवादळाची तयारी करत आहे ',
            'english_description' => 'In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.',
            'marathi_description' => 'मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.',
            'english_pdf' => ' Odisha prepares for Cyclone Yaas.pdf',
            'marathi_pdf' => ' Odisha prepares for Cyclone Yaas.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        Documentspublications::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'test document',
            'marathi_title' => 'चाचणी दस्तऐवज ',
            'english_description' => 'In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure.',
            'marathi_description' => '2021 मध्ये, आसामला अतिवृष्टीमुळे गंभीर पुराचा सामना करावा लागला, अनेक लोक विस्थापित झाले आणि घरे आणि पायाभूत सुविधांचे नुकसान झाले.',
            'english_pdf' => 'Test Document.pdf',
            'marathi_pdf' => 'Test Document.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}