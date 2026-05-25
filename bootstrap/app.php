<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

try {
    if (isset($_SERVER['VERCEL']) || getenv('VERCEL') || str_contains(__DIR__, '/var/task')) {
        $_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
        $_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
        $_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
        $_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
        $_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
        
        $_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';
        $_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
        $_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
        $_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
        $_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';

        putenv('APP_SERVICES_CACHE=/tmp/services.php');
        putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
        putenv('APP_CONFIG_CACHE=/tmp/config.php');
        putenv('APP_ROUTES_CACHE=/tmp/routes.php');
        putenv('APP_EVENTS_CACHE=/tmp/events.php');
    }

    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            commands: __DIR__.'/../routes/console.php',
            health: '/up',
        )
        ->withMiddleware(function (Middleware $middleware): void {
            $middleware->trustProxies(at: '*');
        })
        ->withExceptions(function (Exceptions $exceptions): void {
            $exceptions->report(function (\Throwable $e) {
                error_log("SIGAP_ORIGINAL_ERROR: " . get_class($e) . " - " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
                error_log($e->getTraceAsString());
            });
        })->create();
} catch (\Throwable $e) {
    error_log("SIGAP_BOOT_ERROR: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
    error_log($e->getTraceAsString());
    throw $e;
}
