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
        Schema::create('psychological_visits', function (Blueprint $table) {
            $table->id('id');

            //relaciones
            $table->unsignedBigInteger('municipalities_id')->nullable();
            $table->foreign('municipalities_id')
                ->references('id')
                ->on('municipalities');
            $table->unsignedBigInteger('diciplines_id')->nullable();
            $table->foreign('diciplines_id')
                ->references('id')
                ->on('disciplines');
            $table->unsignedBigInteger('monitor_id')->nullable();
            $table->foreign('monitor_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('users');


            $table->string('scenery');
            $table->integer('number_beneficiaries');
            $table->boolean('beneficiaries_recognize_name');
            $table->boolean('beneficiary_recognize_value');
            $table->boolean('all_ok');
            $table->text('description');
            $table->text('observations');
            $table->text('evidence');
            $table->softDeletes();
            $table->timestamps();
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
