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
            'english_image' => 'English Description',
            'marathi_image' => 'Marathi Description',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}