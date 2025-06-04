<?php

// Script to set up the database with proper UUID support for the users table
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Make sure we're using MySQL
$connection = config('database.default');
if ($connection !== 'mysql') {
    echo "Error: This script requires MySQL connection, current connection is: $connection\n";
    exit(1);
}

$dbName = config('database.connections.mysql.database');
echo "Setting up database {$dbName}...\n";

try {
    // Drop all existing tables
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    $tables = DB::select('SHOW TABLES');
    $tableKey = "Tables_in_" . $dbName;

    foreach ($tables as $table) {
        if (isset($table->$tableKey)) {
            $tableName = $table->$tableKey;
            echo "Dropping table: $tableName\n";
            DB::statement("DROP TABLE IF EXISTS `$tableName`");
        }
    }
    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    // Create the migration table
    Schema::create('migrations', function ($table) {
        $table->increments('id');
        $table->string('migration');
        $table->integer('batch');
    });

    // Create the users table with proper UUID support
    Schema::create('users', function ($table) {
        $table->string('id', 36)->primary(); // Use string for UUID
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
});

// Create the permission-related tables
$tableNames = [
    'permissions' => 'permissions',
    'roles' => 'roles',
    'model_has_permissions' => 'model_has_permissions',
    'model_has_roles' => 'model_has_roles',
    'role_has_permissions' => 'role_has_permissions',
];

// Create permissions table
Schema::create($tableNames['permissions'], function ($table) {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('guard_name');
    $table->timestamps();
    $table->unique(['name', 'guard_name']);
});

// Create roles table
Schema::create($tableNames['roles'], function ($table) {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('guard_name');
    $table->timestamps();
    $table->unique(['name', 'guard_name']);
});

// Create model_has_permissions table
Schema::create($tableNames['model_has_permissions'], function ($table) use ($tableNames) {
    $table->unsignedBigInteger('permission_id');
    $table->string('model_type');
    $table->string('model_id', 36); // UUID support
    $table->primary(['permission_id', 'model_id', 'model_type']);
    $table->foreign('permission_id')->references('id')->on($tableNames['permissions'])->onDelete('cascade');
});

// Create model_has_roles table
Schema::create($tableNames['model_has_roles'], function ($table) use ($tableNames) {
    $table->unsignedBigInteger('role_id');
    $table->string('model_type');
    $table->string('model_id', 36); // UUID support
    $table->primary(['role_id', 'model_id', 'model_type']);
    $table->foreign('role_id')->references('id')->on($tableNames['roles'])->onDelete('cascade');
});

// Create role_has_permissions table
Schema::create($tableNames['role_has_permissions'], function ($table) use ($tableNames) {
    $table->unsignedBigInteger('permission_id');
    $table->unsignedBigInteger('role_id');
    $table->primary(['permission_id', 'role_id']);
    $table->foreign('permission_id')->references('id')->on($tableNames['permissions'])->onDelete('cascade');
    $table->foreign('role_id')->references('id')->on($tableNames['roles'])->onDelete('cascade');
});

// Create sessions table
Schema::create('sessions', function ($table) {
    $table->string('id')->primary();
    $table->string('user_id', 36)->nullable()->index(); // UUID support
    $table->string('ip_address', 45)->nullable();
    $table->text('user_agent')->nullable();
    $table->longText('payload');
    $table->integer('last_activity')->index();
});

// Create cache tables
Schema::create('cache', function ($table) {
    $table->string('key')->primary();
    $table->mediumText('value');
    $table->integer('expiration');
});

Schema::create('cache_locks', function ($table) {
    $table->string('key')->primary();
    $table->string('owner');
    $table->integer('expiration');
});

// Create jobs tables
Schema::create('jobs', function ($table) {
    $table->bigIncrements('id');
    $table->string('queue')->index();
    $table->longText('payload');
    $table->unsignedTinyInteger('attempts');
    $table->unsignedInteger('reserved_at')->nullable();
    $table->unsignedInteger('available_at');
    $table->unsignedInteger('created_at');
});

Schema::create('failed_jobs', function ($table) {
    $table->id();
    $table->string('uuid')->unique();
    $table->text('connection');
    $table->text('queue');
    $table->longText('payload');
    $table->longText('exception');
    $table->timestamp('failed_at')->useCurrent();
});

// Record the migrations as completed
DB::table('migrations')->insert([
    ['migration' => '0001_01_01_000000_create_users_table', 'batch' => 1],
    ['migration' => '0001_01_01_000001_create_cache_table', 'batch' => 1],
    ['migration' => '0001_01_01_000002_create_jobs_table', 'batch' => 1],
    ['migration' => '2024_05_06_000001_create_users_table', 'batch' => 1],
    ['migration' => '2024_05_06_000002_create_permission_tables', 'batch' => 1],
    ['migration' => '2025_05_14_115817_create_permission_tables', 'batch' => 1],
]);

// Create default roles
$roles = [
    ['name' => 'user', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'manager', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()],
];

DB::table('roles')->insert($roles);

echo "Database setup completed successfully!\n";
