<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Video::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
              'video_name'=> '9WIwlljva_s',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
            Video::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                     'video_name'=> 'BaWnRznp1AU',
                    'is_deleted' => false,
                    'is_active' => true,
                    
                ]);
                Video::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                      'video_name'=> 'BaWnRznp1AU',
                        'is_deleted' => false,
                        'is_active' => true,
                        
                    ]);
    }
}