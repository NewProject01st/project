<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentInformation;


class DepartmentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Emergency Department',
            'marathi_title' => 'आपत्कालीन विभाग',
            'english_description' => "The Nashik Emergency Department is a well-established and comprehensive facility that caters to the urgent healthcare needs of the community. Here's a point-wise description of the department and the essential helpline services it offers:

            Medical Expertise: The Nashik Emergency Department boasts a team of highly skilled and dedicated medical professionals, including doctors, nurses, and support staff, capable of handling a wide range of medical emergencies with precision and care.
            
            State-of-the-art Infrastructure: Equipped with modern medical technology and equipment, the department ensures prompt and accurate diagnosis and treatment for patients in critical conditions.
            
            24/7 Availability: The emergency services are available round-the-clock, ensuring that help is readily accessible during any hour of the day or night.
            
            PMKISAN Helpline (PM-Kisan Samman Nidhi): For matters related to the government's farmer welfare scheme, individuals can reach out to the PMKISAN helpline at 011-23381092 for assistance and support.
            
            Child Helpline: To address concerns related to child safety, protection, or any emergency involving children, the department provides a dedicated Child Helpline accessible at 1098.
            
            Maharashtra Legislative Council Election Helpline: For information or queries regarding the Biennial Election to the Maharashtra Legislative Council From Graduates Constituencies in 2023, citizens can contact the election helpline at 0253-2319006.
            
            Senior Citizen Helpline: The department offers specialized assistance to senior citizens facing emergencies or requiring support, accessible through the Senior Citizen Helpline at 1090.
            
            NIC Service Desk: In case of technical issues or inquiries related to NIC services, individuals can seek assistance by dialing the toll-free NIC Service Desk at 1800-111-555.
            
            Women's Helpline: The department prioritizes the safety and well-being of women, providing a dedicated Women's Helpline at 1091 for emergencies, counseling, or support services.
            
            Citizen Call Centre Maharashtra: For general inquiries or assistance concerning various government services and schemes, citizens can contact the Citizen Call Centre at 18001208040.",
            'marathi_description' => 'नाशिक आपत्कालीन विभाग ही एक सुस्थापित आणि सर्वसमावेशक सुविधा आहे जी समाजाच्या तातडीच्या आरोग्य सेवांच्या गरजा पूर्ण करते. विभाग आणि ते देत असलेल्या अत्यावश्यक हेल्पलाइन सेवांचे येथे पॉइंट-निहाय वर्णन आहे:

            वैद्यकीय निपुणता: नाशिक आपत्कालीन विभाग अत्यंत कुशल आणि समर्पित वैद्यकीय व्यावसायिकांची एक टीम आहे, ज्यामध्ये डॉक्टर, परिचारिका आणि सहाय्यक कर्मचारी यांचा समावेश आहे, जे विस्तृत वैद्यकीय आपत्कालीन परिस्थिती अचूक आणि काळजीने हाताळण्यास सक्षम आहेत.
            अत्याधुनिक पायाभूत सुविधा: आधुनिक वैद्यकीय तंत्रज्ञान आणि उपकरणांनी सुसज्ज, विभाग गंभीर परिस्थितीत रुग्णांसाठी त्वरित आणि अचूक निदान आणि उपचार सुनिश्चित करतो.
            24/7 उपलब्धता: आपत्कालीन सेवा चोवीस तास उपलब्ध असतात, दिवसा किंवा रात्री कोणत्याही वेळी मदत सहज उपलब्ध होईल याची खात्री करून.
            PMKISAN हेल्पलाइन (PM-Kisan Samman Nidhi): सरकारच्या शेतकरी कल्याण योजनेशी संबंधित बाबींसाठी, व्यक्ती मदत आणि समर्थनासाठी 011-23381092 वर PMKISAN हेल्पलाइनवर संपर्क साधू शकतात.
            चाइल्ड हेल्पलाइन: मुलांची सुरक्षा, संरक्षण किंवा मुलांचा समावेश असलेल्या कोणत्याही आपत्कालीन परिस्थितीशी संबंधित समस्यांचे निराकरण करण्यासाठी, विभाग 1098 वर प्रवेशयोग्य एक समर्पित चाइल्ड हेल्पलाइन प्रदान करतो.
            महाराष्ट्र विधानपरिषद निवडणूक हेल्पलाइन: 2023 मध्ये पदवीधर मतदारसंघातून महाराष्ट्र विधान परिषदेच्या द्विवार्षिक निवडणुकीबाबत माहिती किंवा प्रश्नांसाठी, नागरिक 0253-2319006 या क्रमांकावर निवडणूक हेल्पलाइनशी संपर्क साधू शकतात.
            ज्येष्ठ नागरिक हेल्पलाइन: विभाग आपत्कालीन परिस्थितीचा सामना करणार्‍या किंवा समर्थनाची आवश्यकता असलेल्या ज्येष्ठ नागरिकांना 1090 वर ज्येष्ठ नागरिक हेल्पलाइनद्वारे उपलब्ध असलेल्या विशेष सहाय्य प्रदान करतो.
            NIC सेवा डेस्क: NIC सेवांशी संबंधित तांत्रिक समस्या किंवा चौकशीच्या बाबतीत, व्यक्ती टोल-फ्री NIC सेवा डेस्क 1800-111-555 वर डायल करून मदत घेऊ शकतात.
            महिला हेल्पलाइन: विभाग महिलांची सुरक्षा आणि कल्याण यांना प्राधान्य देतो, आणीबाणी, समुपदेशन किंवा समर्थन सेवांसाठी 1091 वर समर्पित महिला हेल्पलाइन प्रदान करतो.
            सिटीझन कॉल सेंटर महाराष्ट्र: विविध सरकारी सेवा आणि योजनांबाबत सामान्य चौकशी किंवा मदतीसाठी, नागरिक 18001208040 या क्रमांकावर सिटीझन कॉल सेंटरशी संपर्क साधू शकतात.',
            'english_image' => '1_english_icon.png',
            'marathi_image' => '1_english_icon.png',
            'english_image_new' => '1_english.png',
            'marathi_image_new' => '1_marathi.png',
            'url'   => 'https://nashik.gov.in/helpline/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Public Health Department',
            'marathi_title' => 'सार्वजनिक आरोग्य विभाग',
            'english_description' => 'The Nashik Medical & Health Department plays a vital role in overseeing and ensuring the well-being and healthcare services of the citys residents. It comprises dedicated professionals who work tirelessly to maintain public health standards and provide quality medical services.

            Key personnel in the department include the Health Officer and the Medical Superintendent, each responsible for specific aspects of healthcare management.
            
            Health Officer:
            
            Department: Health Department
            
            Phone (Office): 2222466 / 2572062
            
            Mobile No.: 9422259115
            
            Email: health[at]nashikcorporation[dot]in
            
            Medical Superintendent:
            
            Department: Medical Department
            
            Phone (Office): 2222534 / 2317292
            
            Mobile No.: 9423777180
            
            Email: med_sup[at]nashikcorporation[dot]in
            
            The Health Officer oversees public health initiatives, disease prevention programs, and health awareness campaigns to promote a healthier community. They coordinate with various healthcare institutions and government agencies to address health-related challenges effectively.
            
            The Medical Superintendent, on the other hand, manages the medical facilities within Nashik, ensuring that hospitals and clinics are well-equipped and staffed with qualified professionals to provide quality medical care to patients.
            
            The department actively engages in data collection, research, and analysis to identify prevalent health issues and develop targeted solutions for the well-being of the citizens.
            
            Nashik Medical & Health Department is committed to fostering a healthier city by promoting health literacy, preventive healthcare, and responsive medical services, making it an essential pillar of the citys healthcare system.',
            'marathi_description' => 'नाशिक वैद्यकीय आणि आरोग्य विभाग शहरातील रहिवाशांचे कल्याण आणि आरोग्य सेवांवर देखरेख आणि खात्री करण्यासाठी महत्त्वपूर्ण भूमिका बजावते. यामध्ये समर्पित व्यावसायिकांचा समावेश आहे जे सार्वजनिक आरोग्य मानक राखण्यासाठी आणि दर्जेदार वैद्यकीय सेवा प्रदान करण्यासाठी अथक परिश्रम करतात.

            विभागातील प्रमुख कर्मचार्‍यांमध्ये आरोग्य अधिकारी आणि वैद्यकीय अधीक्षक यांचा समावेश होतो, ते प्रत्येक आरोग्यसेवा व्यवस्थापनाच्या विशिष्ट पैलूंसाठी जबाबदार असतात.
            
            आरोग्य अधिकारी:
            
            विभाग: आरोग्य विभाग
            
            फोन (ऑफिस): 2222466 / 2572062
            
            मोबाईल क्रमांक : ९४२२२५९११५
            
            ईमेल: health[at]nashikcorporation[dot]in
            
            वैद्यकीय अधीक्षक:
            
            विभाग: वैद्यकीय विभाग
            
            फोन (ऑफिस): 2222534 / 2317292
            
            मोबाईल क्रमांक : ९४२३७७७१८०
            
            ईमेल: med_sup[at]nashikcorporation[dot]in
            
            आरोग्य अधिकारी सार्वजनिक आरोग्य उपक्रम, रोग प्रतिबंधक कार्यक्रम आणि निरोगी समुदायाला चालना देण्यासाठी आरोग्य जागरूकता मोहिमांवर देखरेख करतात. आरोग्याशी संबंधित आव्हाने प्रभावीपणे हाताळण्यासाठी ते विविध आरोग्य सेवा संस्था आणि सरकारी संस्थांशी समन्वय साधतात.
            
            दुसरीकडे, वैद्यकीय अधीक्षक, रुग्णांना दर्जेदार वैद्यकीय सेवा देण्यासाठी रुग्णालये आणि दवाखाने सुसज्ज आहेत आणि पात्र व्यावसायिकांसह कर्मचारी आहेत याची खात्री करून, नाशिकमधील वैद्यकीय सुविधांचे व्यवस्थापन करतात.
            
            प्रचलित आरोग्य समस्या ओळखण्यासाठी आणि नागरिकांच्या कल्याणासाठी लक्ष्यित उपाय विकसित करण्यासाठी विभाग डेटा संकलन, संशोधन आणि विश्लेषणामध्ये सक्रियपणे व्यस्त आहे.
            
            नाशिक वैद्यकीय आणि आरोग्य विभाग आरोग्य साक्षरता, प्रतिबंधात्मक आरोग्यसेवा आणि प्रतिसादात्मक वैद्यकीय सेवांचा प्रचार करून, शहराच्या आरोग्य सेवा व्यवस्थेचा एक आवश्यक आधारस्तंभ बनवून निरोगी शहराला प्रोत्साहन देण्यासाठी वचनबद्ध आहे.',
            'english_image' => '2_english_icon.png',
            'marathi_image' => '2_english_icon.png',
            'english_image_new' => '2_english.png',
            'marathi_image_new' => '2_marathi.png',
            'url'   => 'http://nashik.gov.in/helpline-2/',
            // 'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Information Desk/Hotline',
            'marathi_title' => 'माहिती डेस्क/हॉटलाइन',
            'english_description' => 'Commissioner: Phone (Off.) - 2578206, Mobile No. - 2575607, Email - commissioner[at]nashikcorporation[dot]in

            PA to Commissioner: Phone (Off.) - 2578206, Mobile No. - 9423179199, Email - pacommissioner[at]nashikcorporation[dot]in
            
            Additional Commissioner 1: Phone (Off.) - 2222611, Email - addcommissioner[at]nashikcorporation[dot]in
            
            Additional Commissioner 2: Phone (Off.) - 2222613, Email - addcommissioner2[at]nashikcorporation[dot]in
            General Administration Dept.

