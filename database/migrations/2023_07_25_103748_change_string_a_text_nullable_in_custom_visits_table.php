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
        Schema::table('custom_visits', function (Blueprint $table) {
            $table->text('theme')->change();
            $table->text('agreements')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_visits', function (Blueprint $table) {
            $table->string('theme')->nullable(false)->change();
            $table->string('agreements')->nullable(false)->change();
        });
    }
};
