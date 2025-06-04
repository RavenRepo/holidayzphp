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
    public function up(): void
    {
        // Check if the users table exists
        if (Schema::hasTable('users')) {
            // Get the column type of the id field
            $idColumnType = Schema::getColumnType('users', 'id');
            
            // If the id column is not a string type, modify it
            if ($idColumnType !== 'string' && $idColumnType !== 'varchar') {
                Schema::table('users', function (Blueprint $table) {
                    // Drop the primary key if needed
                    $table->dropPrimary();
                });
                
                // Alter the column type to string
                DB::statement('ALTER TABLE users MODIFY id VARCHAR(36)');
                
                // Add the primary key back
                Schema::table('users', function (Blueprint $table) {
                    $table->primary('id');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
