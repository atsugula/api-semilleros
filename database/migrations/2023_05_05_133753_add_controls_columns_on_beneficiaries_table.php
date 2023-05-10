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
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->unsignedBigInteger('rejected_by')->required()->nullable()->after('status_id');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('approved_by')->required()->nullable()->after('status_id');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reviewed_by')->required()->nullable()->after('status_id');
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reviewed_by');
            $table->dropColumn('reviewed_by');
            $table->dropConstrainedForeignId('approved_by');
            $table->dropColumn('approved_by');
            $table->dropConstrainedForeignId('rejected_by');
            $table->dropColumn('rejected_by');
        });
    }
};
