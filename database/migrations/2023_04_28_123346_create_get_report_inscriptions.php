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
        CREATE OR REPLACE VIEW get_report_inscriptions AS
            SELECT DISTINCT u.name AS monitor_name, u.lastname AS monitor_lastname,
                u.document_number AS moni_document_number, b.created_at, m.name AS municipalitie,
                z.name AS zone, d.name AS discipline, b.birth_date, b.origin_place,
                YEAR(CURDATE()) - YEAR(b.birth_date) AS edad, b.type_document, b.document_number AS guardian_document_number,
                b.home_address, b.phone, b.stratum, b.zone AS area, b.conflict_victim, b.gender,
                e.name AS etnia, b.disability, b.other_disability, b.pathology,
                b.what_pathology, b.blood_type, b.scholarship, b.scholar_level,
                b.institution, b.live_with, h.entity, b.affiliation_type,
                bg.firts_name AS name_guardian, bg.last_name AS lastname_guardian,
                bg.cedula, kg.relationship, bg.email, bg.phone_number, kg.social_media,
                kg.find_out, s.name AS status
            FROM beneficiaries b
                LEFT JOIN users u ON u.id = b.created_by
                LEFT JOIN municipality_users mu ON u.id = mu.user_id
                LEFT JOIN municipalities m ON m.id = b.municipalities_id
                LEFT JOIN zone_users zu ON u.id = zu.user_id
                LEFT JOIN zones z ON z.id = zu.zones_id
                LEFT JOIN discipline_users du ON u.id = du.user_id
                LEFT JOIN disciplines d ON d.id = du.disciplines_id
                LEFT JOIN ethnicities e ON e.id = b.ethnicities_id
                LEFT JOIN know_guardians kg ON b.id = kg.id_beneficiary
                LEFT JOIN beneficiary_guardians bg ON bg.id = kg.id_guardian
                LEFT JOIN statuses s ON s.id = b.status_id
                LEFT JOIN health_entities h ON h.id = b.health_entity_id
            WHERE
                b.created_by NOT IN (1)
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
        $views= "DROP VIEW get_report_visits_subdirector;";
        DB::unprepared($views);
    }
};
