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
        $this->down();
        $views = "
        CREATE OR REPLACE VIEW get_psychological_visit_review AS
            SELECT
                cpv.id AS id,
                cpvr.reason AS rejection_message,
                cpvr.status AS status,
                MONTH(cpv.date) AS month,
                m.name AS municipality,
                b.full_name AS beneficiary,
                cpv.topic AS topic,
                cpv.agreemnets AS agreemnets,
                /* kg.concept AS concept,
                kg.know_needs AS guardian_know_needs, */
                u.name AS psychologist,
                b.scholar_level AS grade,
                c.entity AS health_entity,
                bg.firts_name AS guardian_first_name,
                bg.last_name AS guardian_last_name,
                bg.cedula AS guardian_cedula
            FROM
                custom_psychological_visits cpv
                LEFT JOIN custom_psychological_visit_review cpvr ON cpv.id = cpvr.Psicological_visit
                LEFT JOIN beneficiaries b ON cpv.beneficiary = b.id
                LEFT JOIN health_entities c ON b.health_entity_id = c.id
                LEFT JOIN municipalities m ON cpv.municipality = m.id
                LEFT JOIN know_guardians kg ON b.id = kg.id_beneficiary
                LEFT JOIN beneficiary_guardians bg ON kg.id_guardian = bg.id
                LEFT JOIN users u ON cpv.created_by = u.id;
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
        $views= "DROP VIEW IF EXISTS get_psychological_visit_review;";
        DB::unprepared($views);

    }
};