Dy. Commissioner (LBT, Security, PR, Centralize Store): Phone (Off.) - 2222452/2570563, Mobile No. - 9423179212, Email - lbt[at]nashikcorporation[dot]in

Dy. Commissioner (Encroachment, Sports, Slum, Book Issuing, Printing Distribution): Phone (Off.) - 2222409, Mobile No. - 9422749061, Email - dmc_e[at]nashikcorporation[dot]in

Dy. Commissioner (Godavari Conservation, Labour Welfare, Water Tax, Property Tax, NULM, Complaint Redressal): Mobile No. - 7768006444, Email - dmc_t[at]nashikcorporation[dot]in, dmc_godavariconsv[at]nashikcorporation[dot]in

Dy. Commissioner (Admin): Phone (Off.) - 2222408/2578266, Mobile No. - 9405366333, Email - dmc_a[at]nashikcorporation[dot]in

Dy. Commissioner (Admin) (School Board, Suvarna Jayanti, MTS): Phone (Off.) - 2222410, Mobile No. - 9423179125, Email - dmc_edu[at]nashikcorporation[dot]in

Asst. Commissioner (Women & Child Welfare): Phone (Off.) - 2222599, Mobile No. - 8108477105, Email - asst_commwomen[at]nashikcorporation[dot]in

