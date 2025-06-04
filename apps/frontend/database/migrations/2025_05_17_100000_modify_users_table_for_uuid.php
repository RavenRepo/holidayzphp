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
        // First, check if the table has a bigint ID column
        $hasIntId = Schema::getColumnType('users', 'id') === 'integer' || 
                   Schema::getColumnType('users', 'id') === 'bigint';
        
        if ($hasIntId) {
            // Drop the primary key constraint
            Schema::table('users', function (Blueprint $table) {
                $table->dropPrimary(['id']);
            });
            
            // Modify the ID column to char(36)
            Schema::table('users', function (Blueprint $table) {
                $table->char('id', 36)->change();
            });
            
            // Re-add primary key
            Schema::table('users', function (Blueprint $table) {
                $table->primary('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Convert back to auto-increment bigint if needed
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary(['id']);
            $table->bigIncrements('id')->change();
        });
    }
};
