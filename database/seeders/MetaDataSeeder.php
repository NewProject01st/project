<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Metadata;

class MetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Metadata::create([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'english_name' => 'Web',
            'keywords' => 'HTML,CSS,JavaScript,',
            'is_deleted'=>false,
            'is_active'=>true,
        
        ]);
    }
}