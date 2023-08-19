<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmergencyContactNumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmergencyContactNumbers::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_emergency_contact_title' => 'Police',
            'marathi_emergency_contact_title' => 'पोलीस',
            'english_emergency_contact_number' => '100',
            'marathi_emergency_contact_number' => '१००',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        EmergencyContactNumbers::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_emergency_contact_title' => 'Fire Brigade',
            'marathi_emergency_contact_title' => 'अग्निशमन दल',
            'english_emergency_contact_number' => '2590871',
            'marathi_emergency_contact_number' => '२५९०८७१',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}
