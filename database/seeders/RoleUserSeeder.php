<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            // ['role_id' => 1, 'user_id' => 1],
            // ['role_id' => 2, 'user_id' => 2],
            /* SUBDIRECTOR */
            // ['role_id' => 4, 'user_id' => 4],
            /* DIRECTORES */
            // ['role_id' => 3, 'user_id' => 3],
            /* COORDINADORES */
            /* ['role_id' => 6, 'user_id' => 6],
            ['role_id' => 15, 'user_id' => 15],
            ['role_id' => 16, 'user_id' => 16], */
            /* APOYO */
            /* ['role_id' => 10, 'user_id' => 10],
            ['role_id' => 12, 'user_id' => 12], */
            /* GENERAL */
            /* ['role_id' => 8, 'user_id' => 8],
            ['role_id' => 9, 'user_id' => 9],
            ['role_id' => 11, 'user_id' => 11],
            ['role_id' => 13, 'user_id' => 13],
            ['role_id' => 14, 'user_id' => 14],
            ['role_id' => 17, 'user_id' => 17],
            ['role_id' => 18, 'user_id' => 18],
            ['role_id' => 19, 'user_id' => 19], */
        ]);
    }
}
