<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StateEmergencyOperationsCenter;

class StateEmergencyOperationsCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateEmergencyOperationsCenter::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>State Emergency Operations Center (EOC)</b>',
            'marathi_title' => '<b>राज्य आपत्कालीन ऑपरेशन केंद्र (EOC)</b>',
            'english_description' => '
            The State Emergency Operations Center (EOC) is a centralized facility established by the government to coordinate and manage emergency response activities during disasters or major emergencies. It serves as the nerve center for disaster management and brings together key agencies, departments, and stakeholders involved in emergency response at the state level. Heres an explanation of the State EOC and its role in disaster emergency response:<br>
             <ul>
             <li><b>Coordination and Communication:</b> The State EOC serves as a hub for coordination and communication among various government agencies, including emergency management agencies, law enforcement, fire departments, healthcare providers, and public utilities. It facilitates the exchange of critical information, situational updates, and resource allocation to ensure a coordinated and effective response.</li>
            <li><b>Decision-Making and Resource Management:</b> The State EOC plays a vital role in decision-making during emergencies. It houses emergency management officials, policymakers, and subject matter experts who analyze incoming data, assess the situation, and make strategic decisions to protect public safety and mitigate the impact of the disaster. The EOC also manages and allocates resources, such as personnel, equipment, and supplies, based on the needs identified during the emergency.
            </li>
            <li><b>Emergency Planning and Preparedness:</b> The State EOC is responsible for developing and maintaining comprehensive emergency plans and procedures. It conducts regular training and drills to ensure that emergency responders and stakeholders are prepared to effectively respond to different types of disasters. The EOC also assesses the states overall readiness, identifies gaps, and coordinates efforts to enhance preparedness and response capabilities.
            </li>
            <li><b>Situational Awareness and Intelligence:</b> The State EOC monitors and gathers real-time information and intelligence about the ongoing emergency. It utilizes various tools and technologies to collect data on the disasters magnitude, impact, and progression. This information is shared with response agencies and used to inform decision-making, resource allocation, and public messaging.
            </li>
            <li><b>Public Information and Warning:</b> The State EOC plays a crucial role in disseminating timely and accurate information to the public during emergencies. It collaborates with public information officers to develop and issue public warnings, advisories, and instructions. The EOC ensures that consistent and coordinated messages are communicated through various channels, including media briefings, social media, websites, and emergency alert systems.
            </li>
            <li><b>Support to Local EOCs:</b> The State EOC provides support and guidance to local emergency operations centers (EOCs) located in different regions or municipalities within the state. It assists in coordinating resources, sharing information, and addressing operational challenges faced by local EOCs during emergencies. The State EOC serves as a liaison between local, state, and federal agencies to facilitate effective interagency collaboration and resource sharing.
            </li>
             </ul> ';
            'marathi_description' => 'राज्य आपत्कालीन ऑपरेशन केंद्र (EOC) ही आपत्ती किंवा मोठ्या आपत्कालीन परिस्थितीत आपत्कालीन प्रतिसाद क्रियाकलापांचे समन्वय आणि व्यवस्थापन करण्यासाठी सरकारने स्थापन केलेली केंद्रीकृत सुविधा आहे. हे आपत्ती व्यवस्थापनासाठी चेता केंद्र म्हणून काम करते आणि राज्य स्तरावर आपत्कालीन प्रतिसादात सहभागी असलेल्या प्रमुख एजन्सी, विभाग आणि भागधारकांना एकत्र आणते. राज्य EOC चे स्पष्टीकरण आणि आपत्ती आपत्कालीन प्रतिसादात त्याची भूमिका येथे आहे: <br> 
            <ul>
            <li>राज्य आपत्कालीन ऑपरेशन केंद्र (EOC) ही आपत्ती किंवा मोठ्या आपत्कालीन परिस्थितीत आपत्कालीन प्रतिसाद क्रियाकलापांचे समन्वय आणि व्यवस्थापन करण्यासाठी सरकारने स्थापन केलेली केंद्रीकृत सुविधा आहे. हे आपत्ती व्यवस्थापनासाठी चेता केंद्र म्हणून काम करते आणि राज्य स्तरावर आपत्कालीन प्रतिसादात सहभागी असलेल्या प्रमुख एजन्सी, विभाग आणि भागधारकांना एकत्र आणते. राज्य EOC चे स्पष्टीकरण आणि आपत्ती आपत्कालीन प्रतिसादात त्याची भूमिका येथे आहे:
            </li>
            <li><b>निर्णय घेणे आणि संसाधन व्यवस्थापन:</b> राज्य EOC आणीबाणीच्या काळात निर्णय घेण्यामध्ये महत्वाची भूमिका बजावते. यात आपत्कालीन व्यवस्थापन अधिकारी, धोरणकर्ते आणि विषय तज्ञ आहेत जे येणार्‍या डेटाचे विश्लेषण करतात, परिस्थितीचे मूल्यांकन करतात आणि सार्वजनिक सुरक्षिततेचे संरक्षण करण्यासाठी आणि आपत्तीचा प्रभाव कमी करण्यासाठी धोरणात्मक निर्णय घेतात. EOC आपत्कालीन काळात ओळखल्या गेलेल्या गरजांच्या आधारे कर्मचारी, उपकरणे आणि पुरवठा यासारख्या संसाधनांचे व्यवस्थापन आणि वाटप देखील करते.
            </li>
            <li><b>आणीबाणीचे नियोजन आणि तयारी:</b> राज्य EOC सर्वसमावेशक आणीबाणी योजना आणि प्रक्रिया विकसित आणि देखरेख करण्यासाठी जबाबदार आहे. आपत्कालीन प्रतिसादकर्ते आणि भागधारक विविध प्रकारच्या आपत्तींना प्रभावीपणे प्रतिसाद देण्यासाठी तयार आहेत याची खात्री करण्यासाठी हे नियमित प्रशिक्षण आणि कवायती आयोजित करते. EOC राज्याच्या एकूण तत्परतेचे मुल्यांकन करते, तफावत ओळखते आणि तयारी आणि प्रतिसाद क्षमता वाढवण्यासाठी प्रयत्नांचे समन्वय साधते.
            </li>
            <li><b>परिस्थितीविषयक जागरूकता आणि बुद्धिमत्ता:</b> राज्य EOC चालू असलेल्या आपत्कालीन परिस्थितीबद्दल रीअल-टाइम माहिती आणि बुद्धिमत्ता निरीक्षण करते आणि गोळा करते. आपत्तीची तीव्रता, परिणाम आणि प्रगती यावर डेटा संकलित करण्यासाठी ते विविध साधने आणि तंत्रज्ञानाचा वापर करते. ही माहिती प्रतिसाद एजन्सीसह सामायिक केली जाते आणि निर्णय घेणे, संसाधन वाटप आणि सार्वजनिक संदेश देण्यासाठी वापरली जाते.
            </li>
            <li><b>सार्वजनिक माहिती आणि चेतावणी:</b> राज्य EOC आपत्कालीन परिस्थितीत जनतेला वेळेवर आणि अचूक माहिती प्रसारित करण्यात महत्त्वपूर्ण भूमिका बजावते. सार्वजनिक इशारे, सल्ला आणि सूचना विकसित करण्यासाठी आणि जारी करण्यासाठी हे सार्वजनिक माहिती अधिकार्‍यांसह सहयोग करते. EOC हे सुनिश्चित करते की मीडिया ब्रीफिंग्ज, सोशल मीडिया, वेबसाइट्स आणि आपत्कालीन सूचना प्रणालींसह विविध माध्यमांद्वारे सुसंगत आणि समन्वित संदेश संप्रेषित केले जातात.
            </li>
            <li><b>स्थानिक EOCs ला समर्थन:</b> राज्य EOC वेगवेगळ्या प्रदेशांमध्ये किंवा नगरपालिकांमध्ये असलेल्या स्थानिक आपत्कालीन ऑपरेशन केंद्रांना (EOCs) समर्थन आणि मार्गदर्शन प्रदान करते. हे आपत्कालीन परिस्थितीत स्थानिक ईओसींना भेडसावणाऱ्या ऑपरेशनल आव्हानांना संबोधित करण्यासाठी संसाधनांचे समन्वय, माहिती सामायिक करण्यात मदत करते. राज्य EOC हे स्थानिक, राज्य आणि फेडरल एजन्सी दरम्यान प्रभावी आंतर-एजन्सी सहयोग आणि संसाधनांची वाटणी सुलभ करण्यासाठी संपर्क म्हणून काम करते.
            </li>
            </ul>
            ',
            'english_image' => 'slide_english.jpeg',
            'marathi_image' => 'slide_marathi.jpeg',
            'url' => 'disaster',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
    }
}