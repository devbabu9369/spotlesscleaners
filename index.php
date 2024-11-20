<?php

// Redirect all requests to the Laravel application
if (php_sapi_name() == 'cli-server') {
    // To help the built-in PHP server with requests for static files
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (file_exists(__DIR__ . $url)) {
        return false; // Serve the requested file as-is
    }
}

// Include Laravel's server-side router
require_once __DIR__.'/public/index.php';
