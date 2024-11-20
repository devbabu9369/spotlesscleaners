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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Page title (e.g., Terms & Conditions)
            $table->string('slug')->unique(); // Slug for URL
            $table->text('content'); // The content of the page
            $table->string('banner_image')->nullable(); // Banner image column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages'); // Uncomment this line to drop the table
    }
};
