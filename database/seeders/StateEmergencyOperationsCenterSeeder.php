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
            'english_title' => '<b>Introduction to the disaster management portal</b>',
            'marathi_title' => '<b>आपत्ती व्यवस्थापन पोर्टलची ओळख</b>',
            'english_description' => 'The Disaster Management Portal is a comprehensive online platform designed to facilitate efficient and organized management of disasters. It serves as a centralized hub for disaster-related information, coordination, and collaboration among various stakeholders involved in disaster management, including government agencies, relief organizations, emergency services, and the general public. The portal aims to enhance preparedness, response, and recovery efforts by providing timely and accurate information, tools, and resources.<br>

            The primary objective of the Disaster Management Portal is to ensure effective disaster management by enabling quick and coordinated actions during emergencies. It serves as a vital communication channel, delivering real-time alerts, notifications, and updates to users about disasters occurring in their area. This feature helps individuals and communities stay informed and take necessary precautions or actions to ensure their safety.<br>
            
            One of the key functionalities of the portal is the incident reporting system. Users can report incidents related to disasters, such as earthquakes, floods, fires, or any other emergencies they come across. They can provide essential details about the incident, including its location, severity, and any other relevant information. "
            ',
            'marathi_description' => 'आपत्ती व्यवस्थापन पोर्टल हे एक सर्वसमावेशक ऑनलाइन प्लॅटफॉर्म आहे जे आपत्तींचे कार्यक्षम आणि संघटित व्यवस्थापन सुलभ करण्यासाठी डिझाइन केलेले आहे. हे आपत्ती-संबंधित माहिती, समन्वय आणि सरकारी संस्था, मदत संस्था, आपत्कालीन सेवा आणि सामान्य जनता यासह आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध भागधारकांमध्ये एक केंद्रीकृत केंद्र म्हणून काम करते. वेळेवर आणि अचूक माहिती, साधने आणि संसाधने प्रदान करून सज्जता, प्रतिसाद आणि पुनर्प्राप्ती प्रयत्न वाढवणे हे पोर्टलचे उद्दिष्ट आहे.<br>
            आपत्ती व्यवस्थापन पोर्टलचे प्राथमिक उद्दिष्ट आपत्कालीन परिस्थितीत जलद आणि समन्वित कृती सक्षम करून प्रभावी आपत्ती व्यवस्थापन सुनिश्चित करणे आहे. हे एक महत्त्वपूर्ण संप्रेषण चॅनेल म्हणून काम करते, रीअल-टाइम अलर्ट, सूचना आणि वापरकर्त्यांना त्यांच्या क्षेत्रातील आपत्तींबद्दल अद्यतने वितरीत करते. हे वैशिष्‍ट्य व्‍यक्‍ती आणि समुदायांना माहिती ठेवण्‍यात आणि त्‍यांची सुरक्षितता सुनिश्चित करण्‍यासाठी आवश्‍यक खबरदारी किंवा कृती करण्‍यात मदत करते.<br>
            पोर्टलच्या मुख्य कार्यांपैकी एक म्हणजे घटना अहवाल प्रणाली. वापरकर्ते आपत्तींशी संबंधित घटनांची तक्रार करू शकतात, जसे की भूकंप, पूर, आग किंवा इतर कोणत्याही आपत्कालीन परिस्थिती. ते घटनेचे स्थान, तीव्रता आणि इतर कोणत्याही संबंधित माहितीसह आवश्यक तपशील प्रदान करू शकतात. "

            ',
            'english_image' => 'slide_english.jpeg',
            'marathi_image' => 'slide_marathi.jpeg',
            'url' => 'disaster',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
    }
}
