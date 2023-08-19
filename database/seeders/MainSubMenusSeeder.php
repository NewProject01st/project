<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainSubMenus;


class MainSubMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // MainSubMenus::create([
        //     'created_at' => \Carbon\Carbon::now(),
        //     'updated_at' => \Carbon\Carbon::now(),
        //     'main_menu_id' => 1,
        //     'menu_name_english' => 'Index',
        //     'menu_name_marathi' => 'Index',
        //     'order_no' => 1,
        //     // 'url'=>'index',
        //     'is_static'=>true,
        //     'is_active' => true,
           
        // ]);       
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'Introduction To The Disaster Management Portal',
            'menu_name_marathi' => 'आपत्ती व्यवस्थापन पोर्टलची ओळख',
            'order_no' => 1,
            'url'=>'list-disastermanagementportal-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'Objective And Goals',
            'menu_name_marathi' => 'उद्दिष्ट आणि ध्येय',
            'url'=>'list-objectivegoals-web',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'State Disaster Management Authority (SDMA) Structure And Organization',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) संरचना आणि संघटना',
            'url'=>'state-disaster-management-authority-web',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'Nashik District Disaster management organization Chart',
            'menu_name_marathi' => 'नाशिक जिल्हा आपत्ती व्यवस्थापन संस्था चार्ट',
            'url'=>'state-disaster-management-authority-web',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => ' Types Of Disasters (Natural And Man-made)',
            'menu_name_marathi' => 'आपत्तींचे प्रकार (नैसर्गिक आणि मानवनिर्मित)',
            'order_no' => 1,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Earthquakes',
            'menu_name_marathi' => 'भूकंप',
            'order_no' => 2,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Floods',
            'menu_name_marathi' => 'पूर',
            'order_no' => 3,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Cyclones',
            'menu_name_marathi' => 'चक्रीवादळ',
            'order_no' => 4,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Droughts',
            'menu_name_marathi' => 'दुष्काळ',
            'order_no' => 5,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Landslides',
            'menu_name_marathi' => 'भूस्खलन',
            'order_no' => 6,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Industrial Accidents ',
            'menu_name_marathi' => 'औद्योगिक अपघात',
            'order_no' => 7,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Fires',
            'menu_name_marathi' => 'आग',
            'order_no' => 8,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => ' Disaster History And Statistics For The State',
            'menu_name_marathi' => 'राज्यासाठी आपत्ती इतिहास आणि आकडेवारी',
            'order_no' => 9,
            'is_static'=>false,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Hazard And Vulnerability Assessment',
            'menu_name_marathi' => 'धोका आणि असुरक्षा मूल्यांकन',
            'order_no' => 1,
            'url'=>'list-hazard-vulnerability-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Early Warning Systems',
            'menu_name_marathi' => 'पूर्व चेतावणी प्रणाली',
            'order_no' => 2,
            'url'=>'list-warning-system-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Capacity Building And Training',
            'menu_name_marathi' => 'क्षमता निर्माण आणि प्रशिक्षण',
            'order_no' => 3,
            'url'=>'list-capacity-training',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Public Awareness And Education',
            'menu_name_marathi' => 'जनजागृती आणि शिक्षण',
            'order_no' => 4,
            'url'=>'list-awareness-education-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'COVID Instructions for Public Safety',
            'menu_name_marathi' => 'सार्वजनिक सुरक्षिततेसाठी COVID सूचना',
            'order_no' => 5,
            'url'=>'list-awareness-education-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Blood Bank List As Per Government Of Maharashtra Blood Transfusion Council',
            'menu_name_marathi' => 'महाराष्ट्र शासनाच्या रक्त संक्रमण परिषदेनुसार रक्तपेढीची यादी',
            'order_no' => 6,
            'url'=>'list-awareness-education-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Indian Standards In Disaster Management',
            'menu_name_marathi' => 'आपत्ती व्यवस्थापनातील भारतीय मानके',
            'order_no' => 7,
            'url'=>'list-awareness-education-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'List of Govt Hospitals in Nashik',
            'menu_name_marathi' => 'नाशिकमधील शासकीय रुग्णालयांची यादी',
            'order_no' => 8,
            'url'=>'list-awareness-education-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => 'State Emergency Operations Center (EOC)',
            'menu_name_marathi' => 'राज्य आपत्कालीन ऑपरेशन केंद्र (EOC)',
            'order_no' => 1,
            'url'=>'list-state-emergency-operations-center-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' District Emergency Operations Center (DEOC)',
            'menu_name_marathi' => 'जिल्हा आपत्कालीन ऑपरेशन केंद्र (DEOC)',
            'order_no' => 2,
            'url'=>'list-district-emergency-operations-center-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Emergency Contact Numbers',
            'menu_name_marathi' => 'आपत्कालीन संपर्क क्रमांक',
            'order_no' => 3,
            'url'=>'list-emergency-contact-numbers-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => 'Search And Rescue Teams',
            'menu_name_marathi' => 'शोध आणि बचाव पथके',
            'order_no' => 4,
            'url'=>'list-search-rescue-teams-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Relief Measures And Resources',
            'menu_name_marathi' => 'मदत उपाय आणि संसाधने',
            'order_no' => 5,
            'url'=>'list-relief-measures-resources-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Evacuation Plans',
            'menu_name_marathi' => 'निर्वासन योजना',
            'order_no' => 6,
            'url'=>'list-evacuation-plans-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => 'Nashik City Emergency Operations Center Primary Responsibilities',
            'menu_name_marathi' => 'नाशिक शहर आपत्कालीन ऑपरेशन केंद्राच्या प्राथमिक जबाबदाऱ्या',
            'order_no' => 7,
            'url'=>'list-evacuation-plans-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => 'Functionality of alerting by Emergency Operation Centers',
            'menu_name_marathi' => 'आपत्कालीन ऑपरेशन केंद्रांद्वारे सतर्कतेची कार्यक्षमता',
            'order_no' => 7,
            'url'=>'list-evacuation-plans-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 6,
            'menu_name_english' => 'Report an Incident : Crowdsourcing',
            'menu_name_marathi' => 'एका घटनेची तक्रार करा: क्राउडसोर्सिंग',
            'order_no' => 1,
            'url'=>'report-incident-crowdsourcing-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 6,
            'menu_name_english' => 'Be A Volunteer : Citizen Support',
            'menu_name_marathi' => 'स्वयंसेवक व्हा: नागरिक समर्थन',
            'order_no' => 2,
            'url'=>'add-volunteer-citizen-support-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 7,
            'menu_name_english' => 'Upcoming Events And Trainings',
            'menu_name_marathi' => 'आगामी कार्यक्रम आणि प्रशिक्षण',
            'order_no' => 1,
            'url'=>'list-upcoming-training-event-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 7,
            'menu_name_english' => ' Past Events and Trainings',
            'menu_name_marathi' => 'आगामी कार्यक्रम आणि प्रशिक्षण',
            'order_no' => 2,
            'url'=>'list-past-training-event-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 7,
            'menu_name_english' => 'NDRF Annual Training Calendar two thousand twenty three',
            'menu_name_marathi' => 'NDRF वार्षिक प्रशिक्षण दिनदर्शिका दोन हजार तेवीस',
            'order_no' => 3,
            'url'=>'list-past-training-event-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => 'State Disaster Management Plan',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन योजना',
            'order_no' => 1,
            'url'=>'list-state-disaster-managementplan-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => 'District Disaster Management Plan',
            'menu_name_marathi' => 'जिल्हा आपत्ती व्यवस्थापन योजना',
            'order_no' => 2,
            'url'=>'list-district-disaster-managementplan-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => 'State Disaster Management Policy',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन धोरण',
            'order_no' => 3,
            'url'=>'list-state-management-policy-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => 'Relevant Laws And Regulations',
            'menu_name_marathi' => 'संबंधित कायदे आणि नियम',
            'order_no' => 4,
            'url'=>'list-relevant-laws-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Documents And publications',
            'menu_name_marathi' => 'दस्तऐवज आणि प्रकाशने',
            'order_no' => 1,
            'url'=>'list-documents-publications-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Maps And GIS Data',
            'menu_name_marathi' => 'नकाशे आणि GIS डेटा',
            'order_no' => 2,
            'url'=>'list-maps-gis-data-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Videos And Multimedia',
            'menu_name_marathi' => 'व्हिडिओ आणि मल्टीमीडिया',
            'url'=>'list-multimedia-web',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Trainings Material',
            'menu_name_marathi' => 'प्रशिक्षण साहित्य',
            'url'=>'list-training-materials-workshops-web',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Godavari Basin Water flow Capacity Map',
            'menu_name_marathi' => 'गोदावरी खोऱ्यातील पाणी प्रवाह क्षमता नकाशा',
            'url'=>'list-training-materials-workshops-web',
            'order_no' => 5,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

         
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Latest News Related To Disaster Management',
            'menu_name_marathi' => 'आपत्ती व्यवस्थापनाशी संबंधित ताज्या बातम्या',
            'order_no' => 1,
            'url'=>'list-disaster-management-news-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

          
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Upcoming Events And Trainings',
            'menu_name_marathi' => 'आगामी कार्यक्रम आणि प्रशिक्षण',
            'url'=>'list-upcoming-training-event-web',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Success Stories And Case Studies',
            'menu_name_marathi' => 'यशोगाथा आणि केस स्टडी',
            'url'=>'list-success-stories-web',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Disaster Forecast',
            'menu_name_marathi' => 'आपत्तीचा अंदाज',
            'url'=>'list-disaster-forecast-web',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 11,
            'menu_name_english' => 'Contact Information',
            'menu_name_marathi' => 'संपर्क माहिती',
            'order_no' => 1,
            'url'=>'contact-information',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 11,
            'menu_name_english' => 'Feedback And Suggestions',
            'menu_name_marathi' => 'अभिप्राय आणि सूचना',
            'order_no' => 2,
            'url'=>'feedback-suggestions',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        

    }
}