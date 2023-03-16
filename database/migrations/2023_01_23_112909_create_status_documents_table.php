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
        Schema::create('status_documents', function (Blueprint $table) {
            $table->id();

           /* $table->unsignedBigInteger('document_id')->required();
            $table->foreign('document_id')->references('id')->on('documents');*/

           /* $table->unsignedBigInteger('status_id')->required();
            $table->foreign('status_id')->references('id')->on('statuses');*/
            $table->string('description');
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
        Schema::dropIfExists('status_documents');
    }
};
