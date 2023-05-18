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
        Schema::create('roles_objects_activities', function (Blueprint $table) {
            $table->id();
            $table->text('activity')->comment('actividad');
            $table->tinyInteger('state')->default(1)->comment('estado');
            $table->unsignedBigInteger('role_activity_id')->index()->comment('roles_activities');
            $table->timestamps();

            $table->foreign('role_activity_id')->references('id')->on('roles_activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_objects_activities');   
        Schema::table('roles_objects_activities', function (Blueprint $table) {
            $table->dropForeign('roles_objects_activities_role_activity_id_foreign');
        });
    }
};
