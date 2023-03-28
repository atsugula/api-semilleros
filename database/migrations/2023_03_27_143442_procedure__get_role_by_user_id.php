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
        $procedure = "
        CREATE PROCEDURE GetRoleByUserId(IN userId INT)
            BEGIN
                SELECT users.id, roles.name
                FROM users
                INNER JOIN role_user ON users.id = role_user.user_id
                INNER JOIN roles ON role_user.role_id = roles.id
                WHERE users.id = userId;
            END
        ";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        $procedure= "DROP PROCEDURE IF EXISTS GetRoleByUserId;";
        DB::unprepared($procedure);
    }
};
