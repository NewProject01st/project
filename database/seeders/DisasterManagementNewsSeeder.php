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
            'english_title' => 'Lorem Ipsum  ',
            'marathi_title' => ' डमी मजकूर',
            'english_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'marathi_description' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.',
            'english_image' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'marathi_image' => 'https://images.unsplash.com/photo-1507680465142-ef2223e23308?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bmF0dXJhbCUyMGRpc2FzdGVyfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'english_url'   => 'disaster',
            'disaster_date'   => '2023-05-11',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}