Asst. Commissioner (LBT): Mobile No. - 9420484831, Email - asst_commlbt[at]nashikcorporation[dot]in

Asst. Commissioner (Administration): Phone (Off.) - 2222415, Mobile No. - 9423179161, Email - asst_commadmin[at]nashikcorporation[dot]in

Asst. Commissioner (Enchrochment): Phone (Off.) - 2577546, Mobile No. - 8275015391, Email - asst_commenchroch[at]nashikcorporation[dot]in

Asst. Commissioner (MTS, Tax & Valuation): Phone (Off.) - 2222455, Mobile No. - 8275252096, Email - asst_commmts[at]nashikcorporation[dot]in
Public Work Department (PWD) 

City Engineer: Phone (Off.) - 2222441/2577922, Mobile No. - 9423179104, Email - ce[at]nashikcorporation[dot]in

Executive Engineers: Contact details vary based on divisions.

Account Department


Chief Account Officer (Account Department): Phone (Off.) - 2222471/2315139, Mobile No. - 9422226223, Email - cao[at]nashikcorporation[dot]in

Chief Account Officer (Labour Welfare Department): Phone (Off.) - 2222459, Mobile No. - 9423179105, Email - cao_2[at]nashikcorporation[dot]in

Audit Department


Chief Auditor: Phone (Off.) - 2222600/2317387, Mobile No. - 9423388405, Email - ca[at]nashikcorporation[dot]in

Water Supply Department

 
Superintendent Engineer (Water Supply & Mechanical Department): Phone (Off.) - 2222421, Mobile No. - 9423179119, Email - se_ws[at]nashikcorporation[dot]in, se_mech[at]nashikcorporation[dot]in

Executive Engineers: Contact details vary based on divisions.

Drainage Department

Superintendent Engineer: Phone (Off.) - 2581252, Mobile No. - 9423179116, Email - se_drainage[at]nashikcorporation[dot]in

Executive Engineers: Contact details vary based on divisions.

Electrical Department

Executive Engineer (Panchavati, Nashik East Division)

Designation: Executive Engineer

Location: Panchavati, Nashik East Division

Phone (Office): 2222433

Mobile No.: 9423179135

Email: ee2electrical[at]nashikcorporation[dot]in

Executive Engineer (Nashik Road, Nashik West, Panchavati, New Nashik Division)

Designation: Executive Engineer

Location: Nashik Road, Nashik West, Panchavati, New Nashik Division

Mobile No.: 9423179134

Email: ee_electrical[at]nashikcorporation[dot]in

Estate Department

Deputy Engineer: Phone (Off.) - 2222540, Mobile No. - 9423179141, Email - de_estate[at]nashikcorporation[dot]in

Estate Department

Deputy Engineer: Phone (Off.) - 2222540, Mobile No. - 9423179141, Email - de_estate[at]nashikcorporation[dot]in

Garden Department

Garden Superintendent: Phone (Off.) - 2578226, Mobile No. - 9423179221, Email - garden_sup[at]nashikcorporation[dot]in

Medical & Health Department

Health Officer: Phone (Off.) - 2222466/2572062, Mobile No. - 9422259115, Email - health[at]nashikcorporation[dot]in

Medical Superintendent: Phone (Off.) - 2222534/2317292, Mobile No. - 9423777180, Email - med_sup[at]nashikcorporation[dot]in

Fire Department

Chief Fire Officer: Phone (Off.) - 2509766/2590871, Mobile No. - 9423179101, Email - cfo[at]nashikcorporation[dot]in

Municipal Secretary Department

Municipal Secretary: Phone (Off.) - 2578269/2222522, Mobile No. - 9423179106, Email - mun_sec[at]nashikcorporation[dot]in

Town Planning Department

Asst. Director Town Planning: Phone (Off.) - 2222540/2572912, Mobile No. - 8275022627, Email - adtp[at]nashikcorporation[dot]in

Executive Engineer: Phone (Off.) - 2222541/2312751, Mobile No. - 9423179162, Email - eetownplanning[at]nashikcorporation[dot]in

Kalidas Kala Mandir

Manager: Phone (Off.) - 2502930/2311889, Mobile No. - 9423179160, Email - kalidas[at]nashikcorporation[dot]in

Computer Department

Head of Department: Phone (Off.) - 2222429, Mobile No. - 9423179133, Email - hod_computer[at]nashikcorporation[dot]in

Education Department

Administrative Officer: Phone (Off.) - 2571289/2361188, Mobile No. - 9011558949, Email - edu_off[at]nashikcorporation[dot]in

Public Relation Department

