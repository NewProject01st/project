<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingMaterialsWorkshops;

class TrainingMaterialsWorkshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingMaterialsWorkshops::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Maharashtra Battles Forest Fires',
            'marathi_title' => 'महाराष्ट्र जंगलातील आगीशी लढत आहे',
            'url'   => 'Battles',
            'english_pdf' => 'Maharashtra Battles Forest Fires.pdf',
            'marathi_pdf' => 'Maharashtra Battles Forest Fires.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        TrainingMaterialsWorkshops::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Kerala floods displace thousands ',
            'marathi_title' => 'केरळच्या पुरामुळे हजारो लोक बेघर झाले आहेत',
            'url'   => 'floods',
            'english_pdf' => 'Kerala floods displace thousands.pdf',
            'marathi_pdf' => 'Kerala floods displace thousands.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        TrainingMaterialsWorkshops::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Odisha prepares for Cyclone Yaas ',
            'marathi_title' => 'ओडिशा यास चक्रीवादळाची तयारी करत आहे ',
            'url'   => 'prepares',
            'english_pdf' => ' Odisha prepares for Cyclone Yaas.pdf',
            'marathi_pdf' => ' Odisha prepares for Cyclone Yaas.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

        
        TrainingMaterialsWorkshops::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'test document',
            'marathi_title' => 'चाचणी दस्तऐवज ',
            'url'   => 'document',
            'english_pdf' => 'Test Document.pdf',
            'marathi_pdf' => 'Test Document.pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}