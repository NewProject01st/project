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

        

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 1,
            'menu_name_english' => 'Index',
            'menu_name_marathi' => 'Index',
            'order_no' => 1,
            'url'=>'/index',
            'is_static'=>true,
            'is_active' => true,
           
        ]);       
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'Introduction to the disaster management portal',
            'menu_name_marathi' => 'आपत्ती व्यवस्थापन पोर्टलची ओळख',
            'order_no' => 1,
            'url'=>'/list-disastermanagementportal-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'Objective and Goals',
            'menu_name_marathi' => 'उद्दिष्ट आणि ध्येय',
            'url'=>'/list-objectivegoals-web',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 2,
            'menu_name_english' => 'State disaster management authority (SDMA) structure and organization',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) संरचना आणि संघटना',
            'url'=>'/state-disaster-management-authority-web',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => ' Types of disasters (Natural and Man-made)',
            'menu_name_marathi' => 'आपत्तींचे प्रकार (नैसर्गिक आणि मानवनिर्मित)',
            'order_no' => 1,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Earthquakes',
            'menu_name_marathi' => 'भूकंप',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Floods',
            'menu_name_marathi' => 'पूर',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Cyclones',
            'menu_name_marathi' => 'चक्रीवादळ',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Droughts',
            'menu_name_marathi' => 'दुष्काळ',
            'order_no' => 5,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Landslides',
            'menu_name_marathi' => 'भूस्खलन',
            'order_no' => 6,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Industrial accidents ',
            'menu_name_marathi' => 'औद्योगिक अपघात',
            'order_no' => 7,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => 'Fires',
            'menu_name_marathi' => 'आग',
            'order_no' => 8,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 3,
            'menu_name_english' => ' Disaster history and statistics for the state',
            'menu_name_marathi' => 'राज्यासाठी आपत्ती इतिहास आणि आकडेवारी',
            'order_no' => 9,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Hazard and vulnerability assessment',
            'menu_name_marathi' => 'धोका आणि असुरक्षा मूल्यांकन',
            'order_no' => 1,
            'url'=>'/list-hazard-vulnerability-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Early warning systems',
            'menu_name_marathi' => 'पूर्व चेतावणी प्रणाली',
            'order_no' => 2,
            'url'=>'/list-warning-system-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Capacity building and training',
            'menu_name_marathi' => 'क्षमता निर्माण आणि प्रशिक्षण',
            'order_no' => 3,
            'url'=>'/list-capacity-training',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 4,
            'menu_name_english' => 'Public awareness and education',
            'menu_name_marathi' => 'जनजागृती आणि शिक्षण',
            'order_no' => 4,
            'url'=>'/list-awareness-education-web',
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
            'url'=>'/list-state-emergency-operations-center-web',
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
            'url'=>'/list-district-emergency-operations-center-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Emergency contact numbers',
            'menu_name_marathi' => 'आपत्कालीन संपर्क क्रमांक',
            'order_no' => 3,
            'url'=>'/list-emergency-contact-numbers-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => 'Search and rescue teams',
            'menu_name_marathi' => 'शोध आणि बचाव पथके',
            'order_no' => 4,
            'url'=>'/list-search-rescue-teams-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Relief measures and resources',
            'menu_name_marathi' => 'मदत उपाय आणि संसाधने',
            'order_no' => 5,
            'url'=>'/list-relief-measures-resources-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 5,
            'menu_name_english' => ' Evacuation plans',
            'menu_name_marathi' => 'निर्वासन योजना',
            'order_no' => 6,
            'url'=>'/list-evacuation-plans-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 6,
            'menu_name_english' => 'Report a Incident : Crowdsourcing',
            'menu_name_marathi' => 'एका घटनेची तक्रार करा: क्राउडसोर्सिंग',
            'order_no' => 1,
            'url'=>'/list-report-incident-crowdsourcing-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 6,
            'menu_name_english' => 'Be a Volunteer : Citizen Support',
            'menu_name_marathi' => 'स्वयंसेवक व्हा: नागरिक समर्थन',
            'order_no' => 2,
            'url'=>'/volunteer-citizen-support-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 6,
            'menu_name_english' => 'Feedback and suggestions',
            'menu_name_marathi' => 'अभिप्राय आणि सूचना',
            'order_no' => 3,
            'url'=>'/citizen-feedback-suggestions-web',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 7,
            'menu_name_english' => 'Upcoming events and trainings',
            'menu_name_marathi' => 'आगामी कार्यक्रम आणि प्रशिक्षण',
            'order_no' => 1,
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
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => 'State disaster management plan',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन योजना',
            'order_no' => 1,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => ' District disaster management plans',
            'menu_name_marathi' => 'जिल्हा आपत्ती व्यवस्थापन योजना',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => '  State disaster management policy',
            'menu_name_marathi' => 'राज्य आपत्ती व्यवस्थापन धोरण',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 8,
            'menu_name_english' => ' Relevant laws and regulations',
            'menu_name_marathi' => 'संबंधित कायदे आणि नियम',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => ' Documents and publications',
            'menu_name_marathi' => 'दस्तऐवज आणि प्रकाशने',
            'order_no' => 1,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => ' Maps and GIS data',
            'menu_name_marathi' => 'नकाशे आणि GIS डेटा',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => 'Videos and multimedia',
            'menu_name_marathi' => 'व्हिडिओ आणि मल्टीमीडिया',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 9,
            'menu_name_english' => ' Training materials and workshops',
            'menu_name_marathi' => 'प्रशिक्षण साहित्य आणि कार्यशाळा',
            'order_no' => 4,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

         
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Latest news related to disaster management',
            'menu_name_marathi' => 'आपत्ती व्यवस्थापनाशी संबंधित ताज्या बातम्या',
            'order_no' => 1,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

          
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => ' Upcoming events and trainings',
            'menu_name_marathi' => 'आगामी कार्यक्रम आणि प्रशिक्षण',
            'order_no' => 2,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 10,
            'menu_name_english' => 'Success stories and case studies',
            'menu_name_marathi' => 'यशोगाथा आणि केस स्टडी',
            'order_no' => 3,
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 11,
            'menu_name_english' => 'Contact information for SDMA',
            'menu_name_marathi' => 'SDMA साठी संपर्क माहिती',
            'order_no' => 1,
            'url'=>'/contact',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        
        MainSubMenus::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'main_menu_id' => 11,
            'menu_name_english' => 'Feedback and suggestions',
            'menu_name_marathi' => 'अभिप्राय आणि सूचना',
            'order_no' => 2,
            'url'=>'/contact',
            'is_static'=>true,
            'is_active' => true,
           
        ]);

        

    }
}