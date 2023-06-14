<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportIncidentCrowdsourcing;
use App\Models\VolunteerCitizenSupport;
use App\Models\CitizenFeedbackSuggestion;


class CitizenActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportIncidentCrowdsourcing::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Report an Incident : Crowdsourcing',
            'marathi_title' => 'एका घटनेची तक्रार करा: क्राउडसोर्सिंग',
            'english_description' => 'Report an Incident: Crowdsourcing is a method used in disaster management to gather real-time information from the public about incidents and emergencies occurring during a disaster. It harnesses the power of technology and community participation to enhance situational awareness, response coordination, and resource allocation.<br>
            In this approach, individuals and communities are encouraged to report incidents and provide valuable information through various channels, such as dedicated mobile applications, websites, social media platforms, or phone hotlines. The reported incidents can include a wide range of information, such as the location, type of incident, severity, and any relevant details or multimedia content.<br>
            Crowdsourcing in disaster management offers several benefits:
            <ul>
            <li>Rapid Data Collection: By involving the public in reporting incidents, information can be gathered rapidly and in real-time. This enables authorities and response teams to have up-to-date situational awareness, facilitating timely decision-making.
            </li>
            <li>Enhanced Situational Awareness: Crowdsourced reports provide valuable data points that complement official information sources. They offer additional perspectives, fill in gaps, and help validate the accuracy and completeness of the situation. This leads to a more comprehensive understanding of the disaster and its impacts.
            </li>
            <li>Increased Resilience: By actively engaging the public in reporting incidents, crowdsourcing promotes a sense of community empowerment and resilience. It encourages individuals to be proactive in contributing to the overall disaster response effort and fosters a culture of collective responsibility.
            </li>
            <li>Public Engagement and Trust: Crowdsourcing initiatives create opportunities for direct engagement between the public and disaster management authorities. It fosters transparency, builds trust, and strengthens the relationship between the two, leading to more effective collaboration and better outcomes during emergencies.
            </li>
            </ul>
            ',
            'marathi_description' => 'एखाद्या घटनेची तक्रार करा: क्राउडसोर्सिंग ही आपत्ती व्यवस्थापनामध्ये आपत्ती दरम्यान घडणाऱ्या घटना आणि आपत्कालीन परिस्थितींबद्दल लोकांकडून रीअल-टाइम माहिती गोळा करण्यासाठी वापरली जाणारी एक पद्धत आहे. हे परिस्थितीजन्य जागरूकता, प्रतिसाद समन्वय आणि संसाधन वाटप वाढविण्यासाठी तंत्रज्ञान आणि समुदायाच्या सहभागाची शक्ती वापरते.<br>
            या दृष्टिकोनामध्ये, व्यक्ती आणि समुदायांना विविध चॅनेल, जसे की समर्पित मोबाइल अॅप्लिकेशन्स, वेबसाइट्स, सोशल मीडिया प्लॅटफॉर्म किंवा फोन हॉटलाइनद्वारे घटनांची तक्रार करण्यासाठी आणि मौल्यवान माहिती प्रदान करण्यासाठी प्रोत्साहित केले जाते. नोंदवलेल्या घटनांमध्ये माहितीची विस्तृत श्रेणी समाविष्ट असू शकते, जसे की स्थान, घटनेचा प्रकार, तीव्रता आणि कोणतेही संबंधित तपशील किंवा मल्टीमीडिया सामग्री.<br>
            आपत्ती व्यवस्थापनामध्ये क्राउडसोर्सिंग अनेक फायदे देते:
            <ul>
            <li>जलद डेटा संकलन: घटनांच्या अहवालात लोकांना सहभागी करून, माहिती जलद आणि वास्तविक वेळेत गोळा केली जाऊ शकते. हे अधिकारी आणि प्रतिसाद संघांना अद्ययावत परिस्थितीजन्य जागरूकता सक्षम करते, वेळेवर निर्णय घेणे सुलभ करते.
            </li>
            <li>वर्धित परिस्थितीविषयक जागरूकता: क्राउडसोर्स केलेले अहवाल मौल्यवान डेटा पॉइंट प्रदान करतात जे अधिकृत माहिती स्रोतांना पूरक असतात. ते अतिरिक्त दृष्टीकोन देतात, अंतर भरतात आणि परिस्थितीची अचूकता आणि पूर्णता प्रमाणित करण्यात मदत करतात. यामुळे आपत्ती आणि त्याचे परिणाम यांची अधिक व्यापक समज होते.
            </li>
            <li>वाढीव लवचिकता: घटनांच्या अहवालात लोकांना सक्रियपणे गुंतवून, क्राउडसोर्सिंग समुदाय सशक्तीकरण आणि लवचिकतेची भावना वाढवते. एकूणच आपत्ती प्रतिसादाच्या प्रयत्नात योगदान देण्यासाठी व्यक्तींना सक्रिय होण्यासाठी प्रोत्साहित करते आणि सामूहिक जबाबदारीची संस्कृती वाढवते.
            </li>
            <li>सार्वजनिक सहभाग आणि विश्वास: क्राउडसोर्सिंग उपक्रम सार्वजनिक आणि आपत्ती व्यवस्थापन प्राधिकरणांमध्ये थेट सहभागासाठी संधी निर्माण करतात. हे पारदर्शकता वाढवते, विश्वास निर्माण करते आणि दोघांमधील संबंध मजबूत करते, ज्यामुळे आपत्कालीन परिस्थितीत अधिक प्रभावी सहयोग आणि चांगले परिणाम होतात.
            </li>
            </ul>
            ',
            'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        VolunteerCitizenSupport::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Be a Volunteer : Citizen Support',
            'marathi_title' => 'स्वयंसेवक व्हा: नागरिक समर्थन',
            'english_description' => 'Being a volunteer and providing citizen support in the field of disaster management is a crucial and valuable contribution to the overall resilience and recovery efforts. Here are the details of how citizens can support as volunteers in disaster management:<br>
            <ul>
            <li>Preparedness and Awareness:
            Volunteers can actively participate in spreading awareness about disaster preparedness within their communities. They can organize workshops, training sessions, and awareness campaigns to educate people on various aspects of disaster management, including risk assessment, emergency planning, evacuation procedures, and first aid.
            </li>
            <li>Community Engagement:
            Volunteers can engage with their local communities to build a sense of community resilience. They can establish community-based organizations or join existing ones to foster collaboration and communication among community members. By organizing community meetings, they can encourage neighbors to support each other during emergencies and share resources and information.
            </li>
            <li>Emergency Response:
            During emergencies, volunteers can play a vital role in supporting the response efforts. They can assist in search and rescue operations, distribute relief supplies, provide first aid, and help in setting up temporary shelters. Volunteers with specialized skills, such as medical professionals or engineers, can contribute their expertise in providing medical care or assessing structural safety.
            </li>
            <li>Information Management:
            Volunteers can support the collection, analysis, and dissemination of information related to disasters. They can assist in gathering data on affected areas, conducting damage assessments, and documenting the needs of affected populations. Volunteers can also help in managing helplines, hotlines, or online platforms to provide real-time information and guidance to the public.
            </li>
            <li>Psychological Support:
            Disasters can have a profound impact on the mental well-being of individuals. Volunteers can receive training in providing psychological support and counseling to affected individuals and communities. They can offer a listening ear, provide comfort, and help people cope with the emotional stress and trauma caused by the disaster.
            </li>
            <li>Recovery and Rehabilitation:
            Volunteers can contribute to the long-term recovery and rehabilitation efforts after a disaster. They can participate in community rebuilding activities, such as clearing debris, repairing infrastructure, and restoring essential services. Additionally, they can assist in organizing community events, fundraisers, or resource mobilization initiatives to support the recovery process.
            </li>
            <li>Training and Capacity Building:
            Volunteers themselves can benefit from training and capacity building programs offered by disaster management organizations. By enhancing their skills and knowledge in areas such as first aid, search and rescue techniques, or disaster risk reduction, volunteers become better equipped to respond effectively during emergencies and can also train others in their communities.
            </li>
            <li>
            Advocacy and Policy Influence:
            Volunteers can advocate for policies and practices that promote disaster resilience and risk reduction. They can raise awareness about the importance of implementing measures to mitigate the impact of disasters and influence decision-makers to prioritize investments in disaster preparedness, infrastructure resilience, and community empowerment.
            </li>
            </ul>
            ',
            'marathi_description' => 'एक स्वयंसेवक असणे आणि आपत्ती व्यवस्थापनाच्या क्षेत्रात नागरिकांचे समर्थन प्रदान करणे हे एकंदर लवचिकता आणि पुनर्प्राप्ती प्रयत्नांसाठी एक महत्त्वपूर्ण आणि मौल्यवान योगदान आहे. आपत्ती व्यवस्थापनात नागरिक स्वयंसेवक म्हणून कसे मदत करू शकतात याचे तपशील येथे आहेत:<br>
            <ul>
            <li>तयारी आणि जागरूकता:
            स्वयंसेवक त्यांच्या समुदायामध्ये आपत्ती सज्जतेबद्दल जागरूकता पसरविण्यात सक्रियपणे सहभागी होऊ शकतात. जोखीम मूल्यांकन, आपत्कालीन नियोजन, निर्वासन प्रक्रिया आणि प्रथमोपचार यासह आपत्ती व्यवस्थापनाच्या विविध पैलूंवर लोकांना शिक्षित करण्यासाठी ते कार्यशाळा, प्रशिक्षण सत्रे आणि जागरूकता मोहिमा आयोजित करू शकतात.
            </li>
            <li>समुदाय प्रतिबद्धता:
            सामुदायिक लवचिकतेची भावना निर्माण करण्यासाठी स्वयंसेवक त्यांच्या स्थानिक समुदायांमध्ये व्यस्त राहू शकतात. ते समुदाय-आधारित संस्था स्थापन करू शकतात किंवा समुदाय सदस्यांमध्ये सहयोग आणि संवाद वाढवण्यासाठी विद्यमान संस्थांमध्ये सामील होऊ शकतात. सामुदायिक सभा आयोजित करून, ते शेजाऱ्यांना आपत्कालीन परिस्थितीत एकमेकांना पाठिंबा देण्यासाठी आणि संसाधने आणि माहिती सामायिक करण्यासाठी प्रोत्साहित करू शकतात.
            </li>
            <li>
            आपत्कालीन प्रतिसाद:
            आणीबाणीच्या काळात, प्रतिसादाच्या प्रयत्नांना पाठिंबा देण्यासाठी स्वयंसेवक महत्त्वाची भूमिका बजावू शकतात. ते शोध आणि बचाव कार्यात मदत करू शकतात, मदत पुरवठा वितरीत करू शकतात, प्रथमोपचार प्रदान करू शकतात आणि तात्पुरती निवारा उभारण्यात मदत करू शकतात. वैद्यकीय व्यावसायिक किंवा अभियंते यांसारखे विशेष कौशल्य असलेले स्वयंसेवक, वैद्यकीय सेवा प्रदान करण्यात किंवा संरचनात्मक सुरक्षिततेचे मूल्यांकन करण्यात त्यांचे कौशल्य योगदान देऊ शकतात.
            </li>
            <li>माहिती व्यवस्थापन:
            स्वयंसेवक आपत्तींशी संबंधित माहितीचे संकलन, विश्लेषण आणि प्रसार करण्यास मदत करू शकतात. ते प्रभावित क्षेत्रावरील डेटा गोळा करण्यात, नुकसानीचे मूल्यांकन करण्यात आणि प्रभावित लोकसंख्येच्या गरजा दस्तऐवजीकरण करण्यात मदत करू शकतात. स्वयंसेवक लोकांना रिअल-टाइम माहिती आणि मार्गदर्शन प्रदान करण्यासाठी हेल्पलाइन, हॉटलाइन किंवा ऑनलाइन प्लॅटफॉर्म व्यवस्थापित करण्यात मदत करू शकतात.
            </li>
            <li>मानसशास्त्रीय आधार:
            आपत्तींचा व्यक्तींच्या मानसिक आरोग्यावर खोलवर परिणाम होतो. स्वयंसेवक प्रभावित व्यक्ती आणि समुदायांना मनोवैज्ञानिक समर्थन आणि समुपदेशन प्रदान करण्यासाठी प्रशिक्षण प्राप्त करू शकतात. ते ऐकण्याचे कान देऊ शकतात, सांत्वन देऊ शकतात आणि आपत्तीमुळे झालेल्या भावनिक ताण आणि आघातांचा सामना करण्यास लोकांना मदत करू शकतात.
            </li>
            <li>पुनर्प्राप्ती आणि पुनर्वसन:
            आपत्तीनंतर दीर्घकालीन पुनर्प्राप्ती आणि पुनर्वसन प्रयत्नांमध्ये स्वयंसेवक योगदान देऊ शकतात. ते सामुदायिक पुनर्बांधणी क्रियाकलापांमध्ये भाग घेऊ शकतात, जसे की मोडतोड साफ करणे, पायाभूत सुविधांची दुरुस्ती करणे आणि आवश्यक सेवा पुनर्संचयित करणे. याव्यतिरिक्त, ते पुनर्प्राप्ती प्रक्रियेस समर्थन देण्यासाठी सामुदायिक कार्यक्रम, निधी उभारणी किंवा संसाधन एकत्रीकरण उपक्रम आयोजित करण्यात मदत करू शकतात.
            </li>
            <li>प्रशिक्षण आणि क्षमता निर्माण:
            आपत्ती व्यवस्थापन संस्थांनी देऊ केलेल्या प्रशिक्षण आणि क्षमता निर्माण कार्यक्रमांचा स्वयंसेवकांना फायदा होऊ शकतो. प्रथमोपचार, शोध आणि बचाव तंत्रे किंवा आपत्ती जोखीम कमी करणे यासारख्या क्षेत्रांमध्ये त्यांचे कौशल्य आणि ज्ञान वाढवून, स्वयंसेवक आपत्कालीन परिस्थितीत प्रभावीपणे प्रतिसाद देण्यासाठी अधिक सुसज्ज बनतात आणि त्यांच्या समुदायातील इतरांनाही प्रशिक्षण देऊ शकतात.
            </li>
            <li>वकिली आणि धोरणाचा प्रभाव:
            स्वयंसेवक आपत्ती लवचिकता आणि जोखीम कमी करण्यास प्रोत्साहन देणारी धोरणे आणि पद्धतींचा पुरस्कार करू शकतात. ते आपत्तींचा प्रभाव कमी करण्यासाठी उपाययोजना राबवण्याच्या महत्त्वाबद्दल जागरूकता वाढवू शकतात आणि आपत्ती सज्जता, पायाभूत सुविधांची लवचिकता आणि समुदाय सशक्तीकरण यामधील गुंतवणूकीला प्राधान्य देण्यासाठी निर्णय घेणाऱ्यांना प्रभावित करू शकतात.
            </li>
            </ul>
            ',
            'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        CitizenFeedbackSuggestion::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Feedback and suggestions',
            'marathi_title' => 'अभिप्राय आणि सूचना',
            'english_description' => 'Feedback and suggestions play a vital role in improving disaster management strategies and enhancing overall preparedness and response capabilities. Here are some feedback and suggestions that can contribute to effective disaster management:<br>
            <ul>
            <li>Regular Assessment and Evaluation: Conduct regular assessments and evaluations of disaster management plans, policies, and procedures. This helps identify strengths, weaknesses, and areas for improvement. Feedback from stakeholders, including emergency responders, community members, and government agencies, should be considered during these assessments.
            </li>
            <li>Community Engagement and Participation: Encourage active participation and engagement of local communities in disaster management efforts. Involve community members in decision-making processes, awareness campaigns, and training programs. Seek feedback from the community to understand their needs and perspectives, and incorporate their input into disaster management plans.
            </li>
            <li>Enhanced Early Warning Systems: Continuously improve early warning systems to provide timely and accurate information to at-risk populations. Evaluate the effectiveness of existing systems and explore new technologies for early detection and warning dissemination. Ensure that warning messages are clear, accessible, and easily understood by the public.
            </li>
            <li>Training and Capacity Building: Invest in training and capacity building programs for emergency responders, volunteers, and community members. Provide regular training sessions on disaster response protocols, first aid, search and rescue techniques, and other relevant skills. Continuous skill development ensures that responders are prepared to handle various types of disasters effectively.
            </li>
            <li>Integration of Technology: Embrace technological advancements to enhance disaster management capabilities. Utilize geographic information systems (GIS), remote sensing, data analytics, and other technologies to improve situational awareness, early detection, and response coordination. Explore the use of mobile applications and social media platforms for effective communication during emergencies.
            </li>
            <li>Collaboration and Coordination: Strengthen collaboration and coordination among different stakeholders involved in disaster management. Foster partnerships between government agencies, non-governmental organizations, private sector entities, and community-based organizations. Promote information sharing, resource pooling, and joint planning to enhance overall preparedness and response efforts.
            </li>
            <li>Continuous Improvement and Learning: Foster a culture of continuous improvement and learning in disaster management. Regularly review and update disaster management plans based on lessons learned from past incidents. Conduct post-disaster assessments to identify areas for improvement and incorporate these findings into future planning and response strategies.
            </li>
            <li>Public Awareness and Education: Enhance public awareness and education campaigns to ensure that communities are well-informed about potential risks, preparedness measures, and response protocols. Use multiple channels, including social media, websites, and public meetings, to disseminate information. Tailor messages to address the specific needs and cultural sensitivities of diverse populations.
            </li>
            <li>Resource Allocation and Funding: Allocate adequate resources and funding for disaster management initiatives. Ensure that funding is allocated equitably and prioritized based on risk assessments. Explore partnerships with international organizations, development agencies, and the private sector to leverage additional resources and expertise.
            </li>
            <li>Continuous Communication and Feedback Loop: Establish a feedback mechanism to allow stakeholders to provide input, suggestions, and concerns regarding disaster management efforts. Regularly communicate updates, progress, and challenges to stakeholders, fostering transparency and accountability.
            </li>
            </ul>',
            'marathi_description' => 'आपत्ती व्यवस्थापन धोरणे सुधारण्यात आणि एकूण तयारी आणि प्रतिसाद क्षमता वाढवण्यात अभिप्राय आणि सूचना महत्त्वाची भूमिका बजावतात. येथे काही अभिप्राय आणि सूचना आहेत ज्या प्रभावी आपत्ती व्यवस्थापनात योगदान देऊ शकतात:<br>
            <ul>
            <li>नियमित मूल्यांकन आणि मूल्यमापन: आपत्ती व्यवस्थापन योजना, धोरणे आणि कार्यपद्धती यांचे नियमित मूल्यांकन आणि मूल्यमापन करा. हे सामर्थ्य, कमकुवतपणा आणि सुधारण्यासाठी क्षेत्रे ओळखण्यात मदत करते. आपत्कालीन प्रतिसादकर्ते, समुदाय सदस्य आणि सरकारी संस्थांसह भागधारकांच्या अभिप्रायाचा या मूल्यांकनादरम्यान विचार केला पाहिजे.
            </li>
            <li>सामुदायिक सहभाग आणि सहभाग: आपत्ती व्यवस्थापनाच्या प्रयत्नांमध्ये स्थानिक समुदायांचा सक्रिय सहभाग आणि सहभागास प्रोत्साहन द्या. निर्णय प्रक्रिया, जागरूकता मोहिम आणि प्रशिक्षण कार्यक्रमांमध्ये समुदाय सदस्यांना सामील करा. त्यांच्या गरजा आणि दृष्टीकोन समजून घेण्यासाठी समुदायाकडून अभिप्राय घ्या आणि आपत्ती व्यवस्थापन योजनांमध्ये त्यांचे इनपुट समाविष्ट करा.
            </li>
            <li>वर्धित पूर्व चेतावणी प्रणाली: जोखीम असलेल्या लोकसंख्येला वेळेवर आणि अचूक माहिती प्रदान करण्यासाठी प्रारंभिक चेतावणी प्रणालींमध्ये सतत सुधारणा करा. विद्यमान प्रणालींच्या परिणामकारकतेचे मूल्यांकन करा आणि लवकर ओळख आणि चेतावणी प्रसारासाठी नवीन तंत्रज्ञानाचा शोध घ्या. चेतावणी संदेश स्पष्ट, प्रवेश करण्यायोग्य आणि लोकांद्वारे सहज समजतील याची खात्री करा.
            </li>
            <li>प्रशिक्षण आणि क्षमता निर्माण: आपत्कालीन प्रतिसादकर्ते, स्वयंसेवक आणि समुदाय सदस्यांसाठी प्रशिक्षण आणि क्षमता निर्माण कार्यक्रमांमध्ये गुंतवणूक करा. आपत्ती प्रतिसाद प्रोटोकॉल, प्रथमोपचार, शोध आणि बचाव तंत्र आणि इतर संबंधित कौशल्यांवर नियमित प्रशिक्षण सत्रे द्या. सतत कौशल्य विकास हे सुनिश्चित करतो की प्रतिसादकर्ते विविध प्रकारच्या आपत्तींना प्रभावीपणे हाताळण्यासाठी तयार आहेत.
            </li>
            <li>तंत्रज्ञानाचे एकत्रीकरण: आपत्ती व्यवस्थापन क्षमता वाढविण्यासाठी तांत्रिक प्रगती स्वीकारा. परिस्थितीजन्य जागरूकता, लवकर ओळख आणि प्रतिसाद समन्वय सुधारण्यासाठी भौगोलिक माहिती प्रणाली (GIS), रिमोट सेन्सिंग, डेटा विश्लेषणे आणि इतर तंत्रज्ञानाचा वापर करा. आणीबाणीच्या काळात प्रभावी संप्रेषणासाठी मोबाईल ऍप्लिकेशन्स आणि सोशल मीडिया प्लॅटफॉर्मचा वापर एक्सप्लोर करा.
            </li>
            <li>सहयोग आणि समन्वय: आपत्ती व्यवस्थापनात गुंतलेल्या विविध भागधारकांमधील सहकार्य आणि समन्वय मजबूत करा. सरकारी संस्था, गैर-सरकारी संस्था, खाजगी क्षेत्रातील संस्था आणि समुदाय-आधारित संस्था यांच्यातील भागीदारी वाढवणे. माहितीची देवाणघेवाण, संसाधने एकत्र करणे आणि एकूण तयारी आणि प्रतिसाद प्रयत्न वाढविण्यासाठी संयुक्त नियोजनाला प्रोत्साहन द्या.
            </li>
            <li>सतत सुधारणा आणि शिक्षण: आपत्ती व्यवस्थापनामध्ये सतत सुधारणा आणि शिकण्याची संस्कृती वाढवणे. भूतकाळातील घटनांमधून शिकलेल्या धड्यांवर आधारित आपत्ती व्यवस्थापन योजनांचे नियमितपणे पुनरावलोकन करा आणि अद्ययावत करा. सुधारणेसाठी क्षेत्रे ओळखण्यासाठी आपत्तीनंतरचे मूल्यांकन करा आणि हे निष्कर्ष भविष्यातील नियोजन आणि प्रतिसाद धोरणांमध्ये समाविष्ट करा.
            </li>
            <li>सार्वजनिक जागरुकता आणि शिक्षण: संभाव्य धोके, सज्जतेचे उपाय आणि प्रतिसाद प्रोटोकॉल याविषयी समुदायांना चांगली माहिती आहे याची खात्री करण्यासाठी सार्वजनिक जागरूकता आणि शिक्षण मोहिमेला वर्धित करा. माहिती प्रसारित करण्यासाठी सोशल मीडिया, वेबसाइट्स आणि सार्वजनिक सभांसह अनेक चॅनेल वापरा. विविध लोकसंख्येच्या विशिष्ट गरजा आणि सांस्कृतिक संवेदनशीलता पूर्ण करण्यासाठी संदेश तयार करा.
            </li>
            <li>संसाधन वाटप आणि निधी: आपत्ती व्यवस्थापन उपक्रमांसाठी पुरेशी संसाधने आणि निधीचे वाटप करा. जोखीम मुल्यांकनाच्या आधारे निधीचे वाटप समन्यायी आणि प्राधान्याने केले आहे याची खात्री करा. अतिरिक्त संसाधने आणि कौशल्याचा लाभ घेण्यासाठी आंतरराष्ट्रीय संस्था, विकास संस्था आणि खाजगी क्षेत्रासह भागीदारी एक्सप्लोर करा.
            </li>
            <li>सतत संप्रेषण आणि फीडबॅक लूप: आपत्ती व्यवस्थापनाच्या प्रयत्नांबाबत संबंधितांना इनपुट, सूचना आणि चिंता प्रदान करण्यासाठी फीडबॅक यंत्रणा स्थापित करा. पारदर्शकता आणि उत्तरदायित्व वाढवून, भागधारकांना अद्यतने, प्रगती आणि आव्हाने नियमितपणे संप्रेषण करा.
            </li>
            </ul>
            ',
            'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true, 
        ]);

    }
}