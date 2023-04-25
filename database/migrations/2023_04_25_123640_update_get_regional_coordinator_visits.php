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
        drop view get_report_regional_coordinator;
        CREATE VIEW get_report_regional_coordinator AS
                SELECT users.name, users.lastname, users.document_number, users.gender,COUNT(coordinator_visits.id) as visits, users.created_at
                FROM users
                JOIN role_user ON users.id = role_user.user_id
                JOIN roles ON role_user.role_id = roles.id
            INNER JOIN coordinator_visits ON users.id = coordinator_visits.created_by
                WHERE roles.id = 14
                GROUP BY users.id, users.name, users.lastname, users.document_number, users.gender,users.created_at;
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
        $views= "DROP VIEW get_report_regional_coordinator;";
        DB::unprepared($views);

    }
};
