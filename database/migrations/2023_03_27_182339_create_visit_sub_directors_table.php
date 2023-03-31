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
        Schema::create('visit_sub_directors', function (Blueprint $table) {
            $table->id();
            $table->date('date_visit');
            $table->time('hour_visit');
            $table->string('sports_scene');
            $table->string('beneficiary_coverage');
            $table->char('technical');
            $table->char('event_support');
            $table->text('description');
            $table->text('observations');
            $table->text('file');
            // $table->text('transversal_activity');

            // Relation municipalities
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->foreign('municipality_id')
                ->references('id')
                ->on('municipalities');

            // Relation sidewalks
            $table->unsignedBigInteger('sidewalk_id')->nullable();
            $table->foreign('sidewalk_id')
                ->references('id')
                ->on('sidewalks');

            // Relation disciplines
            $table->unsignedBigInteger('discipline_id')->nullable();
            $table->foreign('discipline_id')
                ->references('id')
                ->on('disciplines');

            // Relation monitor user
            $table->unsignedBigInteger('monitor_id')->nullable();
            $table->foreign('monitor_id')
                ->references('id')
                ->on('users');

            // Relation creator user
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            // Relation reviewed user
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('users');

            // Relation with status
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

            $table->text('reject_message')->nullable();

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
        Schema::dropIfExists('visit_sub_directors');
    }
};
