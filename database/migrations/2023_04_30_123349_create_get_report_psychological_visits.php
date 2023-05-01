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
        CREATE VIEW get_report_psychological_visits AS
            SELECT DISTINCT creator.name AS creator_name, creator.lastname AS creator_lastname,
                monitor.name AS monitor_name, monitor.lastname AS monitor_lastname,
                muni.name AS municipality, vs.date_visit, vs.number_beneficiaries,
                d.name AS dicipline, s.name AS status, vs.created_at
            FROM psychological_visits vs
                LEFT JOIN users creator ON creator.id = vs.created_by
                LEFT JOIN users monitor ON monitor.id = vs.monitor_id
                LEFT JOIN municipalities muni ON muni.id = vs.municipalities_id
                LEFT JOIN disciplines d ON d.id = vs.diciplines_id
                LEFT JOIN statuses s ON s.id = vs.status_id
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
        $views= "DROP VIEW get_report_psychological_visits;";
        DB::unprepared($views);
    }
};
