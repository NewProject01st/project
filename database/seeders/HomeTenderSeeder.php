<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeTender;

class HomeTenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeTender::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Lorem Ipsum  ',
            'marathi_title' => 'फक्त मजकूर ',
            'english_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'marathi_description' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.',
            'tender_date' => '2023-05-11',
            'url'   => 'tenders',
            'english_pdf' => 'English pdf',
            'marathi_pdf' => 'Marathi pdf',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);

    }
}