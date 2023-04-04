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
            $table->id();

            $table->unsignedBigInteger("created_by")->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger("revised_by")->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger("municipality")->nullable()->constrained()->onDelete('cascade');
            $table->foreign('municipality')
                ->references('id')
                ->on('municipalities');
            $table->unsignedBigInteger("beneficiaries")->nullable()->constrained()->onDelete('cascade');
            $table->foreign('beneficiaries')
                ->references('id')
                ->on('beneficiaries');
            $table->date("date");
            $table->string("theme");
            $table->string("recommendations"); 
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
