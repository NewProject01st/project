<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmergencyContact;


class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmergencyContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'DMS Office',
            'marathi_title' => 'DMS कार्यालय',
            'english_name' => ' Rahul Sharma',
            'marathi_name' => 'राहुल शर्मा',
            'english_address' => '93002 Satpur Nashik',
            'marathi_address' => '93002 सातपूर नाशिक',
            'email'   => 'dms@dms.org',
            'english_number' => ' 777 555 666',
            'marathi_number' => '777 555 666',
            'english_landline_no' => '333 111 333',
            'marathi_landline_no' => '333 111 333',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        EmergencyContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'City Council',
            'marathi_title' => 'नगरपालिका',
            'english_name' => ' Ram Sharma',
            'marathi_name' => 'राम शर्मा',
            'english_address' => 'Nashik',
            'marathi_address' => 'नाशिक',
            'email'   => ' citycouncil@dms.org',
            'english_number' => ' 777 555 666',
            'marathi_number' => '777 555 666',
            'english_landline_no' => '333 111 333',
            'marathi_landline_no' => '333 111 333',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        
        EmergencyContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Police Emergency',
            'marathi_title' => 'पोलीस आणीबाणी',
            'english_name' => ' Lorem Ipsum',
            'marathi_name' => 'लोरेम इप्सम',
            'english_address' => '93002 Green Avenue',
            'marathi_address' => '93002 ग्रीन अव्हेन्यू',
            'email'   => ' police@dms.org',
            'english_number' => ' 777 555 666',
            'marathi_number' => '777 555 666',
            'english_landline_no' => '333 111 333',
            'marathi_landline_no' => '333 111 333',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        EmergencyContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Ambulance',
            'marathi_title' => 'रुग्णवाहिका',
            'english_name' => ' Rutuja Kale',
            'marathi_name' => 'रुतुजा काळे',
            'english_address' => 'Nashik',
            'marathi_address' => 'नाशिक',
            'email'   => ' ambulance@dms.org',
            'english_number' => ' 777 555 666',
            'marathi_number' => '777 555 666',
            'english_landline_no' => '333 111 333',
            'marathi_landline_no' => '333 111 333',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        EmergencyContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'E-services',
            'marathi_title' => 'ई-सेवा',
            'english_name' => ' Surya Sharma',
            'marathi_name' => 'सूर्य शर्मा',
            'english_address' => 'Nashik',
            'marathi_address' => 'नाशिक',
            'email'   => ' service@dms.org',
            'english_number' => ' 777 555 666',
            'marathi_number' => '777 555 666',
            'english_landline_no' => '333 111 333',
            'marathi_landline_no' => '333 111 333',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}