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
        Schema::create('transversal_activities', function (Blueprint $table) {
            $table->id();
            $table->date('date_visit');
            $table->string('nro_assistants');
            $table->string('activity_name');
            $table->text('objective_activity');
            $table->text('scene');
            $table->text('meeting_planing');
            $table->text('team_socialization');
            $table->text('development_activity');
            $table->text('content_network');

            // Relation municipalities
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->foreign('municipality_id')
                ->references('id')
                ->on('municipalities');

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
        Schema::dropIfExists('transversal_activities');
    }
};
