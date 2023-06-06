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
            'address_english_title' => 'Council Address:',
            'address_marathi_title' => 'परिषदेचा पत्ता:  ',
            'english_address' => 'DMS Office, Maharshtra, INDIA',
            'marathi_address' => 'डीएमएस कार्यालय, महाराष्ट्र, भारत  ',
            'email_title' => 'Email:',
            'email' => 'contact@dms.com<br> info@dms.com',
            'contact_english_title' => 'Call us:',
            'contact_marathi_title' => 'आम्हाला कॉल करा: ',
            'english_contact' => '+91 000 0000 000',
            'marathi_contact' => '+91 000 0000 000',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}