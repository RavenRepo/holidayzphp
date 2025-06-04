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
    {        // First, let's check if the users table exists and has a bigint id
        if (Schema::hasTable('users')) {
            // For MySQL, we can query the information_schema
            $columns = DB::select("SELECT COLUMN_TYPE FROM information_schema.COLUMNS 
                                  WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND COLUMN_NAME = ?", 
                                  [env('DB_DATABASE', 'holidayzphp'), 'users', 'id']);
            
            // If the 'id' column is a bigint type, drop the table
            if (!empty($columns) && strpos(strtolower($columns[0]->COLUMN_TYPE), 'int') !== false) {
                // Drop the existing users table if it has an integer id
                Schema::dropIfExists('users');
            }
        }
        
        // Create the users table with UUID support if it doesn't exist
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->string('id', 36)->primary();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't want to drop the users table on rollback
    }
};
