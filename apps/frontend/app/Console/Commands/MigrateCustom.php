<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class MigrateCustom extends Command
{
    protected $signature = 'migrate:custom';
    protected $description = 'Run custom migrations to handle UUID fields properly';

    public function handle()
    {
        $this->info('Starting custom migration process...');
        
        // 1. Clear the database tables
        $this->clearTables();
        
        // 2. Create migration table
        $this->createMigrationsTable();
        
        // 3. Run Core migrations (users and permissions tables)
        $this->runCoreMigrations();
        
        // 4. Run Laravel framework migrations
        $this->runFrameworkMigrations();
        
        $this->info('Custom migration completed successfully!');
        
        return Command::SUCCESS;
    }
    
    protected function clearTables()
    {
        $this->info('Clearing existing tables...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        $tables = DB::select('SHOW TABLES');
        $dbName = config('database.connections.mysql.database');
        $tableKey = "Tables_in_" . $dbName;
        
        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            if ($tableName !== 'migrations') {
                $this->line("Dropping table: {$tableName}");
                Schema::dropIfExists($tableName);
            }
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
    
    protected function createMigrationsTable()
    {
        $this->info('Creating migrations table...');
        if (!Schema::hasTable('migrations')) {
            Schema::create('migrations', function ($table) {
                $table->increments('id');
                $table->string('migration');
                $table->integer('batch');
            });
        }
    }
    
    protected function runCoreMigrations()
    {
        $this->info('Running Core migrations...');
        
        $migrationsPath = base_path('../../packages/Core/src/Database/Migrations');
        $this->runMigrationsInPath($migrationsPath);
    }
    
    protected function runFrameworkMigrations()
    {
        $this->info('Running framework migrations...');
        
        // Session tables
        $this->call('migrate', [
            '--path' => 'database/migrations/create_sessions_table.php',
            '--force' => true,
        ]);
        
        // Cache tables
        $this->call('migrate', [
            '--path' => 'database/migrations/create_cache_table.php',
            '--force' => true,
        ]);
        
        // Job tables
        $this->call('migrate', [
            '--path' => 'database/migrations/create_jobs_table.php',
            '--force' => true,
        ]);
    }
    
    protected function runMigrationsInPath($path)
    {
        if (!File::isDirectory($path)) {
            $this->error("Migration path not found: $path");
            return;
        }
        
        $migrationFiles = File::files($path);
        
        foreach ($migrationFiles as $file) {
            $migrationName = $file->getFilename();
            $this->line("Running migration: $migrationName");
            
            $migrationClass = require $file->getPathname();
            $migrationClass->up();
            
            // Record migration in migrations table
            DB::table('migrations')->insert([
                'migration' => pathinfo($migrationName, PATHINFO_FILENAME),
                'batch' => 1,
            ]);
        }
    }
}
