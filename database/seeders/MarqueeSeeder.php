<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marquee;


class MarqueeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marquee::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'marathi_title' => 'Lorem Ipsum हा मुद्रण आणि टाइपसेटिंग उद्योगाचा फक्त डमी मजकूर आहे.',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
    }
}