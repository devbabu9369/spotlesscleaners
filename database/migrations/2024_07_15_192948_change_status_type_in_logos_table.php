<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusTypeInLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('logo', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('logo', function (Blueprint $table) {
            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('logo', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('logo', function (Blueprint $table) {
            $table->enum('status', ['0', '1'])->default('0');
        });
    }
}
