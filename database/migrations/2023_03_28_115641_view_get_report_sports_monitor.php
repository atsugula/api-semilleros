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
        CREATE VIEW get_report_sports_monitor AS 
        SELECT users.name, users.lastname, users.document_number, users.gender, COUNT(chronograms.id) AS created_chronograms, users.created_at
        FROM users
        INNER JOIN role_user ON users.id = role_user.user_id
        INNER JOIN chronograms ON users.id = chronograms.created_by
        WHERE role_user.role_id = 18
        GROUP BY users.id = 4;
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
        $views= "DROP VIEW get_report_sports_monitor;";
        DB::unprepared($views);
        
    }
};