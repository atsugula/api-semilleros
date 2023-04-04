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
        Schema::create('custom_psychological_visits', function (Blueprint $table) {
            $table->id();

            //referencias
            $table->unsignedBigInteger("created_by")->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger("revised_by")->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger("municipality")->constrained()->onDelete('cascade');
            $table->foreign('municipality')
                ->references('id')
                ->on('municipalities');
            $table->unsignedBigInteger("beneficiary")->constrained()->onDelete('cascade');
            $table->foreign('beneficiary')
                ->references('id')
                ->on('beneficiaries');

            //datos de la tabla    
            $table->date("date")->nullable();
            $table->string("topic")->nullable();
            $table->text("agreemnets")->nullable(); 
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
