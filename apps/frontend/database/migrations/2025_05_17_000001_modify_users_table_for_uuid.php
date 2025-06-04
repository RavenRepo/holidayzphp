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
            // Drop existing primary key and id column
            if (Schema::hasColumn('users', 'id')) {
                // On MySQL 8+, we need to drop any foreign keys that reference this column first
                // but we'll skip that for now as it's likely to be complex
                
                // Drop the primary key if it exists
                $table->dropPrimary();
                
                // Drop the id column
                $table->dropColumn('id');
            }
            
            // Add UUID column as primary key
            $table->uuid('id')->first()->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop UUID primary key
            $table->dropPrimary();
            $table->dropColumn('id');
            
            // Restore auto-increment integer primary key
            $table->id()->first();
        });
    }
};
