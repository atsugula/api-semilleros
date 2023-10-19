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
        CREATE OR REPLACE VIEW get_visit_methodologist AS
            SELECT DISTINCT mv.id, mv.hour_visit, mv.date_visit, mv.sports_scene, mv.beneficiary_coverage, mv.sidewalk,
                CASE
                    WHEN mv.swich_plans_r = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_r,
                CASE
                    WHEN mv.swich_plans_sc_1 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_sc_1,
                CASE
                    WHEN mv.swich_plans_sc_2 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_sc_2,
                CASE
                    WHEN mv.swich_plans_sc_3 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_sc_3,
                CASE
                    WHEN mv.swich_plans_sc_4 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_sc_4,
                CASE
                    WHEN mv.swich_plans_gm_1 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_1,
                CASE
                    WHEN mv.swich_plans_gm_2 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_2,
                CASE
                    WHEN mv.swich_plans_gm_3 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_3,
                CASE
                    WHEN mv.swich_plans_gm_4 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_4,
                CASE
                    WHEN mv.swich_plans_gm_5 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_5,
                CASE
                    WHEN mv.swich_plans_gm_6 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_gm_6,
                CASE
                    WHEN mv.swich_plans_mp_1 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_mp_1,
                CASE
                    WHEN mv.swich_plans_mp_2 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_mp_2,
                CASE
                    WHEN mv.swich_plans_mp_3 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_mp_3,
                CASE
                    WHEN mv.swich_plans_mp_4 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_mp_4,
                CASE
                    WHEN mv.swich_plans_mp_5 = 0 THEN 'no'
                    ELSE 'si'
                END AS swich_plans_mp_5,
                m.name AS municipalitie, monitor.name AS monitor, d.name AS discipline,
                es.name AS event_supports, st.name AS statuse, mv.created_at, e.name AS evaluation
            FROM methodologist_visits mv
                LEFT JOIN users u ON u.id = mv.created_by
                LEFT JOIN role_user ru ON u.id = ru.user_id
                LEFT JOIN roles r ON r.id = ru.role_id
                LEFT JOIN municipalities m ON m.id = mv.municipalitie_id
                LEFT JOIN users monitor ON monitor.id = mv.user_id
                LEFT JOIN disciplines d ON d.id = mv.discipline_id
                LEFT JOIN evaluations e ON e.id = mv.evaluation_id
                LEFT JOIN event_supports es ON es.id = mv.event_support
                LEFT JOIN statuses st ON st.id = mv.status_id
            WHERE r.id = 10;
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
        $views = "DROP VIEW get_visit_methodologist;";
        DB::unprepared($views);
    }
};
