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
            'english_title' => '<strong>In February 2021, Maharashtra battled forest fires in 2021 using firefighting teams, helicopters, and the Indian Army. </strong>',
            'marathi_title' => '<strong>फेब्रुवारी 2021 मध्ये, महाराष्ट्राने 2021 मध्ये अग्निशामक दल, हेलिकॉप्टर आणि भारतीय सैन्याचा वापर करून जंगलातील आगीशी लढा दिला.</strong>',
            'is_deleted' => false,
            'is_active' => true,
           
        ]);
    }
}