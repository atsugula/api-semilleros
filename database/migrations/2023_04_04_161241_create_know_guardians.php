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
        Schema::create('know_guardians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_guardian")->constrained()->onDelete('cascade');
            $table->foreign('id_guardian')
                ->references('id')
                ->on('beneficiary_guardians');
            $table->unsignedBigInteger("id_beneficiary")->unique()->constrained()->onDelete('cascade');
            $table->foreign('id_beneficiary')
                ->references('id')
                ->on('beneficiaries');
            $table->boolean("know_needs");
            $table->integer("concept");
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
        Schema::dropIfExists('know_guardians');
    }
};
