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
        Schema::table('psychological_visits', function (Blueprint $table) {
            //Eliminar atributos.
            $table->dropColumn('beneficiaries_knows_project');
            $table->dropColumn('beneficiaries_knows_monthly_value');
            $table->dropColumn('monitor_organization_discipline_management');
            $table->dropColumn('evidence');

            //Crear columnas nuevas.
            $table->char('beneficiaries_knows_project');
            $table->char('beneficiaries_knows_monthly_value');
            $table->char('monitor_organization_discipline_management');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psychological_visits');
    }
};