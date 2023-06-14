<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;
use App\Models\ObjectiveGoals;
use App\Models\StateDisasterManagementAuthority;
use App\Models\DisasterManagementPortal;
class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisasterManagementPortal::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Introduction to the Disaster Management Portal',
            'marathi_title' => 'आपत्ती व्यवस्थापन पोर्टलची ओळख',
            'english_description' => 'The Disaster Management Portal is a comprehensive online platform designed to facilitate efficient and organized management of disasters. It serves as a centralized hub for disaster-related information, coordination, and collaboration among various stakeholders involved in disaster management, including government agencies, relief organizations, emergency services, and the general public. The portal aims to enhance preparedness, response, and recovery efforts by providing timely and accurate information, tools, and resources.<br>

            The primary objective of the Disaster Management Portal is to ensure effective disaster management by enabling quick and coordinated actions during emergencies. It serves as a vital communication channel, delivering real-time alerts, notifications, and updates to users about disasters occurring in their area. This feature helps individuals and communities stay informed and take necessary precautions or actions to ensure their safety.<br>
            
            One of the key functionalities of the portal is the incident reporting system. Users can report incidents related to disasters, such as earthquakes, floods, fires, or any other emergencies they come across. They can provide essential details about the incident, including its location, severity, and any other relevant information. "
            ',
            'marathi_description' => 'आपत्ती व्यवस्थापन पोर्टल हे एक सर्वसमावेशक ऑनलाइन प्लॅटफॉर्म आहे जे आपत्तींचे कार्यक्षम आणि संघटित व्यवस्थापन सुलभ करण्यासाठी डिझाइन केलेले आहे. हे आपत्ती-संबंधित माहिती, समन्वय आणि सरकारी संस्था, मदत संस्था, आपत्कालीन सेवा आणि सामान्य जनता यासह आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध भागधारकांमध्ये एक केंद्रीकृत केंद्र म्हणून काम करते. वेळेवर आणि अचूक माहिती, साधने आणि संसाधने प्रदान करून सज्जता, प्रतिसाद आणि पुनर्प्राप्ती प्रयत्न वाढवणे हे पोर्टलचे उद्दिष्ट आहे.<br>
            आपत्ती व्यवस्थापन पोर्टलचे प्राथमिक उद्दिष्ट आपत्कालीन परिस्थितीत जलद आणि समन्वित कृती सक्षम करून प्रभावी आपत्ती व्यवस्थापन सुनिश्चित करणे आहे. हे एक महत्त्वपूर्ण संप्रेषण चॅनेल म्हणून काम करते, रीअल-टाइम अलर्ट, सूचना आणि वापरकर्त्यांना त्यांच्या क्षेत्रातील आपत्तींबद्दल अद्यतने वितरीत करते. हे वैशिष्‍ट्य व्‍यक्‍ती आणि समुदायांना माहिती ठेवण्‍यात आणि त्‍यांची सुरक्षितता सुनिश्चित करण्‍यासाठी आवश्‍यक खबरदारी किंवा कृती करण्‍यात मदत करते.<br>
            पोर्टलच्या मुख्य कार्यांपैकी एक म्हणजे घटना अहवाल प्रणाली. वापरकर्ते आपत्तींशी संबंधित घटनांची तक्रार करू शकतात, जसे की भूकंप, पूर, आग किंवा इतर कोणत्याही आपत्कालीन परिस्थिती. ते घटनेचे स्थान, तीव्रता आणि इतर कोणत्याही संबंधित माहितीसह आवश्यक तपशील प्रदान करू शकतात. "

            ',
            'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
            // 'url' => 'disaster',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        ObjectiveGoals::create([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'Objectives of Disaster Management',
                'marathi_title' => 'आपत्ती व्यवस्थापनाची उद्दिष्टे',
                'english_description' => '
                The objectives of a disaster  management portal are the specific goals and purposes it aims to achieve in order to effectively manage and respond to disasters. These objectives can vary depending on the context and requirements of the portal, but some common objectives include:<br>
                
               <ul>
               <li>Enhancing Situational Awareness: Provide real-time information and updates on disaster events, including their location, severity, and impact, to improve situational awareness among stakeholders.</li>
                
                <li> Promoting Preparedness and Planning: Provide resources, tools, and guidelines for individuals, communities, and organizations to enhance their preparedness efforts and develop effective disaster response plans.</li>
                
                <li>Supporting Information Management: Gather, analyze, and present relevant data, maps, reports, and other information to support decision-making processes during disaster events.</li>
                
               <li> Enabling Incident Reporting: Allow users to report incidents related to disasters, such as damage assessment, infrastructure failures, and resource needs, to facilitate a comprehensive understanding of the situation.</li>
                
               <li>Digital Resource Management: Provide a directory of digital resources, including emergency services, relief organizations, and volunteer groups during disaster response.</li>   
              <li> Enhancing Communication and Collaboration: Facilitate effective communication and collaboration among stakeholders, including government agencies, non-profit organizations, and affected communities, to foster a coordinated and integrated approach to disaster management.</li> 
                
              <li> Promoting Public Awareness and Education: Raise public awareness about disaster risks, mitigation strategies, and safety measures through educational materials, campaigns, and training programs.</li> 
                
               <li>Ensuring Accessibility and Inclusivity: Design the portal to be accessible to a wide range of users. Ensure that information and resources are available in multiple languages and formats to cater to diverse needs."</li>
                </ul>',

                'marathi_description' => 'आपत्ती व्यवस्थापन पोर्टलची उद्दिष्टे ही विशिष्ट उद्दिष्टे आणि उद्दिष्टे आहेत जी आपत्तींचे प्रभावीपणे व्यवस्थापन करण्यासाठी आणि त्यांना प्रतिसाद देण्यासाठी ते साध्य करण्याचे उद्दिष्ट ठेवतात. पोर्टलच्या संदर्भ आणि आवश्यकतांवर अवलंबून ही उद्दिष्टे बदलू शकतात, परंतु काही सामान्य उद्दिष्टांमध्ये हे समाविष्ट आहे:<br>
              <ul> 
              <li>परिस्थितीजन्य जागरूकता वाढवणे: स्टेकहोल्डर्समधील परिस्थितीजन्य जागरूकता सुधारण्यासाठी आपत्तीच्या घटनांबद्दल त्यांचे स्थान, तीव्रता आणि प्रभाव यासह रीअल-टाइम माहिती आणि अद्यतने प्रदान करा.</li>
                <li>तयारी आणि नियोजनाला चालना देणे: व्यक्ती, समुदाय आणि संस्थांना त्यांच्या तयारीचे प्रयत्न वाढविण्यासाठी आणि प्रभावी आपत्ती प्रतिसाद योजना विकसित करण्यासाठी संसाधने, साधने आणि मार्गदर्शक तत्त्वे प्रदान करा.</li>  
                <li> सहाय्यक माहिती व्यवस्थापन: आपत्ती घटनांमध्ये निर्णय घेण्याच्या प्रक्रियेस समर्थन देण्यासाठी संबंधित डेटा, नकाशे, अहवाल आणि इतर माहिती गोळा करा, विश्लेषण करा आणि सादर करा.</li>
                <li> घटना अहवाल सक्षम करणे: वापरकर्त्यांना परिस्थितीचे सर्वसमावेशक आकलन सुलभ करण्यासाठी आपत्तींशी संबंधित घटनांची तक्रार करण्याची परवानगी द्या, जसे की नुकसानाचे मूल्यांकन, पायाभूत सुविधा अपयश आणि संसाधनांच्या गरजा.</li>
                <li>  डिजिटल संसाधन व्यवस्थापन: आपत्कालीन सेवा, मदत संस्था आणि आपत्ती प्रतिसादादरम्यान स्वयंसेवक गटांसह डिजिटल संसाधनांची निर्देशिका प्रदान करा.</li>
                <li> संप्रेषण आणि सहयोग वाढवणे: आपत्ती व्यवस्थापनासाठी समन्वित आणि एकात्मिक दृष्टीकोन वाढविण्यासाठी सरकारी संस्था, ना-नफा संस्था आणि प्रभावित समुदायांसह भागधारकांमध्ये प्रभावी संवाद आणि सहयोग सुलभ करा.</li>
                <li> सार्वजनिक जागरुकता आणि शिक्षणाचा प्रचार करणे: शैक्षणिक साहित्य, मोहिमा आणि प्रशिक्षण कार्यक्रमांद्वारे आपत्ती जोखीम, कमी करण्याच्या धोरणे आणि सुरक्षा उपायांबद्दल जनजागृती करणे.</li>
                <li>प्रवेशयोग्यता आणि सर्वसमावेशकता सुनिश्चित करणे: वापरकर्त्यांच्या विस्तृत श्रेणीसाठी प्रवेशयोग्य होण्यासाठी पोर्टल डिझाइन करा. विविध गरजा पूर्ण करण्यासाठी माहिती आणि संसाधने अनेक भाषांमध्ये आणि स्वरूपांमध्ये उपलब्ध असल्याची खात्री करा."</li>
                 </ul> ',
                // 'url' => 'goals',
                'english_image' => '1_english.jpeg',
                'marathi_image' => '1_marathi.jpeg',
                'is_deleted' => false,
                'is_active' => true,
               
            ]);



            ObjectiveGoals::create([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'Goals of Disaster Management',
                'marathi_title' => 'आपत्ती व्यवस्थापनाची उद्दिष्टे',
                'english_description' => '
                The goals of a disaster management portal refer to the overarching objectives or desired outcomes that the portal aims to achieve. These goals typically revolve around improving disaster preparedness, response, and recovery efforts by providing access to information, resources to support effective disaster management. Some common goals of a disaster management portal include:<br>
                
               <ul>
               <li>Enhancing Situational Awareness: The portal aims to provide real-time information and updates on disaster events, including their location, severity, and impact, to help stakeholders make informed decisions and respond effectively.</li>
                
                <li>Facilitating Communication: The portal seeks to enable effective communication and collaboration among various stakeholders involved in disaster management, including government agencies, emergency responders, relief organizations, and affected communities
                .</li>
                
                <li>Promoting Preparedness and Planning: The portal aims to provide resources, guidelines, and tools for disaster preparedness and planning, helping individuals and organizations develop strategies, emergency response plans, and risk mitigation measures.</li>
                
               <li>Improving Response and Recovery Efforts: The portal aims to streamline the response and recovery processes by providing access to critical information, mapping tools, situational analysis, and coordination mechanisms to ensure timely and effective assistance to affected areas.
               </li>
                
               <li>Enhancing Public Awareness and Education: The portal aims to raise public awareness about disaster risks, safety measures, and preparedness strategies through educational materials, interactive features, and campaigns.</li> 
                
              <li>Ensuring Accessibility and Inclusivity: The portal strives to be accessible to all users, including those with disabilities, by incorporating inclusive design principles and providing alternative formats for information dissemination.</li> 
                
               <li>Continuous Improvement and Learning: The portal seeks to foster a culture of continuous improvement by collecting feedback, conducting evaluations, and incorporating lessons learned from past disasters to enhance future disaster management efforts.</li>
                </ul>',

                'marathi_description' => 'आपत्ती व्यवस्थापन पोर्टलची उद्दिष्टे या पोर्टलचे उद्दिष्ट साध्य करण्याच्या व्यापक उद्दिष्टांचा किंवा इच्छित परिणामांचा संदर्भ घेतात. ही उद्दिष्टे सामान्यत: प्रभावी आपत्ती व्यवस्थापनास समर्थन देण्यासाठी माहिती, संसाधनांमध्ये प्रवेश प्रदान करून आपत्ती सज्जता, प्रतिसाद आणि पुनर्प्राप्ती प्रयत्न सुधारण्याभोवती फिरतात. आपत्ती व्यवस्थापन पोर्टलच्या काही सामान्य उद्दिष्टांमध्ये हे समाविष्ट आहे:<br>
              <ul> 
              <li>सार्वजनिक जागरुकता आणि शिक्षण वाढवणे: पोर्टलचे उद्दिष्ट शैक्षणिक साहित्य, संवादात्मक वैशिष्ट्ये आणि मोहिमांद्वारे आपत्ती धोके, सुरक्षा उपाय आणि सज्जता धोरणांबद्दल जनजागृती करणे हे आहे.</li>
                <li>प्रवेशयोग्यता आणि सर्वसमावेशकता सुनिश्चित करणे: पोर्टल सर्व वापरकर्त्यांसाठी, अपंगांसह, सर्वसमावेशक डिझाइन तत्त्वे समाविष्ट करून आणि माहितीच्या प्रसारासाठी पर्यायी स्वरूप प्रदान करून, सर्व वापरकर्त्यांसाठी प्रवेशयोग्य होण्याचा प्रयत्न करते.</li>  
                <li> सहाय्यक माहिती व्यवस्थापन: आपत्ती घटनांमध्ये निर्णय घेण्याच्या प्रक्रियेस समर्थन देण्यासाठी संबंधित डेटा, नकाशे, अहवाल आणि इतर माहिती गोळा करा, विश्लेषण करा आणि सादर करा.</li>
                <li> घटना अहवाल सक्षम करणे: वापरकर्त्यांना परिस्थितीचे सर्वसमावेशक आकलन सुलभ करण्यासाठी आपत्तींशी संबंधित घटनांची तक्रार करण्याची परवानगी द्या, जसे की नुकसानाचे मूल्यांकन, पायाभूत सुविधा अपयश आणि संसाधनांच्या गरजा.</li>
                <li>  डिजिटल संसाधन व्यवस्थापन: आपत्कालीन सेवा, मदत संस्था आणि आपत्ती प्रतिसादादरम्यान स्वयंसेवक गटांसह डिजिटल संसाधनांची निर्देशिका प्रदान करा.</li>
                <li> संप्रेषण आणि सहयोग वाढवणे: आपत्ती व्यवस्थापनासाठी समन्वित आणि एकात्मिक दृष्टीकोन वाढविण्यासाठी सरकारी संस्था, ना-नफा संस्था आणि प्रभावित समुदायांसह भागधारकांमध्ये प्रभावी संवाद आणि सहयोग सुलभ करा.</li>
                <li> सार्वजनिक जागरुकता आणि शिक्षणाचा प्रचार करणे: शैक्षणिक साहित्य, मोहिमा आणि प्रशिक्षण कार्यक्रमांद्वारे आपत्ती जोखीम, कमी करण्याच्या धोरणे आणि सुरक्षा उपायांबद्दल जनजागृती करणे.</li>
                <li>सतत सुधारणा आणि शिक्षण: पोर्टल अभिप्राय गोळा करून, मूल्यमापन आयोजित करून आणि भविष्यातील आपत्ती व्यवस्थापन प्रयत्नांना बळ देण्यासाठी भूतकाळातील आपत्तींमधून शिकलेल्या धड्यांचा समावेश करून सतत सुधारणा करण्याची संस्कृती वाढवण्याचा प्रयत्न करते.</li>
                 </ul> ',
                // 'url' => 'goals',
                'english_image' => '1_english1.jpeg',
                'marathi_image' => '1_marathi1.jpeg',
                'is_deleted' => false,
                'is_active' => true,
               
            ]);

            StateDisasterManagementAuthority::create([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => ' State disaster management authority  (SDMA)',
                'marathi_title' => 'राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA)',
                'english_description' => 'The State Disaster Management Authority (SDMA) in Maharashtra is a government body responsible for disaster management at the state level. It is established under the Disaster Management Act, 2005, which mandates the creation of disaster management authorities at both the national and state levels.<br>
                The SDMA in Maharashtra is tasked with formulating policies, plans, and guidelines for effective disaster management in the state. It coordinates and monitors various disaster management activities and ensures their implementation across different departments and agencies. The authority works towards enhancing the states preparedness, response, and recovery capabilities in the face of disasters.<br> 
                The SDMA Maharashtra is headed by the Chief Minister of the state as the Chairperson and consists of members from different government departments, experts, and representatives from relevant sectors. It works closely with district-level disaster management authorities, local authorities, and other stakeholders to ensure a coordinated and integrated approach to disaster management.<br>
                The primary objectives of the SDMA Maharashtra include:<br> 
                <ul>
                <li>Formulating state-level disaster management policies, plans, and guidelines.
                </li>
                <li>Facilitating capacity building and training programs for disaster management.
                </li>
                <li>Coordinating and integrating efforts of various departments and agencies involved in disaster management.
                </li>
                <li>Ensuring the implementation of disaster risk reduction measures and promoting resilience.
                </li>
                <li>Providing technical support and guidance to district-level disaster management authorities.
                </li>
                <li>Enhancing public awareness and promoting community participation in disaster management.
                </li>
                <li>Coordinating response and relief operations during disasters.
                </li>
                <li>Conducting post-disaster assessments and facilitating recovery and reconstruction efforts.
                </li>
                </ul>
                               ',
                'marathi_description' => 'महाराष्ट्रातील राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) ही राज्य पातळीवर आपत्ती व्यवस्थापनासाठी जबाबदार असलेली सरकारी संस्था आहे. हे आपत्ती व्यवस्थापन कायदा, 2005 अंतर्गत स्थापित केले गेले आहे, जे राष्ट्रीय आणि राज्य दोन्ही स्तरांवर आपत्ती व्यवस्थापन प्राधिकरणांची निर्मिती अनिवार्य करते.<br>
                महाराष्ट्रातील SDMA कडे राज्यातील प्रभावी आपत्ती व्यवस्थापनासाठी धोरणे, योजना आणि मार्गदर्शक तत्त्वे तयार करण्याचे काम आहे. हे विविध आपत्ती व्यवस्थापन क्रियाकलापांचे समन्वय आणि निरीक्षण करते आणि विविध विभाग आणि एजन्सींमध्ये त्यांची अंमलबजावणी सुनिश्चित करते. आपत्तींचा सामना करताना राज्याची तयारी, प्रतिसाद आणि पुनर्प्राप्ती क्षमता वाढविण्याच्या दिशेने प्राधिकरण कार्य करते.<br>
                SDMA महाराष्ट्र चे अध्यक्ष राज्याचे मुख्यमंत्री असतात आणि त्यामध्ये विविध सरकारी विभागांचे सदस्य, तज्ञ आणि संबंधित क्षेत्रातील प्रतिनिधी असतात. हे आपत्ती व्यवस्थापनासाठी समन्वित आणि एकात्मिक दृष्टीकोन सुनिश्चित करण्यासाठी जिल्हा-स्तरीय आपत्ती व्यवस्थापन प्राधिकरणे, स्थानिक प्राधिकरणे आणि इतर भागधारकांशी जवळून कार्य करते.<br>
                SDMA महाराष्ट्राच्या प्राथमिक उद्दिष्टांमध्ये हे समाविष्ट आहे:<br>
                <ul>
                <li>राज्यस्तरीय आपत्ती व्यवस्थापन धोरणे, योजना आणि मार्गदर्शक तत्त्वे तयार करणे.
                </li>
                <li>आपत्ती व्यवस्थापनासाठी क्षमता निर्माण आणि प्रशिक्षण कार्यक्रमांची सोय करणे.
                </li>
                <li>आपत्ती व्यवस्थापनामध्ये गुंतलेल्या विविध विभाग आणि एजन्सींच्या प्रयत्नांचे समन्वय आणि एकत्रीकरण.
                </li>
                <li>आपत्ती जोखीम कमी करण्याच्या उपायांची अंमलबजावणी सुनिश्चित करणे आणि लवचिकतेस प्रोत्साहन देणे.
                </li>
                <li>जिल्हास्तरीय आपत्ती व्यवस्थापन प्राधिकरणांना तांत्रिक सहाय्य आणि मार्गदर्शन प्रदान करणे.
                </li>
                <li>सार्वजनिक जागरूकता वाढवणे आणि आपत्ती व्यवस्थापनामध्ये समुदायाच्या सहभागास प्रोत्साहन देणे.
                </li>
                <li>आपत्ती दरम्यान प्रतिसाद आणि मदत कार्यात समन्वय साधणे.
                </li>
                <li>आपत्तीनंतरचे मूल्यांकन आयोजित करणे आणि पुनर्प्राप्ती आणि पुनर्बांधणीच्या प्रयत्नांना मदत करणे.
                </li>
                </ul>
                ',
                'english_image' => 'slide_english.jpeg',
                'marathi_image' => 'slide_marathi.jpeg',
                // 'url' => 'state',
                'english_image' => '1_english.jpeg',
            'marathi_image' => '1_marathi.jpeg',
                'is_deleted'=>false,
                'is_active'=>true,
            
            ]);

           
    }
}