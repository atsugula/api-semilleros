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
        CREATE VIEW get_report_custom_psychological_visits AS
            SELECT DISTINCT u.name, u.lastname, b.full_name, m.name AS municipality,
                tpt.date, tpt.agreemnets, tpt.topic, cpvr.status, tpt.created_at
            FROM custom_psychological_visits tpt
                JOIN users u ON u.id = tpt.created_by
                JOIN municipalities m ON m.id = tpt.municipality
                JOIN custom_psychological_visit_review cpvr ON tpt.id = cpvr.Psicological_visit
                JOIN beneficiaries b ON b.id = tpt.beneficiary
            WHERE
                tpt.created_by NOT IN (1)
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
        $views= "DROP VIEW get_report_custom_psychological_visits;";
        DB::unprepared($views);
    }
};
