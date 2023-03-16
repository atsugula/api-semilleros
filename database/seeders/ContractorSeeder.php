<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contractor::create(
            [
                'account_number' => '207890',
                'address' => 'calle 5',
                'bank_account_type' => '1',
                'bank' => '6',
                'birth_date' => '1999-01-01',
                'consecutive' => 'C1',
                'contract_value' => 10000.00,
                'date_expedition_document' => '2022-01-01',
                'department' => '1',
                'email' => 'juan@gmail.com',
                'identification_type' => 'CC',
                'identification' => '16738910',
                'lastname' => 'Rios',
                'municipality' => '1',
                'name' => 'Juan',
                'phone' => 1434567,
                'status' => '2',
                'validity_periods_id' => '2',
                'gender'=> 'Maculino'
            ],
        );

        Contractor::create([
            'account_number' => '111037890',
            'address' => 'calle 225',
            'bank_account_type' => '2',
            'bank' => '1',
            'birth_date' => '1999-01-01',
            'consecutive' => 'C2',
            'contract_value' => 100070.00,
            'date_expedition_document' => '2022-02-01',
            'department' => '1',
            'email' => 'juayyn@gmail.com',
            'identification_type' => 'CC',
            'identification' => '116789210',
            'lastname' => 'Potro',
            'municipality' => '1',
            'name' => 'Juan',
            'phone' => 111567,
            'status' => '5',
            'validity_periods_id' => '1',
            'gender'=> 'Maculino'
        ]);

        Contractor::create([
            'account_number' => '13037890',
            'address' => 'calle 225',
            'bank_account_type' => '2',
            'bank' => '3',
            'birth_date' => '1999-01-01',
            'consecutive' => 'C3',
            'contract_value' => 100070.00,
            'date_expedition_document' => '2022-02-01',
            'department' => '1',
            'email' => 'juaeeyyn@gmail.com',
            'identification_type' => 'CC',
            'identification' => '1678229210',
            'lastname' => 'Lopez',
            'municipality' => '1',
            'name' => 'Pedro',
           //'number_share' => 1,
            'phone' => 1331567,
            'status' => '5',
            'validity_periods_id' => '2',
            'gender'=> 'Femenino'
        ]);
    }
}
