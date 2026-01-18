<?php
// Root front controller: forward to public/index.php while preserving REQUEST_URI
// This allows serving the app from the project folder (e.g. http://localhost/SystemeAuth_MVC/)

// Ensure SCRIPT_NAME points to the public front controller
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$publicScript = $scriptDir . '/public/index.php';

// If SCRIPT_NAME already contains /public/index.php, avoid rewriting to prevent loops
if (strpos($_SERVER['SCRIPT_NAME'], '/public/index.php') === false) {
    $_SERVER['SCRIPT_NAME'] = $publicScript;
}

require __DIR__ . '/public/index.php';
