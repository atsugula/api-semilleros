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
        Schema::create('custom_visits', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->string('agreements');
            $table->string('concept');
            $table->char('guardian_knows_semilleros');
            $table->text('file')->nullable();

            // Relation months
            $table->unsignedBigInteger('month_id')->nullable();
            $table->foreign('month_id')
                ->references('id')
                ->on('months');

            // Relation municipalities
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->foreign('municipality_id')
                ->references('id')
                ->on('municipalities');

            // Relation beneficiaries
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->foreign('beneficiary_id')
                ->references('id')
                ->on('beneficiaries');

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
        Schema::dropIfExists('custom_visits');
    }
};
