<?php

namespace Database\Seeders;

use App\Models\UserHierarchy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserHierarchy::create([
            'user_id' => 18,
            'chief_id' => 2
        ]);

        UserHierarchy::create([
            'user_id' => 19,
            'chief_id' => 2
        ]);
    }
}
