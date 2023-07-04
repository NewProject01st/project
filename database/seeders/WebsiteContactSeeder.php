<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteContact;

class WebsiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            
            'english_address' => 'Rajiv Gandhi Bhawan, Fire and Disaster Management Department, Nashik, Maharashtra - 422002',
            'marathi_address' => 'राजीव गांधी भवन, अग्निशमन आणि आपत्ती व्यवस्थापन विभाग, नाशिक, महाराष्ट्र - ४२२००२',
            'email' => 'cfo@nmc.gov.in',
            'english_number' => '0253 – 2571872 /2317505',
            'marathi_number' => '०२५३ - २५७१८७२ /२३१७५०५',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}