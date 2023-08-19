<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisasterManagementNews;


class DisasterManagementNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DisasterManagementNews::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Nashik District gets Twelve inflatable tents for disaster management',
            'marathi_title' => 'नाशिक जिल्ह्याला आपत्ती व्यवस्थापनासाठी बारा फुलण्यायोग्य तंबू मिळाले आहेत',
            'english_description' => 'The state government has provided the Nashik  disaster management department with 12 inflatable tents for use during relief and rescue operations.Of the 12 inflatable tents, eight are big while four are small. The big tents can accommodate 30 people at a time, while the small ones can sleep about 15 people.“We have received the tents for relief and rescue operations during emergencies and disasters. These are lightweight and can be carried anywhere,” a senior officer from the Nashik district administration said. The tents were received by district collector  Gangatharan D at the collectorate, where volunteers are taking part in the ‘disaster management training’ through ‘Aapada Mitra ’.Five districts of Nashik division have received 22 tents so far. While Ahmednagar district has received four small tents, Dhule , Jalgaon and Nandurbar have got two small tents each. According to district officials, the tents can be used as temporary shelters or medical posts at the campsite during an emergency. Citing the situation in Chandori village that is affected by flood waters, the district officials said the tents would be useful to provide shelter during relief operations in such areas.',
            'marathi_description' => 'राज्य सरकारने नाशिक आपत्ती व्यवस्थापन विभागाला मदत आणि बचाव कार्यादरम्यान वापरण्यासाठी 12 फुगवण्यायोग्य तंबू उपलब्ध करून दिले आहेत. 12 फुललेल्या तंबूंपैकी आठ मोठे तर चार लहान आहेत. मोठ्या तंबूंमध्ये एकावेळी ३० लोक बसू शकतात, तर लहान तंबू सुमारे १५ लोक झोपू शकतात. हे वजन कमी आहेत आणि ते कुठेही नेले जाऊ शकतात, असे नाशिक जिल्हा प्रशासनातील एका वरिष्ठ अधिकाऱ्याने सांगितले. जिल्हाधिकारी गंगाथरण डी यांच्या हस्ते जिल्हाधिकारी कार्यालयात तंबू स्वीकारण्यात आले, जिथे स्वयंसेवक ‘आपदा मित्र’ च्या माध्यमातून ‘आपत्ती व्यवस्थापन प्रशिक्षण’ मध्ये भाग घेत आहेत.नाशिक विभागातील पाच जिल्ह्यांना आतापर्यंत २२ तंबू प्राप्त झाले आहेत. अहमदनगर जिल्ह्याला चार छोटे तंबू मिळाले आहेत, तर धुळे, जळगाव आणि नंदुरबारला प्रत्येकी दोन छोटे तंबू मिळाले आहेत. जिल्हा अधिकार्‍यांच्या म्हणण्यानुसार, आपत्कालीन परिस्थितीत तंबूंचा तात्पुरता निवारा किंवा शिबिराच्या ठिकाणी वैद्यकीय पोस्ट म्हणून वापर केला जाऊ शकतो. पुराच्या पाण्याने बाधित झालेल्या चांदोरी गावातील परिस्थितीचा दाखला देत जिल्हा अधिका-यांनी सांगितले की अशा भागात मदतकार्य करताना निवारा देण्यासाठी तंबू उपयुक्त ठरतील.',
            'english_image' => '1_english.png',
            'marathi_image' => '1_marathi.png',
            'english_url'   => 'disaster',
            'disaster_date'   => '2023-07-01',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
          
        DisasterManagementNews::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'NASHIK Normal life was affected in the district and the city following incessant rain since Thursday',
            'marathi_title' => 'नाशिक गुरुवारपासून सुरू असलेल्या संततधार पावसामुळे जिल्हा व शहरात जनजीवन विस्कळीत झाले आहे.',
            'english_description' => 'The city reported around 26.7mm rainfall in the last 24 hours between 5.30pm on Thursday and 5.30pm on Friday. Nashik city has received 49.7mm rainfall since Monday. The IMD has forecast light to moderate rain in the district till July 4. Apart from Nashik, light to medium rain has been forecast for Jalgaon, Dhule, Nandurbar and Ahmednagar. Incidents of tree falling were reported from two locations in the city - one in the College Road area on Friday afternoon that affected traffic movement for an hour and the other near Akashwani tower on Gangapur Road. However, there were no reports of casualties though traffic movement was affected. There was waterlogging in Ambad industrial area. "We have received complaints from industries regarding waterlogging at four-five locations in Ambad industrial areas of the city. The civic body had carried out some pre-monsoon works in these areas", Nikhil Panchal, president, Ambad Industries Manufacturers Association, said Traffic snarls were reported from some places on Gangapur Road, College Road and at intersections on the Mumbai-Agra National Highway in the city. Trimbakeshwar and Igatpuri talukas received significant rain in the last 24 hours. Surgana and Peth talukas also received 58mm and 50mm rainfall in the last 24 hours. The water level of the Gangapur dam complex has remained the same for the past four days despite lifting of around 14.5mcft of water (406 MLD) daily.',
            'marathi_description' => 'गुरुवारी संध्याकाळी 5.30 ते शुक्रवारी संध्याकाळी 5.30 दरम्यान गेल्या 24 तासांत शहरात सुमारे 26.7 मिमी पावसाची नोंद झाली. नाशिक शहरात सोमवारपासून ४९.७ मिमी पाऊस झाला आहे. आयएमडीने 4 जुलैपर्यंत जिल्ह्यात हलक्या ते मध्यम पावसाचा अंदाज वर्तवला आहे. नाशिक व्यतिरिक्त जळगाव, धुळे, नंदुरबार आणि अहमदनगरमध्ये हलक्या ते मध्यम पावसाचा अंदाज आहे. शहरातील दोन ठिकाणी झाडे पडण्याच्या घटना घडल्या - एक शुक्रवारी दुपारी कॉलेजरोड परिसरात एक तास वाहतूक विस्कळीत झाली आणि दुसरी गंगापूर रोडवरील आकाशवाणी टॉवरजवळ. मात्र, या अपघातात कोणतीही जीवितहानी झाली नसली तरी वाहतूक विस्कळीत झाली आहे. अंबड औद्योगिक परिसरात पाणी साचले होते. "आम्हाला शहरातील अंबड औद्योगिक भागात चार-पाच ठिकाणी पाणी साचल्याच्या तक्रारी आल्या आहेत. महापालिकेने या भागात पावसाळ्यापूर्वी काही कामे केली आहेत", अंबड इंडस्ट्रीजचे अध्यक्ष निखिल पांचाळ यांनी सांगितले. मॅन्युफॅक्चरर्स असोसिएशनने सांगितले की, शहरातील गंगापूर रोड, कॉलेज रोड आणि मुंबई-आग्रा राष्ट्रीय महामार्गावरील चौकाचौकांतून काही ठिकाणी वाहतूक कोंडी झाली आहे. त्र्यंबकेश्वर आणि इगतपुरी तालुक्यात गेल्या २४ तासांत लक्षणीय पाऊस झाला. सुरगाणा आणि पेठ तालुक्यातही गेल्या 24 तासात 58 मिमी आणि 50 मिमी पाऊस झाला आहे. दररोज सुमारे 14.5mcft (406 MLD) पाण्याचा उपसा करूनही गेल्या चार दिवसांपासून गंगापूर धरण परिसराची पाणीपातळी तशीच आहे.',
            'english_image' => '2_english.png',
            'marathi_image' => '2_marathi.png',
            'english_url'   => 'disaster',
            'disaster_date'   => '2023-07-08',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DisasterManagementNews::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Nashik Municipal Corporation scheme in the background of monsoon',
            'marathi_title' => 'पावसाळ्याच्या पार्श्वभूमीवर नाशिक महापालिकेची योजना',
            'english_description' => 'In the background of monsoon season, along with preparation of disaster management plans by the municipal corporation, the room will be established. A disaster management plan has been prepared and the management room will be operational on June 1.

            During monsoons, incidents like trees, old houses, palaces collapsing and drains, water logging on roads, street lights going off, contaminated water supply, migration of citizens along the river bank occur during monsoons.
            
            Therefore, the state government has assigned responsibility to the local self-government bodies to prepare a disaster management plan and establish rooms during the monsoon season. Accordingly, the Municipal Corporation has prepared a disaster management plan this year as well.
            
            The responsibility of department wise works has been determined in the plan. Fire department has been given major responsibility in disaster prevention. This department is responsible for deputing personnel for rescue operations at the spot, providing emergency rescue vans with fire extinguishers, removing obstruction of trees, keeping lifeguards and machines ready in case of flood.
            
            Similarly, a disaster relief room will be established in Rajiv Gandhi Bhawan of the Municipal Corporation and this room will be open 24 hours. Officers and employees have been appointed in three sessions to work in the room.
            
            Such is the responsibility
            
            - Administration - Coordinating with District and State Disaster Relief Cells.
            - Eradication of encroachment - Providing manpower, machinery in disaster.
            - Public relations - Shelter arrangements for migrant citizens.
            - Construction - damage assessment, water drainage, road, sewer repair.
            - Water supply - Emergency room - Reporting of rising water level.
            - Sewerage- repair of clogged underground storm drains.
            - Solid waste management- Removal of garbage from road, river banks.',
            'marathi_description' => 'पावसाळ्याच्या पार्श्वभूमीवर महापालिकेकडून आपत्ती व्यवस्थापन आराखडा तयार करण्याबरोबरच कक्षाची स्थापना केली जाणार आहे. आपत्ती व्यवस्थापन आराखडा तयार केला असून, येत्या १ जूनला व्यवस्थापन कक्ष कार्यान्वित होईल.

            पावसाळ्यात वादळी पावसात झाडे, जुनी घरे, वाडे कोसळून गटारी तुंबणे, रस्त्यावर पाणी साचणे, पथदीप ऑफिस पडणे, दूषित पाणीपुरवठा, नदीकाठच्या नागरिकांचे स्थलांतरण यासारख्या घटना घडतात. 
            
            त्यामुळे राज्य शासनाने स्थानिक स्वराज्य संस्थांना पावसाळ्यात आपत्ती व्यवस्थापन आराखडा तयार करून कक्ष स्थापन करण्याची जबाबदारी निश्चित केली आहे. त्यानुसार महापालिकेकडून या वर्षीदेखील आपत्ती व्यवस्थापन आराखडा तयार केला आहे.
            
            आराखड्यात विभागनिहाय कामांची जबाबदारी निश्चित करण्यात आली आहे. आपत्ती निवारणात अग्निशमन विभागाकडे प्रमुख जबाबदारी देण्यात आली आहे. घटनास्थळी बचाव कार्यासाठी कर्मचारी नियुक्त करणे, अग्निशमन बंबासह इमर्जन्सी रेस्क्यू व्हॅन उपलब्ध करून देणे, झाडांचा अडथळा दूर करणे, पूर परिस्थितीत जीवरक्षक तसेच यंत्रे सज्ज ठेवण्याची जबाबदारी या विभागाकडे आहे.
            
            त्याच प्रमाणे महापालिकेच्या राजीव गांधी भवनमध्ये आपत्ती निवारण कक्ष स्थापन केला जाणार असून हा कक्ष २४ तास खुला राहणार आहे. कक्षात काम करण्यासाठी तीन सत्रात अधिकारी, कर्मचाऱ्यांची नियुक्ती करण्यात आली आहे.
            अशी आहे जबाबदारी

        - प्रशासन - जिल्हा व राज्य आपत्ती निवारण कक्षाशी समन्वय.

        - अतिक्रमण निर्मुलन- आपत्तीत मनुष्यबळ, यंत्रसामग्री उपलब्ध करून देणे.

        - जनसंपर्क - स्थलांतरित नागरिकांची निवारा व्यवस्था.

        - बांधकाम - नुकसान मोजणे, पाण्याचा निचरा, रस्ते, गटारी दुरुस्ती.

        - पाणी पुरवठा - आपत्कालीन कक्ष- वाढत्या पाण्याची पातळी कळविणे.

        - मलनिस्सारण- तुंबलेल्या भूमिगत, पावसाळी गटारी दुरुस्ती.

        - घनकचरा व्यवस्थापन- रस्त्या, नदीकाठचा कचरा हटविणे.',
            'english_image' => '3_english.png',
            'marathi_image' => '3_marathi.png',
            'english_url'   => 'disaster',
            'disaster_date'   => '2023-07-08',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DisasterManagementNews::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Assam flood situation remains critical',
            'marathi_title' => 'आसाममध्ये पूरस्थिती कायम आहे',
            'english_description' => 'In 2021, Assam faced severe floods due to heavy rains, displacing many people and damaging homes and infrastructure.',
            'marathi_description' => '2021 मध्ये, आसामला अतिवृष्टीमुळे गंभीर पुराचा सामना करावा लागला, अनेक लोक विस्थापित झाले आणि घरे आणि पायाभूत सुविधांचे नुकसान झाले.',
            'english_image' => '2_english.jpeg',
            'marathi_image' => '2_marathi.jpeg',
            'english_url'   => 'disaster',
            'disaster_date'   => '5 MAY,2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}