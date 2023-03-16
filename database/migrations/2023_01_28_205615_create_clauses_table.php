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
        Schema::create('clauses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id')->required();
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->text('clause1')->nullable();
            $table->text('clause2')->nullable();
            $table->text('clause3')->nullable();
            $table->text('clause4')->nullable();
            $table->text('clause5')->nullable();
            $table->text('clause6')->nullable();
            $table->text('clause7')->nullable();
            $table->text('clause8')->nullable();
            $table->text('clause9')->nullable();
            $table->text('clause10')->nullable();
            $table->text('clause11')->nullable();
            $table->text('clause12')->nullable();
            $table->text('clause13')->nullable();
            $table->text('clause14')->nullable();
            $table->text('clause15')->nullable();
            $table->text('clause16')->nullable();
            $table->text('clause17')->nullable();
            $table->text('clause18')->nullable();
            $table->text('clause19')->nullable();
            $table->text('clause20')->nullable();
            $table->text('clause21')->nullable();
            $table->text('clause22')->nullable();
            $table->text('clause23')->nullable();
            $table->text('clause24')->nullable();

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
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
        Schema::dropIfExists('clauses');
    }
};
