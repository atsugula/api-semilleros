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
        CREATE VIEW get_report_visits_subdirector AS
            SELECT DISTINCT creator.name AS creator_name, creator.lastname AS creator_lastname,
                vs.date_visit, vs.hour_visit, m.name AS municipalitie, vs.sports_scene,
                monitor.name AS monitor_name, monitor.lastname AS monitor_lastname,
                d.name AS discipline, vs.event_support, vs.description, vs.beneficiary_coverage,
                vs.technical, s.name AS status, vs.created_at
            FROM visit_sub_directors vs
                JOIN users creator ON vs.created_by = creator.id
                JOIN users monitor ON vs.monitor_id = monitor.id
                JOIN municipality_users mu ON mu.user_id = creator.id
                JOIN municipalities m ON m.id = mu.municipalities_id
                JOIN discipline_users du ON du.user_id = creator.id
                JOIN disciplines d ON d.id = du.disciplines_id
                JOIN statuses s ON s.id = vs.status_id
            WHERE
                vs.created_by NOT IN (1)
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
        $views= "DROP VIEW get_report_visits_subdirector;";
        DB::unprepared($views);
    }
};
