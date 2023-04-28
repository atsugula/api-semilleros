<?php

use Doctrine\DBAL\Schema\View;
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
        // Traer data para los informes de historial de navegacion
        DB::statement("
            CREATE VIEW get_navigation_history AS
                SELECT n.id, n.url, u.created_at, u.name, u.lastname
                FROM navigation_history n
                    JOIN users u ON n.user_id = u.id
                WHERE n.user_id IS NOT NULL
                    AND n.user_id NOT IN (1, 2)
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS get_navigation_history');
    }
};
