<?php

namespace Database\Seeders;

use App\Models\InfoContractor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoContractor::create([
            'contractor_id' => 1,
            'pension' => 'Colpensiones',
            'arl' => 'Positiva',
            'eps' => 'Sura',
            'history' => 'Nuevo',
            'activities' => 'Apoyar el proceso de vinculacion a los niños al deporte',
            'experience_profile' => 'Bachillerato, impirico',
            'contractual_object' => 'Null',
            'start_date' => '2021-02-24',
            'final_date' => '2021-04-24',
            'mobilizations_value' => '150222',
            'mobilizations_transport' => '0',
            'quota_without_mobilization' => '150222',
            'number_share' => '1',
            'contract_value' => '150222',
            'payroll' => 'Si',
            'budget_allocation' => '22-59874 Monitor',
        ]);
    }
}
