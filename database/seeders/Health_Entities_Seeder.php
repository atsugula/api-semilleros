<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthEntities;
use Illuminate\Support\Facades\DB;


class Health_Entities_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('health_entities')->delete();

        $route = database_path('/seeders/json/health_entities.json');
        $json = file_get_contents($route);
        $data = json_decode($json);

        foreach($data as $entity) {
            HealthEntities::create(array(
                'entity' => $entity->entity,
            ));
        }
    }
}
