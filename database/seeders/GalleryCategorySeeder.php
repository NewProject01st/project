<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryCategory;


class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GalleryCategory::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Disaster',
            'marathi_name' => 'आपत्ती',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
        GalleryCategory::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Preparedness',
            'marathi_name' => 'तयारी',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
        GalleryCategory::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Citizen',
            'marathi_name' => 'नागरिक',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
    }
}