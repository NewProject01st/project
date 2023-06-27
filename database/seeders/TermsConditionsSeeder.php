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
            <b>a.</b> "We," "us," "our" refers to the disaster management service provider.</br>
            <b>b.</b> "Services" refers to the disaster management services provided by us, including but not limited to emergency response, disaster recovery, risk assessment, and mitigation strategies.</br>
            <b>c. </b>"User," "you," "your" refers to any individual or entity using our services.
           </li>
           <li><b>Service Description</b><br>
            <b>a.</b> Our disaster management services aim to assist individuals, organizations, and communities in preparing for, responding to, and recovering from disasters, emergencies, and crises.</br>
            <b>b.</b>  We provide resources, information, and guidance on disaster preparedness, response plans, evacuation procedures, and other related topics.</br>
            <b>c. </b>Our services may include the use of technology, software applications, and communication systems to facilitate effective disaster management.</br>
            <li><b>User Responsibilities</b><br>
            <b>a.</b> You are responsible for providing accurate and up-to-date information when using our services.</br>
            <b>b.</b> You agree to use our services responsibly and in compliance with applicable laws and regulations.</br>
            <b>c. </b>You understand that our services are not a substitute for professional emergency services, and in case of a life-threatening situation, you should contact the appropriate emergency services immediately.
            </li>
            <li><b>Limitations of Liability</b><br>
            <b>a.</b>We strive to provide accurate and reliable information and resources. However, we do not guarantee the accuracy, completeness, or reliability of the information provided.</br>
            <b>b.</b>We are not responsible for any loss, damage, or injury arising from the use of our services or reliance on the information provided.</br>
            <b>c.</b>We shall not be liable for any indirect, incidental, consequential, or punitive damages arising out of or relating to the use of our services.
            </li>
            <li><b>Intellectual Property </b><br>
            <b>a.</b>All intellectual property rights associated with our services, including but not limited to text, graphics, logos, and software, are owned by or licensed to us.</br>
            <b>b.</b>You may not reproduce, modify, distribute, or use any part of our services without our prior written consent.
            </li>
            <li> <b>Privacy and Data Protection</b><br>
            <b>a.</b> We collect and process personal information in accordance with applicable data protection laws and our Privacy Policy.</br>
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
            <b>a.</b>"आम्ही," "आम्ही," "आमचे" म्हणजे आपत्ती व्यवस्थापन सेवा प्रदात्याचा संदर्भ.<br>
            <b>b.</b> "सेवा" म्हणजे आपत्कालीन प्रतिसाद, आपत्ती पुनर्प्राप्ती, जोखीम मूल्यांकन आणि कमी करण्याच्या धोरणांसह, परंतु त्यापुरते मर्यादित नसून, आमच्याद्वारे प्रदान केलेल्या आपत्ती व्यवस्थापन सेवांचा संदर्भ आहे.<br>
            <b>c. </b>"वापरकर्ता," "तुम्ही," "तुमचे" आमच्या सेवा वापरणाऱ्या कोणत्याही व्यक्ती किंवा घटकाला संदर्भित करते.
            </li>
            <li><b>सेवा वर्णन</b><br>
            <b>a.</b>आमच्या आपत्ती व्यवस्थापन सेवांचे उद्दिष्ट व्यक्ती, संस्था आणि समुदायांना आपत्ती, आपत्कालीन परिस्थिती आणि संकटांसाठी तयारी करण्यात, प्रतिसाद देण्यासाठी आणि त्यातून सावरण्यासाठी मदत करणे आहे.<br>
            <b>b.</b> आम्ही आपत्ती तयारी, प्रतिसाद योजना, निर्वासन प्रक्रिया आणि इतर संबंधित विषयांवर संसाधने, माहिती आणि मार्गदर्शन प्रदान करतो.<br>
            <b>c. </b>प्रभावी आपत्ती व्यवस्थापन सुलभ करण्यासाठी आमच्या सेवांमध्ये तंत्रज्ञान, सॉफ्टवेअर ऍप्लिकेशन्स आणि कम्युनिकेशन सिस्टमचा वापर समाविष्ट असू शकतो.
            </li>
            <li><b>वापरकर्त्याच्या जबाबदाऱ्या </b><br>
            <b>a.</b> आमच्या सेवा वापरताना अचूक आणि अद्ययावत माहिती प्रदान करण्यासाठी तुम्ही जबाबदार आहात.<br>
            <b>b.</b> तुम्ही आमच्या सेवा जबाबदारीने आणि लागू कायदे आणि नियमांचे पालन करण्यास सहमत आहात.<br>
            <b>c. </b>तुम्ही समजता की आमच्या सेवा व्यावसायिक आणीबाणीच्या सेवांचा पर्याय नाहीत आणि जीवघेणी परिस्थिती उद्भवल्यास, तुम्ही ताबडतोब योग्य आपत्कालीन सेवांशी संपर्क साधावा.
            </li>
            <li><b>दायित्वाच्या मर्यादा </b><br>
            <b>a.</b>आम्ही अचूक आणि विश्वासार्ह माहिती आणि संसाधने प्रदान करण्याचा प्रयत्न करतो. तथापि, आम्ही प्रदान केलेल्या माहितीच्या अचूकतेची, पूर्णतेची किंवा विश्वासार्हतेची हमी देत ​​नाही.<br>
            <b>b.</b>आमच्या सेवांच्या वापरामुळे किंवा प्रदान केलेल्या माहितीवर अवलंबून राहिल्यामुळे उद्भवलेल्या कोणत्याही नुकसानासाठी, नुकसानीसाठी किंवा दुखापतीसाठी आम्ही जबाबदार नाही.<br>
            <b>c.</b>आमच्या सेवांच्या वापरामुळे किंवा त्यांच्याशी संबंधित कोणत्याही अप्रत्यक्ष, आनुषंगिक, परिणामी, किंवा दंडात्मक नुकसानीसाठी आम्ही जबाबदार राहणार नाही.
            </li>
            <li><b>बौद्धिक संपदा </b><br>
            <b>a.</b>आमच्या सेवांशी संबंधित सर्व बौद्धिक संपदा अधिकार, ज्यात मजकूर, ग्राफिक्स, लोगो आणि सॉफ्टवेअर यांचा समावेश आहे परंतु त्यापुरते मर्यादित नाही, आमच्या मालकीचे आहेत किंवा त्यांचा परवाना आहे.<br>
            <b>b.</b>तुम्ही आमच्या पूर्व लेखी संमतीशिवाय आमच्या सेवांचा कोणताही भाग पुनरुत्पादित, सुधारित, वितरण किंवा वापरू शकत नाही.<br>
            </li>
            <li><b>गोपनीयता आणि डेटा संरक्षण</b><br>
            <b>a.</b> आम्ही लागू डेटा संरक्षण कायदे आणि आमच्या गोपनीयता धोरणानुसार वैयक्तिक माहिती संकलित करतो आणि त्यावर प्रक्रिया करतो. <br>
            <b>b.</b>आमच्या सेवा वापरून, तुम्ही आमच्या गोपनीयता धोरणामध्ये वर्णन केल्यानुसार तुमच्या वैयक्तिक माहितीचे संकलन, प्रक्रिया आणि संचयनास संमती देता.<br>
            </li>
            <li><b>समाप्ती </b><br>
            आम्ही कोणत्याही वेळी पूर्वसूचना किंवा उत्तरदायित्व न देता आमच्या सेवांवरील तुमचा प्रवेश निलंबित किंवा समाप्त करण्याचा अधिकार राखून ठेवतो.
            </li>
            <li><b>Amendments</b><br>
            आम्ही वेळोवेळी या अटी आणि नियम सुधारू किंवा अपडेट करू शकतो आणि आमच्या वेबसाइटवर पोस्ट केल्यावर सुधारित आवृत्ती प्रभावी होईल.
            </li>
            </ul>
            ',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);

      
        }
    }