<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Holidayz\Packages\Core\Models\User;
use Illuminate\Support\Str;

try {
    $user = new User();
    // The User model will automatically generate a UUID during creation
    $user->name = 'Test User';
    $user->email = 'test@example.com';
    $user->password = bcrypt('password');
    $user->save();
    
    echo "User created successfully!\n";
    echo "User ID: " . $user->id . "\n";
    echo "User Name: " . $user->name . "\n";
    echo "User Email: " . $user->email . "\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
