<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FooterImportantLinks;

class FooterImportantLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' Emergency Services',
            'marathi_title' => 'आपत्कालीन सेवा ',
            'url'   => 'emergency-services',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Environmental Conditions',
            'marathi_title' => 'पर्यावरणीय परिस्थिती            ',
            'url'   => 'environmental-conditions',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' Disaster Preparedness',
            'marathi_title' => ' आपत्ती तयारी ',
            'url'   => ' disaster-preparedness',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' Disaster Response',
            'marathi_title' => ' आपत्ती प्रतिसाद ',
            'url'   => ' disaster-response',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' Disaster Recovery',
            'marathi_title' => ' आपत्ती पुनर्प्राप्ती ',
            'url'   => ' disaster-recovery',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Volunteer Opportunities',
            'marathi_title' => ' स्वयंसेवक संधी ',
            'url'   => 'volunteer-opportunitiess',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => ' Donations and Aid',
            'marathi_title' => 'देणगी आणि मदत   ',
            'url'   => ' donations-and-aid',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        FooterImportantLinks::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Local Resources',
            'marathi_title' => ' स्थानिक संसाधने   ',
            'url'   => 'local-resources',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}