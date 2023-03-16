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
        Schema::create('methodologist_visit_personalizeds', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->text('theme');
            $table->integer('qualification');
            $table->text('recommendations');
            $table->string('project_knowledge');

            $table->foreignId('municipalitie_id')->constrained()->onDelete('cascade');
            //   $table->foreignId('sidewalk_id')->constrained()->onDelete('cascade');
            //img
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('methodologist_visit_personalizeds');
    }
};
