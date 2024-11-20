<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $tableName = 'orders';
        $statusColumn = 'status';
        $newEnumValues = "'created', 'pending', 'fail', 'completed', 'processing', 'canceled'"; // Updated ENUM values

        // Check if the status column exists before adding cancel_reason
        Schema::table($tableName, function (Blueprint $table) use ($statusColumn) {
            if (!Schema::hasColumn('orders', $statusColumn)) {
                // Add status column if it doesn't exist
                $table->enum('status', ['created', 'pending', 'fail', 'completed', 'processing', 'canceled'])->default('pending');
            }
            // Add cancel_reason column after status column
            $table->string('cancel_reason')->nullable()->after($statusColumn);
        });

        // Check if the status column exists before modifying ENUM values
        if (Schema::hasColumn($tableName, $statusColumn)) {
            // Update the status column ENUM values
            DB::statement("ALTER TABLE `$tableName` MODIFY `$statusColumn` ENUM($newEnumValues) NOT NULL DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $tableName = 'orders';
        $statusColumn = 'status';
        $oldEnumValues = "'created', 'pending', 'fail', 'completed', 'processing'"; // Original ENUM values before 'canceled' was added

        // Remove the cancel_reason column
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('cancel_reason');
        });

        // Revert the status column ENUM values
        DB::statement("ALTER TABLE `$tableName` MODIFY `$statusColumn` ENUM($oldEnumValues) NOT NULL DEFAULT 'pending'");
    }
};
