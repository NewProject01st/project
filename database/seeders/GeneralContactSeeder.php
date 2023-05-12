<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralContact;

class GeneralContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralContact::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'ABC',
            'marathi_name' => 'ABC',
            'english_number' => '7645364565',
            'marathi_number' => '7645364565',
            'english_icon' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'marathi_icon' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}