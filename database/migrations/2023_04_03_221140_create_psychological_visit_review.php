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
        Schema::create('custom_psychological_visit_review', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("Psicological_visit")->nullable()->constrained()->onDelete('cascade');
            $table->foreign('Psicological_visit')
                ->references('id')
                ->on('custom_psychological_visits');
            $table->string("status")->nullable();
            $table->text("reason")->nullable();
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
        Schema::dropIfExists('psychological_visit_review');
    }
};
