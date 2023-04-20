<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenders;

class TendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenders::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'tender_date' => 'Tender Date',
                'english_title' => 'English Title',
                'marathi_title' => 'Marathi Title',
                'english_description' => 'English Description',
                'marathi_description' => 'Marathi Description',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'open_date' => 'Open Date',
                'tender_number' => 'Tender Number',
                'tender_pdf' => 'Tender Pdf',
                'is_deleted' => '1',
                'is_active' => '1',
                
            ]);
    }
}
