<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IncidentType;
class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentType::create(
            [
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'marathi_title' => 'आग',
                'english_title' => 'Fires',
            ]);
            IncidentType::create(
                [
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'marathi_title' => 'गुन्हे',
                    'english_title' => 'Crimes',
                ]);
                IncidentType::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'marathi_title' => 'नैसर्गिक',
                        'english_title' => 'Natural',
                    ]);
                IncidentType::create(
                    [
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'marathi_title' => 'संकटे',
                        'english_title' => 'Disasters',
                    ]);
}
}
