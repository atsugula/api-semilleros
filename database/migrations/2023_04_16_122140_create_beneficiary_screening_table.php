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
        Schema::create('beneficiary_screening', function (Blueprint $table) {
            $table->id();
            $table->string('estatura');
            $table->string('envergadura');
            $table->string('masa');
            $table->string('flexibilidad');
            $table->string('velocidad');
            $table->string('fuerza');
            $table->string('oculomanual');

            $table->unsignedBigInteger("beneficiary_id")->unique()->constrained()->onDelete('cascade');
            $table->foreign('beneficiary_id')
                ->references('id')
                ->on('beneficiaries');

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
        Schema::dropIfExists('beneficiary_screening');
    }
};
