<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\psychologistVisits;

class psychologistVisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        psychologistVisits::create([
            'scenery' => 'Scenery 1',
            'number_beneficiaries' => 5,
            'beneficiaries_recognize_name' => true,
            'beneficiary_recognize_value' => true,
            'all_ok' => true,
            'description' => 'Visit description',
            'observations' => 'Visit observations',
            'evidence' => '',
            'municipalities_id' => 1,
            'diciplines_id' => 1,
            'monitor_id' => 1,
            'created_by' => 6,
            'reviewed_by' => 18,
            'status_id' => 4,
            'reject_message' => 'Visit rejected',
        ]);
    }
}
