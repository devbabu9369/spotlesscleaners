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
        Schema::table('sub_categories', function (Blueprint $table) {
            // Check if 'active_sub_cate' column exists before adding it
            if (!Schema::hasColumn('sub_categories', 'active_sub_cate')) {
                $table->string('active_sub_cate', 255)->nullable()->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            // Drop the column if it exists
            if (Schema::hasColumn('sub_categories', 'active_sub_cate')) {
                $table->dropColumn('active_sub_cate');
            }
        });
    }
};
