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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();

            //INFORMACION
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();

            $table->double('contract_value', 15, 2)->nullable();
            $table->integer('account_number')->nullable();
            $table->string('address')->nullable();
            $table->string('consecutive')->unique()->nullable();

            // ESTADO
            $table->unsignedBigInteger('status')->nullable();
            $table->foreign('status')->references('id')->on('statuses');
            
            // NOTA DE RECHAZO
            $table->text('reject_note')->nullable();

            // IDENTIFICACION
            $table->string('identification', 20)->unique();
            $table->enum('identification_type', ['TI', 'CC'])->default('CC');
            $table->date('date_expedition_document')->nullable();
            $table->string('expedition_place_document')->nullable();
            $table->string('rut')->nullable()->unique();
            $table->string('nit')->nullable();

            // BANCO -- TIPO DE CUENTA
            $table->unsignedBigInteger('bank')->nullable();
            $table->foreign('bank')->references('id')->on('banks');
            $table->unsignedBigInteger('bank_account_type')->nullable();
            $table->foreign('bank_account_type')->references('id')->on('bank_account_types');

            // DEPARTAMENTO
            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')->references('id')->on('departments');

            // MUNICIPIO
            $table->unsignedBigInteger('municipality')->nullable();
            $table->foreign('municipality')->references('id')->on('cities');

            // PERIODO
            $table->unsignedBigInteger('validity_periods_id')->nullable();
            $table->foreign('validity_periods_id')->references('id')->on('validity_periods');

            $table->string('business_name')->nullable();

            $table->unsignedBigInteger('created_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('revised_by')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('revised_by')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('contractors');
    }
};
