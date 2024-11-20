<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        $tableName = 'users';
        $columnName = 'usertype';
        $newEnumValues = "'admin', 'user', 'partner'"; // Add your new status here

        
        DB::statement("ALTER TABLE `$tableName` MODIFY `$columnName` ENUM($newEnumValues) NOT NULL");
    }

    public function down()
    {
        $tableName = 'users';
        $columnName = 'usertype';
        $oldEnumValues = "'admin', 'user', 'partner'"; // Revert to old values

        // Use raw SQL to revert the enum column
        DB::statement("ALTER TABLE `$tableName` MODIFY `$columnName` ENUM($oldEnumValues) NOT NULL");
    }
};
