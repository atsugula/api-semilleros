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
        CREATE OR REPLACE VIEW get_report_transversal_activities AS
             SELECT DISTINCT u.name, u.lastname,
 				m.name AS municipality,
 				ta.date_visit,
                ta.nro_assistants,
 				ta.activity_name,
                ta.objective_activity,
                ta.scene,
                ta.meeting_planing,
                ta.team_socialization,
                ta.development_activity,
                ta.content_network,
                s.name AS status,
                ta.created_at
            FROM transversal_activities ta
                LEFT JOIN users u ON u.id = ta.created_by
                LEFT JOIN municipality_users mu ON u.id = mu.user_id
                LEFT JOIN municipalities m ON m.id = ta.municipality_id
                LEFT JOIN statuses s ON s.id = ta.status_id
            WHERE
                ta.created_by NOT IN (1)
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
        $views= "DROP VIEW get_report_transversal_activities;";
        DB::unprepared($views);
    }
};