Public Relation Officer: Phone (Off.) - 2222495/2222427, Mobile No. - 9422222195, Email - pro[at]nashikcorporation[dot]io ',
            'marathi_description' => 'आयुक्त: 

            फोन (ऑफिस)- २५७८२०६, मोबाईल क्र. - 2575607, ईमेल - आयुक्त[येट] नाशिक कॉर्पोरेशन
            
            पीए ते आयुक्त: फोन (ऑफिस) - २५७८२०६, मोबाईल क्र. - 9423179199, ईमेल - pacommissioner[at]nashikcorporation[dot]in
            
            अतिरिक्त आयुक्त 1: फोन (ऑफिस) - 2222611, ईमेल - addcommissioner[at]nashikcorporation[dot]in
            
            अतिरिक्त आयुक्त 2: फोन (ऑफिस) - 2222613, ईमेल - addcommissioner2[at]nashikcorporation[dot]in
            
            सामान्य प्रशासन विभाग
            
            Dy. आयुक्त (LBT, सुरक्षा, PR, सेंट्रलाइज स्टोअर): फोन (ऑफिस) - 2222452/2570563, मोबाईल क्र. - 9423179212, ईमेल - lbt[at]nashikcorporation[dot]in
            
            Dy. आयुक्त (अतिक्रमण, क्रीडा, झोपडपट्टी, पुस्तक देणे, छपाई वितरण): फोन (ऑफिस) - २२२२४०९, मोबाईल क्र. - 9422749061, ईमेल - dmc_e[at]nashikcorporation[dot]in
            
            Dy. आयुक्त (गोदावरी संवर्धन, कामगार कल्याण, पाणी कर, मालमत्ता कर, एनयूएलएम, तक्रार निवारण): मोबाईल क्र. - 7768006444, ईमेल - dmc_t[at]nashikcorporation[dot]in, dmc_godavariconsv[at]nashikcorporation[dot]in
            
            Dy. आयुक्त (प्रशासन): फोन (ऑफिस) - २२२२४०८/२५७८२६६, मोबाईल क्र. - 9405366333, ईमेल - dmc_a[at]nashikcorporation[dot]in
            
            Dy. आयुक्त (प्रशासन) (शाळा मंडळ, सुवर्ण जयंती, एमटीएस): फोन (ऑफिस) - २२२२४१०, मोबाईल क्र. - ९४२३१७९१२५, ईमेल - dmc_edu[at]nashikcorporation[dot]in
            
            सहाय्यक आयुक्त (महिला व बालकल्याण): फोन (ऑफिस) - २२२२५९९, मोबाईल क्र. - 8108477105, ईमेल - asst_commwomen[at]nashikcorporation[dot]in
            
            सहाय्यक आयुक्त (एलबीटी): मोबाईल क्र. - 9420484831, ईमेल - asst_commlbt[at]nashikcorporation[dot]in
            
            सहाय्यक आयुक्त (प्रशासन): फोन (ऑफिस) - २२२२४१५, मोबाईल क्र. - ९४२३१७९१६१, ईमेल - asst_commadmin[at]nashikcorporation[dot]in
            
            सहाय्यक आयुक्त (एनक्रोचमेंट): फोन (ऑफिस) - २५७७५४६, मोबाईल क्र. - 8275015391, ईमेल - asst_commenchroch[at]nashikcorporation[dot]in
            
            सहाय्यक आयुक्त (MTS, कर आणि मूल्यांकन): फोन (ऑफिस) - 2222455, मोबाईल क्र. - 8275252096, ईमेल - asst_commmts[at]nashikcorporation[dot]in
            
            सार्वजनिक बांधकाम विभाग (PWD)
            
            शहर अभियंता: फोन (ऑफिस)- २२२२४४१/२५७७९२२, मोबाईल नं. - 9423179104, ईमेल - ce[at]nashikcorporation[dot]in
            
            कार्यकारी अभियंता: संपर्क तपशील विभागांवर आधारित बदलतात.
            
            लेखा विभाग
                        
            मुख्य लेखाधिकारी (लेखा विभाग): फोन (ऑफिस) - २२२२४७१/२३१५१३९, मोबाईल क्र. - ९४२२२२६२२३, ईमेल - cao[at]nashikcorporation[dot]in
            
            मुख्य लेखाधिकारी (कामगार कल्याण विभाग): फोन (ऑफिस) - २२२२४५९, मोबाईल क्र. - 9423179105, ईमेल - cao_2[at]nashikcorporation[dot]in
            
            लेखापरीक्षण विभाग
            
            मुख्य लेखा परीक्षक: फोन (ऑफिस)- २२२२६००/२३१७३८७, मोबाईल क्र. - 9423388405, ईमेल - ca[at]nashikcorporation[dot]in
            
            पाणी पुरवठा विभाग
             
            अधीक्षक अभियंता (पाणी पुरवठा व यांत्रिक विभाग): फोन (ऑफिस) - २२२२४२१, मोबाईल क्र. - 9423179119, ईमेल - se_ws[at]nashikcorporation[dot]in, se_mech[at]nashikcorporation[dot]in
            
            कार्यकारी अभियंता: संपर्क तपशील विभागांवर आधारित बदलतात.
            
            ड्रेनेज विभाग
            
            अधीक्षक अभियंता: फोन (ऑफिस) - २५८१२५२, मोबाईल क्र. - 9423179116, ईमेल - se_drainage[at]nashikcorporation[dot]in
            
            कार्यकारी अभियंता: संपर्क तपशील विभागांवर आधारित बदलतात.
            
            विद्युत विभाग
            
            कार्यकारी अभियंता (पंचवटी, नाशिक पूर्व विभाग)
            
            पदनाम: कार्यकारी अभियंता
            
            ठिकाण: पंचवटी, नाशिक पूर्व विभाग
            
            फोन (ऑफिस): 2222433
            
            मोबाईल क्रमांक : ९४२३१७९१३५
            
            ईमेल: ee2electrical[at]nashikcorporation[dot]in
            
            कार्यकारी अभियंता (नाशिक रोड, नाशिक पश्चिम, पंचवटी, नवीन नाशिक विभाग)
            
            पदनाम: कार्यकारी अभियंता
            
            ठिकाण: नाशिकरोड, नाशिक पश्चिम, पंचवटी, नवीन नाशिक विभाग
            
            मोबाईल क्रमांक : ९४२३१७९१३४
            
            ईमेल: ee_electrical[at]nashikcorporation[dot]in
            
            इस्टेट विभाग
            
            उपअभियंता: फोन (ऑफिस) - 2222540, मोबाईल क्र. - 9423179141, ईमेल - de_estate[at]nashikcorporation[dot]in
            
            उद्यान विभाग
            
            उद्यान अधीक्षक: फोन (ऑफिस) - २५७८२२६, मोबाईल क्र. - 9423179221, ईमेल - गार्डन_सप[वर]नाशिककॉर्पोरेशन[डॉट]इन
            
            वैद्यकीय आणि आरोग्य विभाग
            
            आरोग्य अधिकारी: फोन (ऑफिस) - 2222466/2572062, मोबाईल नं. - 9422259115, ईमेल - आरोग्य[वर]नाशिक कॉर्पोरेशन[डॉट]इन
            
            वैद्यकीय अधीक्षक: फोन (ऑफिस)- २२२२५३४/२३१७२९२, मोबाईल क्र. - 9423777180, ईमेल - med_sup[at]nashikcorporation[dot]in
            
            अग्निशमन विभाग
            
            मुख्य अग्निशमन अधिकारी: फोन (ऑफिस) - 2509766/2590871, मोबाईल नं. - 9423179101, ईमेल - cfo[at]nashikcorporation[dot]in
            
            नगरसचिव विभाग
            
            नगरसचिव: फोन (ऑफिस)- २५७८२६९/२२२२५२२, मोबाईल क्र. - 9423179106, ईमेल - mun_sec[at]nashikcorporation[dot]in
            
            नगररचना विभाग
            
            सहाय्यक संचालक नगर नियोजन: फोन (ऑफिस)- २२२२५४०/२५७२९१२, मोबाईल क्र. - 8275022627, ईमेल - adtp[at]nashikcorporation[dot]in
            
            कार्यकारी अभियंता: फोन (ऑफिस)- २२२२५४१/२३१२७५१, मोबाईल नं. - 9423179162, ईमेल - eetownplanning[at]nashikcorporation[dot]in
            
            कालिदास कला मंदिर
            
            व्यवस्थापक: फोन (ऑफिस) - 2502930/2311889, मोबाईल नं. - 9423179160, ईमेल - कालिदास[at]nashikcorporation[dot]in
            
            संगणक विभाग
            
            विभागप्रमुख: फोन (ऑफिस) - २२२२४२९, मोबाईल क्र. - ९४२३१७९१३३, ईमेल - hod_computer[at]nashikcorporation[dot]in
            
            शिक्षण विभाग
                        
            प्रशासकीय अधिकारी: फोन (ऑफिस) - २५७१२८९/२३६११८८, मोबाईल क्र. - 9011558949, ईमेल - edu_off[at]nashikcorporation[dot]in
            
            जनसंपर्क विभाग
            
            जनसंपर्क अधिकारी: फोन (ऑफिस)- २२२२४९५/२२२२४२७, मोबाईल क्र. - 9422222195, ईमेल - pro[at]nashikcorporation[dot]io',
            'english_image' => '3_english_icon.png',
            'marathi_image' => '3_english_icon.png',
            'english_image_new' => '3_english.png',
            'marathi_image_new' => '3_marathi.png',
            'url'   => 'https://nmcdm.org.in/',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Police Department',
            'marathi_title' => 'पोलीस विभाग',
            'english_description' => 'The Nashik Police Department has witnessed significant growth and evolution over the years, adapting to the increasing population and expanding geographical boundaries of the city. Here is an organized and detailed description of the department:
                Formation and Early Structure

 

