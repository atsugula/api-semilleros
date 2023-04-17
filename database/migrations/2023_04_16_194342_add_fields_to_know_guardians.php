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
        Schema::table('know_guardians', function (Blueprint $table) {
            $table->string('relationship')->after('id_beneficiary');
            $table->json('find_out')->after('relationship');
            $table->json('social_media')->after('find_out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('know_guardians', function (Blueprint $table) {
            //
        });
    }
};
