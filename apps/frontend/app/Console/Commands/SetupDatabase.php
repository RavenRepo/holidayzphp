<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the database properly for UUID support';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // First, create an empty database if it doesn't exist
        $dbName = config('database.connections.mysql.database');
        
        $this->info("Checking for database: {$dbName}");
        
        try {
            // Use default database to create the new one
            DB::connection('mysql')->statement("CREATE DATABASE IF NOT EXISTS `{$dbName}`");
            $this->info("Database created or already exists");
        } catch (\Exception $e) {
            $this->error("Error creating database: " . $e->getMessage());
            return 1;
        }
        
        // Migrate the database
        $this->info("Running migrations...");
        Artisan::call('migrate:fresh', ['--force' => true]);
        $this->info(Artisan::output());
        
        // Check the users table structure
        $this->info("Checking users table structure...");
        
        try {
            // Check if users table has a string ID
            $columns = DB::select("SHOW COLUMNS FROM users WHERE Field = 'id'");
            
            if (count($columns) > 0 && stripos($columns[0]->Type, 'varchar') === false) {
                $this->info("Converting users table ID to string...");
                
                // Drop primary key
                DB::statement("ALTER TABLE users DROP PRIMARY KEY");
                
                // Modify ID to varchar(36)
                DB::statement("ALTER TABLE users MODIFY id VARCHAR(36)");
                
                // Add primary key back
                DB::statement("ALTER TABLE users ADD PRIMARY KEY (id)");
                
                $this->info("Successfully converted users table ID to string");
            } else {
                $this->info("Users table already has string ID");
            }
        } catch (\Exception $e) {
            $this->error("Error checking or updating users table: " . $e->getMessage());
            return 1;
        }
        
        $this->info("Database setup completed successfully");
        return 0;
    }
}
