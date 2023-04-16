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
        Schema::create('coordinator_visits', function (Blueprint $table) {
            $table->id();

            $table->time('hour_visit');
            $table->date('date_visit');
            $table->text('observations');
            $table->text('description');
            $table->text('file')->nullable();
            $table->string('sports_scene');
            $table->string('beneficiary_coverage');

            // Relation municipalities
            $table->foreignId('municipalitie_id')->constrained()->onDelete('cascade');

            // Relation monitor user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Relation disciplines
            $table->foreignId('discipline_id')->constrained()->onDelete('cascade');

            // Relation creator user
            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            // Relation reviewed user
            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');

            // Relation with status
            $table->unsignedBigInteger('status_id')->default(config('status.ENR'));
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

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
        Schema::dropIfExists('coordinator_visits');
    }
};
