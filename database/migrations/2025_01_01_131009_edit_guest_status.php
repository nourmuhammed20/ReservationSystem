<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the 'status' column already exists before adding it
        if (!Schema::hasColumn('guests', 'status')) {
            Schema::table('guests', function (Blueprint $table) {
                // Add the 'status' column after the 'description' column
                $table->string('status')->default('pending')->nullable()->after('description');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'status' column if it exists
        Schema::table('guests', function (Blueprint $table) {
            if (Schema::hasColumn('guests', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};