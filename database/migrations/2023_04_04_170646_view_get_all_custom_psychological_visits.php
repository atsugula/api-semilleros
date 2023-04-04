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
        CREATE VIEW get_all_custom_psychological_visits AS
            SELECT cpv.id AS id, 
                DATE_FORMAT(cpv.date, '%Y-%m') AS month, 
                u.name AS user, 
                m.name AS municipality, 
                b.full_name AS beneficiary, 
                cpr.status AS status 
            FROM custom_psychological_visits cpv 
            JOIN users u ON cpv.created_by = u.id 
            JOIN municipalities m ON cpv.municipality = m.id 
            JOIN beneficiaries b ON cpv.beneficiary = b.id 
            LEFT JOIN custom_psychological_visit_review cpr ON cpv.id = cpr.Psicological_visit;
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
        $views= "DROP VIEW get_all_custom_psychological_visits;";
        DB::unprepared($views);
        
    }
};
