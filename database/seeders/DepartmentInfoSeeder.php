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
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon1',
            'marathi_image' => 'deprticon1',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Public Health Department',
            'marathi_title' => 'सार्वजनिक आरोग्य विभाग',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon2',
            'marathi_image' => 'deprticon2',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Information Desk/Hotline',
            'marathi_title' => 'माहिती डेस्क/हॉटलाइन',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon3',
            'marathi_image' => 'deprticon3',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Police Department',
            'marathi_title' => 'पोलीस विभाग',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon4',
            'marathi_image' => 'deprticon4',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'National Guard',
            'marathi_title' => 'नॅशनल गार्ड',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon5',
            'marathi_image' => 'deprticon5',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        DepartmentInformation::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Fire Department',
            'marathi_title' => 'अग्निशमन विभाग',
            'english_description' => 'In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. ',
            'marathi_description' => 'फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.',
            'english_image' => 'deprticon6',
            'marathi_image' => 'deprticon6',
            'url'   => 'READ MORE',
            'date'   => '04-06-2023',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
          
    }
}