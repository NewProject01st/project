<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EarlyWarningSystem;

class EarlyWarningSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EarlyWarningSystem::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>Early warning systems</b>',
            'marathi_title' => '<b>पूर्व चेतावणी प्रणाली</b>',
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
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}