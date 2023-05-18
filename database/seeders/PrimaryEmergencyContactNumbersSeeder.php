<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmergencyContactNumbers;

class PrimaryEmergencyContactNumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmergencyContactNumbers::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>Primary Emergency Contact Numbers</b>',
            'marathi_title' => '<b>प्राथमिक आपत्कालीन संपर्क क्रमांक</b>',
            'english_description' => 'During emergencies, it is crucial to have access to reliable and immediate assistance. Here are some commonly used emergency contact numbers in various disaster situations:<br>
            <ul>
             <li>Police: The police emergency helpline number is typically 100. You can contact the police in case of any criminal activities, emergencies, or threats to personal safety.
             </li>
             <li>Fire Services: The fire departments emergency helpline number is usually 101. This number should be dialed in case of fires or any related emergencies requiring immediate fire services.
             </li>
             <li>Ambulance: The ambulance emergency helpline number is commonly 102 or 108. Dialing this number will connect you to medical emergency services, allowing you to seek urgent medical assistance.
             </li>
             <li>Disaster Management Helpline: In many regions, there is a specific helpline number dedicated to disaster management and emergencies. This number may vary depending on the local disaster management authority or agency. It is advisable to inquire about the specific helpline number for your area.
             </li>
             <li>National Emergency Helpline: In India, the national emergency helpline number is 112. This number is a unified emergency response helpline that can connect you to police, fire services, ambulance services, and other emergency support.
             </li>
            </ul>
            ',
            'marathi_description' => 'आणीबाणीच्या काळात, विश्वासार्ह आणि तात्काळ मदत मिळणे महत्त्वाचे आहे. विविध आपत्ती परिस्थितीत येथे काही सामान्यपणे वापरले जाणारे आपत्कालीन संपर्क क्रमांक आहेत:<br>
            <ul>
            <li>पोलिस: पोलिसांचा आपत्कालीन हेल्पलाइन क्रमांक सामान्यतः 100 असतो. कोणत्याही गुन्हेगारी क्रियाकलाप, आपत्कालीन परिस्थिती किंवा वैयक्तिक सुरक्षेला धोका असल्यास तुम्ही पोलिसांशी संपर्क साधू शकता.
            </li>
            <li>अग्निशमन सेवा: अग्निशमन विभागाचा आपत्कालीन हेल्पलाइन क्रमांक सामान्यतः 101 असतो. आग लागल्यास किंवा तत्काळ अग्निशमन सेवेची आवश्यकता असलेल्या कोणत्याही संबंधित आपत्कालीन परिस्थितीत हा नंबर डायल केला पाहिजे.
            </li>
            <li>रुग्णवाहिका: रुग्णवाहिका आपत्कालीन हेल्पलाइन क्रमांक सामान्यतः 102 किंवा 108 असतो. हा नंबर डायल केल्याने तुम्हाला वैद्यकीय आपत्कालीन सेवांशी जोडले जाईल, ज्यामुळे तुम्हाला तातडीची वैद्यकीय मदत घेता येईल.
            </li>
            <li>आपत्ती व्यवस्थापन हेल्पलाइन: अनेक क्षेत्रांमध्ये, आपत्ती व्यवस्थापन आणि आपत्कालीन परिस्थितींसाठी समर्पित एक विशिष्ट हेल्पलाइन क्रमांक आहे. स्थानिक आपत्ती व्यवस्थापन प्राधिकरण किंवा एजन्सीनुसार ही संख्या बदलू शकते. आपल्या क्षेत्रासाठी विशिष्ट हेल्पलाइन नंबरबद्दल चौकशी करणे उचित आहे.
            </li>
            <li>राष्ट्रीय आपत्कालीन हेल्पलाइन: भारतात, राष्ट्रीय आपत्कालीन हेल्पलाइन क्रमांक 112 आहे. हा क्रमांक एक एकीकृत आणीबाणी प्रतिसाद हेल्पलाइन आहे जो तुम्हाला पोलिस, अग्निशमन सेवा, रुग्णवाहिका सेवा आणि इतर आपत्कालीन सहाय्याशी जोडू शकतो.
            </li>
           </ul>
            ',
            // 'english_emergency_contact_title' => 'List of Emergency Contact Numbers',
            // 'marathi_emergency_contact_title' => 'आपत्कालीन संपर्क क्रमांकांची यादी',
            // 'english_emergency_contact_number' => 'Number',
            // 'marathi_emergency_contact_number' => 'Number',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
    }
}