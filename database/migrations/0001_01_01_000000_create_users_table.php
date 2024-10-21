<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary auto-incrementing key
            $table->string('nom'); // Name field
            $table->string('email')->unique(); // Unique email field
            $table->string('password'); // Password field (hashed)
            $table->enum('role', ['admin', 'zone', 'equipe'])->default('zone'); // Role field with default value 'zone'
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('remember_token')->nullable(); // Remember me token
            $table->string('photo_profile')->nullable(); // Profile photo (nullable)
            $table->timestamps(); // Created at and updated at timestamps
        });

        // Create password reset tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary email field
            $table->string('token'); // Token for password reset
            $table->timestamp('created_at')->nullable(); // Token creation timestamp
        });

        // Create sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary session ID
            $table->foreignId('user_id')->nullable()->index(); // Foreign key to users table
            $table->string('ip_address', 45)->nullable(); // IP address (nullable)
            $table->text('user_agent')->nullable(); // User agent (nullable)
            $table->longText('payload'); // Session data
            $table->integer('last_activity')->index(); // Last activity timestamp
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
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
