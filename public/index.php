<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    if (method_exists($kernel, 'bootstrap')) {
        $request = Illuminate\Http\Request::capture();
        $app->instance('request', $request);
        $kernel->bootstrap();
    }
} catch (\Throwable $e) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "<div style='padding: 20px; font-family: sans-serif; background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; border-radius: 8px;'>";
    echo "<h2 style='margin-top: 0;'>SIGAP Boot Debug Interceptor Catch</h2>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " on line " . htmlspecialchars($e->getLine()) . "</p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre style='background: #fef2f2; padding: 10px; border-radius: 4px; overflow-x: auto; font-size: 13px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
    error_log("SIGAP_BOOT_DEBUG: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
    error_log($e->getTraceAsString());
    exit(1);
}

$app->handleRequest(Request::capture());
