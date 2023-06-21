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
        Schema::create('event_support', function (Blueprint $table) {
            $table->id();
            $table->date('date_visit');
            $table->time('hour_visit');
            $table->unsignedBigInteger('municipalitie_id');
            $table->foreign('municipalitie_id')
            ->references('id')
            ->on('municipalities');
            $table->string('correct');
            $table->string('event');
            $table->string('observation');
            $table->text('file1')->nullable();
            $table->text('file2')->nullable();
            $table->text('file3')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('event_support');
    }
};
