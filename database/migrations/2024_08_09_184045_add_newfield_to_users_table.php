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
         Schema::table('users', function (Blueprint $table) {
            // Add columns with specified attributes
            $table->string('phone_number')->unique()->after('remember_token'); // Phone number with unique constraint
            $table->string('ip_address')->nullable()->after('phone_number'); // IP address that can be null
            $table->text('device_info')->nullable()->after('ip_address'); // Device info that can be null
            $table->boolean('verified')->default(false)->after('device_info'); // Verified flag with a default value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
