<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Contract::create([
            'contractor_id' => 1,
            'hiring_id' =>1,
            'scanning_pdf' => 'test2.pdf',
            'transcribed_user_id' => 15,
            'reviewer_user_id' => 11,
            'approve_user_id' => 1,
         ]);

         Contract::create([
            'contractor_id' => 2,
            'hiring_id' =>1,
            'scanning_pdf' => 'test.pdf',
            'transcribed_user_id' => 15,
            'reviewer_user_id' => 11,
            'approve_user_id' => 1,
         ]);
    }
}