In the year 1990, the Nashik Police Department commenced its operations with a modest team of 12 dedicated officers.

This initial force effectively governed the citys law and order, covering six police stations:

Bhadrakali Police Station

Panchvati Police Station

Sarkarwada Police Station

Satpur Police Station

Nashik Road Police Station

Deolali Camp Police Station

At that time, Nashik City had a population of approximately 4,65,000 people, and the area under police jurisdiction spanned 155.30 square kilometers.

Expansion Phase

 

With the citys population and urbanization on the rise, the Nashik Police Department recognized the need for enhancement and expansion.

In response to the growing challenges, the department underwent strategic re-organization, aiming to improve policing services.

Five new police stations were established to meet the demands of the evolving city:

Ambad Police Station

Upnagar Police Station

Indira Nagar Police Station

Gangapur Police Station

Adgaon Police Station

By the year 2007, the department had successfully established a total of 11 police stations, ensuring comprehensive law enforcement coverage for the population, which had reached 49,94,000 residents, and expanding the area of jurisdiction to 259 square kilometers.

Recent Developments

 

The Nashik Police Department remained committed to continually improving their services and staying up-to-date with modern policing practices.

As part of their ongoing efforts, two more police stations were initiated on January 1, 2016:

Mumbai Naka Police Station

Mhasrul Police Station

These additions further strengthened the departments ability to address emerging challenges and maintain law and order in the ever-growing city 

Police Stations Details:

 

Adgaon Police Station:

 

Address: Amrut Dham, Nashik.

Telephone No.: +91-0253-2513133

Email ID: ps.adgaon.nashikcp@mahapolice.gov.in

Ambad Police Station:

 

Address: Mumbai Agra Road, Nashik-422009

Telephone No.: +91-0253-2371533

Email ID: ps.ambad.nashikcp@mahapolice.gov.in

Bhadrakali Police Station:

 

Address: Bhadhakali, Old Nashik.

Telephone No.: +91-0253-2305005

Email ID: bhadrakali_police@nashikpolice.com

Deolali Camp Police Station:

 

Address: Deolali Camp

Telephone No.: +91-0253-2491250

Email ID: ps.devlali.nashikcp@mahapolice.gov.in

Gangapur Police Station:

 

Address: College Road, Nashik.

Telephone No.: +91-0253-2305056

Email ID: ps.gangapur.nashikcp@mahapolice.gov.in

Indiranagar Police Station:

 

Address: Rajiv Nagar, Indiranagar, Nashik.

Telephone No.: +91-0253-2392233

Email ID: ps.ingr.nashikcp@mahapolice.gov.in

Mhasrul Police Station:

 

Address: Dindori Road, Near RTO Corner, Nashik.

Telephone No.: +91-0253-2533233

Email ID: mhasrul_police@nashikpolice.com

Mumbai Naka Police Station:

 

Address: Old Agra Road Highway, Nashik.

Telephone No.: +91-0253-2593300

Email ID: mumbainaka_police@nashikpolice.com

Nashik Road Police Station:

 

Address: Bytco Point, Nashik-Pune rd, Nashik

Telephone No.: +91-0253-2465533 / 2465133

Email ID: ps.nskroad.nashikcp@mahapolice.gov.in

Panchvati Police Station:

 

Address: Panchvati, Nashik

Telephone No.: +91-0253-2629831 / 2629830

Email ID: ps.pvati.nashikcp@mahapolice.gov.in

Sarkarwada Police Station:

 

Address: Gangapur rd, Opp. KTHM College, Nashik

Telephone No.: +91-0253-2305214 / 2305225

Email ID: ps.swada.nashikcp@mahapolice.gov.in

Satpur Police Station:

 

Address: Satpur, Nashik

Telephone No.: +91-0253-2305337/38

Email ID: satpur_police@nashikpolice.com

Upnagar Police Station:

 

Address: Upnagar, Nashik Poona Highway, Nashik Road, Nashik.

Telephone No.: +91-0253-2415641

