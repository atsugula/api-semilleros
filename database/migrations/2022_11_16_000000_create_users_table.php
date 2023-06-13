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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /* $table->unsignedBigInteger('zone_id')->required()->nullable();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');

            $table->unsignedBigInteger('municipalities_id')->required()->nullable();
            $table->foreign('municipalities_id')->references('id')->on('municipalities')->onDelete('cascade');*/

            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('document_number')->unique()->nullable()->nullable();
            $table->string('document_type')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();

            $table->text('profile_photo_path')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->enum('status', ['1', '0'])->default('1');
            $table->rememberToken();

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('manager_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('manager_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('asistent_id')->nullable();
            $table->foreign('asistent_id')
                ->references('id')
                ->on('users');
            $table->enum('status', ['REC', 'REV', 'ENREV', 'APRO'])->nullable()->default('ENREV');
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
        Schema::dropIfExists('users');
    }
};
