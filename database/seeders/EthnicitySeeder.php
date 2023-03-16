<?php

namespace Database\Seeders;

use App\Models\Ethnicity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route = database_path('/seeders/json/ethnicities_config.json');
        $json = file_get_contents($route);
        $data = json_decode($json);

        foreach ($data as $obj) {
            Ethnicity::create(array(
                'name' => $obj->name,
            ));
        }
    }
}
