<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PolicyPrivacy;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PolicyPrivacy::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Privacy Policy',
            'marathi_title' => 'गोपनीयता धोरण',
            'english_description' => 'At Disaster Management, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard the data you provide to us in the context of our disaster management services. Please read this policy carefully to understand our practices regarding your personal information.<br>
            <ul>
            <li><b>Information Collection:</b><br>We may collect personal information from individuals or organizations involved in disaster management activities. This information may include, but is not limited to: Names, contact details, and addresses Demographic information Emergency contact information Any other data necessary for providing disaster management services</li>
            <li><b>Use of Information:</b><br>We use the collected information to: Facilitate and coordinate disaster response and recovery efforts Communicate with individuals or organizations involved in disaster management Provide relevant updates, alerts, and notifications regarding disaster events Conduct research and analysis to improve our disaster management services Comply with legal and regulatory requirements</li>
            <li><b>Data Sharing:</b><br>
            We may share your personal information in the following circumstances:<br>
            With relevant government agencies, emergency services, and authorized partners involved in disaster management activities With trusted third-party service providers who assist us in delivering our services (subject to strict confidentiality obligations) When required by law or to protect our rights, property, or safety, or the rights, property, or safety of others Data Security:<br>
            We employ industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure. However, please note that no method of transmission over the internet or electronic storage is entirely secure, and we cannot guarantee absolute security.
            </li>
            <li><b>Data Retention:</b><br>We will retain your personal information only for as long as necessary to fulfill the purposes for which it was collected and to comply with applicable laws and regulations.
            </li>
            <li><b>Your Rights:</b><br>You have the right to access, correct, or delete your personal information held by us. If you wish to exercise any of these rights or have any concerns regarding your data, please contact us using the information provided in the "Contact Us" section below.</li>
            <li><b>Updates to Privacy Policy:</b><br>
            We may update this Privacy Policy from time to time to reflect changes in our practices or legal obligations. We encourage you to review this policy periodically for any updates.
            </li>
            <li><b>Contact Us:</b><br>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, Please Mail and call us at official contact details given on the contact us page.</li>
            </ul>
            ',
            'marathi_description' => 'आपत्ती व्यवस्थापनात, आम्ही तुमच्या गोपनीयतेचे रक्षण करण्यासाठी आणि तुमच्या वैयक्तिक माहितीची सुरक्षा सुनिश्चित करण्यासाठी वचनबद्ध आहोत. आमच्या आपत्ती व्यवस्थापन सेवांच्या संदर्भात तुम्ही आम्हाला प्रदान केलेला डेटा आम्ही कसा गोळा करतो, वापरतो आणि सुरक्षित करतो हे या गोपनीयता धोरणाची रूपरेषा आहे. तुमच्या वैयक्तिक माहितीशी संबंधित आमच्या पद्धती समजून घेण्यासाठी कृपया हे धोरण काळजीपूर्वक वाचा.<br>
            <ul>
            <li><b>माहिती संकलन:</b><br>आम्ही आपत्ती व्यवस्थापन क्रियाकलापांमध्ये गुंतलेल्या व्यक्ती किंवा संस्थांकडून वैयक्तिक माहिती गोळा करू शकतो. या माहितीमध्ये समाविष्ट असू शकते, परंतु इतकेच मर्यादित नाही: नावे, संपर्क तपशील आणि पत्ते लोकसंख्याशास्त्रीय माहिती आपत्कालीन संपर्क माहिती आपत्ती व्यवस्थापन सेवा प्रदान करण्यासाठी आवश्यक असलेला कोणताही अन्य डेटा
            </li>
            <li><b>माहितीचा वापर:</b><br>आम्ही गोळा केलेल्या माहितीचा वापर यासाठी करतो: आपत्ती प्रतिसाद आणि पुनर्प्राप्ती प्रयत्न सुलभ करणे आणि समन्वयित करणे आपत्ती व्यवस्थापनात गुंतलेल्या व्यक्ती किंवा संस्थांशी संवाद साधणे आपत्ती घटनांबाबत संबंधित अपडेट्स, अलर्ट आणि सूचना प्रदान करणे आमच्या आपत्ती व्यवस्थापन सेवा सुधारण्यासाठी संशोधन आणि विश्लेषण करणे कायदेशीर आणि नियामकांचे पालन करणे आवश्यकता
            </li>
            <li><b>डेटा शेअरिंग: </b><br>
            आम्ही तुमची वैयक्तिक माहिती खालील परिस्थितीत शेअर करू शकतो:<br>
            संबंधित सरकारी एजन्सी, आपत्कालीन सेवा आणि आपत्ती व्यवस्थापन क्रियाकलापांमध्ये सामील असलेल्या अधिकृत भागीदारांसह आमच्या सेवा वितरीत करण्यात आम्हाला मदत करणार्‍या विश्वासू तृतीय-पक्ष सेवा प्रदात्यांसह (कठोर गोपनीयतेच्या बंधनांच्या अधीन) कायद्याद्वारे किंवा आमच्या हक्कांचे, मालमत्तेचे किंवा संरक्षणासाठी आवश्यक असल्यास सुरक्षितता, किंवा इतरांचे अधिकार, मालमत्ता किंवा सुरक्षितता डेटा सुरक्षा:<br>
            तुमच्या वैयक्तिक माहितीचे अनधिकृत प्रवेश, बदल किंवा प्रकटीकरण यापासून संरक्षण करण्यासाठी आम्ही उद्योग-मानक सुरक्षा उपाय वापरतो. तथापि, कृपया लक्षात घ्या की इंटरनेट किंवा इलेक्ट्रॉनिक स्टोरेजद्वारे प्रसारित करण्याची कोणतीही पद्धत पूर्णपणे सुरक्षित नाही आणि आम्ही पूर्ण सुरक्षिततेची हमी देऊ शकत नाही.
            </li>
            <li><b>डेटा धारणा:</b><br>आम्ही तुमची वैयक्तिक माहिती ज्या उद्देशांसाठी ती गोळा केली होती ती पूर्ण करण्यासाठी आणि लागू कायदे आणि नियमांचे पालन करण्यासाठी आवश्यक असेल तोपर्यंतच ठेवू.
            </li>
            <li><b>तुमचे हक्क:</b><br>आमच्याकडे असलेली तुमची वैयक्तिक माहिती ऍक्सेस करण्याचा, दुरुस्त करण्याचा किंवा हटवण्याचा तुम्हाला अधिकार आहे. तुम्हाला यापैकी कोणतेही अधिकार वापरायचे असल्यास किंवा तुमच्या डेटाबाबत काही चिंता असल्यास, कृपया खालील "आमच्याशी संपर्क साधा" विभागात प्रदान केलेली माहिती वापरून आमच्याशी संपर्क साधा.
            </li>
            <li><b>गोपनीयता धोरणासाठी अद्यतने:</b><br>आमच्या पद्धती किंवा कायदेशीर जबाबदाऱ्यांमधील बदल प्रतिबिंबित करण्यासाठी आम्ही हे गोपनीयता धोरण वेळोवेळी अद्यतनित करू शकतो. आम्ही तुम्हाला कोणत्याही अद्यतनांसाठी या धोरणाचे वेळोवेळी पुनरावलोकन करण्यास प्रोत्साहित करतो.
            </li>
            <li><b>आमच्याशी संपर्क साधा:</b><br>या गोपनीयता धोरणाबद्दल किंवा आमच्या डेटा पद्धतींबद्दल तुम्हाला काही प्रश्न, चिंता किंवा विनंत्या असल्यास, कृपया आमच्याशी संपर्क साधा पृष्ठावर दिलेल्या अधिकृत संपर्क तपशीलांवर आम्हाला मेल करा आणि कॉल करा.
            </li>
           
            </ul>            ',
            'is_deleted'=>false,
            'is_active'=>true,
        ]);
        }
    }