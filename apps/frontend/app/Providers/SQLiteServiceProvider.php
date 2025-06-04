<?php

namespace App\Providers;

use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class SQLiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register SQLite specific fixes for UUIDs
        Connection::resolverFor('sqlite', function ($connection, $database, $prefix, $config) {
            return new class($connection, $database, $prefix, $config) extends SQLiteConnection {
                public function getSchemaBuilder()
                {
                    $builder = parent::getSchemaBuilder();
                    
                    // Replace uuid with binary for SQLite
                    $builder->blueprintResolver(function($table, $callback) {
                        return new class($table, $callback) extends \Illuminate\Database\Schema\Blueprint {
                            public function uuid($column)
                            {
                                return $this->string($column, 36);
                            }
                        };
                    });
                    
                    return $builder;
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
