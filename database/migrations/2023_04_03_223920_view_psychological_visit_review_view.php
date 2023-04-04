<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        CREATE VIEW psychological_visit_review_view AS
        SELECT
            pv.id AS psychological_visit_id,
            pv.date,
            pv.theme,
            pv.recommendations,
            b.full_name AS beneficiary_full_name,
            b.institution_entity_referred AS beneficiary_entity_referred,
            b.type_document AS beneficiary_document_type,
            b.document_number AS beneficiary_document_number,
            b.phone AS beneficiary_phone,
            b.email AS beneficiary_email,
            u.name AS created_by_name,
            u.email AS created_by_email,
            u.phone AS created_by_phone,
            u.gender AS created_by_gender
        FROM psychological_visits pv
        JOIN beneficiaries b ON b.id = pv.beneficiaries
        JOIN users u ON u.id = pv.created_by;
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
        $views= "DROP VIEW get_psychological_visit_review;";
        DB::unprepared($views);
        
    }
};