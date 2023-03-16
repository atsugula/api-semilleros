<?php

namespace Database\Seeders;

use App\Models\Hiring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HiringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hiring::create([
            'contracting_entity' => 'Recrea Valle',
            'nit' => '123456789',
            'address' => 'Calle 123',
            'city' => 'Cali',
            'manager_user_id' => 2,
            /*'transcribed_user_id' => 15,
            'reviewer_user_id' => 11,
            'approve_user_id' => 1*/
        ]);
    }
}
