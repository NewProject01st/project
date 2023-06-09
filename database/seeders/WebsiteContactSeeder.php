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
            
            'english_address' => 'DMS Office, Maharshtra, INDIA',
            'marathi_address' => 'डीएमएस कार्यालय, महाराष्ट्र, भारत  ',
            'email' => 'contact@dms',
            'english_number' => '+91 000 0000 000',
            'marathi_number' => '+91 000 0000 000',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}