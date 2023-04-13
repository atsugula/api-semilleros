<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $views = "
        CREATE VIEW get_visit_psycosocial AS
        SELECT 
            users.created_by AS psicosocial,
            municipalities.name AS municipality,
            transversal_activities.date_visit AS date,
            transversal_activities.team_socialization AS number,
            transversal_activities.activity_name AS discipline,
            transversal_activities.status_id AS status,
            transversal_activities.created_at AS created_at
        FROM transversal_activities
        JOIN municipalities ON transversal_activities.municipality_id = municipalities.id
        JOIN users ON transversal_activities.created_by = users.id;
        ";
        DB::unprepared($views);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $views= "DROP VIEW get_visit_psycosocial";
        DB::unprepared($views);

    }
};
