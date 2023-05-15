<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;


class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_image' => 'slide1_english.jpeg',
            'marathi_image' => 'slide1_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_image' => 'slide2_english.jpeg',
            'marathi_image' => 'slide2_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
        Slider::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_image' => 'slide3_english.jpeg',
            'marathi_image' => 'slide3_marathi.jpeg',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}