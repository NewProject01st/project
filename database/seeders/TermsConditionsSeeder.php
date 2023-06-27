<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TermsCondition;


class TermsConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TermsCondition::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Terms and Conditions',
            'marathi_title' => 'नियम आणि अटी',
            'english_description' => 'Please read these Terms and Conditions carefully before using our disaster management services. These Terms and Conditions govern your access to and use of our services, and by using our services, you agree to be bound by these Terms and Conditions. If you do not agree with any part of these Terms and Conditions, you may not use our services.<br>
            <ul>
            <li><b>Definitions</b><br> 
            <b>a.</b> "We," "us," "our" refers to the disaster management service provider.
           
            <b>b.</b> "Services" refers to the disaster management services provided by us, including but not limited to emergency response, disaster recovery, risk assessment, and mitigation strategies.
           
            <b>c. </b>"User," "you," "your" refers to any individual or entity using our services.
           </li>
            

           <li><b>Service Description</b><br>
           
            <b>a.</b> Our disaster management services aim to assist individuals, organizations, and communities in preparing for, responding to, and recovering from disasters, emergencies, and crises.
           
            <b>b.</b>  We provide resources, information, and guidance on disaster preparedness, response plans, evacuation procedures, and other related topics.
           
            <b>c. </b>Our services may include the use of technology, software applications, and communication systems to facilitate effective disaster management.
           
            <li><b>User Responsibilities</b><br>
           
            <b>a.</b> You are responsible for providing accurate and up-to-date information when using our services.
           
            <b>b.</b> You agree to use our services responsibly and in compliance with applicable laws and regulations.
           
            <b>c. </b>You understand that our services are not a substitute for professional emergency services, and in case of a life-threatening situation, you should contact the appropriate emergency services immediately.
            </li>
            
           
            <li><b>Limitations of Liability</b><br>
           
            <b>a.</b>We strive to provide accurate and reliable information and resources. However, we do not guarantee the accuracy, completeness, or reliability of the information provided.
           
            <b>b.</b>We are not responsible for any loss, damage, or injury arising from the use of our services or reliance on the information provided.
           
            <b>c.</b>We shall not be liable for any indirect, incidental, consequential, or punitive damages arising out of or relating to the use of our services.
            </li>
            
           
            <li><b>Intellectual Property </b><br>
           
            <b>a.</b>All intellectual property rights associated with our services, including but not limited to text, graphics, logos, and software, are owned by or licensed to us.
           
            <b>b.</b>You may not reproduce, modify, distribute, or use any part of our services without our prior written consent.
            </li>
            
           
            <li> <b>Privacy and Data Protection</b><br>
           
            <b>a.</b> We collect and process personal information in accordance with applicable data protection laws and our Privacy Policy.
           
            <b>b.</b>By using our services, you consent to the collection, processing, and storage of your personal information as described in our Privacy Policy.
            </li>
            
           
            <li><b>Termination</b><br>
           
            We reserve the right to suspend or terminate your access to our services at any time without prior notice or liability.
            </li>
            
           
            <li><b>Amendments</b><br>
           
            We may modify or update these Terms and Conditions from time to time, and the updated version will be effective upon posting on our website. 
           </li>
            </ul>
            ',
            'marathi_description' => 'आमच्या आपत्ती व्यवस्थापन सेवा वापरण्यापूर्वी कृपया या अटी आणि नियम काळजीपूर्वक वाचा. या अटी आणि नियम आमच्या सेवांमध्ये तुमचा प्रवेश आणि वापर नियंत्रित करतात आणि आमच्या सेवा वापरून, तुम्ही या अटी व शर्तींना बांधील असण्यास सहमती देता. तुम्ही या अटी व शर्तींच्या कोणत्याही भागाशी सहमत नसल्यास, तुम्ही आमच्या सेवा वापरू शकत नाही.
            <ul>
            <li><b>व्याख्या</b><br>
            <ul>
            <li><b>a.</b>"आम्ही," "आम्ही," "आमचे" म्हणजे आपत्ती व्यवस्थापन सेवा प्रदात्याचा संदर्भ.
            </li>
            <li><b>b.</b> "सेवा" म्हणजे आपत्कालीन प्रतिसाद, आपत्ती पुनर्प्राप्ती, जोखीम मूल्यांकन आणि कमी करण्याच्या धोरणांसह, परंतु त्यापुरते मर्यादित नसून, आमच्याद्वारे प्रदान केलेल्या आपत्ती व्यवस्थापन सेवांचा संदर्भ आहे.
            </li>
            <li><b>c. </b>"वापरकर्ता," "तुम्ही," "तुमचे" आमच्या सेवा वापरणाऱ्या कोणत्याही व्यक्ती किंवा घटकाला संदर्भित करते.
            </li>
            </ul>
            </li>
            <li><b>सेवा वर्णन</b><br>
            <ul>
            <li><b>a.</b>आमच्या आपत्ती व्यवस्थापन सेवांचे उद्दिष्ट व्यक्ती, संस्था आणि समुदायांना आपत्ती, आपत्कालीन परिस्थिती आणि संकटांसाठी तयारी करण्यात, प्रतिसाद देण्यासाठी आणि त्यातून सावरण्यासाठी मदत करणे आहे.
            </li>
            <li><b>b.</b> आम्ही आपत्ती तयारी, प्रतिसाद योजना, निर्वासन प्रक्रिया आणि इतर संबंधित विषयांवर संसाधने, माहिती आणि मार्गदर्शन प्रदान करतो.
            </li>
            <li><b>c. </b>प्रभावी आपत्ती व्यवस्थापन सुलभ करण्यासाठी आमच्या सेवांमध्ये तंत्रज्ञान, सॉफ्टवेअर ऍप्लिकेशन्स आणि कम्युनिकेशन सिस्टमचा वापर समाविष्ट असू शकतो.
            </li>
            </ul>
            </li>
            <li><b>वापरकर्त्याच्या जबाबदाऱ्या </b><br>
            <ul>
            <li><b>a.</b> आमच्या सेवा वापरताना अचूक आणि अद्ययावत माहिती प्रदान करण्यासाठी तुम्ही जबाबदार आहात.
            </li>
            <li><b>b.</b> तुम्ही आमच्या सेवा जबाबदारीने आणि लागू कायदे आणि नियमांचे पालन करण्यास सहमत आहात.
            </li>
            <li><b>c. </b>तुम्ही समजता की आमच्या सेवा व्यावसायिक आणीबाणीच्या सेवांचा पर्याय नाहीत आणि जीवघेणी परिस्थिती उद्भवल्यास, तुम्ही ताबडतोब योग्य आपत्कालीन सेवांशी संपर्क साधावा.
            </li>
            </ul>
            </li>
            <li><b>दायित्वाच्या मर्यादा </b><br>
            <ul>
            <li><b>a.</b>आम्ही अचूक आणि विश्वासार्ह माहिती आणि संसाधने प्रदान करण्याचा प्रयत्न करतो. तथापि, आम्ही प्रदान केलेल्या माहितीच्या अचूकतेची, पूर्णतेची किंवा विश्वासार्हतेची हमी देत ​​नाही.
            </li>
            <li><b>b.</b>आमच्या सेवांच्या वापरामुळे किंवा प्रदान केलेल्या माहितीवर अवलंबून राहिल्यामुळे उद्भवलेल्या कोणत्याही नुकसानासाठी, नुकसानीसाठी किंवा दुखापतीसाठी आम्ही जबाबदार नाही.
            </li>
            <li><b>c.</b>आमच्या सेवांच्या वापरामुळे किंवा त्यांच्याशी संबंधित कोणत्याही अप्रत्यक्ष, आनुषंगिक, परिणामी, किंवा दंडात्मक नुकसानीसाठी आम्ही जबाबदार राहणार नाही.
            </li>
            </ul>
            </li>
            <li><b>बौद्धिक संपदा </b><br>
            <ul>
            <li><b>a.</b>आमच्या सेवांशी संबंधित सर्व बौद्धिक संपदा अधिकार, ज्यात मजकूर, ग्राफिक्स, लोगो आणि सॉफ्टवेअर यांचा समावेश आहे परंतु त्यापुरते मर्यादित नाही, आमच्या मालकीचे आहेत किंवा त्यांचा परवाना आहे.
            </li>
            <li><b>b.</b>तुम्ही आमच्या पूर्व लेखी संमतीशिवाय आमच्या सेवांचा कोणताही भाग पुनरुत्पादित, सुधारित, वितरण किंवा वापरू शकत नाही.
            </li>
            </ul>
            </li>
            <li><b>गोपनीयता आणि डेटा संरक्षण</b><br>
            <ul>
            <li><b>a.</b> आम्ही लागू डेटा संरक्षण कायदे आणि आमच्या गोपनीयता धोरणानुसार वैयक्तिक माहिती संकलित करतो आणि त्यावर प्रक्रिया करतो.
            </li>
            <li><b>b.</b>आमच्या सेवा वापरून, तुम्ही आमच्या गोपनीयता धोरणामध्ये वर्णन केल्यानुसार तुमच्या वैयक्तिक माहितीचे संकलन, प्रक्रिया आणि संचयनास संमती देता.
            </li>
            </ul>
            </li>
            <li><b>समाप्ती </b><br>
            <ul>
            <li>आम्ही कोणत्याही वेळी पूर्वसूचना किंवा उत्तरदायित्व न देता आमच्या सेवांवरील तुमचा प्रवेश निलंबित किंवा समाप्त करण्याचा अधिकार राखून ठेवतो.
            </li>
            </ul>
            </li>
            <li><b>Amendments</b><br>
            <ul>
            <li>आम्ही वेळोवेळी या अटी आणि नियम सुधारू किंवा अपडेट करू शकतो आणि आमच्या वेबसाइटवर पोस्ट केल्यावर सुधारित आवृत्ती प्रभावी होईल.
            </li>
            </ul>
            </li>
            </ul>
  
            </ul>
            ',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

        // TermsCondition::create([
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),
        //     'english_title' => 'Search and Rescue Teams',
        //     'marathi_title' => 'शोध आणि बचाव पथके',
        //     'english_description' => 'In the event of a disaster or emergency situation in Maharashtra, various search and rescue teams are mobilized as part of the emergency response efforts. These teams are trained and equipped to carry out search and rescue operations in different environments and scenarios. Here are some of the search and rescue teams commonly involved in emergency response in Maharashtra:<br>
        //     <ul>
        //     <li><b>National Disaster Response Force (NDRF):</b>  The NDRF is a specialized force under the Ministry of Home Affairs, Government of India. It consists of highly trained personnel skilled in various aspects of search, rescue, and relief operations. NDRF teams are deployed during natural disasters such as earthquakes, floods, cyclones, and building collapses.</li>
        //     <li><b>State Disaster Response Force (SDRF):</b>  The SDRF is a state-level specialized force responsible for responding to disasters within Maharashtra. Similar to the NDRF, SDRF teams are trained in search and rescue techniques and play a crucial role in emergency response operations. They work closely with local administration and other agencies to carry out rescue operations. </li>
        //     <li><b>Fire and Emergency Services:</b>  The Fire and Emergency Services departments have trained personnel and specialized equipment for rescue operations. They respond to various emergencies, including building collapses, industrial accidents, and other incidents requiring search and rescue efforts. Firefighters are trained in techniques such as rope rescue, confined space rescue, and water rescue.</li>
        //     <li><b>Indian Coast Guard:</b>  The Indian Coast Guard is responsible for maritime search and rescue operations along the coast of Maharashtra. They have specialized vessels, aircraft, and personnel trained to respond to emergencies at sea, including shipwrecks, boat accidents, and incidents involving fishermen.</li>
        //     <li><b>Local Police and Civil Defense:</b>  Local police and civil defense personnel also play a vital role in search and rescue operations. They are often the first responders in emergency situations and provide initial assistance until specialized teams arrive. They coordinate with other agencies, manage crowd control, and assist in evacuations.</li>
        //     </ul>
        //     ',
        //     'marathi_description' => 'महाराष्ट्रात आपत्ती किंवा आपत्कालीन परिस्थिती उद्भवल्यास, आपत्कालीन प्रतिसादाच्या प्रयत्नांचा एक भाग म्हणून विविध शोध आणि बचाव पथके एकत्रित केली जातात. या संघांना वेगवेगळ्या वातावरणात आणि परिस्थितींमध्ये शोध आणि बचाव कार्य करण्यासाठी प्रशिक्षित आणि सुसज्ज आहेत. महाराष्ट्रात आपत्कालीन प्रतिसादात सामील असलेल्या काही शोध आणि बचाव पथके येथे आहेत:<br>
        //     <ul>
        //     <li><b>राष्ट्रीय आपत्ती प्रतिसाद दल (NDRF):</b>  NDRF हे भारत सरकारच्या गृह मंत्रालयाच्या अंतर्गत एक विशेष दल आहे. यामध्ये शोध, बचाव आणि मदत कार्याच्या विविध पैलूंमध्ये कुशल उच्च प्रशिक्षित कर्मचारी असतात. भूकंप, पूर, चक्रीवादळ आणि इमारत कोसळणे यासारख्या नैसर्गिक आपत्तींच्या वेळी एनडीआरएफची टीम तैनात असते.</li>
        //     <li><b>स्टेट डिझास्टर रिस्पॉन्स फोर्स (एसडीआरएफ):</b>  एसडीआरएफ हे महाराष्ट्रातील आपत्तींना प्रतिसाद देण्यासाठी जबाबदार राज्य-स्तरीय विशेष दल आहे. एनडीआरएफ प्रमाणेच, एसडीआरएफ संघांना शोध आणि बचाव तंत्राचे प्रशिक्षण दिले जाते आणि आपत्कालीन प्रतिसाद कार्यात महत्त्वपूर्ण भूमिका बजावतात. ते बचाव कार्य करण्यासाठी स्थानिक प्रशासन आणि इतर एजन्सींच्या जवळ काम करतात.</li>
        //     <li><b>अग्निशमन आणि आपत्कालीन सेवा:</b>  अग्निशमन आणि आपत्कालीन सेवा विभागांमध्ये बचाव कार्यासाठी प्रशिक्षित कर्मचारी आणि विशेष उपकरणे आहेत. ते इमारती कोसळणे, औद्योगिक अपघात आणि शोध आणि बचाव प्रयत्नांची आवश्यकता असलेल्या इतर घटनांसह विविध आपत्कालीन परिस्थितींना प्रतिसाद देतात. अग्निशामकांना रोप बचाव, मर्यादित जागा बचाव आणि पाणी बचाव यांसारख्या तंत्रांचे प्रशिक्षण दिले जाते.</li>
        //     <li><b>भारतीय तटरक्षक दल:</b>  भारतीय तटरक्षक दल महाराष्ट्राच्या किनारपट्टीवर सागरी शोध आणि बचाव कार्यासाठी जबाबदार आहे. त्यांच्याकडे विशेष जहाजे, विमाने आणि समुद्रातील आपत्कालीन परिस्थितींना प्रतिसाद देण्यासाठी प्रशिक्षित कर्मचारी आहेत, ज्यात जहाजाचे तुकडे होणे, बोटीचे अपघात आणि मच्छिमारांचा समावेश असलेल्या घटनांचा समावेश आहे.</li>
        //     <li><b>स्थानिक पोलीस आणि नागरी संरक्षण:</b> स्थानिक पोलीस आणि नागरी संरक्षण कर्मचारी देखील शोध आणि बचाव कार्यात महत्वाची भूमिका बजावतात. ते अनेकदा आपत्कालीन परिस्थितीत प्रथम प्रतिसादकर्ते असतात आणि विशेष कार्यसंघ येईपर्यंत प्राथमिक मदत करतात. ते इतर एजन्सींशी समन्वय साधतात, गर्दीचे नियंत्रण व्यवस्थापित करतात आणि बाहेर काढण्यात मदत करतात.</li>
        //     </ul>
        //     ',
           
        //     'is_deleted'=>false,
        //     'is_active'=>true,
        
        // ]);
        }
    }