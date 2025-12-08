<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename camelCase columns to snake_case to align with Laravel conventions
        DB::statement('ALTER TABLE itineraries RENAME COLUMN startDate TO start_date;');
        DB::statement('ALTER TABLE itineraries RENAME COLUMN endDate TO end_date;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE itineraries RENAME COLUMN start_date TO startDate;');
        DB::statement('ALTER TABLE itineraries RENAME COLUMN end_date TO endDate;');
    }
};

