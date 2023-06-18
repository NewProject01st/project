<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TollFreeNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tollfree::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_tollfree_no' => '000 0000 000',
            'marathi_tollfree_no' => '000 0000 000',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}
