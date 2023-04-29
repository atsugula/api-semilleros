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
        CREATE VIEW get_regional_coordinator_visits AS
            SELECT DISTINCT
                users.name AS Coordinator,
                coordinator_visits.date_visit AS Date,
                coordinator_visits.hour_visit AS Hour,
                users_monitor.name AS Monitor,
                disciplines.name AS Discipline,
                municipalities.name AS Municipality,
                statuses.name AS Status,
                coordinator_visits.updated_at AS Upload_Date
            FROM
                coordinator_visits
                LEFT JOIN users ON coordinator_visits.created_by = users.id
                LEFT JOIN users AS users_monitor ON coordinator_visits.revised_by = users_monitor.id
                LEFT JOIN disciplines ON coordinator_visits.discipline_id = disciplines.id
                LEFT JOIN municipalities ON coordinator_visits.municipalitie_id = municipalities.id
                LEFT JOIN role_user ON users.id = role_user.user_id
                LEFT JOIN statuses ON coordinator_visits.status_id = statuses.id
            WHERE
                role_user.role_id = 9;
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
        $views= "DROP VIEW get_regional_coordinator_visits;";
        DB::unprepared($views);

    }
};
