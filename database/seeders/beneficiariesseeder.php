<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class beneficiariesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(1, 50) as $index) {
            DB::table('beneficiaries')->insert([
                'created_by' => $faker->numberBetween(1, 10),
                'group_id' => $faker->numberBetween(1, 5),
                'full_name' => $faker->name,
                'institution_entity_referred' => $faker->company,
                'accept' => $faker->randomElement(['0', '1']),
                'linkage_project' => $faker->randomElement(['PMIE', 'PMEPUB', 'PMEPRI', 'PMGCP', 'PMMCP', 'PMR']),
                'participant_type' => $faker->randomElement(['C', 'NC']),
                'type_document' => $faker->randomElement(['RC', 'TI', 'CC']),
                'document_number' => $faker->unique()->numberBetween(10000000, 999999999),
                'zone' => $faker->randomElement(['U', 'R']),
                'stratum' => $faker->randomNumber(2),
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'file' => $faker->imageUrl($width = 640, $height = 480),
                'status' => $faker->randomElement(['REC', 'REV', 'ENREV', 'APRO']),
                'audited' => $faker->randomElement(['0', '1']),
                'rejection_message' => $faker->sentence(),
                'referrer_name' => $faker->name,
                'softDeletes' => $faker->randomElement(['0', '1']),
                'schoclar_Grade' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                'health_entity' => $faker->company,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s')
            ]);
    } 
    }
}
