<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SearchRescueTeams;

class SearchRescueTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        SearchRescueTeams::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>Search and rescue teams</b>',
            'marathi_title' => '<b>शोध आणि बचाव पथके</b>',
            'english_description' => 'In the event of a disaster or emergency situation in Maharashtra, various search and rescue teams are mobilized as part of the emergency response efforts. These teams are trained and equipped to carry out search and rescue operations in different environments and scenarios. Here are some of the search and rescue teams commonly involved in emergency response in Maharashtra:<br>
            <ul>
            <li><b>National Disaster Response Force (NDRF):</b>  The NDRF is a specialized force under the Ministry of Home Affairs, Government of India. It consists of highly trained personnel skilled in various aspects of search, rescue, and relief operations. NDRF teams are deployed during natural disasters such as earthquakes, floods, cyclones, and building collapses.</li>
            <li><b>State Disaster Response Force (SDRF):</b>  The SDRF is a state-level specialized force responsible for responding to disasters within Maharashtra. Similar to the NDRF, SDRF teams are trained in search and rescue techniques and play a crucial role in emergency response operations. They work closely with local administration and other agencies to carry out rescue operations. </li>
            <li><b>Fire and Emergency Services:</b>  The Fire and Emergency Services departments have trained personnel and specialized equipment for rescue operations. They respond to various emergencies, including building collapses, industrial accidents, and other incidents requiring search and rescue efforts. Firefighters are trained in techniques such as rope rescue, confined space rescue, and water rescue.</li>
            <li><b>Indian Coast Guard:</b>  The Indian Coast Guard is responsible for maritime search and rescue operations along the coast of Maharashtra. They have specialized vessels, aircraft, and personnel trained to respond to emergencies at sea, including shipwrecks, boat accidents, and incidents involving fishermen.</li>
            <li><b>Local Police and Civil Defense:</b>  Local police and civil defense personnel also play a vital role in search and rescue operations. They are often the first responders in emergency situations and provide initial assistance until specialized teams arrive. They coordinate with other agencies, manage crowd control, and assist in evacuations.</li>
            </ul>
            ',
            'marathi_description' => 'महाराष्ट्रात आपत्ती किंवा आपत्कालीन परिस्थिती उद्भवल्यास, आपत्कालीन प्रतिसादाच्या प्रयत्नांचा एक भाग म्हणून विविध शोध आणि बचाव पथके एकत्रित केली जातात. या संघांना वेगवेगळ्या वातावरणात आणि परिस्थितींमध्ये शोध आणि बचाव कार्य करण्यासाठी प्रशिक्षित आणि सुसज्ज आहेत. महाराष्ट्रात आपत्कालीन प्रतिसादात सामील असलेल्या काही शोध आणि बचाव पथके येथे आहेत:<br>
            <ul>
            <li><b>राष्ट्रीय आपत्ती प्रतिसाद दल (NDRF):</b>  NDRF हे भारत सरकारच्या गृह मंत्रालयाच्या अंतर्गत एक विशेष दल आहे. यामध्ये शोध, बचाव आणि मदत कार्याच्या विविध पैलूंमध्ये कुशल उच्च प्रशिक्षित कर्मचारी असतात. भूकंप, पूर, चक्रीवादळ आणि इमारत कोसळणे यासारख्या नैसर्गिक आपत्तींच्या वेळी एनडीआरएफची टीम तैनात असते.</li>
            <li><b>स्टेट डिझास्टर रिस्पॉन्स फोर्स (एसडीआरएफ):</b>  एसडीआरएफ हे महाराष्ट्रातील आपत्तींना प्रतिसाद देण्यासाठी जबाबदार राज्य-स्तरीय विशेष दल आहे. एनडीआरएफ प्रमाणेच, एसडीआरएफ संघांना शोध आणि बचाव तंत्राचे प्रशिक्षण दिले जाते आणि आपत्कालीन प्रतिसाद कार्यात महत्त्वपूर्ण भूमिका बजावतात. ते बचाव कार्य करण्यासाठी स्थानिक प्रशासन आणि इतर एजन्सींच्या जवळ काम करतात.</li>
            <li><b>अग्निशमन आणि आपत्कालीन सेवा:</b>  अग्निशमन आणि आपत्कालीन सेवा विभागांमध्ये बचाव कार्यासाठी प्रशिक्षित कर्मचारी आणि विशेष उपकरणे आहेत. ते इमारती कोसळणे, औद्योगिक अपघात आणि शोध आणि बचाव प्रयत्नांची आवश्यकता असलेल्या इतर घटनांसह विविध आपत्कालीन परिस्थितींना प्रतिसाद देतात. अग्निशामकांना रोप बचाव, मर्यादित जागा बचाव आणि पाणी बचाव यांसारख्या तंत्रांचे प्रशिक्षण दिले जाते.</li>
            <li><b>भारतीय तटरक्षक दल:</b>  भारतीय तटरक्षक दल महाराष्ट्राच्या किनारपट्टीवर सागरी शोध आणि बचाव कार्यासाठी जबाबदार आहे. त्यांच्याकडे विशेष जहाजे, विमाने आणि समुद्रातील आपत्कालीन परिस्थितींना प्रतिसाद देण्यासाठी प्रशिक्षित कर्मचारी आहेत, ज्यात जहाजाचे तुकडे होणे, बोटीचे अपघात आणि मच्छिमारांचा समावेश असलेल्या घटनांचा समावेश आहे.</li>
            <li><b>स्थानिक पोलीस आणि नागरी संरक्षण:</b> स्थानिक पोलीस आणि नागरी संरक्षण कर्मचारी देखील शोध आणि बचाव कार्यात महत्वाची भूमिका बजावतात. ते अनेकदा आपत्कालीन परिस्थितीत प्रथम प्रतिसादकर्ते असतात आणि विशेष कार्यसंघ येईपर्यंत प्राथमिक मदत करतात. ते इतर एजन्सींशी समन्वय साधतात, गर्दीचे नियंत्रण व्यवस्थापित करतात आणि बाहेर काढण्यात मदत करतात.</li>
            </ul>
            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}