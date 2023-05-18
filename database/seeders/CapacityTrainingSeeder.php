<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CapacityTraining;

class CapacityTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}