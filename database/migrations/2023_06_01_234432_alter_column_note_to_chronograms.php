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
        Schema::table('chronograms', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
            $table->text('note_holiday')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chronograms', function (Blueprint $table) {
            $table->text('note')->nullable(false)->change();
        });
    }
};
