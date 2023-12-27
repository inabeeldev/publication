<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('user_type', ['customer', 'admin', 'manager'])->default('customer');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_url')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_preference')->nullable();
            $table->json('getclout_services')->nullable(); // Assuming it's a multi-select field
            $table->string('order_timing')->nullable();
            $table->string('order_quantity')->nullable();
            $table->string('how_did_you_hear')->nullable();
            $table->enum('zoom_call', ['yes', 'no'])->nullable(); // Enum field for 'yes' or 'no'
            $table->text('additional_notes')->nullable();
            $table->boolean('terms')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
