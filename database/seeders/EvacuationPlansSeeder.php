<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EvacuationPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReliefMeasuresResources::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => '<b>Relief measures and resources</b>',
            'marathi_title' => '<b>मदत उपाय आणि संसाधने</b>',
            'english_description' => '',
            'marathi_description' => '',   
            'english_image' => 'slide2_english.jpeg',
            'marathi_image' => 'slide2_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true, 
        ]);
    }

}