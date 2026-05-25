<?php

try {
    // Forward request ke public/index.php milik Laravel
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Tangkap error booting/runtime utama dan tampilkan di browser & log
    error_log("SIGAP_VERCEL_ERROR: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
    error_log($e->getTraceAsString());
    
    header("HTTP/1.1 500 Internal Server Error");
    echo "<div style='padding: 20px; font-family: sans-serif; background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; border-radius: 8px;'>";
    echo "<h2 style='margin-top: 0;'>SIGAP Vercel Boot/Runtime Error</h2>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " on line " . htmlspecialchars($e->getLine()) . "</p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre style='background: #fef2f2; padding: 10px; border-radius: 4px; overflow-x: auto; font-size: 13px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
