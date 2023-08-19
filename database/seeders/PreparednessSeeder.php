<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HazardVulnerability;
use App\Models\EarlyWarningSystem;
use App\Models\CapacityTraining;
use App\Models\PublicAwarenessEducation;




class PreparednessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HazardVulnerability::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Hazard and Vulnerability Assessment',
            'marathi_title' => 'धोका आणि असुरक्षा मूल्यांकन',
            'english_description' => 'Hazard and vulnerability assessment is a crucial component of preparedness. It involves identifying and evaluating the potential hazards that a particular region or community is exposed to and assessing the vulnerabilities that may amplify the impact of those hazards. This assessment helps in understanding the specific risks and challenges associated with different types of disasters.<br><br>
            The process of hazard and vulnerability assessment typically involves the following steps:<br>
            <ul>
            <li>Hazard Identification: This step involves identifying the various hazards that the region or community is prone to. These can include natural hazards such as earthquakes, floods, cyclones, and droughts, as well as man-made hazards like industrial accidents or chemical spills.</li>
            <li>Risk Assessment: Once the hazards are identified, a risk assessment is conducted to evaluate the likelihood and potential impact of those hazards. This assessment considers factors such as historical data, scientific analysis, and expert opinions to determine the level of risk associated with each hazard.</li>
            <li>Vulnerability Analysis: In this step, the vulnerabilities of the community or infrastructure to the identified hazards are assessed. This involves examining factors such as population density, socio-economic conditions, infrastructure resilience, access to early warning systems, and capacity to respond to emergencies.</li>
            <li>Capacity Assessment: Along with vulnerabilities, the assessment also evaluates the existing capacities and resources available to cope with disasters. This includes assessing the capabilities of emergency response agencies, healthcare facilities, communication systems, and community organizations.</li>
            <li>Action Planning: Based on the hazard and vulnerability assessment, an action plan is developed to address the identified gaps and enhance preparedness. This plan may include measures such as infrastructure improvements, early warning systems, evacuation plans, emergency response training, community awareness campaigns, and resource allocation.</li> 
            </ul>',
            'marathi_description' => 'धोक्याचे आणि असुरक्षिततेचे मूल्यांकन हा सज्जतेचा एक महत्त्वाचा घटक आहे. यामध्ये एखाद्या विशिष्ट प्रदेशाला किंवा समुदायाला ज्या संभाव्य धोक्यांचा सामना करावा लागतो ते ओळखणे आणि त्यांचे मूल्यांकन करणे आणि त्या धोक्यांचा प्रभाव वाढवणाऱ्या असुरक्षिततेचे मूल्यांकन करणे समाविष्ट आहे. हे मूल्यांकन विविध प्रकारच्या आपत्तींशी संबंधित विशिष्ट धोके आणि आव्हाने समजून घेण्यास मदत करते.<br><br>
             धोका आणि असुरक्षा मूल्यांकनाच्या प्रक्रियेमध्ये सामान्यत: खालील चरणांचा समावेश होतो:<br>
             <ul>
             <li>धोक्याची ओळख: या पायरीमध्ये प्रदेश किंवा समुदायाला धोका असलेल्या विविध धोक्यांची ओळख करणे समाविष्ट आहे. यामध्ये भूकंप, पूर, चक्रीवादळ आणि दुष्काळ यासारखे नैसर्गिक धोके तसेच औद्योगिक अपघात किंवा रासायनिक गळती यांसारख्या मानवनिर्मित धोक्यांचा समावेश असू शकतो.</li>
             <li>जोखीम मूल्यमापन: एकदा धोके ओळखल्यानंतर, त्या धोक्यांच्या संभाव्यतेचे आणि संभाव्य परिणामाचे मूल्यांकन करण्यासाठी जोखीम मूल्यांकन केले जाते. हे मूल्यांकन प्रत्येक धोक्याशी संबंधित जोखमीची पातळी निश्चित करण्यासाठी ऐतिहासिक डेटा, वैज्ञानिक विश्लेषण आणि तज्ञांची मते यासारख्या घटकांचा विचार करते.</li>
             <li>असुरक्षितता विश्लेषण: या चरणात, ओळखलेल्या धोक्यांसाठी समुदाय किंवा पायाभूत सुविधांच्या असुरक्षिततेचे मूल्यांकन केले जाते. यामध्ये लोकसंख्येची घनता, सामाजिक-आर्थिक परिस्थिती, पायाभूत सुविधांची लवचिकता, पूर्व चेतावणी प्रणालींमध्ये प्रवेश आणि आणीबाणीला प्रतिसाद देण्याची क्षमता यासारख्या घटकांचे परीक्षण करणे समाविष्ट आहे.</li>
             <li>क्षमता मूल्यमापन: असुरक्षांसोबतच, मूल्यांकनामध्ये आपत्तींचा सामना करण्यासाठी उपलब्ध असलेल्या क्षमता आणि संसाधनांचेही मूल्यमापन केले जाते. यामध्ये आपत्कालीन प्रतिसाद एजन्सी, आरोग्य सुविधा, संप्रेषण प्रणाली आणि समुदाय संस्थांच्या क्षमतांचे मूल्यांकन करणे समाविष्ट आहे.</li>
             <li>कृती नियोजन: धोका आणि असुरक्षिततेच्या मुल्यांकनावर आधारित, ओळखल्या गेलेल्या तफावत दूर करण्यासाठी आणि तयारी वाढवण्यासाठी कृती योजना विकसित केली जाते. या योजनेमध्ये पायाभूत सुविधांमध्ये सुधारणा, पूर्व चेतावणी प्रणाली, निर्वासन योजना, आपत्कालीन प्रतिसाद प्रशिक्षण, समुदाय जागरूकता मोहिमा आणि संसाधनांचे वाटप यासारख्या उपायांचा समावेश असू शकतो.</li>             
             </ul>
            ',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        
        EarlyWarningSystem::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Early Warning Systems',
            'marathi_title' => 'पूर्व चेतावणी प्रणाली',
            'english_description' => 'Early warning systems play a crucial role in preparedness by providing timely and accurate information about potential hazards, allowing communities and authorities to take appropriate actions to protect lives and property.<br><br>
             Early warning systems involve the following key components:<br>
            <ul>
            <li>Hazard Monitoring and Risk Assessment: This involves the continuous monitoring of natural and man-made hazards, such as earthquakes, floods, cyclones, or industrial accidents. Through scientific methods and technologies, risks associated with these hazards are assessed, including their potential severity and impact on vulnerable areas.</li>
            <li>Data Collection and Analysis: Early warning systems rely on the collection and analysis of data from various sources, including meteorological stations, seismological networks, hydrological sensors, and satellite imagery. This data is processed and analyzed to detect patterns, trends, and indicators that could signal the onset of a hazardous event.</li>
            <li>Information Dissemination: Once potential hazards are identified, early warning messages are disseminated to relevant stakeholders, including government agencies, emergency responders, and the public. These warnings may be communicated through various channels such as radio, television, SMS alerts, sirens, mobile applications, and social media platforms.</li>
            <li>Community Preparedness and Response: Early warning systems aim to empower communities to take proactive measures in response to warnings. This involves raising awareness, educating communities about the risks, and providing guidance on evacuation procedures, shelter arrangements, emergency supplies, and communication protocols. </li>
            <li>Institutional Coordination and Capacity Building: Effective early warning systems require coordination among various stakeholders, including government agencies, disaster management authorities, scientific institutions, and community organizations. Capacity building initiatives are essential to train personnel, develop response plans, and establish communication networks for seamless coordination during emergencies.</li> 
            </ul>',
            'marathi_description' => 'पूर्व चेतावणी प्रणाली संभाव्य धोक्यांबद्दल वेळेवर आणि अचूक माहिती प्रदान करून, समुदाय आणि अधिकार्यांना जीवन आणि मालमत्तेचे संरक्षण करण्यासाठी योग्य कृती करण्याची परवानगी देऊन सज्जतेमध्ये महत्त्वपूर्ण भूमिका बजावते.<br><br>
            पूर्व चेतावणी प्रणालीमध्ये खालील प्रमुख घटक समाविष्ट असतात:<br>
             <ul>
             <li>धोक्याचे निरीक्षण आणि जोखीम मूल्यांकन: यामध्ये भूकंप, पूर, चक्रीवादळ किंवा औद्योगिक अपघात यासारख्या नैसर्गिक आणि मानवनिर्मित धोक्यांचे सतत निरीक्षण करणे समाविष्ट आहे. वैज्ञानिक पद्धती आणि तंत्रज्ञानाद्वारे, या धोक्यांशी संबंधित जोखमींचे मूल्यांकन केले जाते, ज्यात त्यांची संभाव्य तीव्रता आणि असुरक्षित क्षेत्रावरील प्रभाव यांचा समावेश होतो.</li>
             <li>डेटा संकलन आणि विश्लेषण: पूर्व चेतावणी प्रणाली हवामान केंद्रे, भूकंपविषयक नेटवर्क, जलविज्ञान सेन्सर आणि उपग्रह प्रतिमा यासह विविध स्त्रोतांकडून डेटाचे संकलन आणि विश्लेषण यावर अवलंबून असतात. या डेटावर प्रक्रिया केली जाते आणि नमुने, ट्रेंड आणि संकेतक शोधण्यासाठी त्याचे विश्लेषण केले जाते जे धोकादायक घटनेच्या प्रारंभाचे संकेत देऊ शकतात.</li>
             <li>माहितीचा प्रसार: संभाव्य धोके ओळखल्यानंतर, सरकारी संस्था, आपत्कालीन प्रतिसादकर्ते आणि जनतेसह संबंधित भागधारकांना पूर्व चेतावणी संदेश प्रसारित केले जातात. हे इशारे रेडिओ, टेलिव्हिजन, एसएमएस अलर्ट, सायरन, मोबाईल ऍप्लिकेशन्स आणि सोशल मीडिया प्लॅटफॉर्म यांसारख्या विविध माध्यमांद्वारे संप्रेषित केले जाऊ शकतात.</li>
             <li>सामुदायिक तयारी आणि प्रतिसाद: पूर्व चेतावणी प्रणालीचे उद्दिष्ट समुदायांना चेतावणींना प्रतिसाद म्हणून सक्रिय उपाययोजना करण्यासाठी सक्षम करणे आहे. यामध्ये जागरूकता वाढवणे, जोखमींबद्दल समुदायांना शिक्षित करणे आणि निर्वासन प्रक्रिया, निवारा व्यवस्था, आपत्कालीन पुरवठा आणि संप्रेषण प्रोटोकॉल यावर मार्गदर्शन करणे समाविष्ट आहे.</li>
             <li>संस्थात्मक समन्वय आणि क्षमता निर्माण: प्रभावी पूर्व चेतावणी प्रणालींना सरकारी संस्था, आपत्ती व्यवस्थापन अधिकारी, वैज्ञानिक संस्था आणि समुदाय संस्थांसह विविध भागधारकांमध्ये समन्वय आवश्यक आहे. कर्मचार्‍यांना प्रशिक्षित करण्यासाठी, प्रतिसाद योजना विकसित करण्यासाठी आणि आणीबाणीच्या काळात अखंड समन्वयासाठी संप्रेषण नेटवर्क स्थापित करण्यासाठी क्षमता निर्माण उपक्रम आवश्यक आहेत.</li>             
             </ul>
            ',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        CapacityTraining::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Capacity Building and Training',
            'marathi_title' => 'क्षमता निर्माण आणि प्रशिक्षण',
            'english_description' => 'Capacity building and training play a crucial role in preparedness efforts. Here an explanation of preparedness through capacity building and training in the context of disaster management:<br><br>
             <b>Capacity Building:</b> Capacity building refers to the process of strengthening the knowledge, skills, resources, and capabilities of individuals, organizations, and systems involved in disaster management. It involves activities aimed at enhancing preparedness, response, and recovery capacities at various levels. Capacity building initiatives may include:<br>
            <ul>
            <li><b>Training programs:</b> Conducting training sessions and workshops to educate individuals and organizations on disaster management concepts, techniques, and best practices. This can include training on early warning systems, evacuation procedures, first aid, search and rescue techniques, incident management, and other relevant skills.</li>
            <li><b>Institutional strengthening:</b> Supporting and strengthening the capacity of government agencies, emergency services, and disaster management authorities through policy development, resource allocation, and organizational enhancements. This may involve establishing dedicated disaster management departments, improving coordination mechanisms, and ensuring adequate resources and infrastructure are in place.</li>
            <li><b>Community engagement:</b> Engaging and empowering local communities to actively participate in disaster preparedness efforts. This can include community-based training programs, awareness campaigns, establishment of local emergency response teams, and promoting community resilience through initiatives like hazard mapping, early warning dissemination, and disaster drills. </li>
            <li><b>Technical assistance:</b> Providing technical support and expertise to enhance the capacity of stakeholders involved in disaster management. This can involve sharing best practices, conducting assessments and evaluations, developing guidelines and protocols, and facilitating knowledge exchange among practitioners and experts.</li>
            </ul><br><br>
            <b>Training:</b> Training plays a vital role in equipping individuals and organizations with the necessary skills and knowledge to respond effectively during disasters. Training programs may cover a wide range of topics, including:<br>
            <ul>
            <li><b>Emergency response procedures:</b> Training individuals on the appropriate actions to take during different types of emergencies, such as fire safety, evacuation procedures, and first aid.</li> 
            <li><b>Incident command system:</b> Providing training on incident management structures, roles, and responsibilities to ensure effective coordination and communication during emergencies.</li>
            <li><b>Technical skills:</b> Offering specialized training on specific tasks and techniques relevant to disaster management, such as search and rescue, medical triage, hazardous material handling, and damage assessment.</li>
            <li><b>Risk assessment and mitigation:</b> Training individuals in assessing risks, identifying vulnerabilities, and implementing measures to reduce the impact of disasters. This can include training on hazard identification, vulnerability mapping, land-use planning, and infrastructure design. </li>
            <li><b>Community preparedness:</b> Conducting training sessions at the community level to educate residents on disaster preparedness, response procedures, and self-help measures. This empowers communities to be proactive and resilient in the face of disasters.</li>
            </ul>',
            'marathi_description' => 'तयारीच्या प्रयत्नांमध्ये क्षमता निर्माण आणि प्रशिक्षण महत्त्वपूर्ण भूमिका बजावतात. आपत्ती व्यवस्थापनाच्या संदर्भात क्षमता निर्माण आणि प्रशिक्षणाद्वारे सज्जतेचे स्पष्टीकरण येथे आहे:<br><br>
             <b>क्षमता निर्माण:</b> आपत्ती व्यवस्थापनामध्ये सामील असलेल्या व्यक्ती, संस्था आणि यंत्रणा यांचे ज्ञान, कौशल्ये, संसाधने आणि क्षमता मजबूत करण्याच्या प्रक्रियेला क्षमता निर्माण करणे होय. यामध्ये विविध स्तरांवर सज्जता, प्रतिसाद आणि पुनर्प्राप्ती क्षमता वाढविण्याच्या उद्देशाने क्रियाकलापांचा समावेश आहे. क्षमता निर्माण उपक्रमांमध्ये हे समाविष्ट असू शकते:<br>
             <ul>
             <li><b>प्रशिक्षण कार्यक्रम:</b> व्यक्ती आणि संस्थांना आपत्ती व्यवस्थापन संकल्पना, तंत्रे आणि सर्वोत्तम पद्धतींबद्दल शिक्षित करण्यासाठी प्रशिक्षण सत्रे आणि कार्यशाळा आयोजित करणे. यामध्ये लवकर चेतावणी प्रणाली, निर्वासन प्रक्रिया, प्रथमोपचार, शोध आणि बचाव तंत्र, घटना व्यवस्थापन आणि इतर संबंधित कौशल्ये यावरील प्रशिक्षण समाविष्ट असू शकते.</li>
             <li><b>संस्थात्मक बळकटीकरण:</b> धोरण विकास, संसाधन वाटप आणि संघटनात्मक सुधारणांद्वारे सरकारी संस्था, आपत्कालीन सेवा आणि आपत्ती व्यवस्थापन प्राधिकरणांच्या क्षमतेस समर्थन आणि मजबूत करणे. यामध्ये समर्पित आपत्ती व्यवस्थापन विभाग स्थापन करणे, समन्वय यंत्रणा सुधारणे आणि पुरेशी संसाधने आणि पायाभूत सुविधा उपलब्ध असल्याची खात्री करणे यांचा समावेश असू शकतो.</li>
             <li><b>सामुदायिक सहभाग:</b> आपत्ती सज्जता प्रयत्नांमध्ये सक्रियपणे सहभागी होण्यासाठी स्थानिक समुदायांना गुंतवून ठेवणे आणि सक्षम करणे. यामध्ये समुदाय-आधारित प्रशिक्षण कार्यक्रम, जागरुकता मोहिमा, स्थानिक आपत्कालीन प्रतिसाद संघांची स्थापना आणि धोका मॅपिंग, पूर्व चेतावणी प्रसार आणि आपत्ती कवायती यांसारख्या उपक्रमांद्वारे समुदायातील लवचिकतेला प्रोत्साहन देणे समाविष्ट असू शकते.</li>
             <li><b>तांत्रिक सहाय्य:</b> आपत्ती व्यवस्थापनामध्ये सहभागी असलेल्या भागधारकांची क्षमता वाढविण्यासाठी तांत्रिक सहाय्य आणि कौशल्य प्रदान करणे. यामध्ये सर्वोत्तम पद्धती सामायिक करणे, मूल्यांकन आणि मूल्यमापन आयोजित करणे, मार्गदर्शक तत्त्वे आणि प्रोटोकॉल विकसित करणे आणि अभ्यासक आणि तज्ञांमध्ये ज्ञानाची देवाणघेवाण सुलभ करणे समाविष्ट असू शकते. </li>
             </ul><br><br>
             <b>प्रशिक्षण:</b> आपत्तींच्या वेळी प्रभावीपणे प्रतिसाद देण्यासाठी आवश्यक कौशल्ये आणि ज्ञानाने व्यक्ती आणि संस्थांना सुसज्ज करण्यात प्रशिक्षण महत्त्वपूर्ण भूमिका बजावते. प्रशिक्षण कार्यक्रमांमध्ये विविध विषयांचा समावेश असू शकतो, यासह:<br>
             <li><b>आपत्कालीन प्रतिसाद प्रक्रिया:</b> आग सुरक्षा, निर्वासन प्रक्रिया आणि प्रथमोपचार यांसारख्या विविध प्रकारच्या आपत्कालीन परिस्थितीत करावयाच्या योग्य कृतींबद्दल व्यक्तींना प्रशिक्षण देणे.</li>
             <li><b>घटना आदेश प्रणाली:</b> आपत्कालीन परिस्थितीत प्रभावी समन्वय आणि संवाद सुनिश्चित करण्यासाठी घटना व्यवस्थापन संरचना, भूमिका आणि जबाबदाऱ्यांचे प्रशिक्षण प्रदान करणे. </li>
             <li><b>तांत्रिक कौशल्ये:</b> आपत्ती व्यवस्थापनाशी संबंधित विशिष्ट कार्ये आणि तंत्रांवर विशेष प्रशिक्षण देणे, जसे की शोध आणि बचाव, वैद्यकीय चाचणी, धोकादायक सामग्री हाताळणी आणि नुकसानीचे मूल्यांकन.</li>
             <li><b>जोखीम मूल्यांकन आणि कमी करणे:</b> व्यक्तींना जोखमीचे मूल्यांकन करणे, असुरक्षा ओळखणे आणि आपत्तींचा प्रभाव कमी करण्यासाठी उपाययोजना अंमलात आणण्याचे प्रशिक्षण देणे. यामध्ये धोक्याची ओळख, असुरक्षितता मॅपिंग, जमीन-वापराचे नियोजन आणि पायाभूत सुविधांची रचना यावरील प्रशिक्षणाचा समावेश असू शकतो.</li>
             <li><b>समुदाय सज्जता:</b> रहिवाशांना आपत्ती सज्जता, प्रतिसाद प्रक्रिया आणि स्वयं-मदत उपायांबद्दल शिक्षित करण्यासाठी समुदाय स्तरावर प्रशिक्षण सत्र आयोजित करणे. हे समुदायांना आपत्तींचा सामना करण्यासाठी सक्रिय आणि लवचिक होण्यासाठी सक्षम करते.</li>         
             </ul>
            ',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        PublicAwarenessEducation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Public Awareness and Education',
            'marathi_title' => 'जनजागृती आणि शिक्षण',
            'english_description' => 'Public awareness and education play a crucial role in preparedness efforts. Heres an explanation of how public awareness and education contribute to disaster preparedness:<br>
            <ul>
            <li>Risk Communication: Public awareness programs educate communities about potential risks and hazards they may face, such as floods, earthquakes, or cyclones. This includes disseminating information on the likelihood and potential impacts of disasters, as well as providing guidance on preparedness measures, evacuation procedures, and early warning systems. Effective risk communication helps individuals and communities understand the importance of preparedness and take appropriate actions to mitigate risks.
            </li>
            <li>Knowledge and Skills: Public awareness and education initiatives aim to equip individuals with the knowledge and skills needed to respond effectively during disasters. This includes teaching basic first aid, search and rescue techniques, evacuation procedures, and how to access emergency services. By increasing the knowledge and skills of the public, communities become more self-reliant and better prepared to handle emergency situations.
            </li>
            <li>Community Engagement: Public awareness programs encourage community engagement and foster a sense of collective responsibility for disaster preparedness. Through workshops, seminars, and community meetings, individuals can come together to discuss local vulnerabilities, develop emergency plans, and establish communication networks. Building a resilient community requires active participation and collaboration among its members.
            </li>
            <li>Early Warning Systems: Public awareness campaigns educate individuals on the significance of early warning systems and how to respond to alerts. This includes understanding different warning signals, knowing evacuation routes, and being aware of safe shelters. By promoting public awareness of early warning systems, communities can respond promptly and effectively to imminent threats, reducing the potential impact of disasters.
            </li>
            <li>Sustainable Practices: Public education initiatives can also promote sustainable practices that contribute to long-term disaster preparedness. This includes encouraging measures such as proper waste management, conservation of water resources, and building resilience in infrastructure and housing. By adopting sustainable practices, communities can reduce vulnerabilities and enhance their ability to withstand and recover from disasters.
            </li> 
            </ul>
            ',
            'marathi_description' => 'जनजागृती आणि शिक्षण सज्जतेच्या प्रयत्नांमध्ये महत्त्वाची भूमिका बजावतात. सार्वजनिक जागरूकता आणि शिक्षण आपत्ती सज्जतेमध्ये कसे योगदान देतात याचे स्पष्टीकरण येथे आहे:<br>
            <ul>
            <li>जोखीम संप्रेषण: सार्वजनिक जागरूकता कार्यक्रम समुदायांना पूर, भूकंप किंवा चक्रीवादळ यांसारख्या संभाव्य जोखीम आणि धोक्यांबद्दल शिक्षित करतात. यामध्ये आपत्तींच्या संभाव्यता आणि संभाव्य परिणामांबद्दल माहिती प्रसारित करणे, तसेच सज्जता उपाय, निर्वासन प्रक्रिया आणि पूर्व चेतावणी प्रणाली यावर मार्गदर्शन प्रदान करणे समाविष्ट आहे. प्रभावी जोखीम संप्रेषण व्यक्ती आणि समुदायांना सज्जतेचे महत्त्व समजण्यास आणि जोखीम कमी करण्यासाठी योग्य कृती करण्यास मदत करते.
            </li>
            <li>ज्ञान आणि कौशल्ये: सार्वजनिक जागृती आणि शैक्षणिक उपक्रमांचे उद्दिष्ट व्यक्तींना आपत्तींच्या वेळी प्रभावीपणे प्रतिसाद देण्यासाठी आवश्यक ज्ञान आणि कौशल्ये सुसज्ज करणे आहे. यामध्ये मूलभूत प्रथमोपचार, शोध आणि बचाव तंत्र, निर्वासन प्रक्रिया आणि आपत्कालीन सेवांमध्ये प्रवेश कसा करावा हे शिकवणे समाविष्ट आहे. लोकांचे ज्ञान आणि कौशल्ये वाढवून, समुदाय अधिक स्वावलंबी बनतात आणि आपत्कालीन परिस्थिती हाताळण्यासाठी अधिक चांगले तयार होतात.
            </li>
            <li>सामुदायिक सहभाग: जनजागृती कार्यक्रम समुदाय सहभागाला प्रोत्साहन देतात आणि आपत्ती सज्जतेसाठी सामूहिक जबाबदारीची भावना वाढवतात. कार्यशाळा, परिसंवाद आणि सामुदायिक बैठकांद्वारे, व्यक्ती स्थानिक असुरक्षिततेवर चर्चा करण्यासाठी, आपत्कालीन योजना विकसित करण्यासाठी आणि संप्रेषण नेटवर्क स्थापित करण्यासाठी एकत्र येऊ शकतात. एक लवचिक समुदाय तयार करण्यासाठी त्याच्या सदस्यांमध्ये सक्रिय सहभाग आणि सहयोग आवश्यक आहे.
            </li>
            <li>अर्ली वॉर्निंग सिस्टीम्स: जनजागृती मोहिमा लोकांना लवकर चेतावणी प्रणालीचे महत्त्व आणि इशाऱ्यांना कसा प्रतिसाद द्यावा याबद्दल शिक्षित करतात. यामध्ये विविध चेतावणी सिग्नल समजून घेणे, निर्वासन मार्ग जाणून घेणे आणि सुरक्षित आश्रयस्थानांबद्दल जागरूक असणे समाविष्ट आहे. पूर्व चेतावणी प्रणालींबद्दल सार्वजनिक जागरूकता वाढवून, समुदाय आपत्तींचा संभाव्य प्रभाव कमी करून, आसन्न धोक्यांना त्वरित आणि प्रभावीपणे प्रतिसाद देऊ शकतात.
            </li>
            <li>शाश्वत पद्धती: सार्वजनिक शिक्षण उपक्रम दीर्घकालीन आपत्ती सज्जतेमध्ये योगदान देणाऱ्या शाश्वत पद्धतींना प्रोत्साहन देऊ शकतात. यामध्ये योग्य कचरा व्यवस्थापन, जलस्रोतांचे संवर्धन आणि पायाभूत सुविधा आणि घरांमध्ये लवचिकता निर्माण करणे यासारख्या प्रोत्साहनात्मक उपायांचा समावेश आहे. शाश्वत पद्धतींचा अवलंब करून, समुदाय असुरक्षा कमी करू शकतात आणि आपत्तींना तोंड देण्याची आणि त्यातून सावरण्याची त्यांची क्षमता वाढवू शकतात.
            </li>
            </ul>
            ',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}