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
            $table->date('registration_date')->after('group_id')->nullable();

            $table->unsignedBigInteger('municipalities_id')->required()->nullable()->after('registration_date');
            $table->foreign('municipalities_id')->references('id')->on('municipalities')->onDelete('cascade');

            $table->unsignedBigInteger('disciplines_id')->required()->nullable()->after('municipalities_id');
            $table->foreign('disciplines_id')->references('id')->on('disciplines')->onDelete('cascade');

            $table->date('birth_date')->after('full_name')->nullable();
            $table->string('origin_place')->after('birth_date');

            $table->string('home_address')->after('document_number');

            $table->enum('conflict_victim', [0, 1])->after('zone');
            $table->string('distric')->nullable()->after('conflict_victim');
            $table->enum('gender', ['M', 'F'])->after('distric');

            $table->unsignedBigInteger('ethnicities_id')->required()->nullable()->after('gender');
            $table->foreign('ethnicities_id')->references('id')->on('ethnicities')->onDelete('cascade');

            $table->enum('disability', [0, 1])->after('ethnicities_id');
            $table->string('other_disability')->after('disability')->nullable();

            $table->enum('pathology', [0, 1])->after('other_disability');
            $table->string('what_pathology')->after('pathology')->nullable();

            $table->enum('blood_type', [1, 2, 3, 4, 5, 6, 7])->after('what_pathology');

            $table->json('live_with')->after('blood_type');


            $table->enum('scholarship', [0, 1])->after('live_with');
            $table->enum('scholar_level', [1, 2, 3])->after('scholarship')->nullable();
            $table->string('institution')->after('scholar_level')->nullable();

            $table->enum('affiliation_type', ['SUB', 'CON', 'NA'])->after('institution');

            \DB::statement("ALTER TABLE beneficiaries CHANGE type_document type_document ENUM('CC', 'NIT', 'TI', 'PP', 'RC', 'PEP');");
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
            //
        });
    }
};
