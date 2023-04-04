<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $examples_users = "INSERT INTO users (name, lastname, address, document_number, document_type, phone, gender, profile_photo_path, email, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, remember_token, created_by, revised_by, status, rejection_message, created_at, updated_at, deleted_at) VALUES 
        ('John', 'Doe', '123 Main St', '1234567890', 'passport', '555-5555', 'male', 'path/to/photo.jpg', 'john.doe@example.com', NOW(), 'password', NULL, NULL, NULL, 1, 1, 'REV', NULL, NOW(), NOW(), NULL),
        ('Jane', 'Smith', '456 Elm St', '0987654321', 'driver_license', '555-5555', 'female', NULL, 'jane.smith@example.com', NOW(), 'password', NULL, NULL, NULL, 2, 1, 'APRO', NULL, NOW(), NOW(), NULL),
        ('Bob', 'Johnson', '789 Oak St', '1111111111', 'id_card', '555-5555', 'male', NULL, 'bob.johnson@example.com', NOW(), 'password', NULL, NULL, NULL, 3, 1, 'REC', NULL, NOW(), NOW(), NULL),
        ('Mary', 'Williams', '321 Pine St', '2222222222', 'passport', '555-5555', 'female', NULL, 'mary.williams@example.com', NOW(), 'password', NULL, NULL, NULL, 4, 1, 'REV', NULL, NOW(), NOW(), NULL),
        ('Tom', 'Davis', '654 Birch St', '3333333333', 'driver_license', '555-5555', 'male', NULL, 'tom.davis@example.com', NOW(), 'password', NULL, NULL, NULL, 5, 1, 'ENREV', 'Missing information', NOW(), NOW(), NULL);
        ";
        DB::unprepared($examples_users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
