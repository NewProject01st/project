<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StateDisasterManagementPlan;
use App\Models\DistrictDisasterManagementPlan;
use App\Models\StateDisasterManagementPolicy;
use App\Models\RelevantLawsRegulation;

class PoliciesLegislationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StateDisasterManagementPlan::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' State disaster management plan',
            'marathi_title' => 'राज्य आपत्ती व्यवस्थापन योजना',
            'english_description' => 'The Maharashtra State Disaster Management Plan is a comprehensive document that outlines the policies and strategies for disaster management in the state of Maharashtra, India. It serves as a guideline for various government departments, agencies, and stakeholders involved in disaster response, mitigation, and recovery efforts. The plan is designed to ensure an effective and coordinated approach to managing disasters in Maharashtra.<br>
            The key components of the Maharashtra State Disaster Management Plan include:
            <ul>
            <li>Policy Framework: The plan establishes the overall policy framework for disaster management in the state. It defines the objectives, principles, and strategies that guide disaster management activities.
            </li>
            <li>Legal and Institutional Framework: The plan outlines the legal and institutional framework for disaster management in Maharashtra. It identifies the roles and responsibilities of different government departments, agencies, and stakeholders involved in disaster management.
            </li>
            <li>Risk Assessment and Vulnerability Analysis: The plan includes a comprehensive risk assessment and vulnerability analysis for various types of disasters that Maharashtra is prone to. This analysis helps in understanding the potential impact of disasters and facilitates effective preparedness and response measures.
            </li>
            <li>Prevention and Mitigation Measures: The plan focuses on implementing measures to prevent or reduce the impact of disasters. It includes strategies for land-use planning, building codes and regulations, early warning systems, infrastructure development, and public awareness and education.
            </li>
            <li>Preparedness and Response: The plan emphasizes the importance of preparedness and response measures. It outlines strategies for capacity building, training, drills and exercises, emergency response coordination, evacuation plans, search and rescue operations, and medical and relief services.
            </li>
            <li>Recovery and Rehabilitation: The plan addresses the post-disaster recovery and rehabilitation processes. It includes strategies for damage assessment, reconstruction, livelihood restoration, psychosocial support, and long-term recovery planning.
            </li>
            <li>Institutional Arrangements: The plan establishes the institutional arrangements for disaster management at various levels, including the State Disaster Management Authority (SDMA), District Disaster Management Authorities (DDMAs), and local bodies. It defines their roles, functions, and coordination mechanisms.
            </li>
            <li>International Cooperation: The plan recognizes the importance of international cooperation in disaster management. It facilitates coordination with national and international agencies, organizations, and donors for resource mobilization, technical support, and knowledge sharing.
            </li>
            </ul>
            ',
            'marathi_description' => 'महाराष्ट्र राज्य आपत्ती व्यवस्थापन आराखडा हा एक सर्वसमावेशक दस्तऐवज आहे जो भारतातील महाराष्ट्र राज्यातील आपत्ती व्यवस्थापनासाठी धोरणे आणि धोरणांची रूपरेषा देतो. हे विविध सरकारी विभाग, एजन्सी आणि आपत्ती प्रतिसाद, शमन आणि पुनर्प्राप्ती प्रयत्नांमध्ये गुंतलेल्या भागधारकांसाठी मार्गदर्शक तत्त्वे म्हणून काम करते. महाराष्ट्रातील आपत्तींचे व्यवस्थापन करण्यासाठी प्रभावी आणि समन्वित दृष्टीकोन सुनिश्चित करण्यासाठी ही योजना तयार करण्यात आली आहे.<br>
            महाराष्ट्र राज्य आपत्ती व्यवस्थापन योजनेतील प्रमुख घटकांमध्ये हे समाविष्ट आहे:
            <ul>
            <li>धोरण आराखडा: योजना राज्यातील आपत्ती व्यवस्थापनासाठी संपूर्ण धोरण आराखडा स्थापित करते. हे उद्दिष्टे, तत्त्वे आणि आपत्ती व्यवस्थापन क्रियाकलापांना मार्गदर्शन करणारी धोरणे परिभाषित करते.
            </li>
            <li>कायदेशीर आणि संस्थात्मक फ्रेमवर्क: योजना महाराष्ट्रातील आपत्ती व्यवस्थापनासाठी कायदेशीर आणि संस्थात्मक फ्रेमवर्कची रूपरेषा देते. हे आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध सरकारी विभाग, एजन्सी आणि भागधारकांच्या भूमिका आणि जबाबदाऱ्या ओळखते.
            </li>
            <li>जोखीम मूल्यांकन आणि भेद्यता विश्लेषण: योजनेमध्ये महाराष्ट्राला प्रवण असलेल्या विविध प्रकारच्या आपत्तींसाठी सर्वसमावेशक जोखीम मूल्यांकन आणि असुरक्षा विश्लेषणाचा समावेश आहे. हे विश्लेषण आपत्तींचा संभाव्य परिणाम समजून घेण्यास मदत करते आणि प्रभावी तयारी आणि प्रतिसाद उपाय सुलभ करते.
            </li>
            <li>प्रतिबंध आणि शमन उपाय: योजना आपत्तींचा प्रभाव रोखण्यासाठी किंवा कमी करण्यासाठी उपाययोजनांच्या अंमलबजावणीवर लक्ष केंद्रित करते. यामध्ये जमीन-वापराचे नियोजन, बिल्डिंग कोड आणि नियम, पूर्व चेतावणी प्रणाली, पायाभूत सुविधांचा विकास आणि जनजागृती आणि शिक्षण यासाठी धोरणे समाविष्ट आहेत.
            </li>
            <li>तयारी आणि प्रतिसाद: योजना तयारी आणि प्रतिसाद उपायांच्या महत्त्वावर भर देते. हे क्षमता निर्माण, प्रशिक्षण, कवायती आणि व्यायाम, आपत्कालीन प्रतिसाद समन्वय, निर्वासन योजना, शोध आणि बचाव कार्ये आणि वैद्यकीय आणि मदत सेवांसाठी धोरणे आखते.
            </li>
            <li>पुनर्प्राप्ती आणि पुनर्वसन: योजना आपत्तीनंतरची पुनर्प्राप्ती आणि पुनर्वसन प्रक्रियांना संबोधित करते. यात नुकसानाचे मूल्यांकन, पुनर्बांधणी, उपजीविका पुनर्संचयित करणे, मनोसामाजिक समर्थन आणि दीर्घकालीन पुनर्प्राप्ती नियोजनासाठी धोरणे समाविष्ट आहेत.
            </li>
            <li>संस्थात्मक व्यवस्था: योजना राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA), जिल्हा आपत्ती व्यवस्थापन प्राधिकरण (DDMA) आणि स्थानिक स्वराज्य संस्थांसह विविध स्तरांवर आपत्ती व्यवस्थापनासाठी संस्थात्मक व्यवस्था स्थापित करते. हे त्यांच्या भूमिका, कार्ये आणि समन्वय यंत्रणा परिभाषित करते.
            </li>
            <li>आंतरराष्ट्रीय सहकार्य: योजना आपत्ती व्यवस्थापनातील आंतरराष्ट्रीय सहकार्याचे महत्त्व ओळखते. हे राष्ट्रीय आणि आंतरराष्ट्रीय एजन्सी, संस्था आणि देणगीदार यांच्याशी संसाधन एकत्रीकरण, तांत्रिक समर्थन आणि ज्ञानाची देवाणघेवाण करण्यासाठी समन्वय सुलभ करते.
            </li>
            </ul>
            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        
        DistrictDisasterManagementPlan::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' District disaster management plans',
            'marathi_title' => 'जिल्हा आपत्ती व्यवस्थापन योजना',
            'english_description' => 'District Disaster Management Plans (DDMPs) are an integral part of the states policies and legislation for disaster management. These plans are designed to ensure preparedness, response, and recovery in the event of a disaster at the district level. Heres an overview of DDMPs according to Maharashtras policies and legislation:
            <ul>
            <li>Objective: The primary objective of DDMPs is to outline the strategies, actions, and resources required to effectively manage and mitigate disasters at the district level. The plans aim to enhance coordination among various stakeholders, including government agencies, non-governmental organizations, and the community.
            </li>
            <li>Legal Framework: The formulation and implementation of DDMPs are guided by the Disaster Management Act, 2005, which provides a legal framework for disaster management in India. Maharashtra State Disaster Management Authority (MSDMA) oversees the development and implementation of these plans.
            </li>
            <li>Risk Assessment: DDMPs begin with a comprehensive risk assessment of the district, considering various natural and man-made hazards specific to the region. This assessment helps identify vulnerabilities, assess the capacity to respond, and prioritize actions based on the level of risk.
            </li>
            <li>Stakeholder Engagement: DDMPs involve active participation from multiple stakeholders, including district administration, line departments, emergency services, community-based organizations, and local communities. Consultation and coordination with these stakeholders are crucial in developing an inclusive and effective plan.
            </li>
            <li>Stakeholder Engagement: DDMPs involve active participation from multiple stakeholders, including district administration, line departments, emergency services, community-based organizations, and local communities. Consultation and coordination with these stakeholders are crucial in developing an inclusive and effective plan.
            </li>
            <li>Roles and Responsibilities: DDMPs define the roles and responsibilities of different agencies and departments involved in disaster management at the district level. These include district administration, police, fire services, health services, civil defense, revenue, education, and other relevant departments. The plan clarifies their respective functions and coordination mechanisms during various phases of disaster management.
            </li>
            <li>Preparedness and Response Strategies: DDMPs outline strategies and measures for preparedness, response, and early warning systems. This includes establishing emergency operation centers, stockpiling essential relief supplies, conducting mock drills and exercises, establishing communication networks, and establishing protocols for evacuation, search and rescue, medical services, and rehabilitation.
            </li>
            <li>Resource Mobilization: DDMPs identify the resources required for effective disaster management and outline mechanisms for resource mobilization, including manpower, equipment, and funding. It establishes a framework for coordination with state and national-level agencies for additional support, if needed.
            </li>
            <li>Information Management: DDMPs emphasize the importance of information management during disasters. This includes establishing communication networks, disseminating early warnings, sharing real-time information, and maintaining a database of vulnerable populations, critical infrastructure, and available resources.
            </li>
            <li>Training and Capacity Building: DDMPs highlight the need for training and capacity building programs for personnel involved in disaster management at the district level. This includes imparting skills and knowledge related to disaster preparedness, response protocols, first aid, search and rescue techniques, and community-level preparedness.
            </li>
            <li>Review and Revision: DDMPs are living documents that require periodic review and revision to incorporate lessons learned from previous incidents, changes in risk profiles, and advancements in disaster management practices. The plans should be updated regularly to ensure their relevance and effectiveness.
            </li>
            <li>DDMPs play a crucial role in strengthening the resilience of districts in Maharashtra by providing a systematic and comprehensive framework for disaster management. These plans enable proactive measures, effective response coordination, and timely recovery efforts in the face of various hazards and emergencies.
            </li>
            </ul>',
            'marathi_description' => 'जिल्हा आपत्ती व्यवस्थापन योजना (DDMPs) हे आपत्ती व्यवस्थापनासाठी राज्याच्या धोरणांचा आणि कायद्याचा अविभाज्य भाग आहेत. या योजना जिल्हा स्तरावर आपत्तीच्या प्रसंगी सज्जता, प्रतिसाद आणि पुनर्प्राप्ती सुनिश्चित करण्यासाठी तयार केल्या आहेत. महाराष्ट्राची धोरणे आणि कायद्यानुसार DDMP चे विहंगावलोकन येथे आहे:
            <ul>
            <li>उद्दिष्ट: डीडीएमपीचे प्राथमिक उद्दिष्ट जिल्हा स्तरावर आपत्तींचे प्रभावीपणे व्यवस्थापन आणि कमी करण्यासाठी आवश्यक असलेल्या धोरणे, कृती आणि संसाधनांची रूपरेषा तयार करणे आहे. सरकारी संस्था, गैर-सरकारी संस्था आणि समुदायासह विविध भागधारकांमध्ये समन्वय वाढवणे हे योजनांचे उद्दिष्ट आहे.
            </li>
            <li>कायदेशीर फ्रेमवर्क: डीडीएमपीची निर्मिती आणि अंमलबजावणी आपत्ती व्यवस्थापन कायदा, 2005 द्वारे मार्गदर्शन केले जाते, जे भारतातील आपत्ती व्यवस्थापनासाठी कायदेशीर चौकट प्रदान करते. महाराष्ट्र राज्य आपत्ती व्यवस्थापन प्राधिकरण (MSDMA) या योजनांच्या विकास आणि अंमलबजावणीवर देखरेख करते.
            </li>
            <li>जोखीम मूल्यमापन: DDMPs जिल्ह्याच्या सर्वसमावेशक जोखीम मूल्यमापनाने सुरुवात करतात, विविध नैसर्गिक आणि मानवनिर्मित धोक्यांचा विचार करून त्या प्रदेशासाठी. हे मूल्यांकन असुरक्षा ओळखण्यात, प्रतिसाद देण्याच्या क्षमतेचे मूल्यांकन करण्यात आणि जोखमीच्या स्तरावर आधारित कृतींना प्राधान्य देण्यास मदत करते.
            </li>
            <li>स्टेकहोल्डर एंगेजमेंट: DDMPs मध्ये जिल्हा प्रशासन, लाइन विभाग, आपत्कालीन सेवा, समुदाय-आधारित संस्था आणि स्थानिक समुदायांसह अनेक भागधारकांचा सक्रिय सहभाग असतो. सर्वसमावेशक आणि प्रभावी योजना विकसित करण्यासाठी या भागधारकांशी सल्लामसलत आणि समन्वय महत्त्वपूर्ण आहे.
            </li>
            <li>भागधारक सहभाग: DDMPs मध्ये जिल्हा प्रशासन, लाइन विभाग, आपत्कालीन सेवा, समुदाय-आधारित संस्था आणि स्थानिक समुदायांसह अनेक भागधारकांचा सक्रिय सहभाग असतो. सर्वसमावेशक आणि प्रभावी योजना विकसित करण्यासाठी या भागधारकांशी सल्लामसलत आणि समन्वय महत्त्वपूर्ण आहे.
            </li>
            <li>भूमिका आणि जबाबदाऱ्या: डीडीएमपी जिल्हा स्तरावर आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध एजन्सी आणि विभागांच्या भूमिका आणि जबाबदाऱ्या परिभाषित करतात. यामध्ये जिल्हा प्रशासन, पोलीस, अग्निशमन सेवा, आरोग्य सेवा, नागरी संरक्षण, महसूल, शिक्षण आणि इतर संबंधित विभागांचा समावेश आहे. योजना आपत्ती व्यवस्थापनाच्या विविध टप्प्यांमध्ये त्यांची संबंधित कार्ये आणि समन्वय यंत्रणा स्पष्ट करते.
            </li>
            <li>तयारी आणि प्रतिसाद धोरणे: DDMPs तयारी, प्रतिसाद आणि पूर्व चेतावणी प्रणालीसाठी धोरणे आणि उपाययोजनांची रूपरेषा देतात. यामध्ये आपत्कालीन ऑपरेशन केंद्रे स्थापन करणे, अत्यावश्यक मदत पुरवठा साठा करणे, मॉक ड्रिल आणि व्यायाम आयोजित करणे, संप्रेषण नेटवर्क स्थापित करणे आणि स्थलांतर, शोध आणि बचाव, वैद्यकीय सेवा आणि पुनर्वसन यासाठी प्रोटोकॉल स्थापित करणे समाविष्ट आहे.
            </li>
            <li>संसाधनांची जमवाजमव: डीडीएमपी प्रभावी आपत्ती व्यवस्थापनासाठी आवश्यक संसाधने ओळखतात आणि मनुष्यबळ, उपकरणे आणि निधीसह संसाधन एकत्रित करण्यासाठी यंत्रणांची रूपरेषा तयार करतात. हे आवश्यक असल्यास, अतिरिक्त समर्थनासाठी राज्य आणि राष्ट्रीय-स्तरीय एजन्सींच्या समन्वयासाठी एक फ्रेमवर्क स्थापित करते.
            </li>
            <li>माहिती व्यवस्थापन: डीडीएमपी आपत्तींच्या काळात माहिती व्यवस्थापनाच्या महत्त्वावर भर देतात. यामध्ये संप्रेषण नेटवर्क स्थापित करणे, पूर्व चेतावणी प्रसारित करणे, रीअल-टाइम माहिती सामायिक करणे आणि असुरक्षित लोकसंख्येचा डेटाबेस, गंभीर पायाभूत सुविधा आणि उपलब्ध संसाधने राखणे समाविष्ट आहे.
            </li>
            <li>प्रशिक्षण आणि क्षमता निर्माण: DDMPs जिल्हा स्तरावर आपत्ती व्यवस्थापनात सहभागी असलेल्या कर्मचार्‍यांसाठी प्रशिक्षण आणि क्षमता निर्माण कार्यक्रमांची गरज अधोरेखित करतात. यामध्ये आपत्ती सज्जता, प्रतिसाद प्रोटोकॉल, प्रथमोपचार, शोध आणि बचाव तंत्र आणि समुदाय-स्तरीय तयारीशी संबंधित कौशल्ये आणि ज्ञान प्रदान करणे समाविष्ट आहे.
            </li>
            <li>पुनरावलोकन आणि पुनरावृत्ती: डीडीएमपी हे जिवंत दस्तऐवज आहेत ज्यात मागील घटनांमधून शिकलेले धडे, जोखीम प्रोफाइलमधील बदल आणि आपत्ती व्यवस्थापन पद्धतींमध्ये प्रगती समाविष्ट करण्यासाठी नियतकालिक पुनरावलोकन आणि पुनरावृत्ती आवश्यक आहे. योजना त्यांची प्रासंगिकता आणि परिणामकारकता सुनिश्चित करण्यासाठी नियमितपणे अद्यतनित केल्या पाहिजेत.
            </li>
            <li>आपत्ती व्यवस्थापनासाठी एक पद्धतशीर आणि सर्वसमावेशक आराखडा उपलब्ध करून महाराष्ट्रातील जिल्ह्यांची लवचिकता मजबूत करण्यात DDMPs महत्त्वपूर्ण भूमिका बजावतात. या योजना विविध धोके आणि आणीबाणीच्या वेळी सक्रिय उपाय, प्रभावी प्रतिसाद समन्वय आणि वेळेवर पुनर्प्राप्ती प्रयत्नांना सक्षम करतात.
            </li>
            </ul>
            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        StateDisasterManagementPolicy::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' State disaster management policy',
            'marathi_title' => 'राज्य आपत्ती व्यवस्थापन धोरण',
            'english_description' => 'The State Disaster Management Policy of Maharashtra outlines the framework and guidelines for disaster management within the state. It establishes the objectives, principles, and strategies to be followed in order to effectively prevent, mitigate, and respond to disasters. The policy is based on national disaster management policies and guidelines, while also considering the unique geographical, environmental, and socio-economic factors specific to Maharashtra.<br>
            The key components of the State Disaster Management Policy include:
             <ul>
             <li>Institutional Framework: The policy defines the roles and responsibilities of various government departments, agencies, and stakeholders involved in disaster management. It establishes the State Disaster Management Authority (SDMA) as the apex body responsible for policy formulation, coordination, and overall management of disasters in the state.
             </li>
             <li>Risk Assessment and Vulnerability Analysis: The policy emphasizes the importance of conducting comprehensive risk assessments and vulnerability analyses to identify the potential hazards and assess the vulnerabilities of communities, infrastructure, and critical facilities within the state.
             </li>
             <li>Preparedness and Capacity Building: The policy highlights the significance of preparedness measures, including capacity building, training, and awareness programs for various stakeholders involved in disaster management. It focuses on enhancing the skills and capabilities of response agencies, local authorities, communities, and volunteers to effectively respond to emergencies.
             </li>
             <li>Mitigation and Prevention: The policy stresses the need for proactive measures to mitigate and prevent disasters. It encourages the integration of risk reduction measures into developmental plans and projects, such as land-use planning, building codes, infrastructure design, and environmental conservation.
             </li>
             <li>Response and Recovery: The policy outlines the strategies and procedures for timely and effective response during emergencies. It emphasizes the coordination among response agencies, mobilization of resources, establishment of emergency communication systems, and provision of essential services to affected populations. Additionally, it addresses the post-disaster recovery and reconstruction processes to facilitate the restoration of affected communities and infrastructure.
             </li>
             <li>Community Participation and Stakeholder Engagement: The policy emphasizes the active involvement of communities, non-governmental organizations, and private sector entities in disaster management efforts. It recognizes the importance of community-based initiatives, local knowledge, and participation in decision-making processes related to disaster risk reduction and response.
             </li>
             <li>The State Disaster Management Policy of Maharashtra is supported by relevant legislation and acts, such as the Disaster Management Act, 2005, which provides a legal framework for disaster management at the national and state levels. These policies and legislations aim to create a holistic and integrated approach to disaster management in Maharashtra, ensuring the safety, well-being, and resilience of its communities in the face of disasters.
             </li>
             </ul>           ',
            'marathi_description' => 'महाराष्ट्राच्या राज्य आपत्ती व्यवस्थापन धोरणामध्ये राज्यातील आपत्ती व्यवस्थापनासाठी आराखडा आणि मार्गदर्शक तत्त्वे आहेत. हे आपत्तींना प्रभावीपणे रोखण्यासाठी, कमी करण्यासाठी आणि प्रतिसाद देण्यासाठी पाळली जाणारी उद्दिष्टे, तत्त्वे आणि धोरणे स्थापित करते. हे धोरण राष्ट्रीय आपत्ती व्यवस्थापन धोरणे आणि मार्गदर्शक तत्त्वांवर आधारित आहे, तसेच महाराष्ट्रासाठी विशिष्ट भौगोलिक, पर्यावरणीय आणि सामाजिक-आर्थिक घटकांचाही विचार केला आहे.<br>
            राज्य आपत्ती व्यवस्थापन धोरणाच्या प्रमुख घटकांमध्ये हे समाविष्ट आहे:
            <ul>
            <li>संस्थात्मक फ्रेमवर्क: धोरण विविध सरकारी विभाग, एजन्सी आणि आपत्ती व्यवस्थापनात सहभागी असलेल्या भागधारकांच्या भूमिका आणि जबाबदाऱ्या परिभाषित करते. हे राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) ची स्थापना, धोरण तयार करणे, समन्वय आणि राज्यातील आपत्तींच्या संपूर्ण व्यवस्थापनासाठी जबाबदार सर्वोच्च संस्था म्हणून करते.
            </li>
            <li>जोखीम मूल्यांकन आणि भेद्यता विश्लेषण: धोरण सर्वसमावेशक जोखीम मूल्यमापन आणि संभाव्य धोके ओळखण्यासाठी असुरक्षा विश्लेषणे आयोजित करण्याच्या महत्त्वावर भर देते आणि समुदाय, पायाभूत सुविधा आणि राज्यातील गंभीर सुविधांच्या असुरक्षिततेचे मूल्यांकन करते.
            </li>
            <li>तयारी आणि क्षमता निर्माण: धोरण आपत्ती व्यवस्थापनात सामील असलेल्या विविध भागधारकांसाठी क्षमता निर्माण, प्रशिक्षण आणि जागरुकता कार्यक्रमांसह सज्जता उपायांचे महत्त्व अधोरेखित करते. हे आपत्कालीन परिस्थितींना प्रभावीपणे प्रतिसाद देण्यासाठी प्रतिसाद एजन्सी, स्थानिक अधिकारी, समुदाय आणि स्वयंसेवकांची कौशल्ये आणि क्षमता वाढवण्यावर लक्ष केंद्रित करते.
            </li>
            <li>शमन आणि प्रतिबंध: धोरण आपत्ती कमी करण्यासाठी आणि प्रतिबंध करण्यासाठी सक्रिय उपायांच्या गरजेवर भर देते. हे विकासात्मक योजना आणि प्रकल्पांमध्ये जोखीम कमी करण्याच्या उपायांचे एकत्रीकरण करण्यास प्रोत्साहन देते, जसे की जमीन-वापर नियोजन, इमारत कोड, पायाभूत सुविधा डिझाइन आणि पर्यावरण संवर्धन.
            </li>
            <li>प्रतिसाद आणि पुनर्प्राप्ती: धोरण आणीबाणीच्या वेळी वेळेवर आणि प्रभावी प्रतिसादासाठी धोरणे आणि प्रक्रियांची रूपरेषा देते. हे प्रतिसाद एजन्सींमधील समन्वय, संसाधनांची जमवाजमव, आपत्कालीन संप्रेषण प्रणालीची स्थापना आणि प्रभावित लोकसंख्येसाठी आवश्यक सेवांची तरतूद यावर भर देते. याव्यतिरिक्त, ते प्रभावित समुदाय आणि पायाभूत सुविधा पुनर्संचयित करण्यासाठी आपत्तीनंतरच्या पुनर्प्राप्ती आणि पुनर्बांधणी प्रक्रियेस संबोधित करते.
            </li>
            <li>समुदायाचा सहभाग आणि भागधारक सहभाग: धोरण आपत्ती व्यवस्थापनाच्या प्रयत्नांमध्ये समुदाय, गैर-सरकारी संस्था आणि खाजगी क्षेत्रातील संस्थांच्या सक्रिय सहभागावर भर देते. हे समुदाय-आधारित उपक्रमांचे महत्त्व, स्थानिक ज्ञान आणि आपत्ती जोखीम कमी आणि प्रतिसादाशी संबंधित निर्णय प्रक्रियेतील सहभाग ओळखते.
            </li>
            <li>महाराष्ट्राचे राज्य आपत्ती व्यवस्थापन धोरण संबंधित कायदे आणि कायद्यांद्वारे समर्थित आहे, जसे की आपत्ती व्यवस्थापन कायदा, 2005, जो राष्ट्रीय आणि राज्य स्तरावर आपत्ती व्यवस्थापनासाठी कायदेशीर चौकट प्रदान करतो. ही धोरणे आणि कायदे महाराष्ट्रातील आपत्ती व्यवस्थापनासाठी सर्वांगीण आणि एकात्मिक दृष्टीकोन निर्माण करणे, आपत्तींना तोंड देताना तेथील समुदायांची सुरक्षितता, कल्याण आणि लवचिकता सुनिश्चित करणे हे उद्दिष्ट ठेवते.
            </li>
            </ul>      
            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        RelevantLawsRegulation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Relevant laws and regulations',
            'marathi_title' => 'संबंधित कायदे आणि नियम',
            'english_description' => 'In Maharashtra, there are several relevant laws and regulations pertaining to disaster management. These policies and legislation aim to ensure preparedness, response, recovery, and mitigation measures are in place to effectively manage disasters. Here are some key laws and regulations in Maharashtra:<br>            ',
            'marathi_description' => 'महाराष्ट्रात, आपत्ती व्यवस्थापनाशी संबंधित अनेक कायदे आणि नियम आहेत. ही धोरणे आणि कायदे आपत्तींचे प्रभावीपणे व्यवस्थापन करण्यासाठी सज्जता, प्रतिसाद, पुनर्प्राप्ती आणि शमन उपाय आहेत याची खात्री करणे हा आहे. महाराष्ट्रातील काही प्रमुख कायदे आणि नियम येथे आहेत:<br>            ',
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
    }
}