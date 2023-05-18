<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicAwarenessEducation;

class PublicAwarenessEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PublicAwarenessEducation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Public Awareness and Education',
            'marathi_title' => '<b>धोका आणि असुरक्षा मूल्यांकन</b>',
            'english_description' => 'Public awareness and education play a crucial role in preparedness efforts. Heres an explanation of how public awareness and education contribute to disaster preparedness.<br><br>
          
            <ul>
            <li>Risk Communication: Public awareness programs educate communities about potential risks and hazards they may face, such as floods, earthquakes, or cyclones. This includes disseminating information on the likelihood and potential impacts of disasters, as well as providing guidance on preparedness measures, evacuation procedures, and early warning systems. Effective risk communication helps individuals and communities understand the importance of preparedness and take appropriate actions to mitigate risks.</li>
            <li>Knowledge and Skills: Public awareness and education initiatives aim to equip individuals with the knowledge and skills needed to respond effectively during disasters. This includes teaching basic first aid, search and rescue techniques, evacuation procedures, and how to access emergency services. By increasing the knowledge and skills of the public, communities become more self-reliant and better prepared to handle emergency situations.</li>
            <li>Community Engagement: Public awareness programs encourage community engagement and foster a sense of collective responsibility for disaster preparedness. Through workshops, seminars, and community meetings, individuals can come together to discuss local vulnerabilities, develop emergency plans, and establish communication networks. Building a resilient community requires active participation and collaboration among its members.</li>
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
            'english_image' => 'test_english.jpeg',
            'marathi_image' => 'test_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}