<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('methodologist_visits', function (Blueprint $table) {
            //Eliminar columnas.
            $table->dropColumn('beneficiary_coverage');
            $table->dropColumn('swich_plans_r');
            $table->dropColumn('swich_plans_sc_1');
            $table->dropColumn('swich_plans_sc_2');
            $table->dropColumn('swich_plans_sc_3');
            $table->dropColumn('swich_plans_sc_4');
            $table->dropColumn('swich_plans_gm_1');
            $table->dropColumn('swich_plans_gm_2');
            $table->dropColumn('swich_plans_gm_3');
            $table->dropColumn('swich_plans_gm_4');
            $table->dropColumn('swich_plans_gm_5');
            $table->dropColumn('swich_plans_gm_6');
            $table->dropColumn('swich_plans_mp_1');
            $table->dropColumn('swich_plans_mp_2');
            $table->dropColumn('swich_plans_mp_3');
            $table->dropColumn('swich_plans_mp_4');
            $table->dropColumn('swich_plans_mp_5');
            $table->dropForeign('methodologist_visits_user_id_foreign');
            $table->dropForeign('methodologist_visits_municipalitie_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('municipalitie_id');

            //Crear columnas nuevas.
            $table->unsignedBigInteger('monitor_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('monitor_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('municipality_id')->constrained()->onDelete('cascade');
            $table->foreign('municipality_id')
                ->references('id')
                ->on('municipalities');
            $table->char('lesson_plan');
            $table->char('congruent_activity');
            $table->char('develop_technical_sports_component_month');
            $table->char('management_development_activities');
            $table->char('functional_component_month');
            $table->char('puntuality');
            $table->char('personal_presentation');
            $table->char('patient');
            $table->char('discipline');
            $table->char('parent_child_communication');
            $table->char('verbalization');
            $table->char('traditional');
            $table->char('behavioral');
            $table->char('romantic');
            $table->char('constructivist');
            $table->char('globalizer');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('methodologist_visits', function (Blueprint $table) {
        });
    }
};
