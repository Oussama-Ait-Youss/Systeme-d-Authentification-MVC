<?php
session_start();

define('ROOT_PATH', dirname(__DIR__));

// Compute BASE_URL (project base path). If hosted under a folder like /SystemeAuth_MVC,
// BASE_URL will be '/SystemeAuth_MVC'. When served at domain root, BASE_URL will be ''.
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base = trim($scriptDir, '/');
// If script sits in a public folder, drop that segment
if (substr($base, -6) === 'public') {
    $base = trim(substr($base, 0, -6), '/');
}
if ($base === '' || $base === '.' ) {
    $base = '';
} else {
    $base = '/' . $base;
}
define('BASE_URL', $base);
define('ASSETS_URL', BASE_URL . '/public/assests');

// --- AUTOLOADER (Crucial pour ton architecture) ---
spl_autoload_register(function ($class) {
    // Mapping : App\Core -> core/ et App\Controllers -> app/Controllers/
    
    // 1. Si c'est une classe du Core (ex: App\Core\Router)
    if (strpos($class, 'App\\Core\\') === 0) {
        $file = ROOT_PATH . '/core/' . str_replace('App\\Core\\', '', $class) . '.php';
        if (file_exists($file)) { require $file; return; }
    }

    // 2. Si c'est une classe de l'App (Controllers, Models)
    if (strpos($class, 'App\\') === 0) {
        $file = ROOT_PATH . '/app/' . str_replace('App\\', '', $class) . '.php';
        // Remplace les \ par / pour le chemin fichier
        $file = str_replace('\\', '/', $file);
        
        if (file_exists($file)) { require $file; }
    }
});

use App\Core\Router;

$router = new Router();

// --- ROUTES ---
$router->get('/', 'AuthController', 'login');
$router->get('/auth/login', 'AuthController', 'login');
$router->post('/auth/loginPost', 'AuthController', 'loginPost');
$router->get('/auth/register', 'AuthController', 'register');
$router->post('/auth/registerPost', 'AuthController', 'registerPost');
$router->get('/auth/logout', 'AuthController', 'logout');

$router->get('/candidate/dashboard', 'CandidateController', 'dashboard');
$router->get('/recruiter/dashboard', 'RecruiterController', 'dashboard');
$router->get('/admin/dashboard', 'AdminController', 'dashboard');

$router->dispatch();