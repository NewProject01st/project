<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EvacuationPlans;

class EvacuationPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EvacuationPlans::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>Evacuation plans</b>',
            'marathi_title' => '<b>निर्वासन योजना</b>',
            'english_description' => 'Evacuation plans are an integral part of disaster emergency response in Maharashtra. These plans outline the systematic and organized procedures for safely relocating people from areas at risk to designated evacuation centers or safer locations. The specific details of evacuation plans may vary depending on the type of disaster, but the general principles include the following:<br>
            <ul>
            <li><b>Identification of High-Risk Areas:</b> Authorities identify areas that are prone to specific disasters, such as floodplains, coastal regions, or landslide-prone areas. These high-risk areas are prioritized for evacuation planning.
            </li>
            <li><b>Early Warning Systems:</b> Effective evacuation plans rely on early warning systems that can detect impending disasters and provide timely alerts to the affected population. This may include sirens, text messages, radio announcements, or mobile applications.
            </li>
            <li><b>Communication and Coordination:</b> Clear communication channels are established between disaster management authorities, emergency services, local authorities, and the public. Regular updates and instructions are disseminated through various mediums to ensure that people are aware of evacuation orders, routes, and assembly points.
            </li>
            <li><b>Evacuation Routes and Transportation:</b> Evacuation plans include designated evacuation routes, which are well-marked and accessible. Transportation arrangements are made to facilitate the movement of people, including the provision of buses, boats, or other means of transportation if required.
            </li>
            <li><b>Shelter and Relief Facilities:</b> Evacuation centers and relief facilities are identified and prepared in advance. These facilities should have adequate space, basic amenities, medical services, and provisions for special needs populations such as the elderly, disabled individuals, and children.
            </li>
            <li><b>Traffic Management:</b> To ensure a smooth and efficient evacuation process, traffic management strategies are implemented. This may involve traffic diversions, the deployment of traffic police, and the coordination of transportation resources.
            </li>
            <li><b>Public Awareness and Education:</b> Public awareness campaigns are conducted to educate the population about evacuation procedures, the importance of following instructions, and the role of evacuation in ensuring personal safety. This includes providing information on assembly points, emergency contact numbers, and basic preparedness measures.
            </li>
            <li><b>Special Considerations:</b> Evacuation plans also take into account the specific needs of vulnerable groups, such as the elderly, disabled individuals, pregnant women, and those with medical conditions. Special arrangements are made to ensure their safe evacuation and access to necessary support services.
            </li>
            <li><b>Post-Evacuation Measures:</b> Evacuation plans also address post-evacuation measures, including the provision of temporary shelters, medical care, food, and clean water to the evacuated population. Plans are in place to assess the safety of affected areas before allowing people to return.
            </li>
            <li><b>Regular Review and Updates:</b> Evacuation plans are regularly reviewed and updated based on lessons learned from previous disasters, changes in risk profiles, and advancements in technology and infrastructure.
            </li>
            </ul>
             These elements together contribute to the development of effective evacuation plans in Maharashtra, ensuring the safety and well-being of the population during emergencies.
            
            ',
            'marathi_description' => 'निर्वासन योजना महाराष्ट्रातील आपत्ती आपत्कालीन प्रतिसादाचा अविभाज्य भाग आहेत. या योजनांमध्ये धोका असलेल्या भागांतून नियुक्त निर्वासन केंद्रे किंवा सुरक्षित ठिकाणी लोकांना सुरक्षितपणे स्थलांतरित करण्यासाठी पद्धतशीर आणि संघटित प्रक्रियांची रूपरेषा दिली आहे. आपत्तीच्या प्रकारानुसार निर्वासन योजनांचे विशिष्ट तपशील बदलू शकतात, परंतु सामान्य तत्त्वांमध्ये पुढील गोष्टींचा समावेश आहे:<br>
            <ul>
            <li>उच्च-जोखीम असलेल्या क्षेत्रांची ओळख:</b> अधिकारी विशिष्ट आपत्तींना प्रवण असलेले क्षेत्र ओळखतात, जसे की पूर मैदाने, किनारी प्रदेश किंवा भूस्खलन-प्रवण क्षेत्र. या उच्च-जोखीम क्षेत्रांना निर्वासन नियोजनासाठी प्राधान्य दिले जाते.
            </li>
            <li><b>लवकर चेतावणी प्रणाली:</b> प्रभावी निर्वासन योजना लवकर चेतावणी प्रणालींवर अवलंबून असतात जे येऊ घातलेल्या आपत्ती शोधू शकतात आणि प्रभावित लोकसंख्येला वेळेवर सूचना देऊ शकतात. यामध्ये सायरन, मजकूर संदेश, रेडिओ घोषणा किंवा मोबाइल अनुप्रयोग समाविष्ट असू शकतात.
            </li>
            <li><b>संप्रेषण आणि समन्वय:</b> आपत्ती व्यवस्थापन अधिकारी, आपत्कालीन सेवा, स्थानिक अधिकारी आणि जनता यांच्यात स्पष्ट संप्रेषण चॅनेल स्थापित केले जातात. लोकांना बाहेर काढण्याचे आदेश, मार्ग आणि असेंब्ली पॉइंट्सची जाणीव आहे याची खात्री करण्यासाठी नियमित अद्यतने आणि सूचना विविध माध्यमांद्वारे प्रसारित केल्या जातात.
            </li>
            <li><b>निर्वासन मार्ग आणि वाहतूक:</b> निर्वासन योजनांमध्ये नियुक्त केलेले निर्वासन मार्ग समाविष्ट आहेत, जे चांगले चिन्हांकित आणि प्रवेशयोग्य आहेत. आवश्यक असल्यास बस, बोटी किंवा इतर वाहतुकीच्या साधनांसह लोकांच्या हालचाली सुलभ करण्यासाठी वाहतूक व्यवस्था केली जाते.
            </li>
            <li><b>निवारा आणि मदत सुविधा:</b> निर्वासन केंद्रे आणि मदत सुविधा ओळखल्या जातात आणि आगाऊ तयार केल्या जातात. या सुविधांमध्ये पुरेशी जागा, मुलभूत सुविधा, वैद्यकीय सेवा आणि विशेष गरजा असलेल्या लोकसंख्येसाठी जसे की वृद्ध, अपंग व्यक्ती आणि मुले यांच्यासाठी तरतुदी असणे आवश्यक आहे.
            </li>
            <li><b>वाहतूक व्यवस्थापन:</b> सुरळीत आणि कार्यक्षम निर्वासन प्रक्रिया सुनिश्चित करण्यासाठी, वाहतूक व्यवस्थापन धोरणे लागू केली जातात. यामध्ये वाहतूक वळवणे, वाहतूक पोलिसांची तैनाती आणि वाहतूक संसाधनांचे समन्वय यांचा समावेश असू शकतो.
            </li>
            <li><b>सार्वजनिक जागरुकता आणि शिक्षण:</b> लोकसंख्येला निर्वासन प्रक्रिया, खालील सूचनांचे महत्त्व आणि वैयक्तिक सुरक्षितता सुनिश्चित करण्यासाठी स्थलांतराची भूमिका याबद्दल शिक्षित करण्यासाठी जनजागृती मोहिमा चालवल्या जातात. यामध्ये असेंब्ली पॉइंट्स, आपत्कालीन संपर्क क्रमांक आणि मूलभूत तयारी उपायांची माहिती प्रदान करणे समाविष्ट आहे.
            </li>
            <li><b>विशेष बाबी:</b> निर्वासन योजना असुरक्षित गटांच्या विशिष्ट गरजा देखील विचारात घेतात, जसे की वृद्ध, अपंग व्यक्ती, गरोदर स्त्रिया आणि वैद्यकीय परिस्थिती असलेल्या. त्यांचे सुरक्षित निर्वासन आणि आवश्यक सहाय्य सेवांमध्ये प्रवेश सुनिश्चित करण्यासाठी विशेष व्यवस्था केली जाते.
            </li>
            <li><b>इव्हॅक्युएशन नंतरचे उपाय:</b> स्थलांतरित लोकसंख्येसाठी तात्पुरती निवारा, वैद्यकीय सेवा, अन्न आणि स्वच्छ पाण्याची तरतूद यासह निर्वासन योजना पोस्ट-इव्हॅक्युएशन उपायांना देखील संबोधित करतात. लोकांना परत येण्याची परवानगी देण्यापूर्वी प्रभावित क्षेत्रांच्या सुरक्षिततेचे मूल्यांकन करण्यासाठी योजना आहेत.
            </li>
            <li><b>नियमित पुनरावलोकन आणि अद्यतने:</b> मागील आपत्ती, जोखीम प्रोफाइलमधील बदल आणि तंत्रज्ञान आणि पायाभूत सुविधांमधील प्रगती यांच्या आधारे निर्वासन योजनांचे नियमितपणे पुनरावलोकन आणि अद्यतन केले जाते.
            </li>
            </ul>
             आणीबाणीच्या काळात लोकसंख्येची सुरक्षितता आणि कल्याण सुनिश्चित करून, महाराष्ट्रात प्रभावी निर्वासन योजना विकसित करण्यासाठी हे घटक एकत्रितपणे योगदान देतात.
            
            ',   
            'english_image' => 'slide2_english.jpeg',
            'marathi_image' => 'slide2_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true, 
        ]);
    }

}