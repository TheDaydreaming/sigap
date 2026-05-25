<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

try {
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
