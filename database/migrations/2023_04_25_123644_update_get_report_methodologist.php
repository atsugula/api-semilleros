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
        DROP VIEW get_report_methodologist;
        CREATE VIEW get_report_methodologist AS
            SELECT users.name, users.lastname, users.document_number, users.gender,count(methodologist_visits.id) as visits, users.created_at
            FROM users
            LEFT JOIN role_user ON users.id = role_user.user_id
            LEFT JOIN roles ON role_user.role_id = roles.id
            LEFT JOIN methodologist_visits ON roles.id = methodologist_visits.created_by
            WHERE roles.id = 10
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
        $views= "DROP VIEW get_report_methodologist;";
        DB::unprepared($views);

    }
};
