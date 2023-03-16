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
        Schema::create('methodologist_visits', function (Blueprint $table) {
            $table->id();
            $table->time('hour_visit');
            $table->date('date_visit');
            $table->string('sports_scene');
            $table->string('beneficiary_coverage');
            /* REQUERIMIENTOS */
            $table->char('swich_plans_r')->default('0');
            $table->char('swich_plans_sc_1')->default('0');
            $table->char('swich_plans_sc_2')->default('0');
            $table->char('swich_plans_sc_3')->default('0');
            $table->char('swich_plans_sc_4')->default('0');
            /* GENERALIDADES MONITOR */
            $table->char('swich_plans_gm_1')->default('0');
            $table->char('swich_plans_gm_2')->default('0');
            $table->char('swich_plans_gm_3')->default('0');
            $table->char('swich_plans_gm_4')->default('0');
            $table->char('swich_plans_gm_5')->default('0');
            $table->char('swich_plans_gm_6')->default('0');
            /* MODELO PEDAGOGICO */
            $table->char('swich_plans_mp_1')->default('0');
            $table->char('swich_plans_mp_2')->default('0');
            $table->char('swich_plans_mp_3')->default('0');
            $table->char('swich_plans_mp_4')->default('0');
            $table->char('swich_plans_mp_5')->default('0');
            /* OBSERVACIONES */
            $table->text('observations');
            /* RELACIONES */
            $table->foreignId('municipalitie_id')->constrained()->onDelete('cascade');
            $table->foreignId('sidewalk_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('discipline_id')->constrained()->onDelete('cascade');
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_support_id')->constrained()->onDelete('cascade');


            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');

            $table->enum('status', ['REC', 'REV', 'ENREV', 'APRO'])->nullable()->default('ENREV');
            $table->text('rejection_message')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('methodologist_visits');
    }
};