Email ID: ps.upnagar.nashikcp@mahapolice.gov.in',
            'marathi_description' => 'नाशिक पोलीस विभागाने वाढत्या लोकसंख्येशी जुळवून घेत आणि शहराच्या भौगोलिक सीमा विस्तारत गेल्या काही वर्षांत लक्षणीय वाढ आणि उत्क्रांती पाहिली आहे. विभागाचे संघटित आणि तपशीलवार वर्णन येथे आहे:

 

            निर्मिती आणि प्रारंभिक रचना
            
             
            
            सन 1990 मध्ये, नाशिक पोलिस विभागाने 12 समर्पित अधिकार्‍यांच्या माफक पथकासह आपले कार्य सुरू केले.
            
            या सुरुवातीच्या दलाने शहराच्या कायदा व सुव्यवस्थेचे प्रभावीपणे नियंत्रण केले, ज्यामध्ये सहा पोलीस ठाण्यांचा समावेश होता:
            
            भद्रकाली पोलीस स्टेशन
            
            पंचवटी पोलीस स्टेशन
            
            सरकारवाडा पोलीस स्टेशन
            
            सातपूर पोलीस स्टेशन
            
            नाशिकरोड पोलिस स्टेशन
            
            देवळाली कॅम्प पोलीस स्टेशन
            
            त्यावेळी, नाशिक शहराची लोकसंख्या अंदाजे 4,65,000 लोकसंख्या होती आणि पोलिसांच्या अखत्यारीतील क्षेत्रफळ 155.30 चौरस किलोमीटर होते.
            
            विस्तार टप्पा
            
             
            
            शहराची लोकसंख्या आणि नागरीकरण वाढत असताना, नाशिक पोलिस विभागाने वाढ आणि विस्ताराची गरज ओळखली.
            
            वाढत्या आव्हानांना प्रतिसाद म्हणून, पोलीस सेवा सुधारण्याच्या उद्देशाने विभागाने धोरणात्मक पुनर्रचना केली.
            
            विकसित होत असलेल्या शहराच्या मागण्या पूर्ण करण्यासाठी पाच नवीन पोलिस ठाणी स्थापन करण्यात आली.
            
            अंबड पोलीस स्टेशन
            
            उपनगर पोलिस स्टेशन
            
            इंदिरा नगर पोलीस स्टेशन
            
            गंगापूर पोलीस स्टेशन
            
            आडगाव पोलीस स्टेशन
            
            2007 पर्यंत, विभागाने 49,94,000 रहिवाशांपर्यंत पोहोचलेल्या लोकसंख्येसाठी व्यापक कायद्याची अंमलबजावणी कव्हरेज सुनिश्चित करून एकूण 11 पोलीस ठाण्यांची यशस्वीपणे स्थापना केली आणि कार्यक्षेत्राचा विस्तार 259 चौरस किलोमीटरपर्यंत केला.
            
            अलीकडील घडामोडी
            
             
            
            नाशिक पोलिस विभाग त्यांच्या सेवांमध्ये सातत्याने सुधारणा करण्यासाठी आणि आधुनिक पोलिसिंग पद्धतींसह अद्ययावत राहण्यासाठी कटिबद्ध आहे.
            
            त्यांच्या चालू असलेल्या प्रयत्नांचा एक भाग म्हणून 1 जानेवारी 2016 रोजी आणखी दोन पोलीस ठाणी सुरू करण्यात आली:
            
            मुंबई नाका पोलीस स्टेशन
            
            म्हसरूळ पोलीस स्टेशन
            
            या जोडण्यांमुळे उदयोन्मुख आव्हानांना तोंड देण्याची आणि सतत वाढणाऱ्या शहरात कायदा व सुव्यवस्था राखण्याची विभागाची क्षमता अधिक बळकट झाली.
            
            पोलीस स्टेशन तपशील:
            
            आडगाव पोलीस स्टेशन :
            
            पत्ता : अमृत धाम, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2513133
            
            ईमेल आयडी: ps.adgaon.nashikcp@mahapolice.gov.in
            
            अंबड पोलीस स्टेशन :
            
             
            
             
            
            पत्ता: मुंबई आग्रा रोड, नाशिक-४२२००९
            
            दूरध्वनी क्रमांक: +91-0253-2371533
            
            ईमेल आयडी: ps.ambad.nashikcp@mahapolice.gov.in
            
            भद्रकाली पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : भडकाली, जुने नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2305005
            
            ईमेल आयडी: bhadrakali_police@nashikpolice.com
            
            देवळाली कॅम्प पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : देवळाली कॅम्प
            
            दूरध्वनी क्रमांक: +91-0253-2491250
            
            ईमेल आयडी: ps.devlali.nashikcp@mahapolice.gov.in
            
            गंगापूर पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : कॉलेज रोड, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2305056
            
            ईमेल आयडी: ps.gangapur.nashikcp@mahapolice.gov.in
            
            इंदिरा नगर पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : राजीव नगर, इंदिरानगर, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2392233
            
            ईमेल आयडी: ps.ingr.nashikcp@mahapolice.gov.in
            
            म्हसरूळ पोलीस स्टेशन :
            
             
            
             
            
            पत्ता: दिंडोरी रोड, आरटीओ कॉर्नरजवळ, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2533233
            
            ईमेल आयडी: mhasrul_police@nashikpolice.com
            
            मुंबई नाका पोलीस स्टेशन:
            
             
            
             
            
            पत्ता: जुना आग्रा रोड हायवे, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2593300
            
            ईमेल आयडी: mumbainak_police@nashikpolice.com
            
            नाशिकरोड पोलिस स्टेशन :
            
             
            
             
            
            पत्ता: बिटको पॉइंट, नाशिक-पुणे रोड, नाशिक
            
            दूरध्वनी क्रमांक: +91-0253-2465533 / 2465133
            
            ईमेल आयडी: ps.nskroad.nashikcp@mahapolice.gov.in
            
            पंचवटी पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : पंचवटी, नाशिक
            
            दूरध्वनी क्रमांक: +91-0253-2629831 / 2629830
            
            ईमेल आयडी: ps.pvati.nashikcp@mahapolice.gov.in
            
            सरकारवाडा पोलीस स्टेशन :
            
             
            
             
            
            पत्ता: गंगापूर रोड, समोर. केटीएचएम कॉलेज, नाशिक
            
            दूरध्वनी क्रमांक: +91-0253-2305214 / 2305225
            
            ईमेल आयडी: ps.swada.nashikcp@mahapolice.gov.in
            
            सातपूर पोलीस स्टेशन :
            
             
            
             
            
            पत्ता : सातपूर, नाशिक
            
            दूरध्वनी क्रमांक: +91-0253-2305337/38
            
            ईमेल आयडी: satpur_police@nashikpolice.com
            
            उपनगर पोलीस स्टेशन :
            
             
            
             
            
            पत्ता: उपनगर, नाशिक पूना हायवे, नाशिक रोड, नाशिक.
            
            दूरध्वनी क्रमांक: +91-0253-2415641
            
            ईमेल आयडी: ps.upnagar.nashikcp@mahapolice.gov.in',
            'english_image' => '4_english_icon.png',
            'marathi_image' => '4_english_icon.png',
            'english_image_new' => '4_english.png',
            'marathi_image_new' => '4_marathi.png',
            'url'   => 'https://nashikcitypolice.gov.in/',
            // 'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'National Guard',
            'marathi_title' => 'नॅशनल गार्ड',
            'english_description' => 'The National Disaster Response Force (NDRF) is an essential organization established at the national level to effectively respond to both natural and man-made disasters in India. Maharashtra, being a multi-disaster prone state, is vulnerable to a wide range of disasters, including floods, cyclones, earthquakes, landslides, fires, and building collapses. To tackle such emergencies, one battalion of the NDRF is stationed in Sudumbre, Pune, responsible for covering Maharashtra, Gujarat, and Goa. However, due to the vast area and time-sensitive nature of disaster response, it becomes challenging for the NDRF to promptly reach regions like Vidarbha or Marathwada.

 

            To address this issue and comply with the National Disaster Management Authoritys (NDMA) mandate of states becoming self-sufficient in disaster response, Maharashtra proposed the creation of a dedicated State Disaster Response Force (SDRF). The proposal was unanimously approved by the Cabinet of Ministers, leading to the following key decisions:
            
             
            
            Formation of SDRF Companies: Two SDRF companies will be established in the state, modeled on the lines of the NDRF.
            
             
            
            Composition and Staff: Each SDRF Company will consist of three teams, with 45 members in each team, including field-level officials and support staff. Additional posts will be created to manage the force effectively, bringing the total strength of the SDRF to 428 members.
            
             
            
            Recruitment and Training: Initially, the posts will be filled on a deputation basis from the State Reserve Police Force (SRPF) for a five-year period. A committee comprising the Secretary of Disaster Management Unit (DMU), Director General of Maharashtra Police, and Commandant of NDRF will finalize the selection criteria. The salary component will be borne by the State Disaster Management Authority (SDMA), with a 10% incentive offered to SDRF members over their current salary.
            
             
            
            Training Collaboration: The NDRF and SRPF will provide training to the SDRF personnel to equip them with the necessary skills and expertise for effective disaster response.
            
             
            
            Organizational Matters: Matters related to the positioning of the SDRF, establishment, location of headquarters, etc., will be decided by the State Executive Committee of SDMA.
            
             
            
            Future Expansion: While initially two SDRF companies were sanctioned, the state recognizes that the hazard profile of Maharashtra may necessitate the creation of more companies in the future. Ideally, one company per Regional Disaster Management Center (RDMC) is desirable for quicker response, and the manpower and equipment profile of additional companies will be based on the hazard profile of their respective RDMCs.
            
             
            
            By establishing the standalone SDRF, Maharashtra aims to enhance its disaster response capabilities, ensuring swift and efficient action during emergencies to safeguard lives and properties in the state. The collaboration between NDRF and SDRF will further bolster disaster management preparedness and mitigation efforts in the region.
            
            National Disaster Response Force (NDRF) contact details in Nashik:
            
            Contact Number: 0253-2317151, 2578501
            
            Email: nashik[at]ndrf[dot]gov[dot]in
            
            Address: NDRF Nashik Unit, Nashik Municipal Corporation, Race Course Road, Nashik, Maharashtra 422001',
            'marathi_description' => 'नॅशनल डिझास्टर रिस्पॉन्स फोर्स (NDRF) ही भारतातील नैसर्गिक आणि मानवनिर्मित दोन्ही आपत्तींना प्रभावीपणे प्रतिसाद देण्यासाठी राष्ट्रीय स्तरावर स्थापन केलेली एक आवश्यक संस्था आहे. महाराष्ट्र, एक बहु-आपत्ती प्रवण राज्य असल्याने, पूर, चक्रीवादळ, भूकंप, भूस्खलन, आग आणि इमारती कोसळणे यासह विविध आपत्तींना असुरक्षित आहे. अशा आपत्कालीन परिस्थितींचा सामना करण्यासाठी, NDRF ची एक बटालियन सुदुंबरे, पुणे येथे तैनात आहे, जी महाराष्ट्र, गुजरात आणि गोवा कव्हर करण्यासाठी जबाबदार आहे. तथापि, विस्तीर्ण क्षेत्र आणि आपत्ती प्रतिसादाच्या वेळेनुसार संवेदनशील स्वरूपामुळे, NDRF साठी विदर्भ किंवा मराठवाडा सारख्या प्रदेशात तातडीने पोहोचणे आव्हानात्मक होते.

 

            या समस्येचे निराकरण करण्यासाठी आणि राष्ट्रीय आपत्ती व्यवस्थापन प्राधिकरणाच्या (NDMA) राज्यांना आपत्ती प्रतिसादात स्वयंपूर्ण होण्याच्या आदेशाचे पालन करण्यासाठी, महाराष्ट्राने एक समर्पित राज्य आपत्ती प्रतिसाद दल (SDRF) तयार करण्याचा प्रस्ताव दिला. मंत्र्यांच्या मंत्रिमंडळाने या प्रस्तावाला एकमताने मंजुरी दिली, ज्यामुळे खालील प्रमुख निर्णय घेण्यात आले:
            
             
            
            एसडीआरएफ कंपन्यांची निर्मिती: एनडीआरएफच्या धर्तीवर राज्यात दोन एसडीआरएफ कंपन्या स्थापन केल्या जातील.
            
             
            
            रचना आणि कर्मचारी: प्रत्येक SDRF कंपनीमध्ये तीन संघ असतील, प्रत्येक संघात 45 सदस्य असतील, ज्यात क्षेत्र-स्तरीय अधिकारी आणि सहाय्यक कर्मचारी असतील. बल प्रभावीपणे व्यवस्थापित करण्यासाठी अतिरिक्त पदे निर्माण केली जातील, ज्यामुळे SDRF ची एकूण संख्या 428 होईल.
            
             
            
            भरती आणि प्रशिक्षण: सुरुवातीला, पदे राज्य राखीव पोलीस दल (SRPF) मधून प्रतिनियुक्तीवर पाच वर्षांच्या कालावधीसाठी भरली जातील. आपत्ती व्यवस्थापन युनिट (DMU) चे सचिव, महाराष्ट्र पोलीस महासंचालक आणि NDRF चे कमांडंट यांचा समावेश असलेली समिती निवड निकषांना अंतिम स्वरूप देईल. पगाराचा घटक राज्य आपत्ती व्यवस्थापन प्राधिकरण (SDMA) द्वारे उचलला जाईल, SDRF सदस्यांना त्यांच्या सध्याच्या पगारापेक्षा 10% प्रोत्साहन दिले जाईल.
            
             
            
            प्रशिक्षण सहयोग: एनडीआरएफ आणि एसआरपीएफ एसडीआरएफ कर्मचार्‍यांना प्रभावी आपत्ती प्रतिसादासाठी आवश्यक कौशल्ये आणि कौशल्याने सुसज्ज करण्यासाठी प्रशिक्षण प्रदान करतील.
            
             
            
            संस्थात्मक बाबी: SDRF ची स्थिती, स्थापना, मुख्यालयाचे स्थान इत्यादींशी संबंधित बाबी SDMA च्या राज्य कार्यकारी समितीद्वारे ठरवल्या जातील.
            
             
            
            भविष्यातील विस्तार: सुरुवातीला दोन SDRF कंपन्यांना मंजूरी देण्यात आली असली तरी, राज्याने हे ओळखले आहे की महाराष्ट्राच्या धोक्याच्या स्वरूपामुळे भविष्यात आणखी कंपन्या निर्माण करणे आवश्यक आहे. तद्वतच, प्रति रिजनल डिझास्टर मॅनेजमेंट सेंटर (RDMC) एक कंपनी जलद प्रतिसादासाठी इष्ट आहे आणि अतिरिक्त कंपन्यांचे मनुष्यबळ आणि उपकरणे प्रोफाइल त्यांच्या संबंधित RDMC च्या धोक्याच्या प्रोफाइलवर आधारित असतील.
            
             
            
            स्टँडअलोन SDRF ची स्थापना करून, महाराष्ट्राचे उद्दिष्ट आहे की आपत्ती प्रतिसाद क्षमता वाढवणे, राज्यातील जीवन आणि मालमत्तेचे रक्षण करण्यासाठी आपत्कालीन परिस्थितीत जलद आणि कार्यक्षम कृती सुनिश्चित करणे. NDRF आणि SDRF यांच्यातील सहकार्यामुळे या प्रदेशातील आपत्ती व्यवस्थापन तयारी आणि शमन प्रयत्नांना आणखी चालना मिळेल.
            
            नाशिकमधील राष्ट्रीय आपत्ती प्रतिसाद दल (NDRF) संपर्क तपशील:
            
            संपर्क क्रमांक: 0253-2317151, 2578501
            
            ईमेल: नाशिक[at]ndrf[dot]gov[dot]in
            
            पत्ता: एनडीआरएफ नाशिक युनिट, नाशिक म्युनिसिपल कॉर्पोरेशन, रेस कोर्स रोड, नाशिक, महाराष्ट्र ४२२००१',
            'english_image' => '5_english_icon.png',
            'marathi_image' => '5_english_icon.png',
            'english_image_new' => '5_english.png',
            'marathi_image_new' => '5_marathi.png',
            'url'   => 'http://nashikcitypolice.gov.in',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Fire Department',
            'marathi_title' => 'अग्निशमन विभाग',
            'english_description' => 'Nashik Fire Department is a crucial organisation responsible for fire safety and disaster management within the city. Heres a brief description of the department, presented in a point-wise manner:

 

                Name: Fire Department
                
                Department: Disaster Management Department
                
                Chief Fire Officer: The Chief Fire Officer leads the department and plays a key role in managing and coordinating fire safety and disaster response efforts.
                
                Phone (Office): 2509766 / 2590871
                
                Mobile No.: 9423179101
                
                Email: cfo[at]nashikcorporation[dot]in
                
                The Fire Department is dedicated to safeguarding the lives and properties of the citizens of Nashik. It works diligently to prevent, mitigate, and respond to fire-related emergencies and other disasters effectively. The Chief Fire Officer, at the helm of the department, ensures smooth operations and efficient coordination among the firefighting personnel and disaster management teams. By providing their contact details, the department ensures accessibility and prompt assistance to the public in times of need. The Fire Departments commitment to safety and swift action in emergencies makes it an essential pillar of the citys overall disaster management efforts.',
            'marathi_description' => 'नाशिक अग्निशमन विभाग ही शहरातील अग्निसुरक्षा आणि आपत्ती व्यवस्थापनासाठी जबाबदार असलेली एक महत्त्वाची संस्था आहे. येथे विभागाचे थोडक्यात वर्णन आहे, बिंदूनिहाय रीतीने सादर केले आहे:

            नाव: अग्निशमन विभाग
            
            विभाग: आपत्ती व्यवस्थापन विभाग
            
            मुख्य अग्निशमन अधिकारी: मुख्य अग्निशमन अधिकारी विभागाचे नेतृत्व करतात आणि अग्निसुरक्षा आणि आपत्ती प्रतिसाद प्रयत्नांचे व्यवस्थापन आणि समन्वय करण्यात महत्त्वाची भूमिका बजावतात.
            
            फोन (ऑफिस): 2509766 / 2590871
            
            मोबाईल क्रमांक : ९४२३१७९१०१
            
            ईमेल: cfo[at]nashikcorporation[dot]in
            
            अग्निशमन विभाग नाशिकच्या नागरिकांच्या जीवित आणि मालमत्तेचे रक्षण करण्यासाठी समर्पित आहे. आगीशी संबंधित आणीबाणी आणि इतर आपत्तींना प्रभावीपणे प्रतिबंध करण्यासाठी, कमी करण्यासाठी आणि प्रतिसाद देण्यासाठी ते परिश्रमपूर्वक कार्य करते. मुख्य अग्निशमन अधिकारी, विभागाचे प्रमुख, अग्निशमन कर्मचारी आणि आपत्ती व्यवस्थापन संघांमध्ये सुरळीत कामकाज आणि कार्यक्षम समन्वय सुनिश्चित करतात. त्यांचे संपर्क तपशील प्रदान करून, विभाग आवश्यकतेच्या वेळी लोकांना सुलभता आणि त्वरित मदत सुनिश्चित करतो. अग्निशमन विभागाची सुरक्षितता आणि आपत्कालीन परिस्थितीत जलद कारवाईची वचनबद्धता शहराच्या एकूण आपत्ती व्यवस्थापनाच्या प्रयत्नांचा एक आवश्यक आधारस्तंभ बनवते.',
            'english_image' => '6_english_icon.png',
            'marathi_image' => '6_english_icon.png',
            'english_image_new' => '6_english.png',
            'marathi_image_new' => '6_marathi.png',
            'url'   => 'http://mahafireservice.gov.in',
            // 'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
          
    }
}