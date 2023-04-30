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
            SELECT DISTINCT u.name, u.lastname, b.full_name, muni.name AS municipality,
                m.name AS month, cv.theme, cv.guardian_knows_semilleros,
                s.name AS status, cv.created_at
            FROM custom_visits cv
                LEFT JOIN users u ON u.id = cv.created_by
                LEFT JOIN beneficiaries b ON b.id = cv.beneficiary_id
                LEFT JOIN municipalities muni ON muni.id = cv.municipality_id
                LEFT JOIN months m ON m.id = cv.month_id
                LEFT JOIN statuses s ON s.id = cv.status_id
            WHERE
            cv.created_by NOT IN (1)
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
