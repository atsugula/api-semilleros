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

            // Eliminamos la llave foranea
            $table->dropForeign(['discipline_id']);
            // Modificar la columna para que permita valores nulos
            $table->unsignedBigInteger('discipline_id')->nullable()->change();
            // Volver a agregar la restricción de clave foránea con la opción onDelete('cascade')
            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');

            // Eliminamos la llave foranea
            $table->dropForeign(['evaluation_id']);
            // Modificar la columna para que permita valores nulos
            $table->unsignedBigInteger('evaluation_id')->nullable()->change();
            // Volver a agregar la restricción de clave foránea con la opción onDelete('cascade')
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');


            // $table->dropForeign(['event_support_id']);
            $table->boolean('event_support')->nullable();
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
            //
        });
    }
};
