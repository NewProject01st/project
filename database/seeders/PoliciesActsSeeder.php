<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PoliciesActs;
class PoliciesActsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PoliciesActs::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'english_title' => 'English Title',
                'marathi_title' => 'Marathi Title',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'english_pdf' => 'English Pdf',
                'marathi_pdf' => 'Marathi Pdf',
                'is_deleted' => false,
                'is_active' => true,
                
            ]);
    }
}
