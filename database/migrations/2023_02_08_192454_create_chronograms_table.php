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
        Schema::create('chronograms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');

            // Relation with status
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

            $table->text('rejection_message')->nullable();

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
        Schema::dropIfExists('chronograms');
    }
};
