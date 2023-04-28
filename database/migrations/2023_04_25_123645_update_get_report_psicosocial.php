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
        DROP VIEW get_report_psicosocial;
        CREATE VIEW get_report_psicosocial AS
            SELECT users.name, users.lastname, users.document_number, users.gender,COUNT(custom_visits.id) AS custom_visits,COUNT(psychological_visits.id) AS visits,COUNT(transversal_activities.id) AS transversal_activities, users.created_at
            FROM users
            JOIN role_user ON users.id = role_user.user_id
            JOIN roles ON role_user.role_id = roles.id
            INNER JOIN custom_visits ON custom_visits.created_by = users.id
            INNER JOIN psychological_visits ON psychological_visits.created_by = users.id
            INNER JOIN transversal_activities ON transversal_activities.created_by = users.id
            WHERE roles.id = 11
            GROUP BY users.id,users.name, users.lastname, users.document_number, users.gender,users.created_at;
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
        $views= "DROP VIEW get_report_psicosocial;";
        DB::unprepared($views);

    }
};
