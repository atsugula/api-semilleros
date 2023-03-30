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
            SELECT 
                users.name AS Coordinator, 
                coordinator_visits.date_visit AS Date, 
                coordinator_visits.hour_visit AS Hour, 
                users_monitor.name AS Monitor, 
                disciplines.name AS Discipline, 
                municipalities.name AS Municipality, 
                coordinator_visits.status_id AS Status, 
                coordinator_visits.updated_at AS Upload_Date 
            FROM 
                coordinator_visits 
                INNER JOIN users ON coordinator_visits.created_by = users.id 
                INNER JOIN users AS users_monitor ON coordinator_visits.revised_by = users_monitor.id 
                INNER JOIN disciplines ON coordinator_visits.discipline_id = disciplines.id 
                INNER JOIN municipalities ON coordinator_visits.municipalitie_id = municipalities.id 
                INNER JOIN role_user ON users.id = role_user.user_id 
            WHERE 
                role_user.role_id = 14;
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
