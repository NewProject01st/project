

CREATE TABLE `addmore_emergency_contact_numbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `emergency_contact_id` bigint(20) unsigned NOT NULL,
  `english_emergency_contact_title` varchar(255) NOT NULL,
  `marathi_emergency_contact_title` varchar(255) NOT NULL,
  `english_emergency_contact_number` varchar(255) NOT NULL,
  `marathi_emergency_contact_number` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addmore_emergency_contact_numbers_emergency_contact_id_foreign` (`emergency_contact_id`),
  CONSTRAINT `addmore_emergency_contact_numbers_emergency_contact_id_foreign` FOREIGN KEY (`emergency_contact_id`) REFERENCES `emergency_contact_numbers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `capacity_trainings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO capacity_trainings (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Capacity Building and Training','क्षमता निर्माण आणि प्रशिक्षण','Capacity building and training play a crucial role in preparedness efforts. Here an explanation of preparedness through capacity building and training in the context of disaster management:<br><br>
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
            </ul>','तयारीच्या प्रयत्नांमध्ये क्षमता निर्माण आणि प्रशिक्षण महत्त्वपूर्ण भूमिका बजावतात. आपत्ती व्यवस्थापनाच्या संदर्भात क्षमता निर्माण आणि प्रशिक्षणाद्वारे सज्जतेचे स्पष्टीकरण येथे आहे:<br><br>
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
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `citizen_feedback_suggestion_modals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `incident` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `media_upload` varchar(255) NOT NULL DEFAULT 'null',
  `description` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `citizen_feedback_suggestions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO citizen_feedback_suggestions (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Feedback and suggestions','अभिप्राय आणि सूचना','Feedback and suggestions play a vital role in improving disaster management strategies and enhancing overall preparedness and response capabilities. Here are some feedback and suggestions that can contribute to effective disaster management:<br>
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
            </ul>','आपत्ती व्यवस्थापन धोरणे सुधारण्यात आणि एकूण तयारी आणि प्रतिसाद क्षमता वाढवण्यात अभिप्राय आणि सूचना महत्त्वाची भूमिका बजावतात. येथे काही अभिप्राय आणि सूचना आहेत ज्या प्रभावी आपत्ती व्यवस्थापनात योगदान देऊ शकतात:<br>
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `citizen_volunteer_modals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `incident` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `media_upload` varchar(255) NOT NULL DEFAULT 'null',
  `description` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `contact_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `suggestion` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO contact (id, full_name, email, mobile_number, contact_type, subject, suggestion, is_deleted, is_active, created_at, updated_at) VALUES ('1','asdasd','asdas@gmail.com','4234234234','Feedback','dasdasda','asdasdasdas','0','1','2023-06-16 13:51:59','2023-06-16 13:51:59');

INSERT INTO contact (id, full_name, email, mobile_number, contact_type, subject, suggestion, is_deleted, is_active, created_at, updated_at) VALUES ('2','Amol Pawar','amol@gmail.com','9420829252','Feedback','Amol','Suggestion','0','1','2023-06-16 14:15:32','2023-06-16 14:15:32');


CREATE TABLE `department_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `english_image_new` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image_new` varchar(255) NOT NULL DEFAULT 'null',
  `url` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('1','Emergency Department','आपत्कालीन विभाग','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon1.png','deprticon1.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('2','Public Health Department','सार्वजनिक आरोग्य विभाग','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon2.png','deprticon2.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('3','Information Desk/Hotline','माहिती डेस्क/हॉटलाइन','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon3.png','deprticon3.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('4','Police Department','पोलीस विभाग','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon4.png','deprticon4.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('5','National Guard','नॅशनल गार्ड','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon5.png','deprticon5.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('6','Fire Department','अग्निशमन विभाग','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','deprticon6.png','deprticon6.png','1_english.png','1_marathi.png','READ MORE','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('7','<p>dasdas</p>','<p>dasdasd</p>','<p>asdasdas</p>','<p>dasdas</p>','7_english.jpg','7_marathi.jpg','7_english1.jpg','7_marathi1.jpg','www.gmail.com','1','1','2023-06-16 10:15:08','2023-06-16 10:15:08');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('8','<p>dasdas</p>','<p>dasdasd</p>','<p>asdasdas</p>','<p>dasdas</p>','8_english.jpg','8_marathi.jpg','8_english1.jpg','8_marathi1.jpg','www.gmail.com','1','1','2023-06-16 10:15:40','2023-06-16 10:15:40');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('9','<p>dasdas</p>','<p>dasdasd</p>','<p>asdasdas</p>','<p>dasdas</p>','9_english.jpg','9_marathi.jpg','9_english1.jpg','9_marathi1.jpg','www.gmail.com','1','1','2023-06-16 10:15:53','2023-06-16 10:15:53');

INSERT INTO department_information (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_image_new, marathi_image_new, url, is_deleted, is_active, created_at, updated_at) VALUES ('10','<p>asfasf</p>','<p>asffasfas</p>','<p>fasfasfa</p>','<p>asffasfasfafsfas</p>','10_english.jpg','10_marathi.png','10_english1.png','10_marathi1.png','asdasdasdasdasd','1','1','2023-06-17 07:25:13','2023-06-17 07:25:13');


CREATE TABLE `disaster_forcast` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO disaster_forcast (id, english_description, marathi_description, is_deleted, is_active, created_at, updated_at) VALUES ('1','Cyclone Biparjoy moved after Gujarat. Vigilance warning to 4 states','बिपरजॉय चक्रीवादळ गुजरातनंतर सरकले. 4 राज्यांना सतर्कतेचा इशारा ','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `disaster_management_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_url` varchar(255) NOT NULL,
  `disaster_date` varchar(255) NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO disaster_management_news (id, english_title, marathi_title, english_description, marathi_description, english_url, disaster_date, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Maharashtra Battles Forest Fires','महाराष्ट्र जंगलातील आगीशी लढत आहे','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','disaster','5 MAY,2023','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO disaster_management_news (id, english_title, marathi_title, english_description, marathi_description, english_url, disaster_date, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('2','Kerala floods displace thousands','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure. ','ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.','disaster','5 MAY,2023','2_english.jpeg','2_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO disaster_management_news (id, english_title, marathi_title, english_description, marathi_description, english_url, disaster_date, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('3','Odisha prepares for Cyclone Yaas','ओडिशा यास चक्रीवादळाची तयारी करत आहे','In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.','मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.','disaster','5 MAY,2023','3_english.jpeg','3_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO disaster_management_news (id, english_title, marathi_title, english_description, marathi_description, english_url, disaster_date, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('4','Assam flood situation remains critical','आसाममध्ये पूरस्थिती कायम आहे','In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure.','2021 मध्ये, आसामला अतिवृष्टीमुळे गंभीर पुराचा सामना करावा लागला, अनेक लोक विस्थापित झाले आणि घरे आणि पायाभूत सुविधांचे नुकसान झाले.','disaster','5 MAY,2023','2_english.jpeg','2_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `disaster_management_portal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO disaster_management_portal (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Introduction to the Disaster Management Portal','आपत्ती व्यवस्थापन पोर्टलची ओळख','The Disaster Management Portal is a comprehensive online platform designed to facilitate efficient and organized management of disasters. It serves as a centralized hub for disaster-related information, coordination, and collaboration among various stakeholders involved in disaster management, including government agencies, relief organizations, emergency services, and the general public. The portal aims to enhance preparedness, response, and recovery efforts by providing timely and accurate information, tools, and resources.<br>

            The primary objective of the Disaster Management Portal is to ensure effective disaster management by enabling quick and coordinated actions during emergencies. It serves as a vital communication channel, delivering real-time alerts, notifications, and updates to users about disasters occurring in their area. This feature helps individuals and communities stay informed and take necessary precautions or actions to ensure their safety.<br>
            
            One of the key functionalities of the portal is the incident reporting system. Users can report incidents related to disasters, such as earthquakes, floods, fires, or any other emergencies they come across. They can provide essential details about the incident, including its location, severity, and any other relevant information. "
            ','आपत्ती व्यवस्थापन पोर्टल हे एक सर्वसमावेशक ऑनलाइन प्लॅटफॉर्म आहे जे आपत्तींचे कार्यक्षम आणि संघटित व्यवस्थापन सुलभ करण्यासाठी डिझाइन केलेले आहे. हे आपत्ती-संबंधित माहिती, समन्वय आणि सरकारी संस्था, मदत संस्था, आपत्कालीन सेवा आणि सामान्य जनता यासह आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध भागधारकांमध्ये एक केंद्रीकृत केंद्र म्हणून काम करते. वेळेवर आणि अचूक माहिती, साधने आणि संसाधने प्रदान करून सज्जता, प्रतिसाद आणि पुनर्प्राप्ती प्रयत्न वाढवणे हे पोर्टलचे उद्दिष्ट आहे.<br>
            आपत्ती व्यवस्थापन पोर्टलचे प्राथमिक उद्दिष्ट आपत्कालीन परिस्थितीत जलद आणि समन्वित कृती सक्षम करून प्रभावी आपत्ती व्यवस्थापन सुनिश्चित करणे आहे. हे एक महत्त्वपूर्ण संप्रेषण चॅनेल म्हणून काम करते, रीअल-टाइम अलर्ट, सूचना आणि वापरकर्त्यांना त्यांच्या क्षेत्रातील आपत्तींबद्दल अद्यतने वितरीत करते. हे वैशिष्‍ट्य व्‍यक्‍ती आणि समुदायांना माहिती ठेवण्‍यात आणि त्‍यांची सुरक्षितता सुनिश्चित करण्‍यासाठी आवश्‍यक खबरदारी किंवा कृती करण्‍यात मदत करते.<br>
            पोर्टलच्या मुख्य कार्यांपैकी एक म्हणजे घटना अहवाल प्रणाली. वापरकर्ते आपत्तींशी संबंधित घटनांची तक्रार करू शकतात, जसे की भूकंप, पूर, आग किंवा इतर कोणत्याही आपत्कालीन परिस्थिती. ते घटनेचे स्थान, तीव्रता आणि इतर कोणत्याही संबंधित माहितीसह आवश्यक तपशील प्रदान करू शकतात. "

            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:28','2023-06-16 10:14:28');


CREATE TABLE `disaster_management_web_portals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_name` varchar(255) NOT NULL,
  `marathi_name` varchar(255) NOT NULL,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_designation` varchar(255) NOT NULL,
  `marathi_designation` varchar(255) NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO disaster_management_web_portals (id, english_name, marathi_name, english_title, marathi_title, english_description, marathi_description, english_designation, marathi_designation, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Jhon Sharma',' ABC ','Welcome to Visit Disaster Management Web Portal',' आपत्ती व्यवस्थापन वेब पोर्टलवर आपले स्वागत आहे','To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.','सर्व स्टेकहोल्डर्सचा समावेश असलेल्या आणि प्रतिबंध, सज्जता आणि शमन करण्याची संस्कृती वाढवणाऱ्या सर्वांगीण, सक्रिय, तंत्रज्ञानावर आधारित आणि शाश्वत विकास धोरणाद्वारे सुरक्षित आणि आपत्ती प्रतिरोधक भारताची निर्मिती करणे.','Project Manager ','प्रकल्प व्यवस्थापक ','head_english.png','head_marathi.png','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `district_disaster_management_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO district_disaster_management_plans (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1',' District Disaster Management Plans','जिल्हा आपत्ती व्यवस्थापन योजना','District Disaster Management Plans (DDMPs) are an integral part of the states policies and legislation for disaster management. These plans are designed to ensure preparedness, response, and recovery in the event of a disaster at the district level. Heres an overview of DDMPs according to Maharashtras policies and legislation:
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
            </ul>','जिल्हा आपत्ती व्यवस्थापन योजना (DDMPs) हे आपत्ती व्यवस्थापनासाठी राज्याच्या धोरणांचा आणि कायद्याचा अविभाज्य भाग आहेत. या योजना जिल्हा स्तरावर आपत्तीच्या प्रसंगी सज्जता, प्रतिसाद आणि पुनर्प्राप्ती सुनिश्चित करण्यासाठी तयार केल्या आहेत. महाराष्ट्राची धोरणे आणि कायद्यानुसार DDMP चे विहंगावलोकन येथे आहे:
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
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `district_emergency_operations_center` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO district_emergency_operations_center (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','District Emergency Operations Center(DEOC)','जिल्हा आपत्कालीन ऑपरेशन केंद्र (DEOC)','A District Emergency Operations Center (DEOC) is a key component of the disaster emergency response system. It serves as a centralized coordination and decision-making hub at the district level during emergencies or disasters. The DEOC plays a crucial role in facilitating effective emergency response, resource management, and communication among various stakeholders involved in disaster management. Here are some important aspects of a DEOC and its functions:<br>
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
            ','डिस्ट्रिक्ट इमर्जन्सी ऑपरेशन्स सेंटर (DEOC) हे आपत्ती आपत्कालीन प्रतिसाद प्रणालीचा एक प्रमुख घटक आहे. हे आणीबाणी किंवा आपत्तींच्या वेळी जिल्हा स्तरावर केंद्रीकृत समन्वय आणि निर्णय घेण्याचे केंद्र म्हणून काम करते. आपत्ती व्यवस्थापनात गुंतलेल्या विविध भागधारकांमध्ये प्रभावी आपत्कालीन प्रतिसाद, संसाधन व्यवस्थापन आणि संवाद साधण्यात DEOC महत्त्वपूर्ण भूमिका बजावते. येथे DEOC चे काही महत्वाचे पैलू आणि त्याची कार्ये आहेत:<br>
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `documentspublications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO documentspublications (id, english_title, marathi_title, english_description, marathi_description, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('1','Maharashtra Battles Forest Fires','महाराष्ट्र जंगलातील आगीशी लढत आहे','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army.','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','Maharashtra Battles Forest Fires.pdf','Maharashtra Battles Forest Fires.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO documentspublications (id, english_title, marathi_title, english_description, marathi_description, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('2','Kerala floods displace thousands ','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure.','ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.','Kerala floods displace thousands.pdf','Kerala floods displace thousands.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO documentspublications (id, english_title, marathi_title, english_description, marathi_description, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('3','Odisha prepares for Cyclone Yaas ','ओडिशा यास चक्रीवादळाची तयारी करत आहे ','In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.','मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.',' Odisha prepares for Cyclone Yaas.pdf',' Odisha prepares for Cyclone Yaas.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO documentspublications (id, english_title, marathi_title, english_description, marathi_description, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('4','test document','चाचणी दस्तऐवज ','In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure.','2021 मध्ये, आसामला अतिवृष्टीमुळे गंभीर पुराचा सामना करावा लागला, अनेक लोक विस्थापित झाले आणि घरे आणि पायाभूत सुविधांचे नुकसान झाले.','Test Document.pdf','Test Document.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `dynamic_web_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL DEFAULT 'null',
  `menu_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `menu_name` varchar(255) NOT NULL DEFAULT 'null',
  `slug` varchar(255) NOT NULL,
  `actual_page_name_marathi` varchar(255) NOT NULL,
  `actual_page_name_english` varchar(255) NOT NULL,
  `publish_date` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dynamic_web_pages_slug_unique` (`slug`),
  UNIQUE KEY `dynamic_web_pages_actual_page_name_marathi_unique` (`actual_page_name_marathi`),
  UNIQUE KEY `dynamic_web_pages_actual_page_name_english_unique` (`actual_page_name_english`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `early_warning_systems` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO early_warning_systems (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Early Warning Systems','पूर्व चेतावणी प्रणाली','Early warning systems play a crucial role in preparedness by providing timely and accurate information about potential hazards, allowing communities and authorities to take appropriate actions to protect lives and property.<br><br>
             Early warning systems involve the following key components:<br>
            <ul>
            <li>Hazard Monitoring and Risk Assessment: This involves the continuous monitoring of natural and man-made hazards, such as earthquakes, floods, cyclones, or industrial accidents. Through scientific methods and technologies, risks associated with these hazards are assessed, including their potential severity and impact on vulnerable areas.</li>
            <li>Data Collection and Analysis: Early warning systems rely on the collection and analysis of data from various sources, including meteorological stations, seismological networks, hydrological sensors, and satellite imagery. This data is processed and analyzed to detect patterns, trends, and indicators that could signal the onset of a hazardous event.</li>
            <li>Information Dissemination: Once potential hazards are identified, early warning messages are disseminated to relevant stakeholders, including government agencies, emergency responders, and the public. These warnings may be communicated through various channels such as radio, television, SMS alerts, sirens, mobile applications, and social media platforms.</li>
            <li>Community Preparedness and Response: Early warning systems aim to empower communities to take proactive measures in response to warnings. This involves raising awareness, educating communities about the risks, and providing guidance on evacuation procedures, shelter arrangements, emergency supplies, and communication protocols. </li>
            <li>Institutional Coordination and Capacity Building: Effective early warning systems require coordination among various stakeholders, including government agencies, disaster management authorities, scientific institutions, and community organizations. Capacity building initiatives are essential to train personnel, develop response plans, and establish communication networks for seamless coordination during emergencies.</li> 
            </ul>','पूर्व चेतावणी प्रणाली संभाव्य धोक्यांबद्दल वेळेवर आणि अचूक माहिती प्रदान करून, समुदाय आणि अधिकार्यांना जीवन आणि मालमत्तेचे संरक्षण करण्यासाठी योग्य कृती करण्याची परवानगी देऊन सज्जतेमध्ये महत्त्वपूर्ण भूमिका बजावते.<br><br>
            पूर्व चेतावणी प्रणालीमध्ये खालील प्रमुख घटक समाविष्ट असतात:<br>
             <ul>
             <li>धोक्याचे निरीक्षण आणि जोखीम मूल्यांकन: यामध्ये भूकंप, पूर, चक्रीवादळ किंवा औद्योगिक अपघात यासारख्या नैसर्गिक आणि मानवनिर्मित धोक्यांचे सतत निरीक्षण करणे समाविष्ट आहे. वैज्ञानिक पद्धती आणि तंत्रज्ञानाद्वारे, या धोक्यांशी संबंधित जोखमींचे मूल्यांकन केले जाते, ज्यात त्यांची संभाव्य तीव्रता आणि असुरक्षित क्षेत्रावरील प्रभाव यांचा समावेश होतो.</li>
             <li>डेटा संकलन आणि विश्लेषण: पूर्व चेतावणी प्रणाली हवामान केंद्रे, भूकंपविषयक नेटवर्क, जलविज्ञान सेन्सर आणि उपग्रह प्रतिमा यासह विविध स्त्रोतांकडून डेटाचे संकलन आणि विश्लेषण यावर अवलंबून असतात. या डेटावर प्रक्रिया केली जाते आणि नमुने, ट्रेंड आणि संकेतक शोधण्यासाठी त्याचे विश्लेषण केले जाते जे धोकादायक घटनेच्या प्रारंभाचे संकेत देऊ शकतात.</li>
             <li>माहितीचा प्रसार: संभाव्य धोके ओळखल्यानंतर, सरकारी संस्था, आपत्कालीन प्रतिसादकर्ते आणि जनतेसह संबंधित भागधारकांना पूर्व चेतावणी संदेश प्रसारित केले जातात. हे इशारे रेडिओ, टेलिव्हिजन, एसएमएस अलर्ट, सायरन, मोबाईल ऍप्लिकेशन्स आणि सोशल मीडिया प्लॅटफॉर्म यांसारख्या विविध माध्यमांद्वारे संप्रेषित केले जाऊ शकतात.</li>
             <li>सामुदायिक तयारी आणि प्रतिसाद: पूर्व चेतावणी प्रणालीचे उद्दिष्ट समुदायांना चेतावणींना प्रतिसाद म्हणून सक्रिय उपाययोजना करण्यासाठी सक्षम करणे आहे. यामध्ये जागरूकता वाढवणे, जोखमींबद्दल समुदायांना शिक्षित करणे आणि निर्वासन प्रक्रिया, निवारा व्यवस्था, आपत्कालीन पुरवठा आणि संप्रेषण प्रोटोकॉल यावर मार्गदर्शन करणे समाविष्ट आहे.</li>
             <li>संस्थात्मक समन्वय आणि क्षमता निर्माण: प्रभावी पूर्व चेतावणी प्रणालींना सरकारी संस्था, आपत्ती व्यवस्थापन अधिकारी, वैज्ञानिक संस्था आणि समुदाय संस्थांसह विविध भागधारकांमध्ये समन्वय आवश्यक आहे. कर्मचार्‍यांना प्रशिक्षित करण्यासाठी, प्रतिसाद योजना विकसित करण्यासाठी आणि आणीबाणीच्या काळात अखंड समन्वयासाठी संप्रेषण नेटवर्क स्थापित करण्यासाठी क्षमता निर्माण उपक्रम आवश्यक आहेत.</li>             
             </ul>
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `emergency_contact_numbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO emergency_contact_numbers (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Emergency Contact Numbers','प्राथमिक आपत्कालीन संपर्क क्रमांक','During emergencies, it is crucial to have access to reliable and immediate assistance. Here are some commonly used emergency contact numbers in various disaster situations:<br>
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
            ','आणीबाणीच्या काळात, विश्वासार्ह आणि तात्काळ मदत मिळणे महत्त्वाचे आहे. विविध आपत्ती परिस्थितीत येथे काही सामान्यपणे वापरले जाणारे आपत्कालीन संपर्क क्रमांक आहेत:<br>
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `emergency_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `marathi_name` varchar(255) NOT NULL,
  `english_address` text NOT NULL,
  `marathi_address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `english_number` varchar(255) NOT NULL,
  `marathi_number` varchar(255) NOT NULL,
  `english_landline_no` varchar(255) NOT NULL,
  `marathi_landline_no` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO emergency_contacts (id, english_title, marathi_title, english_name, marathi_name, english_address, marathi_address, email, english_number, marathi_number, english_landline_no, marathi_landline_no, is_deleted, is_active, created_at, updated_at) VALUES ('1','DMS Office','DMS कार्यालय',' Lorem Ipsum','लोरेम इप्सम','93002 Green Avenue','93002 ग्रीन अव्हेन्यू',' office@dms.org',' 777 555 666','777 555 666','333 111 333','333 111 333','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO emergency_contacts (id, english_title, marathi_title, english_name, marathi_name, english_address, marathi_address, email, english_number, marathi_number, english_landline_no, marathi_landline_no, is_deleted, is_active, created_at, updated_at) VALUES ('2','City Council','नगरपालिका',' Lorem Ipsum','लोरेम इप्सम','93002 Green Avenue','93002 ग्रीन अव्हेन्यू',' city@dms.org',' 777 555 666','777 555 666','333 111 333','333 111 333','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO emergency_contacts (id, english_title, marathi_title, english_name, marathi_name, english_address, marathi_address, email, english_number, marathi_number, english_landline_no, marathi_landline_no, is_deleted, is_active, created_at, updated_at) VALUES ('3','Police Emergency','पोलीस आणीबाणी',' Lorem Ipsum','लोरेम इप्सम','93002 Green Avenue','93002 ग्रीन अव्हेन्यू',' police@dms.org',' 777 555 666','777 555 666','333 111 333','333 111 333','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO emergency_contacts (id, english_title, marathi_title, english_name, marathi_name, english_address, marathi_address, email, english_number, marathi_number, english_landline_no, marathi_landline_no, is_deleted, is_active, created_at, updated_at) VALUES ('4','Ambulance','रुग्णवाहिका',' Lorem Ipsum','लोरेम इप्सम','93002 Green Avenue','93002 ग्रीन अव्हेन्यू',' ambulance@dms.org',' 777 555 666','777 555 666','333 111 333','333 111 333','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO emergency_contacts (id, english_title, marathi_title, english_name, marathi_name, english_address, marathi_address, email, english_number, marathi_number, english_landline_no, marathi_landline_no, is_deleted, is_active, created_at, updated_at) VALUES ('5','E-services','ई-सेवा',' Lorem Ipsum','लोरेम इप्सम','93002 Green Avenue','93002 ग्रीन अव्हेन्यू',' service@dms.org',' 777 555 666','777 555 666','333 111 333','333 111 333','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `evacuation_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO evacuation_plans (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Evacuation Plans','निर्वासन योजना','Evacuation plans are an integral part of disaster emergency response in Maharashtra. These plans outline the systematic and organized procedures for safely relocating people from areas at risk to designated evacuation centers or safer locations. The specific details of evacuation plans may vary depending on the type of disaster, but the general principles include the following:<br>
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
            
            ','निर्वासन योजना महाराष्ट्रातील आपत्ती आपत्कालीन प्रतिसादाचा अविभाज्य भाग आहेत. या योजनांमध्ये धोका असलेल्या भागांतून नियुक्त निर्वासन केंद्रे किंवा सुरक्षित ठिकाणी लोकांना सुरक्षितपणे स्थलांतरित करण्यासाठी पद्धतशीर आणि संघटित प्रक्रियांची रूपरेषा दिली आहे. आपत्तीच्या प्रकारानुसार निर्वासन योजनांचे विशिष्ट तपशील बदलू शकतात, परंतु सामान्य तत्त्वांमध्ये पुढील गोष्टींचा समावेश आहे:<br>
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
            
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO event (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, start_date, end_date, is_deleted, is_active, created_at, updated_at) VALUES ('1','Maharashtra Battles Forest Fires','महाराष्ट्र जंगलातील आगीशी लढत आहे','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','1_english.jpeg','1_marathi.jpeg','2023-07-05','2023-09-19','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO event (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, start_date, end_date, is_deleted, is_active, created_at, updated_at) VALUES ('2','Kerala floods displace thousands','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure. ','ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.','2_english.jpeg','2_marathi.jpeg','2022-08-22','2022-11-06','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO event (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, start_date, end_date, is_deleted, is_active, created_at, updated_at) VALUES ('3','Odisha prepares for Cyclone Yaas','ओडिशा यास चक्रीवादळाची तयारी करत आहे','In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.','मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.','3_english.jpeg','3_marathi.jpeg','2023-01-12','2023-03-03','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO event (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, start_date, end_date, is_deleted, is_active, created_at, updated_at) VALUES ('4','Assam flood situation remains critical','आसाममध्ये पूरस्थिती कायम आहे','In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure.','2021 मध्ये, आसामला अतिवृष्टीमुळे गंभीर पुराचा सामना करावा लागला, अनेक लोक विस्थापित झाले आणि घरे आणि पायाभूत सुविधांचे नुकसान झाले.','2_english.jpeg','2_marathi.jpeg','2023-02-27','2023-04-22','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `footer_important_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('1',' Emergency Services','आपत्कालीन सेवा ','emergency-services','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('2','Environmental Conditions','पर्यावरणीय परिस्थिती            ','environmental-conditions','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('3',' Disaster Preparedness',' आपत्ती तयारी ',' disaster-preparedness','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('4',' Disaster Response',' आपत्ती प्रतिसाद ',' disaster-response','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('5',' Disaster Recovery',' आपत्ती पुनर्प्राप्ती ',' disaster-recovery','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('6','Volunteer Opportunities',' स्वयंसेवक संधी ','volunteer-opportunitiess','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('7',' Donations and Aid','देणगी आणि मदत   ',' donations-and-aid','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO footer_important_links (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('8','Local Resources',' स्थानिक संसाधने   ','local-resources','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');


CREATE TABLE `gallery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `gallery_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_name` varchar(255) NOT NULL,
  `marathi_name` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO gallery_category (id, english_name, marathi_name, is_deleted, is_active, created_at, updated_at) VALUES ('1','Disaster','आपत्ती','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO gallery_category (id, english_name, marathi_name, is_deleted, is_active, created_at, updated_at) VALUES ('2','Preparedness','तयारी','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO gallery_category (id, english_name, marathi_name, is_deleted, is_active, created_at, updated_at) VALUES ('3','Citizen','नागरिक','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `general_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_name` text NOT NULL,
  `marathi_name` text NOT NULL,
  `english_number` bigint(20) NOT NULL,
  `marathi_number` bigint(20) NOT NULL,
  `english_icon` varchar(255) NOT NULL,
  `marathi_icon` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO general_contacts (id, english_name, marathi_name, english_number, marathi_number, english_icon, marathi_icon, is_deleted, is_active, created_at, updated_at) VALUES ('1','ABC','ABC','7645364565','7645364565','https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80','https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `hazard_vulnerabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO hazard_vulnerabilities (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Hazard and Vulnerability Assessment','धोका आणि असुरक्षा मूल्यांकन','Hazard and vulnerability assessment is a crucial component of preparedness. It involves identifying and evaluating the potential hazards that a particular region or community is exposed to and assessing the vulnerabilities that may amplify the impact of those hazards. This assessment helps in understanding the specific risks and challenges associated with different types of disasters.<br><br>
            The process of hazard and vulnerability assessment typically involves the following steps:<br>
            <ul>
            <li>Hazard Identification: This step involves identifying the various hazards that the region or community is prone to. These can include natural hazards such as earthquakes, floods, cyclones, and droughts, as well as man-made hazards like industrial accidents or chemical spills.</li>
            <li>Risk Assessment: Once the hazards are identified, a risk assessment is conducted to evaluate the likelihood and potential impact of those hazards. This assessment considers factors such as historical data, scientific analysis, and expert opinions to determine the level of risk associated with each hazard.</li>
            <li>Vulnerability Analysis: In this step, the vulnerabilities of the community or infrastructure to the identified hazards are assessed. This involves examining factors such as population density, socio-economic conditions, infrastructure resilience, access to early warning systems, and capacity to respond to emergencies.</li>
            <li>Capacity Assessment: Along with vulnerabilities, the assessment also evaluates the existing capacities and resources available to cope with disasters. This includes assessing the capabilities of emergency response agencies, healthcare facilities, communication systems, and community organizations.</li>
            <li>Action Planning: Based on the hazard and vulnerability assessment, an action plan is developed to address the identified gaps and enhance preparedness. This plan may include measures such as infrastructure improvements, early warning systems, evacuation plans, emergency response training, community awareness campaigns, and resource allocation.</li> 
            </ul>','धोक्याचे आणि असुरक्षिततेचे मूल्यांकन हा सज्जतेचा एक महत्त्वाचा घटक आहे. यामध्ये एखाद्या विशिष्ट प्रदेशाला किंवा समुदायाला ज्या संभाव्य धोक्यांचा सामना करावा लागतो ते ओळखणे आणि त्यांचे मूल्यांकन करणे आणि त्या धोक्यांचा प्रभाव वाढवणाऱ्या असुरक्षिततेचे मूल्यांकन करणे समाविष्ट आहे. हे मूल्यांकन विविध प्रकारच्या आपत्तींशी संबंधित विशिष्ट धोके आणि आव्हाने समजून घेण्यास मदत करते.<br><br>
             धोका आणि असुरक्षा मूल्यांकनाच्या प्रक्रियेमध्ये सामान्यत: खालील चरणांचा समावेश होतो:<br>
             <ul>
             <li>धोक्याची ओळख: या पायरीमध्ये प्रदेश किंवा समुदायाला धोका असलेल्या विविध धोक्यांची ओळख करणे समाविष्ट आहे. यामध्ये भूकंप, पूर, चक्रीवादळ आणि दुष्काळ यासारखे नैसर्गिक धोके तसेच औद्योगिक अपघात किंवा रासायनिक गळती यांसारख्या मानवनिर्मित धोक्यांचा समावेश असू शकतो.</li>
             <li>जोखीम मूल्यमापन: एकदा धोके ओळखल्यानंतर, त्या धोक्यांच्या संभाव्यतेचे आणि संभाव्य परिणामाचे मूल्यांकन करण्यासाठी जोखीम मूल्यांकन केले जाते. हे मूल्यांकन प्रत्येक धोक्याशी संबंधित जोखमीची पातळी निश्चित करण्यासाठी ऐतिहासिक डेटा, वैज्ञानिक विश्लेषण आणि तज्ञांची मते यासारख्या घटकांचा विचार करते.</li>
             <li>असुरक्षितता विश्लेषण: या चरणात, ओळखलेल्या धोक्यांसाठी समुदाय किंवा पायाभूत सुविधांच्या असुरक्षिततेचे मूल्यांकन केले जाते. यामध्ये लोकसंख्येची घनता, सामाजिक-आर्थिक परिस्थिती, पायाभूत सुविधांची लवचिकता, पूर्व चेतावणी प्रणालींमध्ये प्रवेश आणि आणीबाणीला प्रतिसाद देण्याची क्षमता यासारख्या घटकांचे परीक्षण करणे समाविष्ट आहे.</li>
             <li>क्षमता मूल्यमापन: असुरक्षांसोबतच, मूल्यांकनामध्ये आपत्तींचा सामना करण्यासाठी उपलब्ध असलेल्या क्षमता आणि संसाधनांचेही मूल्यमापन केले जाते. यामध्ये आपत्कालीन प्रतिसाद एजन्सी, आरोग्य सुविधा, संप्रेषण प्रणाली आणि समुदाय संस्थांच्या क्षमतांचे मूल्यांकन करणे समाविष्ट आहे.</li>
             <li>कृती नियोजन: धोका आणि असुरक्षिततेच्या मुल्यांकनावर आधारित, ओळखल्या गेलेल्या तफावत दूर करण्यासाठी आणि तयारी वाढवण्यासाठी कृती योजना विकसित केली जाते. या योजनेमध्ये पायाभूत सुविधांमध्ये सुधारणा, पूर्व चेतावणी प्रणाली, निर्वासन योजना, आपत्कालीन प्रतिसाद प्रशिक्षण, समुदाय जागरूकता मोहिमा आणि संसाधनांचे वाटप यासारख्या उपायांचा समावेश असू शकतो.</li>             
             </ul>
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `home_tenders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `tender_date` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `english_pdf` varchar(255) NOT NULL,
  `marathi_pdf` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO home_tenders (id, english_title, marathi_title, english_description, marathi_description, tender_date, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('1','Lorem Ipsum  ','फक्त मजकूर ','Lorem Ipsum is simply dummy text of the printing and typesetting industry. ','Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.','2023-05-11','tenders','English pdf','Marathi pdf','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `incident_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO incident_type (id, english_title, marathi_title, is_deleted, is_active, created_at, updated_at) VALUES ('1','Fires','आग','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO incident_type (id, english_title, marathi_title, is_deleted, is_active, created_at, updated_at) VALUES ('2','Crimes','गुन्हे','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO incident_type (id, english_title, marathi_title, is_deleted, is_active, created_at, updated_at) VALUES ('3','Natural','नैसर्गिक','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO incident_type (id, english_title, marathi_title, is_deleted, is_active, created_at, updated_at) VALUES ('4','Disasters','संकटे','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');


CREATE TABLE `main_menuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name_marathi` varchar(255) NOT NULL,
  `menu_name_english` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `is_static` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `main_sub` varchar(255) NOT NULL DEFAULT 'main',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('1','मुख्यपृष्ठ','Home','1','1','/','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('2','आमच्याबद्दल','About Us','2','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('3','संकटे','Disasters','3','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('4','तयारी','Preparedness','4','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('5','आपत्कालीन प्रतिसाद',' Emergency Response','5','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('6','नागरिक कृती','Citizen Action','6','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('7','प्रशिक्षण कार्यशाळा','Training Workshops','7','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('8','धोरणे आणि कायदे',' Policies and Legislation','8','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('9','संसाधन केंद्र',' Resource Center','9','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('10','बातम्या आणि कार्यक्रम',' News & Events','10','1','null','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_menuses (id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('11','आमच्याशी संपर्क साधा','Contact Us','11','1','contact','1','main','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `main_sub_menuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main_menu_id` bigint(20) unsigned NOT NULL,
  `menu_name_marathi` varchar(255) NOT NULL,
  `menu_name_english` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `is_static` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `main_sub` varchar(255) NOT NULL DEFAULT 'sub',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('1','2','आपत्ती व्यवस्थापन पोर्टलची ओळख','Introduction To The Disaster Management Portal','1','1','list-disastermanagementportal-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('2','2','उद्दिष्ट आणि ध्येय','Objective And Goals','2','1','list-objectivegoals-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('3','2','राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) संरचना आणि संघटना','State Disaster Management Authority (SDMA) Structure And Organization','3','1','state-disaster-management-authority-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('4','3','आपत्तींचे प्रकार (नैसर्गिक आणि मानवनिर्मित)',' Types Of Disasters (Natural And Man-made)','1','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('5','3','भूकंप','Earthquakes','2','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('6','3','पूर','Floods','3','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('7','3','चक्रीवादळ','Cyclones','4','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('8','3','दुष्काळ','Droughts','5','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('9','3','भूस्खलन','Landslides','6','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('10','3','औद्योगिक अपघात','Industrial Accidents ','7','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('11','3','आग','Fires','8','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('12','3','राज्यासाठी आपत्ती इतिहास आणि आकडेवारी',' Disaster History And Statistics For The State','9','0','null','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('13','4','धोका आणि असुरक्षा मूल्यांकन','Hazard And Vulnerability Assessment','1','1','list-hazard-vulnerability-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('14','4','पूर्व चेतावणी प्रणाली','Early Warning Systems','2','1','list-warning-system-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('15','4','क्षमता निर्माण आणि प्रशिक्षण','Capacity Building And Training','3','1','list-capacity-training','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('16','4','जनजागृती आणि शिक्षण','Public Awareness And Education','4','1','list-awareness-education-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('17','5','राज्य आपत्कालीन ऑपरेशन केंद्र (EOC)','State Emergency Operations Center (EOC)','1','1','list-state-emergency-operations-center-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('18','5','जिल्हा आपत्कालीन ऑपरेशन केंद्र (DEOC)',' District Emergency Operations Center (DEOC)','2','1','list-district-emergency-operations-center-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('19','5','आपत्कालीन संपर्क क्रमांक',' Emergency Contact Numbers','3','1','list-emergency-contact-numbers-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('20','5','शोध आणि बचाव पथके','Search And Rescue Teams','4','1','list-search-rescue-teams-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('21','5','मदत उपाय आणि संसाधने',' Relief Measures And Resources','5','1','list-relief-measures-resources-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('22','5','निर्वासन योजना',' Evacuation Plans','6','1','list-evacuation-plans-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('23','6','एका घटनेची तक्रार करा: क्राउडसोर्सिंग','Report an Incident : Crowdsourcing','1','1','list-report-incident-crowdsourcing-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('24','6','स्वयंसेवक व्हा: नागरिक समर्थन','Be A Volunteer : Citizen Support','2','1','volunteer-citizen-support-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('25','6','अभिप्राय आणि सूचना','Feedback And Suggestions','3','1','citizen-feedback-suggestions-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('26','7','आगामी कार्यक्रम आणि प्रशिक्षण','Upcoming Events And Trainings','1','1','list-upcoming-training-event-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('27','7','आगामी कार्यक्रम आणि प्रशिक्षण',' Past Events and Trainings','2','1','list-past-training-event-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('28','8','राज्य आपत्ती व्यवस्थापन योजना','State Disaster Management Plan','1','1','list-state-disaster-managementplan-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('29','8','जिल्हा आपत्ती व्यवस्थापन योजना','District Disaster Management Plan','2','1','list-district-disaster-managementplan-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('30','8','राज्य आपत्ती व्यवस्थापन धोरण','State Disaster Management Policy','3','1','list-state-management-policy-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('31','8','संबंधित कायदे आणि नियम','Relevant Laws And Regulations','4','1','list-relevant-laws-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('32','9','दस्तऐवज आणि प्रकाशने','Documents And publications','1','1','list-documents-publications-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('33','9','नकाशे आणि GIS डेटा','Maps And GIS Data','2','1','list-maps-gis-data-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('34','9','व्हिडिओ आणि मल्टीमीडिया','Videos And Multimedia','3','1','list-multimedia-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('35','9','प्रशिक्षण साहित्य आणि कार्यशाळा','Training Materials And Workshops','4','1','list-training-materials-workshops-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('36','10','आपत्ती व्यवस्थापनाशी संबंधित ताज्या बातम्या','Latest News Related To Disaster Management','1','1','list-disaster-management-news-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('37','10','आगामी कार्यक्रम आणि प्रशिक्षण','Upcoming Events And Trainings','2','1','list-upcoming-training-event-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('38','10','यशोगाथा आणि केस स्टडी','Success Stories And Case Studies','3','1','list-success-stories-web','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('39','11','SDMA साठी संपर्क माहिती','Contact Information For SDMA','1','1','contact-information','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO main_sub_menuses (id, main_menu_id, menu_name_marathi, menu_name_english, order_no, is_static, url, is_active, main_sub, created_at, updated_at) VALUES ('40','11','अभिप्राय आणि सूचना','Feedback And Suggestions','2','1','feedback-suggestions','1','sub','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `marquees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` varchar(255) NOT NULL,
  `marathi_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO marquees (id, english_title, marathi_title, url, is_deleted, is_active, created_at, updated_at) VALUES ('1','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army.','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','https://www.google.com/','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `metadata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO metadata (id, english_name, keywords, is_deleted, is_active, created_at, updated_at) VALUES ('1','Web','HTML,CSS,JavaScript,','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('1','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('2','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('3','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('4','2023_04_12_094821_create_roles_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('5','2023_04_12_094822_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('6','2023_04_12_095242_create_permissions_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('7','2023_04_12_095243_create_roles_permissions_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('8','2023_04_14_091935_tenders','1');

INSERT INTO migrations (id, migration, batch) VALUES ('9','2023_04_14_113030_objectivegoals','1');

INSERT INTO migrations (id, migration, batch) VALUES ('10','2023_04_14_114750_disaster_management_portal','1');

INSERT INTO migrations (id, migration, batch) VALUES ('11','2023_04_14_115110_state_disaster_management _authority','1');

INSERT INTO migrations (id, migration, batch) VALUES ('12','2023_04_18_105428_create_policies_acts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('13','2023_04_21_095037_create_projects_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('14','2023_05_03_061029_create_main_menuses_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('15','2023_05_03_095000_create_main_sub_menuses_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('16','2023_05_04_103542_create_marquees_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('17','2023_05_05_055508_create_sliders_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('18','2023_05_05_094347_create_dynamic_web_pages_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('19','2023_05_10_080714_create_home_tenders_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('20','2023_05_11_091437_create_disaster_management_news_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('21','2023_05_11_101725_create_weather','1');

INSERT INTO migrations (id, migration, batch) VALUES ('22','2023_05_11_114500_create_emergency_contacts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('23','2023_05_11_130516_create_general_contacts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('24','2023_05_11_132700_create_disaster_forcast','1');

INSERT INTO migrations (id, migration, batch) VALUES ('25','2023_05_12_044609_create_metadata','1');

INSERT INTO migrations (id, migration, batch) VALUES ('26','2023_05_12_053753_create_disaster_management_web_portals_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('27','2023_05_16_053213_create_hazard_vulnerabilities_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('28','2023_05_16_054329_create_district_emergency_operations_center','1');

INSERT INTO migrations (id, migration, batch) VALUES ('29','2023_05_16_054419_create_emergency_contact_numbers','1');

INSERT INTO migrations (id, migration, batch) VALUES ('30','2023_05_16_054504_create_search_rescue_teams','1');

INSERT INTO migrations (id, migration, batch) VALUES ('31','2023_05_16_054536_create_relief_measures_resources','1');

INSERT INTO migrations (id, migration, batch) VALUES ('32','2023_05_16_054602_create_evacuation_plans','1');

INSERT INTO migrations (id, migration, batch) VALUES ('33','2023_05_16_081151_create_early_warning_systems_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('34','2023_05_16_093040_create_capacity_trainings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('35','2023_05_17_044651_create_state_emergency_operations_center','1');

INSERT INTO migrations (id, migration, batch) VALUES ('36','2023_05_17_101515_create_report_incident_crowdsourcings_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('37','2023_05_17_103054_create_volunteer_citizen_supports_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('38','2023_05_17_103457_create_citizen_feedback_suggestions_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('39','2023_05_18_044936_create_public_awareness_education_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('40','2023_05_24_062016_create_social_icons_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('41','2023_05_24_063751_create_addmore_emergency_contact_numbers','1');

INSERT INTO migrations (id, migration, batch) VALUES ('42','2023_05_24_090818_create_sub_header_infos_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('43','2023_05_24_111821_create_event','1');

INSERT INTO migrations (id, migration, batch) VALUES ('44','2023_05_26_060438_create_contact','1');

INSERT INTO migrations (id, migration, batch) VALUES ('45','2023_05_26_074326_create_state_disaster_management_plans_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('46','2023_05_26_101541_create_district_disaster_management_plans_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('47','2023_05_26_110338_create_state_disaster_management_policies_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('48','2023_05_26_131702_create_relevant_laws_regulations_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('49','2023_05_31_100412_create_documentspublications_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('50','2023_06_01_055618_create_success_stories_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('51','2023_06_02_091800_create_gallery_category','1');

INSERT INTO migrations (id, migration, batch) VALUES ('52','2023_06_02_091951_create_gallery','1');

INSERT INTO migrations (id, migration, batch) VALUES ('53','2023_06_02_123631_create_department_information_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('54','2023_06_04_095553_create_report_incident_modals_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('55','2023_06_04_103700_create_video','1');

INSERT INTO migrations (id, migration, batch) VALUES ('56','2023_06_05_050850_create_citizen_volunteer_modals_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('57','2023_06_05_051017_create_citizen_feedback_suggestion_modals_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('58','2023_06_05_092805_create_vacancies_headers_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('59','2023_06_05_103752_create_r_t_i_s_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('60','2023_06_06_084057_create_footer_important_links_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('61','2023_06_06_093857_create_website_contacts_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('62','2023_06_06_103139_create_training-materials-workshops','1');

INSERT INTO migrations (id, migration, batch) VALUES ('63','2023_06_07_112632_create_incident_type','1');

INSERT INTO migrations (id, migration, batch) VALUES ('64','2023_06_11_121305_create_tweeter_feeds_table','1');


CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(255) NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('1','Role','Role','list-role','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('2','Incident Type','Incident Type','list-incident-type','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('3','Vacancies','Vacancies','list-header-vacancies','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('4','RTI','RTI','list-header-rti','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('5','Main Menu','Main Menu List','list-main-menu','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('6','Sub Menu','Sub Menu List','list-sub-menu','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('7','News Bar','News Bar','list-marquee','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('8','Slider','Slider','list-slide','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('9','Disaster Web Portal','Disaster Web Portal','list-disaster-management-web-portal','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('10','Disaster Management News','Disaster Management News','list-disaster-management-news','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('11','Emergency Contact','Emergency Contact','list-emergency-contact','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('12','Department','Department','list-department-information','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('13','Weather','Weather','list-weather','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('14','Disaster Forcast','Disaster Forcast','list-disasterforcast','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('15','Disaster Management Portal','Disaster Management Portal','list-disastermanagementportal','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('16','Objective Goals','Objective Goals','list-objectivegoals','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('17','State Disaster Management Authority','State Disaster Management Authority','list-statedisastermanagementauthority','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('18','Dynamic Pages','Dynamic Pages','list-dynamic-page','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('19','Hazard and Vulnerability','Hazard and Vulnerability','list-hazard-vulnerability-assessment','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('20','Early Warning System','Early Warning System','list-early-warning-system','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('21','Capacity training','Capacity training','list-capacity-building-and-training','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('22','Awareness And Education','Awareness And Education','list-public-awareness-and-education','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('23','State Emergency Operations Center (EOC)','State Emergency Operations Center (EOC)','list-state-emergency-operations-center','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('24','District Emergency Operations Center (DEOC)','District Emergency Operations Center (DEOC)','list-district-emergency-operations-center','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('25','Emergency Contact Numbers','Emergency Contact Numbers','list-emergency-contact-numbers','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('26','Emergency Contact Numbers','Emergency Contact Numbers','July-numbers','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('27','Evacuation Plans','Evacuation Plans','list-evacuation-plans','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('28','Relief Measures Resources','Relief Measures Resources','list-relief-measures-resources','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('29','Search Rescue Teams','Search Rescue Teams','list-search-rescue-teams','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('30','Report Incident Crowdsourcing','Report Incident Crowdsourcing','list-report-crowdsourcing','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('31','Volunteer Citizen Support','Volunteer Citizen Support','list-volunteer-citizen-support','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('32','Feedback and suggestions','Feedback and suggestions','list-citizen-feedback-and-suggestion','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('33','Incident Crowdsourcing','Incident Crowdsourcing','list-incident-modal-info','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('34','Volunteer Citizen Support','Volunteer Citizen Support','list-volunteer-modal-info','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('35','Feedback and suggestions List','Feedback and suggestions List','list-feedback-modal-info','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('36','State Disaster Management Plan','State Disaster Management Plan','list-state-disaster-management-plan','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('37','District Disaster Management Plan','District Disaster Management Plan','list-district-disaster-management-plan','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('38','State Disaster Management Policy','State Disaster Management Policy','list-state-disaster-management-policy','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('39','Relevant-Laws-And-Regulations','Relevant-Laws-And-Regulations','list-relevant-laws-and-regulations','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('40','Documents And Publications','Documents And Publications','list-document-publications','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('41','Success Stories','Success Stories','list-success-stories','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('42','Category Gallery','Category Gallery','list-gallery-category','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('43','Gallery','Gallery','list-gallery','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('44','Video','Video','list-video','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('45','Training Materials And Workshops','Training Materials And Workshops','list-training-workshop','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('46','Contact Us','Contact Us','list-contact-suggestion','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('47','Event','Event','list-event','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('48','Metadata','Metadata','list-metadata','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('49','User','User','list-users','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('50','Footer Link','Footer Link','list-important-link','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO permissions (id, route_name, permission_name, url, is_active, created_at, updated_at) VALUES ('51','Website Conatct','Website Conatct','list-website-contact','1','2023-06-16 10:14:28','2023-06-16 10:14:28');


CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `policies_acts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_pdf` varchar(255) NOT NULL,
  `marathi_pdf` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_link` varchar(255) NOT NULL,
  `marathi_link` varchar(255) NOT NULL,
  `english_pdf` varchar(255) NOT NULL,
  `marathi_pdf` varchar(255) NOT NULL,
  `status` enum('completed','ongoing','future') NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `public_awareness_education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO public_awareness_education (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Public Awareness and Education','जनजागृती आणि शिक्षण','Public awareness and education play a crucial role in preparedness efforts. Heres an explanation of how public awareness and education contribute to disaster preparedness:<br>
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
            ','जनजागृती आणि शिक्षण सज्जतेच्या प्रयत्नांमध्ये महत्त्वाची भूमिका बजावतात. सार्वजनिक जागरूकता आणि शिक्षण आपत्ती सज्जतेमध्ये कसे योगदान देतात याचे स्पष्टीकरण येथे आहे:<br>
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
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `r_t_i_s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO r_t_i_s (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('1','Kerala floods displace thousands ','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','floods','Kerala floods displace thousands.pdf','Kerala floods displace thousands.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO r_t_i_s (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('2','test document ','चाचणी दस्तऐवज ','document','Test Document.pdf','Test Document.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO r_t_i_s (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('3','Maharashtra Battles Forest Fires  ','महाराष्ट्र जंगलातील आगीशी लढत आहे ','Battles','Maharashtra Battles Forest Fires.pdf','Maharashtra Battles Forest Fires.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO r_t_i_s (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('4','Kerala floods displace thousands ','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत ','floods','Kerala floods displace thousands.pdf','Kerala floods displace thousands.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `relevant_laws_regulations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO relevant_laws_regulations (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Relevant Laws And Regulations','संबंधित कायदे आणि नियम','In Maharashtra, there are several relevant laws and regulations pertaining to disaster management. These policies and legislation aim to ensure preparedness, response, recovery, and mitigation measures are in place to effectively manage disasters. Here are some key laws and regulations in Maharashtra:<br>            ','महाराष्ट्रात, आपत्ती व्यवस्थापनाशी संबंधित अनेक कायदे आणि नियम आहेत. ही धोरणे आणि कायदे आपत्तींचे प्रभावीपणे व्यवस्थापन करण्यासाठी सज्जता, प्रतिसाद, पुनर्प्राप्ती आणि शमन उपाय आहेत याची खात्री करणे हा आहे. महाराष्ट्रातील काही प्रमुख कायदे आणि नियम येथे आहेत:<br>            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `relief_measures_resources` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO relief_measures_resources (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Relief Measures and Resources','मदत उपाय आणि संसाधने','In Maharashtra, the state government and various agencies implement relief measures and provide resources as part of their emergency response efforts during disasters. Here are some key relief measures and resources available in Maharashtra for disaster response:<br>
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
        ','महाराष्ट्रात, राज्य सरकार आणि विविध एजन्सी आपत्तीच्या वेळी त्यांच्या आपत्कालीन प्रतिसाद प्रयत्नांचा एक भाग म्हणून मदत उपायांची अंमलबजावणी करतात आणि संसाधने पुरवतात. आपत्ती प्रतिसादासाठी महाराष्ट्रात उपलब्ध काही प्रमुख मदत उपाय आणि संसाधने येथे आहेत:<br>
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
        ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `report_incident_crowdsourcings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO report_incident_crowdsourcings (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Report an Incident : Crowdsourcing','एका घटनेची तक्रार करा: क्राउडसोर्सिंग','Report an Incident: Crowdsourcing is a method used in disaster management to gather real-time information from the public about incidents and emergencies occurring during a disaster. It harnesses the power of technology and community participation to enhance situational awareness, response coordination, and resource allocation.<br>
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
            ','एखाद्या घटनेची तक्रार करा: क्राउडसोर्सिंग ही आपत्ती व्यवस्थापनामध्ये आपत्ती दरम्यान घडणाऱ्या घटना आणि आपत्कालीन परिस्थितींबद्दल लोकांकडून रीअल-टाइम माहिती गोळा करण्यासाठी वापरली जाणारी एक पद्धत आहे. हे परिस्थितीजन्य जागरूकता, प्रतिसाद समन्वय आणि संसाधन वाटप वाढविण्यासाठी तंत्रज्ञान आणि समुदायाच्या सहभागाची शक्ती वापरते.<br>
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `report_incident_modals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `incident` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `media_upload` varchar(255) NOT NULL DEFAULT 'null',
  `description` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles (id, role_name, is_active, created_at, updated_at) VALUES ('1','Admin','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO roles (id, role_name, is_active, created_at, updated_at) VALUES ('2','Teacher','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO roles (id, role_name, is_active, created_at, updated_at) VALUES ('3','Doctor','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO roles (id, role_name, is_active, created_at, updated_at) VALUES ('4','Engineer','1','2023-06-16 10:14:28','2023-06-16 10:14:28');


CREATE TABLE `roles_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `per_add` tinyint(1) NOT NULL DEFAULT 0,
  `per_edit` tinyint(1) NOT NULL DEFAULT 0,
  `per_update` tinyint(1) NOT NULL DEFAULT 0,
  `per_delete` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`),
  KEY `roles_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles_permissions (id, permission_id, role_id, per_add, per_edit, per_update, per_delete, is_active, created_at, updated_at) VALUES ('1','1','1','1','0','0','1','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO roles_permissions (id, permission_id, role_id, per_add, per_edit, per_update, per_delete, is_active, created_at, updated_at) VALUES ('2','2','1','0','0','1','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `search_rescue_teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO search_rescue_teams (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Search and Rescue Teams','शोध आणि बचाव पथके','In the event of a disaster or emergency situation in Maharashtra, various search and rescue teams are mobilized as part of the emergency response efforts. These teams are trained and equipped to carry out search and rescue operations in different environments and scenarios. Here are some of the search and rescue teams commonly involved in emergency response in Maharashtra:<br>
            <ul>
            <li><b>National Disaster Response Force (NDRF):</b>  The NDRF is a specialized force under the Ministry of Home Affairs, Government of India. It consists of highly trained personnel skilled in various aspects of search, rescue, and relief operations. NDRF teams are deployed during natural disasters such as earthquakes, floods, cyclones, and building collapses.</li>
            <li><b>State Disaster Response Force (SDRF):</b>  The SDRF is a state-level specialized force responsible for responding to disasters within Maharashtra. Similar to the NDRF, SDRF teams are trained in search and rescue techniques and play a crucial role in emergency response operations. They work closely with local administration and other agencies to carry out rescue operations. </li>
            <li><b>Fire and Emergency Services:</b>  The Fire and Emergency Services departments have trained personnel and specialized equipment for rescue operations. They respond to various emergencies, including building collapses, industrial accidents, and other incidents requiring search and rescue efforts. Firefighters are trained in techniques such as rope rescue, confined space rescue, and water rescue.</li>
            <li><b>Indian Coast Guard:</b>  The Indian Coast Guard is responsible for maritime search and rescue operations along the coast of Maharashtra. They have specialized vessels, aircraft, and personnel trained to respond to emergencies at sea, including shipwrecks, boat accidents, and incidents involving fishermen.</li>
            <li><b>Local Police and Civil Defense:</b>  Local police and civil defense personnel also play a vital role in search and rescue operations. They are often the first responders in emergency situations and provide initial assistance until specialized teams arrive. They coordinate with other agencies, manage crowd control, and assist in evacuations.</li>
            </ul>
            ','महाराष्ट्रात आपत्ती किंवा आपत्कालीन परिस्थिती उद्भवल्यास, आपत्कालीन प्रतिसादाच्या प्रयत्नांचा एक भाग म्हणून विविध शोध आणि बचाव पथके एकत्रित केली जातात. या संघांना वेगवेगळ्या वातावरणात आणि परिस्थितींमध्ये शोध आणि बचाव कार्य करण्यासाठी प्रशिक्षित आणि सुसज्ज आहेत. महाराष्ट्रात आपत्कालीन प्रतिसादात सामील असलेल्या काही शोध आणि बचाव पथके येथे आहेत:<br>
            <ul>
            <li><b>राष्ट्रीय आपत्ती प्रतिसाद दल (NDRF):</b>  NDRF हे भारत सरकारच्या गृह मंत्रालयाच्या अंतर्गत एक विशेष दल आहे. यामध्ये शोध, बचाव आणि मदत कार्याच्या विविध पैलूंमध्ये कुशल उच्च प्रशिक्षित कर्मचारी असतात. भूकंप, पूर, चक्रीवादळ आणि इमारत कोसळणे यासारख्या नैसर्गिक आपत्तींच्या वेळी एनडीआरएफची टीम तैनात असते.</li>
            <li><b>स्टेट डिझास्टर रिस्पॉन्स फोर्स (एसडीआरएफ):</b>  एसडीआरएफ हे महाराष्ट्रातील आपत्तींना प्रतिसाद देण्यासाठी जबाबदार राज्य-स्तरीय विशेष दल आहे. एनडीआरएफ प्रमाणेच, एसडीआरएफ संघांना शोध आणि बचाव तंत्राचे प्रशिक्षण दिले जाते आणि आपत्कालीन प्रतिसाद कार्यात महत्त्वपूर्ण भूमिका बजावतात. ते बचाव कार्य करण्यासाठी स्थानिक प्रशासन आणि इतर एजन्सींच्या जवळ काम करतात.</li>
            <li><b>अग्निशमन आणि आपत्कालीन सेवा:</b>  अग्निशमन आणि आपत्कालीन सेवा विभागांमध्ये बचाव कार्यासाठी प्रशिक्षित कर्मचारी आणि विशेष उपकरणे आहेत. ते इमारती कोसळणे, औद्योगिक अपघात आणि शोध आणि बचाव प्रयत्नांची आवश्यकता असलेल्या इतर घटनांसह विविध आपत्कालीन परिस्थितींना प्रतिसाद देतात. अग्निशामकांना रोप बचाव, मर्यादित जागा बचाव आणि पाणी बचाव यांसारख्या तंत्रांचे प्रशिक्षण दिले जाते.</li>
            <li><b>भारतीय तटरक्षक दल:</b>  भारतीय तटरक्षक दल महाराष्ट्राच्या किनारपट्टीवर सागरी शोध आणि बचाव कार्यासाठी जबाबदार आहे. त्यांच्याकडे विशेष जहाजे, विमाने आणि समुद्रातील आपत्कालीन परिस्थितींना प्रतिसाद देण्यासाठी प्रशिक्षित कर्मचारी आहेत, ज्यात जहाजाचे तुकडे होणे, बोटीचे अपघात आणि मच्छिमारांचा समावेश असलेल्या घटनांचा समावेश आहे.</li>
            <li><b>स्थानिक पोलीस आणि नागरी संरक्षण:</b> स्थानिक पोलीस आणि नागरी संरक्षण कर्मचारी देखील शोध आणि बचाव कार्यात महत्वाची भूमिका बजावतात. ते अनेकदा आपत्कालीन परिस्थितीत प्रथम प्रतिसादकर्ते असतात आणि विशेष कार्यसंघ येईपर्यंत प्राथमिक मदत करतात. ते इतर एजन्सींशी समन्वय साधतात, गर्दीचे नियंत्रण व्यवस्थापित करतात आणि बाहेर काढण्यात मदत करतात.</li>
            </ul>
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sliders (id, english_image, marathi_image, english_title, marathi_title, english_description, marathi_description, url, is_deleted, is_active, created_at, updated_at) VALUES ('1','1_english.jpeg','1_marathi.jpeg','Maharashtra battles forest fires','महाराष्ट्र जंगलातील आगीशी लढत आहे','In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ','फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.','https://www.google.com/','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO sliders (id, english_image, marathi_image, english_title, marathi_title, english_description, marathi_description, url, is_deleted, is_active, created_at, updated_at) VALUES ('2','2_english.jpeg','2_marathi.jpeg','Kerala floods displace thousands','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','In August 2021, heavy rains and floods displaced thousands of people in Kerala, India, damaging homes, roads, and infrastructure. ','ऑगस्ट 2021 मध्ये, अतिवृष्टी आणि पुरामुळे केरळ, भारतातील हजारो लोक विस्थापित झाले, घरे, रस्ते आणि पायाभूत सुविधांचे नुकसान झाले.','https://www.google.com/','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');

INSERT INTO sliders (id, english_image, marathi_image, english_title, marathi_title, english_description, marathi_description, url, is_deleted, is_active, created_at, updated_at) VALUES ('3','3_english.jpeg','3_marathi.jpeg','Odisha prepares for Cyclone Yaas','ओडिशा यास चक्रीवादळाची तयारी करत आहे','In May 2021, The government evacuated people to safer places and took other precautionary measures to minimize the impact.','मे 2021 मध्ये, सरकारने लोकांना सुरक्षित ठिकाणी हलवले आणि प्रभाव कमी करण्यासाठी इतर सावधगिरीचे उपाय केले.','https://www.google.com/','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `social_icons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `icon` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO social_icons (id, url, icon, is_deleted, is_active, created_at, updated_at) VALUES ('1','facebook.com','facebook.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO social_icons (id, url, icon, is_deleted, is_active, created_at, updated_at) VALUES ('2','tweeter.com','tweeter.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO social_icons (id, url, icon, is_deleted, is_active, created_at, updated_at) VALUES ('3','insta.com','insta.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO social_icons (id, url, icon, is_deleted, is_active, created_at, updated_at) VALUES ('4','indeed.com','indeed.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `state_disaster_management_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO state_disaster_management_plans (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1',' State Disaster Management Plan','राज्य आपत्ती व्यवस्थापन योजना','The Maharashtra State Disaster Management Plan is a comprehensive document that outlines the policies and strategies for disaster management in the state of Maharashtra, India. It serves as a guideline for various government departments, agencies, and stakeholders involved in disaster response, mitigation, and recovery efforts. The plan is designed to ensure an effective and coordinated approach to managing disasters in Maharashtra.<br>
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
            ','महाराष्ट्र राज्य आपत्ती व्यवस्थापन आराखडा हा एक सर्वसमावेशक दस्तऐवज आहे जो भारतातील महाराष्ट्र राज्यातील आपत्ती व्यवस्थापनासाठी धोरणे आणि धोरणांची रूपरेषा देतो. हे विविध सरकारी विभाग, एजन्सी आणि आपत्ती प्रतिसाद, शमन आणि पुनर्प्राप्ती प्रयत्नांमध्ये गुंतलेल्या भागधारकांसाठी मार्गदर्शक तत्त्वे म्हणून काम करते. महाराष्ट्रातील आपत्तींचे व्यवस्थापन करण्यासाठी प्रभावी आणि समन्वित दृष्टीकोन सुनिश्चित करण्यासाठी ही योजना तयार करण्यात आली आहे.<br>
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
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `state_disaster_management_policies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO state_disaster_management_policies (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1',' State Disaster Management Policy','राज्य आपत्ती व्यवस्थापन धोरण','The State Disaster Management Policy of Maharashtra outlines the framework and guidelines for disaster management within the state. It establishes the objectives, principles, and strategies to be followed in order to effectively prevent, mitigate, and respond to disasters. The policy is based on national disaster management policies and guidelines, while also considering the unique geographical, environmental, and socio-economic factors specific to Maharashtra.<br>
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
             </ul>           ','महाराष्ट्राच्या राज्य आपत्ती व्यवस्थापन धोरणामध्ये राज्यातील आपत्ती व्यवस्थापनासाठी आराखडा आणि मार्गदर्शक तत्त्वे आहेत. हे आपत्तींना प्रभावीपणे रोखण्यासाठी, कमी करण्यासाठी आणि प्रतिसाद देण्यासाठी पाळली जाणारी उद्दिष्टे, तत्त्वे आणि धोरणे स्थापित करते. हे धोरण राष्ट्रीय आपत्ती व्यवस्थापन धोरणे आणि मार्गदर्शक तत्त्वांवर आधारित आहे, तसेच महाराष्ट्रासाठी विशिष्ट भौगोलिक, पर्यावरणीय आणि सामाजिक-आर्थिक घटकांचाही विचार केला आहे.<br>
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
            ','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `state_emergency_operations_center` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO state_emergency_operations_center (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','State Emergency Operations Center (EOC)','राज्य आपत्कालीन ऑपरेशन केंद्र (EOC)','
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
             </ul> ','राज्य आपत्कालीन ऑपरेशन केंद्र (EOC) ही आपत्ती किंवा मोठ्या आपत्कालीन परिस्थितीत आपत्कालीन प्रतिसाद क्रियाकलापांचे समन्वय आणि व्यवस्थापन करण्यासाठी सरकारने स्थापन केलेली केंद्रीकृत सुविधा आहे. हे आपत्ती व्यवस्थापनासाठी चेता केंद्र म्हणून काम करते आणि राज्य स्तरावर आपत्कालीन प्रतिसादात सहभागी असलेल्या प्रमुख एजन्सी, विभाग आणि भागधारकांना एकत्र आणते. राज्य EOC चे स्पष्टीकरण आणि आपत्ती आपत्कालीन प्रतिसादात त्याची भूमिका येथे आहे: <br> 
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `sub_header_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `english_tollfree_no` varchar(255) NOT NULL,
  `marathi_tollfree_no` varchar(255) NOT NULL,
  `english_city` varchar(255) NOT NULL,
  `marathi_city` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sub_header_infos (id, logo, english_tollfree_no, marathi_tollfree_no, english_city, marathi_city, is_deleted, is_active, created_at, updated_at) VALUES ('1','youtube.jpeg','0000 00000','0000 00000','Nashik','नाशिक','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `success_stories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `english_designation` varchar(255) NOT NULL,
  `marathi_designation` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO success_stories (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_designation, marathi_designation, is_deleted, is_active, created_at, updated_at) VALUES ('1','Doe Samson','डो सॅमसन ','To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.            ','सर्व स्टेकहोल्डर्सचा समावेश असलेल्या आणि प्रतिबंध, सज्जता आणि शमन करण्याची संस्कृती वाढवणाऱ्या सर्वांगीण, सक्रिय, तंत्रज्ञानावर आधारित आणि शाश्वत विकास धोरणाद्वारे सुरक्षित आणि आपत्ती प्रतिरोधक भारताची निर्मिती करणे.            ','head_english.png','head_marathi.png','Accountant','लेखापाल ','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO success_stories (id, english_title, marathi_title, english_description, marathi_description, english_image, marathi_image, english_designation, marathi_designation, is_deleted, is_active, created_at, updated_at) VALUES ('2','Jhon Sharma','जॉन शर्मा            ','To build a safer and disaster resilient India by a holistic, pro-active, technology driven and sustainable development strategy that involves all stakeholders and fosters a culture of prevention, preparedness and mitigation.            ','सर्व स्टेकहोल्डर्सचा समावेश असलेल्या आणि प्रतिबंध, सज्जता आणि शमन करण्याची संस्कृती वाढवणाऱ्या सर्वांगीण, सक्रिय, तंत्रज्ञानावर आधारित आणि शाश्वत विकास धोरणाद्वारे सुरक्षित आणि आपत्ती प्रतिरोधक भारताची निर्मिती करणे.            ','head_english.png','head_marathi.png','Project Manager            ','प्रकल्प व्यवस्थापक            ','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');


CREATE TABLE `tenders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tender_date` varchar(255) NOT NULL,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `open_date` varchar(255) NOT NULL,
  `tender_number` varchar(255) NOT NULL,
  `english_pdf` varchar(255) NOT NULL,
  `marathi_pdf` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `tweeter_feeds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_u_email_unique` (`u_email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, u_email, u_password, role_id, f_name, m_name, l_name, number, designation, address, state, city, pincode, ip_address, remember_token, is_active, created_at, updated_at) VALUES ('1','admin@gmail.com','$2y$10$c0xnstaRVXX7qYGKMc3Rmu7nojAFO62g7GHbI7cWIo55zCwLDaRu2','1','fname','mname','lname','number','designation','address','state','city','pincode','192.168.1.32','','1','2023-06-16 10:14:28','2023-06-16 10:14:28');

INSERT INTO users (id, u_email, u_password, role_id, f_name, m_name, l_name, number, designation, address, state, city, pincode, ip_address, remember_token, is_active, created_at, updated_at) VALUES ('2','test@gmail.com','$2y$10$K5fsAbCHrki.VVyY373eIeWniH6j5X7Gpu9Yf6Jy1s.4iEodmUGUS','1','fname','mname','lname','number','designation','address','state','city','pincode','192.168.1.32','','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `vacancies_headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_pdf` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO vacancies_headers (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('1','Maharashtra Battles Forest Fires','महाराष्ट्र जंगलातील आगीशी लढत आहे','Battles','Maharashtra Battles Forest Fires.pdf','Maharashtra Battles Forest Fires.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO vacancies_headers (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('2','Kerala floods displace thousands ','केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत','floods','Kerala floods displace thousands.pdf','Kerala floods displace thousands.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO vacancies_headers (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('3','Odisha prepares for Cyclone Yaas ','ओडिशा यास चक्रीवादळाची तयारी करत आहे ','prepares',' Odisha prepares for Cyclone Yaas.pdf',' Odisha prepares for Cyclone Yaas.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');

INSERT INTO vacancies_headers (id, english_title, marathi_title, url, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('4','test document','चाचणी दस्तऐवज ','document','Test Document.pdf','Test Document.pdf','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `video` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_name` text NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO video (id, video_name, is_deleted, is_active, created_at, updated_at) VALUES ('1','9WIwlljva_s','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO video (id, video_name, is_deleted, is_active, created_at, updated_at) VALUES ('2','BaWnRznp1AU','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO video (id, video_name, is_deleted, is_active, created_at, updated_at) VALUES ('3','BaWnRznp1AU','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO video (id, video_name, is_deleted, is_active, created_at, updated_at) VALUES ('4','9WIwlljva_s','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');

INSERT INTO video (id, video_name, is_deleted, is_active, created_at, updated_at) VALUES ('5','BaWnRznp1AU','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');


CREATE TABLE `volunteer_citizen_supports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL DEFAULT 'null',
  `marathi_image` varchar(255) NOT NULL DEFAULT 'null',
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO volunteer_citizen_supports (id, english_title, marathi_title, english_description, marathi_description, url, english_image, marathi_image, is_deleted, is_active, created_at, updated_at) VALUES ('1','Be a Volunteer : Citizen Support','स्वयंसेवक व्हा: नागरिक समर्थन','Being a volunteer and providing citizen support in the field of disaster management is a crucial and valuable contribution to the overall resilience and recovery efforts. Here are the details of how citizens can support as volunteers in disaster management:<br>
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
            ','एक स्वयंसेवक असणे आणि आपत्ती व्यवस्थापनाच्या क्षेत्रात नागरिकांचे समर्थन प्रदान करणे हे एकंदर लवचिकता आणि पुनर्प्राप्ती प्रयत्नांसाठी एक महत्त्वपूर्ण आणि मौल्यवान योगदान आहे. आपत्ती व्यवस्थापनात नागरिक स्वयंसेवक म्हणून कसे मदत करू शकतात याचे तपशील येथे आहेत:<br>
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
            ','null','1_english.jpeg','1_marathi.jpeg','0','1','2023-06-16 10:14:30','2023-06-16 10:14:30');


CREATE TABLE `weather` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_title` text NOT NULL,
  `marathi_title` text NOT NULL,
  `english_description` text NOT NULL,
  `marathi_description` text NOT NULL,
  `weather_date` varchar(255) NOT NULL,
  `expired_date` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT 'null',
  `english_image` varchar(255) NOT NULL,
  `marathi_image` varchar(255) NOT NULL,
  `english_pdf` varchar(255) NOT NULL,
  `marathi_pdf` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO weather (id, english_title, marathi_title, english_description, marathi_description, weather_date, expired_date, url, english_image, marathi_image, english_pdf, marathi_pdf, is_deleted, is_active, created_at, updated_at) VALUES ('1','English Title','मराठी शीर्षक','Lorem Ipsum is simply dummy text of the printing and typesetting industry','Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे','Forcast Date','Expire Date','weather','https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80','https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80','English Pdf','Marathi Pdf','0','1','2023-06-16 10:14:29','2023-06-16 10:14:29');


CREATE TABLE `website_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `english_address` varchar(255) NOT NULL,
  `marathi_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `english_number` varchar(255) NOT NULL,
  `marathi_number` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO website_contacts (id, english_address, marathi_address, email, english_number, marathi_number, is_deleted, is_active, created_at, updated_at) VALUES ('1','DMS Office, Maharshtra, INDIA','डीएमएस कार्यालय, महाराष्ट्र, भारत  ','contact@dms','+91 000 0000 000','+91 000 0000 000','0','1','2023-06-16 10:14:31','2023-06-16 10:14:31');
