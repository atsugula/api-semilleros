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
        CREATE VIEW get_report_users AS
            SELECT DISTINCT u.name, u.lastname, u.address,
                u.document_number, u.document_type, u.phone, r.name AS rol,
                z.name AS region, d.name AS discipline, acces.date AS end_date
            FROM users u
                INNER JOIN role_user ru ON u.id = ru.user_id
                INNER JOIN roles r ON r.id = ru.role_id
                JOIN zone_users zu ON u.id = zu.user_id
                JOIN zones z ON z.id = zu.zones_id
                JOIN discipline_users du ON u.id = du.user_id
                JOIN disciplines d ON d.id = du.disciplines_id
                INNER JOIN access_logins acces ON u.id = acces.user_id
            WHERE
                u.id NOT IN (1)
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
        $views= "DROP VIEW get_report_users;";
        DB::unprepared($views);
    }
};
