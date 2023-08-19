<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisasterManagementWebPortal;

class DisasterManagementWebPortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisasterManagementWebPortal::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Disaster Management Web Portal',
            'marathi_name' => 'आपत्ती व्यवस्थापन वेब पोर्टलवर',
            'english_title' => 'Welcome to Visit Disaster Management Web Portal',
            'marathi_title' => 'आपत्ती व्यवस्थापन वेब पोर्टलवर आपले स्वागत आहे',
            'english_description' => 'The National Disaster Management Authority (NDMA), headed by the Prime Minister of India, is the apex body for Disaster Management in India. Setting up of NDMA and the creation of an enabling environment for institutional mechanisms at the State and District levels is mandated by the Disaster Management Act, 2005. NDMA is mandated to lay down the policies, plans and guidelines for Disaster Management. India envisions the development of an ethos of Prevention, Mitigation, Preparedness and Response. 
            The Indian government strives to promote a national resolve to mitigate the damage and destruction caused by natural and man-made disasters, through sustained and collective efforts of all Government agencies, Non-Governmental Organisations and People’s participation. This is planned to be accomplished by adopting a Technology-Driven, Proactive, Multi-Hazard and Multi-Sectoral strategy for building a Safer, Disaster Resilient and Dynamic India.',
            'marathi_description' => 'भारताच्या पंतप्रधानांच्या अध्यक्षतेखालील राष्ट्रीय आपत्ती व्यवस्थापन प्राधिकरण (NDMA) ही भारतातील आपत्ती व्यवस्थापनाची सर्वोच्च संस्था आहे. NDMA ची स्थापना आणि राज्य आणि जिल्हा स्तरावर संस्थात्मक यंत्रणांसाठी सक्षम वातावरण निर्माण करणे आपत्ती व्यवस्थापन कायदा, 2005 द्वारे अनिवार्य आहे. NDMA ला आपत्ती व्यवस्थापनासाठी धोरणे, योजना आणि मार्गदर्शक तत्त्वे मांडणे बंधनकारक आहे. भारत प्रतिबंध, शमन, पूर्वतयारी आणि प्रतिसाद या तत्त्वांच्या विकासाची कल्पना करतो.
            भारत सरकार सर्व सरकारी संस्था, गैर-सरकारी संस्था आणि लोकसहभागाच्या शाश्वत आणि सामूहिक प्रयत्नांद्वारे नैसर्गिक आणि मानवनिर्मित आपत्तींमुळे होणारे नुकसान आणि विध्वंस कमी करण्याच्या राष्ट्रीय संकल्पाला चालना देण्यासाठी प्रयत्नशील आहे. सुरक्षित, आपत्ती प्रतिरोधक आणि गतिमान भारत निर्माण करण्यासाठी तंत्रज्ञान-चालित, सक्रिय, बहु-धोका आणि बहु-क्षेत्रीय धोरण अवलंबून हे साध्य करण्याची योजना आहे.',
            'english_designation' => 'Disaster Management Authorities',
            'marathi_designation' => 'आपत्ती व्यवस्थापन प्राधिकरण',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}