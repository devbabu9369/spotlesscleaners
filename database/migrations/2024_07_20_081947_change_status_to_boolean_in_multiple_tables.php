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
        // Update 'status' to boolean and set default to false
        Schema::table('categories', function (Blueprint $table) {
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('categories', 'status')) {
                $table->boolean('status')->default(false);
            }
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('sub_categories', 'status')) {
                $table->boolean('status')->default(false);
            }
        });

        Schema::table('banners', function (Blueprint $table) {
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('banners', 'status')) {
                $table->boolean('status')->default(false);
            }
        });

        Schema::table('services', function (Blueprint $table) {
            // Add status column if it doesn't exist
            if (!Schema::hasColumn('services', 'status')) {
                $table->boolean('status')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        
    }
};
