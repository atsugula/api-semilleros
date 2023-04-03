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
        Schema::create('evidence_files', function (Blueprint $table) {
            $table->id();
            $table->string('model')->require();
            $table->string('path')->nullable();

            // Relation creator user
            $table->unsignedBigInteger('transversal_id')->nullable();
            $table->foreign('transversal_id')
                ->references('id')
                ->on('transversal_activities');

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
        Schema::dropIfExists('evidence_files');
    }
};
