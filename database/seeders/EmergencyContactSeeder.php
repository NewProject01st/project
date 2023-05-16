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
            'english_title' => 'emergency',
            'marathi_title' => 'आणीबाणी',
            'english_name' => 'ABC',
            'marathi_name' => 'ABC',
            'english_address' => 'Govind Nagar, Nashik',
            'marathi_address' => 'गोविंद नगर, नाशिक ',
            'email'   => 'abc@gmail.in',
            'english_number' => '7645364565',
            'marathi_number' => '7645364565',
            'english_landline_no' => '7645364565',
            'marathi_landline_no' => '7645364565',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}