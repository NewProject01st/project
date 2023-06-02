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
            'english_name' => 'Education',
            'marathi_name' => 'शिक्षण',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
        GalleryCategory::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Bussiness',
            'marathi_name' => 'व्यवसाय',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
        GalleryCategory::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Sport',
            'marathi_name' => 'खेळ',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
    }
}