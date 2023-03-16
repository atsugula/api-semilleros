<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();
        $route = database_path('/seeders/json/departments_config.json');
        $json = file_get_contents($route);
        $data = json_decode($json);

        foreach ($data as $obj) {
            Department::create(array(
                'name' => $obj->name,
            ));
        }
    }
}
