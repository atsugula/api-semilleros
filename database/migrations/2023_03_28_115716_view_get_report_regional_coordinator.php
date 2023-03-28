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
        CREATE VIEW get_report_regional_coordinator AS 
        SELECT users.name, users.lastname, users.document_number, users.gender, users.created_at 
        FROM users 
        JOIN role_user ON users.id = role_user.user_id 
        JOIN roles ON role_user.role_id = roles.id 
        WHERE roles.id = 14;
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
