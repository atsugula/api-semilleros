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
        Schema::create('info_contractors', function (Blueprint $table) {
            $table->id();

           /* $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->enum('status', ['REC', 'REV', 'ENREV', 'APRO'])->nullable()->default('ENREV');
            $table->text('rejection_message')->nullable();*/

            //CONTRATISTA
            $table->unsignedBigInteger('contractor_id')->nullable();
            $table->foreign('contractor_id')->references('id')->on('contractors');

            //AFILIACIONES
            $table->string('arl')->nullable();
            $table->string('pension')->nullable();
            $table->string('eps')->nullable();
            $table->string('history')->nullable();

            //DATOS DEL CONTRATO
            $table->text('activities')->nullable();
            $table->text('experience_profile')->nullable();
            $table->string('contractual_object')->nullable();
            $table->string('start_date')->nullable();
            $table->string('final_date')->nullable();
            $table->integer('mobilizations_value')->nullable();
            $table->integer('mobilizations_transport')->nullable();
            $table->integer('quota_without_mobilization')->nullable();
            $table->integer('number_share')->nullable();
            $table->integer('contract_value')->nullable();
            $table->string('payroll')->nullable();
            $table->string('budget_allocation')->nullable();

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
        Schema::dropIfExists('info_contractors');
    }
};
