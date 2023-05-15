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
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('description')->unique()->index()->comment('descripcion');
            $table->tinyInteger('state')->default(1)->comment('estado');
            $table->unsignedBigInteger('region_id')->index()->comment('region_id');
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
        Schema::table('municipalities', function (Blueprint $table) {
            $table->dropForeign('municipalities_region_id_foreign');
        });
    }
};
