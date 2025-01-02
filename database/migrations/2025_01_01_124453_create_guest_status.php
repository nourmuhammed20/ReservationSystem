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
        Schema::table('guests', function (Blueprint $table) {
            // Add the 'status' column after the 'description' column
            $table->string('status')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'status' column if it exists
        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};