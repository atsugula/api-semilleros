<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupBeneficiary;
use App\Models\Inscriptions\Beneficiary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();
        $route =database_path('/seeders/json/groups.json');
        $json =file_get_contents($route);
        $data = json_decode($json);

        foreach ($data as $obj) {
            Group::create([
                'name' => $obj->name,
                "user_id"=>$obj->user_id
            ]);
        }
    }
}
