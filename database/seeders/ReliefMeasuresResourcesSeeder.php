<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReliefMeasuresResources;

class ReliefMeasuresResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReliefMeasuresResources::create([
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
        'english_title' => '<b>Relief measures and resources</b>',
        'marathi_title' => '<b>मदत उपाय आणि संसाधने</b>',
        'english_description' => 'In Maharashtra, the state government and various agencies implement relief measures and provide resources as part of their emergency response efforts during disasters. Here are some key relief measures and resources available in Maharashtra for disaster response:<br>
        <ul>
        <li><b>Emergency Helpline Numbers:</b> The government sets up dedicated helpline numbers to provide immediate assistance and support during emergencies. These helpline numbers are widely publicized to ensure that affected individuals can easily access help when needed.
        </li>
        <li><b>Relief Camps and Shelters:</b> In the event of a large-scale disaster, relief camps and shelters are established to provide temporary accommodation, food, water, and basic amenities to displaced individuals and families. These camps are equipped with medical facilities and other necessary services to ensure the well-being of the affected population.
        </li>
        <li><b>Medical Support:</b> Adequate medical support is crucial during disasters. The government deploys medical teams and sets up medical camps to provide immediate medical assistance to those injured or affected by the disaster. Mobile medical units are often utilized to reach remote or inaccessible areas.
        </li>
        <li><b>Distribution of Essential Supplies:</b> Relief agencies coordinate the distribution of essential supplies such as food, water, clothing, blankets, hygiene kits, and other necessary items to affected communities. The supplies are provided to ensure that basic needs are met, especially in the immediate aftermath of a disaster.
        </li>
        <li><b>Search and Rescue Operations:</b> Trained search and rescue teams are deployed to locate and rescue individuals trapped or stranded in disaster-affected areas. These teams work tirelessly to save lives and provide immediate assistance to those in need.
        </li>
        <li><b>Rehabilitation and Reconstruction:</b> After the initial response phase, efforts shift towards rehabilitation and reconstruction. The government provides support for rebuilding infrastructure, housing, and livelihoods for the affected population. Financial assistance, housing schemes, and livelihood programs are implemented to help affected individuals and communities recover and rebuild their lives.
        </li>
        <li><b>Coordination with NGOs and Volunteer Groups:</b> The government collaborates with non-governmental organizations (NGOs) and volunteer groups to enhance the reach and effectiveness of relief measures. These organizations play a crucial role in providing additional resources, manpower, and specialized support in areas such as medical aid, psychosocial support, and community mobilization.
        </li>
        <li><b>Public Awareness and Education:</b> The government conducts public awareness campaigns to educate the population about disaster preparedness, response protocols, and available resources. These campaigns aim to enhance community resilience and ensure that individuals are well-informed and prepared to respond effectively during emergencies.
        </li>
        </ul>
        ',
        'marathi_description' => 'महाराष्ट्रात, राज्य सरकार आणि विविध एजन्सी आपत्तीच्या वेळी त्यांच्या आपत्कालीन प्रतिसाद प्रयत्नांचा एक भाग म्हणून मदत उपायांची अंमलबजावणी करतात आणि संसाधने पुरवतात. आपत्ती प्रतिसादासाठी महाराष्ट्रात उपलब्ध काही प्रमुख मदत उपाय आणि संसाधने येथे आहेत:<br>
         <ul>
        <li><b>आपत्कालीन हेल्पलाइन क्रमांक:</b> आपत्कालीन परिस्थितीत तत्काळ मदत आणि समर्थन देण्यासाठी सरकार समर्पित हेल्पलाइन क्रमांक सेट करते. बाधित व्यक्तींना आवश्यकतेनुसार मदत सहज मिळू शकते याची खात्री करण्यासाठी हे हेल्पलाइन क्रमांक मोठ्या प्रमाणावर प्रसिद्ध केले जातात.
        </li>
        <li><b>मदत शिबिरे आणि आश्रयस्थान:</b> मोठ्या प्रमाणावर आपत्ती उद्भवल्यास, विस्थापित व्यक्ती आणि कुटुंबांना तात्पुरते निवास, अन्न, पाणी आणि मूलभूत सुविधा पुरवण्यासाठी मदत शिबिरे आणि निवारे स्थापित केले जातात. बाधित लोकसंख्येचे कल्याण सुनिश्चित करण्यासाठी ही शिबिरे वैद्यकीय सुविधा आणि इतर आवश्यक सेवांनी सुसज्ज आहेत.
        </li>
        <li><b>वैद्यकीय सहाय्य:</b> आपत्तींच्या काळात पुरेसा वैद्यकीय सहाय्य महत्त्वपूर्ण आहे. आपत्तीमुळे जखमी झालेल्या किंवा प्रभावित झालेल्यांना तात्काळ वैद्यकीय मदत देण्यासाठी सरकार वैद्यकीय पथके तैनात करते आणि वैद्यकीय शिबिरे स्थापन करते. मोबाईल वैद्यकीय युनिट्सचा उपयोग अनेकदा दुर्गम किंवा दुर्गम भागात पोहोचण्यासाठी केला जातो.
        </li>
        <li><b>स्वयंसेवी संस्था आणि स्वयंसेवक गटांसह समन्वय:</b> सरकार अशासकीय संस्था (एनजीओ) आणि स्वयंसेवक गटांसह मदत उपायांची पोहोच आणि परिणामकारकता वाढविण्यासाठी सहयोग करते. वैद्यकीय मदत, मनोसामाजिक समर्थन आणि समुदाय एकत्रीकरण यासारख्या क्षेत्रांमध्ये अतिरिक्त संसाधने, मनुष्यबळ आणि विशेष सहाय्य प्रदान करण्यात या संस्था महत्त्वपूर्ण भूमिका बजावतात.
        </li>
        <li><b>शोध आणि बचाव कार्ये:</b> आपत्तीग्रस्त भागात अडकलेल्या किंवा अडकलेल्या व्यक्तींचा शोध आणि बचाव करण्यासाठी प्रशिक्षित शोध आणि बचाव पथके तैनात केली जातात. जीव वाचवण्यासाठी आणि गरजूंना तत्काळ मदत देण्यासाठी हे संघ अथक परिश्रम करतात.
        </li>
        <li><b>पुनर्वसन आणि पुनर्रचना:</b> सुरुवातीच्या प्रतिसादाच्या टप्प्यानंतर, प्रयत्न पुनर्वसन आणि पुनर्बांधणीकडे वळतात. बाधित लोकसंख्येसाठी पायाभूत सुविधा, घरे आणि उपजीविका पुनर्बांधणीसाठी सरकार समर्थन पुरवते. आर्थिक सहाय्य, गृहनिर्माण योजना आणि उपजीविका कार्यक्रम बाधित व्यक्ती आणि समुदायांना त्यांचे जीवन पुनर्प्राप्त आणि पुनर्निर्माण करण्यात मदत करण्यासाठी लागू केले जातात.
        </li>
        <li><b>स्वयंसेवी संस्था आणि स्वयंसेवक गटांसह समन्वय:</b> सरकार अशासकीय संस्था (एनजीओ) आणि स्वयंसेवक गटांसह मदत उपायांची पोहोच आणि परिणामकारकता वाढविण्यासाठी सहयोग करते. वैद्यकीय मदत, मनोसामाजिक समर्थन आणि समुदाय एकत्रीकरण यासारख्या क्षेत्रांमध्ये अतिरिक्त संसाधने, मनुष्यबळ आणि विशेष सहाय्य प्रदान करण्यात या संस्था महत्त्वपूर्ण भूमिका बजावतात.
        </li>
        <li><b>सार्वजनिक जागरुकता आणि शिक्षण:</b> आपत्ती तयारी, प्रतिसाद प्रोटोकॉल आणि उपलब्ध संसाधनांबद्दल लोकसंख्येला शिक्षित करण्यासाठी सरकार जनजागृती मोहीम राबवते. या मोहिमांचे उद्दिष्ट सामुदायिक लवचिकता वाढवणे आणि आपत्कालीन परिस्थितीत प्रभावीपणे प्रतिसाद देण्यासाठी व्यक्ती सुप्रसिद्ध आणि तयार आहेत याची खात्री करणे हे आहे.
        </li>
        </ul>
        ',
        'english_image' => 'slide2_english.jpeg',
        'marathi_image' => 'slide2_marathi.jpeg',
        'is_deleted'=>false,
        'is_active'=>true,
    ]);
    }
}