<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TweeterFeed;

class TwitterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TweeterFeed::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'url' => 'Twitter Link',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}
