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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id')->required();
            $table->foreign('contractor_id')->references('id')->on('contractors');

            $table->unsignedBigInteger('transcribed_user_id')->nullable();
            $table->foreign('transcribed_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('reviewer_user_id')->nullable();
            $table->foreign('reviewer_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('approve_user_id')->nullable();
            $table->foreign('approve_user_id')->references('id')->on('users');

            $table->unsignedBigInteger('hiring_id')->required();
            $table->foreign('hiring_id')->references('id')->on('hirings');

            // ESTADO
            $table->unsignedBigInteger('status')->nullable();
            $table->foreign('status')->references('id')->on('statuses');
            $table->string('rejections')->nullable();
            $table->text('rejection_message')->nullable();
            
            $table->string('identifier_number')->unique()->nullable();
            $table->string('cap_date')->nullable();
            $table->text('scanning_pdf')->nullable();
            $table->text('qr')->nullable();

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
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
        Schema::dropIfExists('contracts');
    }
};
