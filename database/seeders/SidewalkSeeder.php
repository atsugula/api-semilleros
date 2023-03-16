<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Sidewalk;

class SidewalkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidewalks')->delete();

        $route = database_path('/seeders/json/sidewalks.json');
        $json = file_get_contents($route);
        $data = json_decode($json);

        foreach ($data as $obj) {
            $city = DB::table('cities')->where('name', $obj->city)->first();
            foreach($obj->villages as $village) {
                Sidewalk::create([
                    'name' => $village,
                    'citie_id' => $city->id
                ]);
            }
        }
    }
}
