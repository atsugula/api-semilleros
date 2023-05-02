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
        DROP VIEW get_report_sports_monitor ;
        CREATE OR REPLACE VIEW get_report_sports_monitor AS
            SELECT users.name, users.lastname, users.document_number, users.gender,COUNT(beneficiaries.id) AS forms_beneficiaries, COUNT(chronograms.id) AS created_chronograms, users.created_at
            FROM users
            LEFT JOIN role_user ON users.id = role_user.user_id
            LEFT JOIN chronograms ON users.id = chronograms.created_by
            LEFT JOIN beneficiaries ON users.id = beneficiaries.created_by
            WHERE role_user.role_id = 12
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
        $views= "DROP VIEW get_report_sports_monitor ;";
        DB::unprepared($views);

    }
};
