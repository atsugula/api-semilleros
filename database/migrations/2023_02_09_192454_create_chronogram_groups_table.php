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
        Schema::create('chronograms_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chronograms_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('chronograms_id')
                ->references('id')
                ->on('chronograms');

            $table->unsignedBigInteger('group_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');

            $table->unsignedBigInteger('sports_modality')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('sports_modality')
                ->references('id')
                ->on('disciplines');

            $table->text('main_sports_stage_name')->nullable();
            $table->text('main_sports_stage_address')->nullable();
            $table->text('alt_sports_stage_name')->nullable();
            $table->text('alt_sports_stage_address')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chronograms_groups');
    }
};