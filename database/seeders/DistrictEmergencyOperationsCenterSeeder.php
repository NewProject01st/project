<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DistrictEmergencyOperationsCenter;

class DistrictEmergencyOperationsCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DistrictEmergencyOperationsCenter::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b> District Emergency Operations Center(DEOC)</b>',
            'marathi_title' => '<b>जिल्हा आपत्कालीन ऑपरेशन केंद्र (DEOC)</b>',
            'english_description' => 'A District Emergency Operations Center (DEOC) is a key component of the disaster emergency response system. It serves as a centralized coordination and decision-making hub at the district level during emergencies or disasters. The DEOC plays a crucial role in facilitating effective emergency response, resource management, and communication among various stakeholders involved in disaster management. Here are some important aspects of a DEOC and its functions:<br>
            <ul>
            <li><b>Coordination:</b> The DEOC acts as a central coordination point for all emergency response activities within the district. It brings together representatives from relevant government departments, emergency services, non-governmental organizations, and other stakeholders involved in disaster management. The DEOC ensures seamless coordination among these entities to ensure a well-coordinated and efficient response.
            </li>
            <li><b>Information Management:</b> The DEOC collects, analyzes, and disseminates critical information related to the ongoing emergency. It serves as a central repository for situational updates, incident reports, resource availability, and other important data. By managing and sharing information effectively, the DEOC enables informed decision-making and ensures that response efforts are based on the most current and accurate information available.
            </li>
            <li><b>Resource Allocation:</b> During emergencies, the DEOC is responsible for assessing resource needs and coordinating the allocation of resources within the district. This includes personnel, equipment, supplies, and other essential resources required for response and recovery operations. The DEOC ensures that resources are efficiently distributed based on the priorities and needs identified in the emergency response plan.
            </li>
            <li><b>Communication and Public Information:</b> The DEOC facilitates communication channels between different stakeholders involved in emergency response. This includes establishing and maintaining communication links with other emergency operation centers at the regional, state, and national levels. The DEOC also plays a crucial role in providing timely and accurate information to the public regarding the emergency situation, evacuation procedures, and safety guidelines.
            </li>
            <li><b>Decision-Making:</b> The DEOC supports decision-making processes by providing real-time information, analysis, and expert advice to incident commanders and decision-makers. It helps in assessing the severity of the situation, formulating response strategies, and making informed decisions to mitigate the impact of the disaster. The DEOC ensures that response actions are aligned with the overall emergency response plan and objectives.
            </li>
            <li><b>Training and Capacity Building:</b> The DEOC conducts training programs and capacity-building initiatives for emergency response personnel. This includes organizing workshops, drills, and simulations to enhance the skills and knowledge of responders. The DEOC also facilitates the development and review of district-level emergency response plans and standard operating procedures.
            </li>
            </ul>
            ',
            'marathi_description' => 'डिस्ट्रिक्ट इमर्जन्सी ऑपरेशन्स सेंटर (DEOC) हे आपत्ती आपत्कालीन प्रतिसाद प्रणालीचा एक प्रमुख घटक आहे. हे आणीबाणी किंवा आपत्तींच्या वेळी जिल्हा स्तरावर केंद्रीकृत समन्वय आणि निर्णय घेण्याचे केंद्र म्हणून काम करते. आपत्ती व्यवस्थापनात गुंतलेल्या विविध भागधारकांमध्ये प्रभावी आपत्कालीन प्रतिसाद, संसाधन व्यवस्थापन आणि संवाद साधण्यात DEOC महत्त्वपूर्ण भूमिका बजावते. येथे DEOC चे काही महत्वाचे पैलू आणि त्याची कार्ये आहेत:<br>
            <ul>
            <li><b>समन्वय:</b> DEOC जिल्ह्यातील सर्व आपत्कालीन प्रतिसाद क्रियाकलापांसाठी केंद्रीय समन्वय बिंदू म्हणून कार्य करते. हे संबंधित सरकारी विभागांचे प्रतिनिधी, आपत्कालीन सेवा, गैर-सरकारी संस्था आणि आपत्ती व्यवस्थापनाशी संबंधित इतर भागधारकांना एकत्र आणते. सु-समन्वित आणि कार्यक्षम प्रतिसाद सुनिश्चित करण्यासाठी DEOC या संस्थांमध्ये अखंड समन्वय सुनिश्चित करते.
            </li>
            <li><b>माहिती व्यवस्थापन:</b> DEOC चालू आपत्कालीन परिस्थितीशी संबंधित गंभीर माहिती गोळा करते, विश्लेषण करते आणि प्रसारित करते. हे परिस्थितीजन्य अद्यतने, घटना अहवाल, संसाधन उपलब्धता आणि इतर महत्त्वाच्या डेटासाठी केंद्रीय भांडार म्हणून काम करते. प्रभावीपणे माहितीचे व्यवस्थापन आणि सामायिकरण करून, DEOC माहितीपूर्ण निर्णय घेण्यास सक्षम करते आणि हे सुनिश्चित करते की प्रतिसादाचे प्रयत्न सर्वात वर्तमान आणि अचूक उपलब्ध माहितीवर आधारित आहेत.
            </li>
            <li><b>संसाधन वाटप:</b> आणीबाणीच्या काळात, DEOC संसाधनांच्या गरजांचे मूल्यांकन करण्यासाठी आणि जिल्ह्यातील संसाधनांच्या वाटपात समन्वय ठेवण्यासाठी जबाबदार आहे. यामध्ये कर्मचारी, उपकरणे, पुरवठा आणि प्रतिसाद आणि पुनर्प्राप्ती ऑपरेशन्ससाठी आवश्यक असलेल्या इतर आवश्यक संसाधनांचा समावेश आहे. DEOC हे सुनिश्चित करते की आपत्कालीन प्रतिसाद योजनेमध्ये ओळखल्या गेलेल्या प्राधान्यक्रम आणि गरजांच्या आधारे संसाधने कार्यक्षमतेने वितरित केली जातात.
            </li>
            <li><b>संप्रेषण आणि सार्वजनिक माहिती:</b> DEOC आपत्कालीन प्रतिसादात सामील असलेल्या विविध भागधारकांमधील संप्रेषण चॅनेल सुलभ करते. यामध्ये प्रादेशिक, राज्य आणि राष्ट्रीय स्तरावरील इतर आपत्कालीन ऑपरेशन केंद्रांशी संप्रेषण दुवे स्थापित करणे आणि राखणे समाविष्ट आहे. आणीबाणीची परिस्थिती, निर्वासन प्रक्रिया आणि सुरक्षितता मार्गदर्शक तत्त्वांबाबत जनतेला वेळेवर आणि अचूक माहिती प्रदान करण्यात DEOC महत्त्वपूर्ण भूमिका बजावते.
            </li>
            <li><b>निर्णय घेणे:</b> DEOC घटना कमांडर आणि निर्णय घेणार्‍यांना रीअल-टाइम माहिती, विश्लेषण आणि तज्ञ सल्ला देऊन निर्णय घेण्याच्या प्रक्रियेस समर्थन देते. हे परिस्थितीच्या तीव्रतेचे मूल्यांकन करण्यात, प्रतिसादाची रणनीती तयार करण्यात आणि आपत्तीचा प्रभाव कमी करण्यासाठी माहितीपूर्ण निर्णय घेण्यास मदत करते. DEOC खात्री करते की प्रतिसाद क्रिया एकूण आणीबाणी प्रतिसाद योजना आणि उद्दिष्टांशी संरेखित आहेत.
            </li>
            <li><b>प्रशिक्षण आणि क्षमता निर्माण:</b> DEOC आपत्कालीन प्रतिसाद कर्मचार्‍यांसाठी प्रशिक्षण कार्यक्रम आणि क्षमता-निर्माण उपक्रम आयोजित करते. यामध्ये प्रतिसादकर्त्यांचे कौशल्य आणि ज्ञान वाढविण्यासाठी कार्यशाळा, कवायती आणि सिम्युलेशन आयोजित करणे समाविष्ट आहे. DEOC जिल्हा-स्तरीय आपत्कालीन प्रतिसाद योजना आणि मानक कार्यपद्धतींचा विकास आणि पुनरावलोकन देखील सुलभ करते.
            </li>
            </ul>
            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
    }
}